<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PageItem;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    public function Index()
    {
        $data['page_data'] = PageItem::first();
        return view('frontend.pages.privacy_policy', $data);
    }
}
