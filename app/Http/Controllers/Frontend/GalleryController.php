<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function Index()
    {
        $data['galleries'] = Gallery::latest()->get();
        return view('frontend.pages.gallery', $data);
    }
}
