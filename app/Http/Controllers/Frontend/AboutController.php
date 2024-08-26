<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutItem;
use App\Models\PageItem;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    public function Index()
    {
        $data['page_data'] = PageItem::first();
        $data['about_items'] = AboutItem::get();
        return view('frontend.pages.about', $data);
    }
}
