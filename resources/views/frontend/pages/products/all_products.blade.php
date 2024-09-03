@extends('frontend.master_dashboard')

@section('main')
    {{-- Flow Cart --}}
    @include('frontend.home.flow_cart')



    <!-- ***** Products Area Starts ***** -->
    <section class="section" id="products">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Our Latest Products</h2>
                        <span class="d-none">Check out all of our products.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <div class="filter-container-btn  text-center" id="filter-container-btn">
                        <i class="fa fa-filter" aria-hidden="true"></i>
                        <span>Filter</span>
                    </div>
                    <div class="filter-container" id="filter-container">

                        <div class="border_b">
                            <div class="wrap">
                                <div class="search">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                    <input type="text" placeholder="Search" onclick="openNav()">
                                </div>
                            </div>
                            <ul class="menu">

                                <li class="mb-2" style="background:{{ request()->is('products') ? '#CCCCCC' : '' }}">
                                    <a class="d-block" href="{{ route('products') }}" style="font-size: 14px;">All
                                        Products</a>
                                </li>

                                <li class="mb-2" style="background:{{ request()->is('discount') ? '#CCCCCC' : '' }}">
                                    <a class="d-block" href="{{ route('discount-products') }}"
                                        style="font-size: 14px;">Discount</a>
                                </li>
                                <li class="mb-2" style="background:{{ request()->is('new-arrivals') ? '#CCCCCC' : '' }}">
                                    <a class="d-block" href="{{ route('new-arrival-products') }}"
                                        style="font-size: 14px;">NEW ARRIVALS</a>
                                </li>
                            </ul>
                        </div>
                        <div class="filter-section border_b">
                            <div class="head">
                                <h5>Categories</h5>
                                <a class="toggle-icons" data-toggle="collapse" href="#multiCollapseExample1" role="button"
                                    aria-expanded="false" aria-controls="multiCollapseExample1">
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                    <i class="fa fa-angle-up active" aria-hidden="true"></i>
                                </a>
                            </div>
                            <ul class="scrollable collapse multi-collapse show" id="multiCollapseExample1">
                                @foreach ($global_product_categories as $category)
                                    <li
                                        style="background:{{ request()->is('category/' . $category->slug) ? '#CCCCCC' : '' }}">
                                        <a class="d-block" href="{{ route('category.products', $category->slug) }}"
                                            style="font-size: 14px;">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <h5><a href="">See More</a></h5>
                        </div>
                        <div class="filter-section">
                            <div class="head">
                                <h5>Price</h5>
                                <a class="toggle-icons-price" data-toggle="collapse" href="#multiCollapseExample2"
                                    role="button" aria-expanded="false" aria-controls="multiCollapseExample2">
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                    <i class="fa fa-angle-up active" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="price-filter collapse multi-collapse show" id="multiCollapseExample2">
                                <div class="slider">
                                    <div class="progress"></div>
                                </div>
                                <div class="range_input">
                                    <input type="range" min="0" max="2000" value="0" class="price-min">
                                    <input type="range" min="0" max="2000" value="2000" class="price-max">
                                </div>
                                <div class="price-inputs">
                                    <div class="wrap">
                                        <p style="font-size: 15px;">BDT</p>
                                        <div>
                                            <span style="font-size: 14px;"> Minimum Price</span>
                                            <input type="text" class="min-price" placeholder="Minimum Price"
                                                value="0">
                                        </div>
                                    </div>
                                    <div class="wrap">
                                        <p style="font-size: 15px;">BDT</p>
                                        <div>
                                            <span style="font-size: 14px;">Maximum Price</span>
                                            <input type="text" class="max-price" placeholder="Maximum Price"
                                                value="2000">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <h5 class="mb-2">Color</h5>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                id="inlineRadio1" value="option1">
                                        </div>
                                    </div>
                                    <button class="apply-btn">Apply</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="row product_area">
                        @foreach ($products as $product)
                           
                            <div class="col-lg-4 col-md-6 col-6 single_item">
                               @include('frontend.pages.products.partials.product_item')
                            </div>
                        @endforeach


                        <div class="col-lg-12">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Products Area Ends ***** -->
@endsection
