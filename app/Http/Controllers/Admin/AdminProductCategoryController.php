<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductMultiPhoto;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AdminProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['product_categories'] = ProductCategory::get();
        return view('backend.product_category.product_categories', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:product_categories',
        ]);
        $data = new ProductCategory();

        if ($request->file('photo')) {
            $request->validate(
                [
                    'photo' => 'required|image|mimes:jpeg,JPG,jpg,png,gif,svg,webp,bmp',
                ]
            );
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $request->file('photo')->getClientOriginalExtension();
            $img = $manager->read($request->file('photo'));
            $img = $img->cover(385, 330);
            $img->toJpeg(80)->save(public_path('upload/product_category/' . $name_gen));
            $save_url = 'upload/product_category/' . $name_gen;

            $data->photo = $save_url;
        }


        $data->name = $request->name;
        $data->slug = Str::of($request->name)->slug('-');
        $data->is_top = $request->is_top;
        $data->is_banner = $request->is_banner;
        $data->order = $request->order;
        $data->save();

        $notification = array(
            'message' => 'Data Saved Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => [
                'required',
                Rule::unique('product_categories')->ignore($id)
            ],
        ]);
        $data =  ProductCategory::find($id);

        if ($request->file('photo')) {
            $request->validate(
                [
                    'photo' => 'required|image|mimes:jpeg,JPG,jpg,png,gif,svg,webp,bmp',
                ]
            );
            if (file_exists($data->photo)) {
                unlink(public_path($data->photo));
            }
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $request->file('photo')->getClientOriginalExtension();
            $img = $manager->read($request->file('photo'));
            $img = $img->cover(385, 330);
            $img->toJpeg(80)->save(public_path('upload/product_category/' . $name_gen));
            $save_url = 'upload/product_category/' . $name_gen;

            $data->photo = $save_url;
        }

        $data->name = $request->name;

        $data->slug = Str::of($request->name)->slug('-');
        $data->is_top = $request->is_top;
        $data->is_banner = $request->is_banner;
        $data->order = $request->order;

        $data->update();

        $notification = array(
            'message' => 'Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = ProductCategory::find($id);
        if (file_exists($category->photo)) {
            unlink(public_path($category->photo));
        }

        $products = Product::where('product_category_id', $id)->get();
        foreach ($products as $product) {
            $product_photos = ProductMultiPhoto::where('product_id', $product->id)->get();
            $product_variants = ProductVariant::where('product_id', $product->id)->get();

            foreach ($product_photos as $photo) {

                if (file_exists($photo->photo_name)) {
                    unlink(public_path($photo->photo_name));
                }
                $photo->delete();
            }

            foreach ($product_variants as $product_variant) {

                if (file_exists($product_variant->photo)) {
                    unlink(public_path($product_variant->photo));
                }
                $product_variant->delete();
            }

            $product->delete();
        }

        $category->delete();

        $notification = array(
            'message' => 'Data Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
