@extends('frontend.master_dashboard')
@section('title', $page_data['about_seo_title'])
@section('meta_description', $page_data['about_seo_meta_description'])
@section('og_image', $page_data['about_banner'])
@section('twitter_image', $page_data['about_banner'])
@section('main')


    <!-- ***** Main Banner Area Start ***** -->
    <div class=" about-page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>About Our Company</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** About Area Starts ***** -->
    <div class="about-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-image">
                        <img src="frontend/assets/images/about-left-image.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <h4>About Us &amp; Our Skills</h4>
                        <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod kon tempor incididunt
                            ut labore.</span>
                        {{-- <div class="quote">
                            <i class="fa fa-quote-left"></i>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiuski smod kon tempor
                                incididunt ut labore.</p>
                        </div> --}}
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod kon tempor incididunt ut
                            labore et dolore magna aliqua ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                            nisi ut aliquip.</p>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** About Area Ends ***** -->



@endsection
