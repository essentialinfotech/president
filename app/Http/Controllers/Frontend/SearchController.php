<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $searchTerm = $request->input('query');

        // Perform search logic, for example:
        $products = Product::with('multi_photos')->where('product_name', 'like', '%' . $searchTerm . '%') ->take(5)->get();

        return response()->json(['products' => $products]);
    }

    public function SearchProduct(Request $request)
    {
        $searchTerm = $request->input('query');

        // Perform search logic, for example:
        $data['products'] = Product::with(['multi_photos', 'product_category'])->where('product_name', 'like', '%' . $searchTerm . '%')->get();
        return view('frontend.pages.products.search_products', $data);
    }
}
