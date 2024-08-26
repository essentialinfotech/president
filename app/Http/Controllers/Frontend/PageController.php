<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PageItem;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function WhereToBuy()
    {
        $data['page_data'] = PageItem::first();
        return view('frontend.pages.where_to_buy', $data);
    }

    public function Warranty()
    {
        $data['page_data'] = PageItem::first();
        return view('frontend.pages.warranty', $data);
    }

    public function OurStory()
    {
        $data['page_data'] = PageItem::first();
        return view('frontend.pages.our_story', $data);
    }

    public function PurposeAndValues()
    {
        $data['page_data'] = PageItem::first();
        return view('frontend.pages.purpose_and_values', $data);
    }
}
