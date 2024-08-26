@extends('frontend.master_dashboard')
@section('title', $page_data['portfolio_seo_title'])
@section('meta_description', $page_data['portfolio_seo_meta_description'])
@section('og_image', $page_data['portfolio_banner'])
@section('twitter_image', $page_data['portfolio_banner'])
@section('main')
    <!-- Bread Curmb Section -->
    <div class="breadcrumb-box"
        style=" background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset($page_data->portfolio_banner) }}');  background-position: center; background-repeat: no-repeat;background-size: cover;">
        <div class="container d-flex flex-column gap-2 align-items-center justify-content-center">
            <div class="head-title pb-2">
                <h2 class="text-light">Our Portfolio</h2>
            </div>
            <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Our Portfolio</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Start Portfolio Section -->
    <section>
        <div class="container">
            <div class="head-title">
                <h2 class="mw-100"><span class="animate-heading">{{ $page_data->portfolioheading }}</span></h2>
                <p>{{ $page_data->portfolio_short_description }}</p>
            </div>
            <div class="row">
                <div class="text-md-end">
                    <button class="btn btn-default filter-button px-5 active" data-filter="all">All</button>
                    @foreach ($product_categories as $category)
                        <button class="btn btn-default filter-button ms-2"
                            data-filter="{{ $category->id }}">{{ $category->name }}</button>
                    @endforeach

                </div>
                <br />

                @foreach ($products as $item)
                    <div
                        class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter {{ $item->product_category->id }}">
                        <a href="{{ route('portfolio.details', $item->slug) }}">
                            <div class="zoom-overlay">
                                <img src="{{ asset($item->photo) }}" class="card-img-top" alt="{{ $item->photo_alt }}">
                            </div>
                            <p class="project-text p-3">{{ $item->name }}</p>
                        </a>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
    <!-- End Portfolio Section -->
@endsection
