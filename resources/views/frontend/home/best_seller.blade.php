<div class="best_sellers">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section_title new_arrivals_title">
                    <h2>Best Sellers</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="product_slider_container">
                    <div class="owl-carousel owl-theme product_slider">

                        @foreach ($global_products as $product)
                            <div class="owl-item product_slider_item">
                                <a href="{{ route('product.details', $product->product_slug) }}">
                                    <div class="product-item">
                                        <div class="product discount">
                                            <div class="product_image" style="position: relative">
                                                <img src="{{ $product->product_thumbnail }}" alt="">
                                                <div class="red_button add_to_cart_button"
                                                    style="position: absolute;bottom:0"><a href="#">add to
                                                        cart</a>
                                                </div>
                                            </div>
                                            <div class="favorite favorite_left"></div>

                                            @if ($product->discount_price)
                                                @php
                                                    $discount_percentage =
                                                        $product->discount_price - $product->selling_price;
                                                @endphp
                                                <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center px-2"
                                                    style="width: auto;">
                                                    <span>{{ $discount_percentage }} BDT</span>
                                                </div>
                                            @endif

                                            <div class="product_info">
                                                <h6 class="product_name"><a
                                                        href="#">{{ $product->product_name }}</a>
                                                </h6>
                                                @if ($product->discount_price)
                                                    <div class="product_price">
                                                        {{ $product->discount_price }}
                                                        BDT<span>{{ $product->selling_price }} BDT</span>
                                                    </div>
                                                @else
                                                    <div class="product_price">
                                                        {{ $product->selling_price }} BDT
                                                    </div>
                                                @endif

                                            </div>
                                        </div>

                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>

                    <!-- Slider Navigation -->

                    <div
                        class="product_slider_nav_left product_slider_nav d-flex align-items-center justify-content-center flex-column">
                        <i class="fa fa-chevron-left" aria-hidden="true"></i>
                    </div>
                    <div
                        class="product_slider_nav_right product_slider_nav d-flex align-items-center justify-content-center flex-column">
                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
