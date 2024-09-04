@extends('frontend.master_dashboard')

@section('main')
    {{-- Flow Cart --}}
    @include('frontend.home.flow_cart')



    <!-- ***** Products Area Starts ***** -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Discount Products</h2>
                        <span class="d-none">Check out all of our products.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    @include('frontend.pages.products.partials.product_sidebar')
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="row m-0 product_area" id="products">
                        @foreach ($global_products->take(12) as $product)
                            @include('frontend.home.partials.load_product', ['product' => $product])
                        @endforeach
                    </div>

                    @if ($global_products->count() > 12)
                        <div class="row m-0">
                            <div class="col-12 text-center mt-3">
                                <button id="loadMore" class="btn btn-dark">Show More</button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Products Area Ends ***** -->
@endsection
