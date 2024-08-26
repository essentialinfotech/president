<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PageItem;
use Illuminate\Http\Request;

class TermConditionController extends Controller
{
    public function Index()
    {
        $data['page_data'] = PageItem::first();
        return view('frontend.pages.term_condition', $data);
    }
}
