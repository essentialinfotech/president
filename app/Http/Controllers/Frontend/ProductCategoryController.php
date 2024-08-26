<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function AllCategory()
    {
        return  $data['categories'] = ProductCategory::orderBy('order', 'DESC')->get();
    }
}
