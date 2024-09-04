<!-- **** New Collection Starts **** -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-heading">
                    <h2>New Collection</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row m-0 product_area">
        @foreach ($global_products->sortByDesc('created_at')->take(12) as $product)
            <div class="col-lg-2 col-6 single_item">
                @include('frontend.pages.products.partials.product_item', ['product' => $product])
            </div>
        @endforeach
    </div>
</section>
<!-- **** New Collection Ends **** -->

<!-- SLIDER -->
<section class="banner">
    <div class="banner_slider">
        <div class="single_slider">
            <img src="{{ asset($global_home_page_item->story_banner_img) }}" alt="" width="100%"
                loading="lazy">
        </div>
    </div>
    <div class="banner_content">
        {{-- <h2>Our Story</h2> --}}
        <h4>{{ $global_home_page_item->story_title }}</h4>
        <a href="#">{{ $global_home_page_item->story_subtitle }}</a>
    </div>
</section>
<!-- SLIDER -->

<!-- **** Our Collection Starts **** -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-heading">
                    <h2>Our Collections</h2>
                </div>
            </div>
        </div>
    </div>


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
</section>
<!-- **** Our Collection Ends **** -->

@push('script')
    <script>
        $('.banner_slider').slick({
            dots: false,
            infinite: true,
            speed: 1000,
            fade: true,
            autoplay: true,
            cssEase: 'linear',
            pauseOnHover: false,
        });
    </script>
@endpush
