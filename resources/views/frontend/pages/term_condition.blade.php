@extends('frontend.master_dashboard')
@section('title', $page_data['term_condition_seo_title'])
@section('meta_description', $page_data['term_condition_seo_meta_description'])
@section('og_image', $page_data['term_condition_banner'])
@section('twitter_image', $page_data['term_condition_banner'])
@section('main')
    <!-- Bread Curmb Section -->
    <div class="breadcrumb-box"
        style=" background-image: url('{{ asset($page_data->term_condition_banner) }}');  background-position: center; background-repeat: no-repeat;background-size: cover;">
        <div class="container d-flex flex-column gap-2 align-items-center justify-content-center">
            <div class="head-title pb-2">
                <h2 class="text-light">Terms & Conditions</h2>
            </div>
            <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Terms & Conditions</li>
                </ol>
            </nav>
        </div>
    </div>


    <!-- Start Term Condition Section -->
    <section>
        <div class="container">
            <div class="head-title">
                <h2>{{ $page_data->term_condition_heading }}</h2>
                <p>{{ $page_data->term_condition_short_description }}</p>
            </div>

            {!! $page_data->term_condition_details !!}

        </div>
    </section>
    <!-- End Term Condition Section -->
@endsection
