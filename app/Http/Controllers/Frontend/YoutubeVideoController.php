<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\YoutubeVideo;
use Illuminate\Http\Request;

class YoutubeVideoController extends Controller
{
    public function Index()
    {
        $data['videos'] = YoutubeVideo::latest()->get();
        return view('frontend.pages.videos', $data);
    }
}
