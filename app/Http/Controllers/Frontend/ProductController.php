<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function AllProduct()
    {
        $data['products'] = Product::where('status', 1)->orderBy('created_at', 'DESC')->get();
        return view('frontend.pages.products.all_products', $data);
    }

    public function NewArrivals()
    {
        $data['new_arrivals'] = Product::where('status', 1)->latest()->get();
        return view('frontend.pages.products.new_arrival_products', $data);
    }

    public function Discount()
    {
        // $data['new_arrivals'] = Product::where('status', 1)->where('discount_price', '>', 0)->latest()->get();
        $data['discount_products'] = Product::whereHas('product_variants.variantSizes', function ($query) {
            $query->where('discount_price', '>', 0);
        })->get();

        return view('frontend.pages.products.discount_products', $data);
    }

    public function CategoyProduct($slug)
    {
        $data['category'] = ProductCategory::where('slug', $slug)->first();
        if (!$data['category']) {
            abort(404);
        }
        $data['category_products'] = Product::where('status', 1)->where('product_category_id', $data['category']->id)->orderBy('created_at', 'DESC')->get();

        $data['categories'] = ProductCategory::orderBy('order', 'ASC')->get();

        return view('frontend.pages.products.category_products', $data);
    }

    public function ProductDetails($slug)
    {
        $data['product'] = Product::where('product_slug', $slug)->first();

        $data['minPrice'] = null;
        $data['maxPrice'] = null;
        $data['inStock'] = false;

        if (!$data['product']) {
            abort(404);
        } else {
            foreach ($data['product']->product_variants as $variant) {
                foreach ($variant->variantSizes as $size) {
                    $price = $size->discount_price > 0 ? $size->discount_price : $size->selling_price;

                    if (is_null($data['minPrice']) || $price < $data['minPrice']) {
                        $data['minPrice'] = $price;
                    }

                    if (is_null($data['maxPrice']) || $price > $data['maxPrice']) {
                        $data['maxPrice'] = $price;
                    }

                    if ($size->quantity > 0) {
                        $data['inStock'] = true;  // Product is in stock
                    }
                }
            }
        }

        return view('frontend.pages.products.details_product', $data);
    }


    public function loadMoreProducts(Request $request)
    {
        $page = $request->input('page', 1); // Default to page 1 if not provided
        $perPage = $request->input('per_page', 12);

        // Fetch the products based on the current page and per page limit
        $products = Product::with(['multi_photos', 'product_variants'])->skip(($page - 1) * $perPage)
            ->take($perPage)
            ->get();

        // Calculate remaining products
        $remainingProducts = Product::count() - ($page * $perPage);

        // Generate the HTML for the fetched products
        $html = '';
        foreach ($products as $product) {
            $html .= view('frontend.home.partials.product', compact('product'))->render();
        }

        // Return the HTML and the remaining product count as a JSON response
        return response()->json([
            'html' => $html,
            'remaining' => $remainingProducts
        ]);
    }
}
