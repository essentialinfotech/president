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
        @foreach ($global_products->take(12) as $product)
            @if ($product->discount_price)
                @php
                    $discountPercentage =
                        (($product->selling_price - $product->discount_price) / $product->selling_price) * 100;
                    $roundPercentage = round($discountPercentage);
                @endphp
            @endif
            <div class="col-lg-2 col-6 single_item">
                <div class="item">
                    <a href="{{ route('product.details', $product->product_slug) }}">
                        <div class="thumb">
                            <img src="{{ asset(@$product->multi_photos[0]->photo_name) }}" alt="Product Photo"
                                width="100%" loading="lazy">
                            <div class="stock">
                                @php
                                    $product_variant_qty = $product->product_variants->sum('quantity');
                                @endphp
                                @if ($product_variant_qty > 0)
                                    <div class="m-1 rounded stock_in px-1">
                                        In Stock
                                    </div>
                                @else
                                    <div class="m-1 rounded stock_out px-1">
                                        Out of Stock
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="down-content">
                            <div class="wrap">
                                <h4>{{ $product->product_name }}</h4>

                            </div>
                            <div class="price">
                                @if ($product->discount_price)
                                    <span class="product_price">{{ $product->discount_price }} BDT</span>
                                    <span class="discount">{{ $product->selling_price }} BDT</span>
                                @else
                                    <span class="product_price">{{ $product->selling_price }} BDT</span>
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
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
            @include('frontend.home.partials.product', ['product' => $product])
        @endforeach
    </div>

    @if ($global_products->count() > 12)
        <div class="row">
            <div class="col-12 text-center mt-3">
                <button id="loadMore" class="btn btn-primary">Show More</button>
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

    <script>
        let currentPage = 1; // Start with the first page
        const productsPerPage = 12; // Number of products per page

        $(document).on('click', '#loadMore', function() {
            currentPage++; // Increment the page number
            $.ajax({
                url: '{{ route('load.more.products') }}', // Adjust the route to match your web.php
                method: 'GET',
                data: {
                    page: currentPage,
                    per_page: productsPerPage
                },
                success: function(response) {
                    // Convert the HTML string into jQuery elements
                    const newProducts = $(response.html);

                    // Hide the new products initially
                    newProducts.hide();

                    // Append them to the container
                    $('#products').append(newProducts);

                    // Fade in the new products smoothly
                    newProducts.fadeIn(600);

                    // Remove the "Show More" button if there are no more products to load
                    if (response.remaining <= 0) {
                        $('#loadMore').remove();
                    }
                },
                error: function(xhr) {
                    console.error(xhr.responseText); // Log any error messages for debugging
                }
            });
        });
    </script>
@endpush
