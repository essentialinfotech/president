@extends('frontend.master_dashboard')
@section('title', $page_data['about_seo_title'])
@section('meta_description', $page_data['about_seo_meta_description'])
@section('og_image', $page_data['about_banner'])
@section('twitter_image', $page_data['about_banner'])
@section('main')
    <style>
        .timeline-section {
            position: relative;
            color: #fff;
        }

        .timeline-image {
            width: 100%;
            height: auto;
            display: block;
        }
        @media (max-width: 768px) {
            .timeline-image {
                width: auto;
            }

            .timeline-overlay {
                width: 104%!important;
            }
        }

        .timeline-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .timeline-text {
            text-align: center;
            padding: 20px;
        }

        .timeline-text h1 {
            margin-bottom: 10px;
            font-size: 2.5rem;
        }

        .timeline-text p {
            margin-bottom: 0;
        }

        .timeline-details {
            background: #f8f9fa;
            padding: 20px;
        }

        .timeline-year {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 10px;
        }
        
    </style>




    <section style="margin-top: 110px;">
        <div class="container">

            <div class="timeline-section mb-4">
                <img src="https://plugolive.s3.ap-southeast-1.amazonaws.com/vendors/4246/assets/image/purpose-bg.jpg"
                    alt="Timeline Image" class="timeline-image">
                <div class="timeline-overlay">
                    <div class="timeline-text">
                        <h1>Our Purpose</h1>
                        <p class="text-light w-75 m-auto">President is a lifestyle brand.
                            We create an experience of unmatched confidence and freedom for travelers.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

@endsection
