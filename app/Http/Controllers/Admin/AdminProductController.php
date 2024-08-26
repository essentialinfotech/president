<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductMultiPhoto;
use App\Models\ProductVariant;
use App\Models\ProductVariantSize;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminProductController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['products'] = Product::with(['product_category', 'multi_photos'])->latest()->get();
        $data['product_categories'] = ProductCategory::get();
        return view('backend.product.products', $data);
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
            'product_name' => 'required|unique:products',
        ]);

        $data = new Product();
        $data->product_category_id = $request->product_category_id;
        $data->product_name = $request->product_name;
        $data->product_slug = Str::of($request->product_name)->slug('-');
        $data->product_code = $request->product_code;
        $data->short_description = $request->short_description;
        $data->long_description = $request->long_description;
        $data->status = 1;
        if ($data->save()) {
            /// Multiple Image Upload From her //////
            if ($request->file('photos')) {
                $photos = $request->file('photos');
                foreach ($photos as $photo) {
                    $manager = new ImageManager(new Driver());
                    $name_gen = hexdec(uniqid()) . '.' . $photo->getClientOriginalExtension();
                    $img = $manager->read($photo);
                    $img = $img->cover(1024, 1024);
                    $img->toJpeg(80)->save(public_path('upload/product/' . $name_gen));
                    $photo_url = 'upload/product/' . $name_gen;

                    $photos = new ProductMultiPhoto();
                    $photos->product_id = $data->id;
                    $photos->photo_name = $photo_url;
                    $photos->save();
                } // end foreach

            }
            /// End Multiple Image Upload From her //////

            // Start product variants
            if ($request->variants) {

                foreach ($request->variants as $variant) {
                    $photoPath = null;
                    if (isset($variant['photo'])) {
                        $photo = $variant['photo'];
                        $manager = new ImageManager(new Driver());
                        $name_gen = hexdec(uniqid()) . '.' . $photo->getClientOriginalExtension();
                        $img = $manager->read($photo);
                        $img = $img->cover(1024, 1024);
                        $img->toJpeg(80)->save(public_path('upload/product/' . $name_gen));
                        $photoPath = 'upload/product/' . $name_gen;
                    }
                    $pvariant = new ProductVariant();
                    $pvariant->product_id = $data->id;
                    $pvariant->color = $variant['color'];
                    $pvariant->photo = $photoPath;
                    $pvariant->save();

                    // Save the sizes for the variant
                    if (isset($variant['sizes'])) {
                        foreach ($variant['sizes'] as $sizeData) {
                            $variantSize = new ProductVariantSize();
                            $variantSize->product_variant_id = $pvariant->id;
                            $variantSize->size = $sizeData['size'];
                            $variantSize->quantity = $sizeData['quantity'];
                            $variantSize->selling_price = $sizeData['selling_price'];
                            $variantSize->discount_price = $sizeData['discount_price'] ?? null;
                            $variantSize->save();
                        }
                    }
                }
            }
            // End product variants
        }

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
        $data['product'] = Product::findOrFail($id);
        $data['product_categories'] = ProductCategory::get();
        return view('backend.product.product_edit', $data);
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
            'product_name' => [
                'required',
                Rule::unique('products')->ignore($id)
            ],
        ]);

        $data =  Product::find($id);

        $data->product_category_id = $request->product_category_id;
        $data->product_name = $request->product_name;
        $data->product_slug = Str::of($request->product_name)->slug('-');

        $data->product_code = $request->product_code;
        $data->short_description = $request->short_description;
        $data->long_description = $request->long_description;

        if ($data->update()) {
            /// Multiple Image Upload From her //////            

            if ($request->file('photos')) {
                $photos = $request->file('photos');
                foreach ($photos as $photo) {
                    $manager = new ImageManager(new Driver());
                    $name_gen = hexdec(uniqid()) . '.' . $photo->getClientOriginalExtension();
                    $img = $manager->read($photo);
                    $img = $img->cover(1024, 1024);
                    $img->toJpeg(80)->save(public_path('upload/product/' . $name_gen));
                    $photo_url = 'upload/product/' . $name_gen;

                    $photos = new ProductMultiPhoto();
                    $photos->product_id = $data->id;
                    $photos->photo_name = $photo_url;
                    $photos->save();
                } // end foreach

            }
            /// End Multiple Image Upload From her //////

            // Start product variants
            if ($request->variants) {

                foreach ($request->variants as $variant) {
                    $photoPath = null;
                    if (isset($variant['photo'])) {
                        $photo = $variant['photo'];
                        $manager = new ImageManager(new Driver());
                        $name_gen = hexdec(uniqid()) . '.' . $photo->getClientOriginalExtension();
                        $img = $manager->read($photo);
                        $img = $img->cover(1024, 1024);
                        $img->toJpeg(80)->save(public_path('upload/product/' . $name_gen));
                        $photoPath = 'upload/product/' . $name_gen;
                    }
                    $pvariant = new ProductVariant();
                    $pvariant->product_id = $data->id;
                    $pvariant->color = $variant['color'];
                    $pvariant->photo = $photoPath;
                    $pvariant->save();

                    // Save the sizes for the variant
                    if (isset($variant['sizes'])) {
                        foreach ($variant['sizes'] as $sizeData) {
                            $variantSize = new ProductVariantSize();
                            $variantSize->product_variant_id = $pvariant->id;
                            $variantSize->size = $sizeData['size'];
                            $variantSize->quantity = $sizeData['quantity'];
                            $variantSize->selling_price = $sizeData['selling_price'];
                            $variantSize->discount_price = $sizeData['discount_price'] ?? null;
                            $variantSize->save();
                        }
                    }
                }
            }
            // End product variants


        }

        $notification = array(
            'message' => 'Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function UpateVariant(Request $request, $id)
    {
        $variant = ProductVariant::findOrFail($id);

        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|image|mimes:jpeg,JPG,jpg,png,gif,svg,webp,bmp',
            ]);

            if (file_exists(public_path($variant->photo))) {
                unlink(public_path($variant->photo));
            }

            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $request->file('photo')->getClientOriginalExtension();
            $img = $manager->read($request->file('photo'));
            $img = $img->cover(1024, 1024);
            $img->toJpeg(80)->save(public_path('upload/product/' . $name_gen));
            $variant->photo = 'upload/product/' . $name_gen;
        }

        $variant->color = $request->input('color');
        $variant->quantity = $request->input('quantity');
        $variant->update();

        $notification = array(
            'message' => 'Data Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function DeleteVariant($id)
    {
        $variant = ProductVariant::find($id);
        $variantSizes = ProductVariantSize::where('product_variant_id', $id)->get();

        foreach ($variantSizes as $size) {
            $size->delete();
        }

        if (file_exists($variant->photo)) {
            unlink(public_path($variant->photo));
        }
        $variant->delete();
        $notification = array(
            'message' => 'Data Deleted Successfully',
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
        $data = Product::find($id);
        if (file_exists($data->product_thumbnail)) {
            unlink(public_path($data->product_thumbnail));
        }

        if ($data->delete()) {
            $photos = ProductMultiPhoto::where('product_id', $data->id)->get();
            foreach ($photos as $img) {
                unlink($img->photo_name);
                ProductMultiPhoto::where('id', $img->id)->delete();
            }

            $variants = ProductVariant::where('product_id', $data->id)->get();
            foreach ($variants as $variant) {
                unlink($variant->photo);
                ProductVariant::where('id', $variant->id)->delete();
            }
        }


        $notification = array(
            'message' => 'Data Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function MultiPhotoDelete($id)
    {
        $data = ProductMultiPhoto::find($id);
        $product_variants = ProductVariant::where('product_id', $data->product_id)->get();
        if (file_exists($data->photo_name)) {
            unlink(public_path($data->photo_name));
        }
        foreach ($product_variants as $product_variant) {

            if (file_exists($product_variant->photo)) {
                unlink(public_path($product_variant->photo));
            }
            $product_variant->delete();
        }

        $data->delete();

        $notification = array(
            'message' => 'Data Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
