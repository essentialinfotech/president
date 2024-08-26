@extends('frontend.master_dashboard')
@section('main')
    {{-- Flow Cart --}}
    @include('frontend.home.flow_cart')
    <style>
        .color-btn {
            position: relative;
        }

        .color-out-stock {
            background-color: #d3d1d1;
            color: gray;
        }

        .color-out-stock::before {
            background: linear-gradient(to bottom right, transparent, transparent calc(50% - 1px), rgba(0, 0, 0, .5) 50%, transparent calc(50% + 1px), transparent);
            content: "";
            height: 100%;
            left: 0;
            position: absolute;
            top: 0;
            width: 100%;
            z-index: 2;
        }

        .out-of-stock-message {
            display: none;
            color: red;
        }
    </style>

    <!-- ***** Product Area Starts ***** -->
    <section class="section" id="product">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="single_product_pics">
                        <div class="row">
                            <div class="col-lg-3 thumbnails_col order-lg-1 order-2">
                                <div class="single_product_thumbnails" style="overflow-y: scroll;">
                                    <ul>
                                        @foreach ($product->multi_photos as $key => $multi_photo)
                                            <li class="mb-2 h-100 {{ $key == 0 ? 'active' : '' }}"><img
                                                    src="{{ asset($multi_photo->photo_name) }}" alt=""
                                                    data-image="{{ asset($multi_photo->photo_name) }}"></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-9 image_col order-lg-2 order-1">
                                <img class="single_product_image productImage"
                                    src="{{ asset($product->multi_photos[0]->photo_name) }}" alt="Main Product Image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="product_details">
                        @php
                            $product_variant_qty = $product->product_variants->sum('quantity');
                        @endphp
                        @if ($product_variant_qty > 0)
                            <div class="bg-dark text-light px-2 d-table">
                                In Stock
                            </div>
                        @else
                            <div class="bg-dark text-danger px-2 d-table">
                                Out of Stock
                            </div>
                        @endif

                        <div class="product_details_title mt-2">
                            <h2>
                                {{ $product->product_name }}</h2>
                        </div>

                        @if ($product->discount_price)
                            @php
                                $discountPercentage =
                                    (($product->selling_price - $product->discount_price) / $product->selling_price) *
                                    100;
                                $roundPercentage = round($discountPercentage);
                            @endphp

                            <div class="original_price mt-1">{{ $product->selling_price }} BDT</div>
                            <div class="product_price">{{ $product->discount_price }} BDT</div>
                            <p class="bg-dark text-light px-2 d-table">{{ $roundPercentage }}% Off</p>
                        @else
                            <div class="product_price">{{ $product->selling_price }} BDT</div>
                        @endif

                        <div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
                            <button class="main-border-button" id="openPopup"><a>Add to cart</a></button>

                            <div id="popup" class="popup">
                                <div class="popup-content">
                                    <span class="close">&times;</span>
                                    <h2>Add to Cart</h2>
                                    <div class="product-info">
                                        <img class="productImage" src="{{ asset($product->multi_photos[0]->photo_name) }}"
                                            alt="Product Image">
                                        <div class="product-details">
                                            <p style="    white-space: normal;">{{ $product->product_name }}</p>
                                            <div class="price">
                                                @if ($product->discount_price)
                                                    <p class="discount">
                                                        <span class="discount-percent">{{ @$roundPercentage }}%</span>
                                                        <span class="original-price">{{ $product->selling_price }}
                                                            BDT</span>
                                                    </p>
                                                    <p class="main_price">{{ $product->discount_price }} BDT</p>
                                                @else
                                                    <p class="main_price">{{ $product->selling_price }} BDT</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-colors">
                                        <p>Color: <span class="color_name"></span></p>
                                        <div class="btn_wrap">
                                            @foreach ($product->product_variants as $variant)
                                                <button
                                                    class="color-btn {{ $variant->quantity > 0 ? '' : 'color-out-stock' }} "
                                                    color-stock="{{ $variant->quantity }}"
                                                    data-color="{{ $variant->color }}"
                                                    data-image="{{ asset($variant->photo) }}"
                                                    data-variant-id="{{ $variant->id }}"
                                                    data-photo-url="{{ $variant->photo }}">{{ $variant->color }}</button>
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="quantites">
                                        <button class="quantity_btn q_minus">-</button>
                                        <input type="text" class="text-center" value="1" style="width: 40px;"
                                            id="quantity_value" disabled>
                                        <button class="quantity_btn q_plus">+</button>
                                    </div>
                                    <form action="{{ route('cart.add', $product->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="variant_color" class="variant_color" value="">
                                        <input type="hidden" name="variant_qty" class="variant_qty" value="">
                                        <input type="hidden" name="variant_id" class="variant_id" value="">
                                        <input type="hidden" name="variant_photo" class="variant_photo" value="">
                                        <button type="submit" class="add-to-cart-btn disabled">Add to Cart</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p>{!! $product->long_description !!}</p>
                        </div>
                        <div class="free_delivery d-flex flex-row align-items-center justify-content-center">
                            <span class="ti-truck"></span><span>Message</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Product Area Ends ***** -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const addToCartBtn = document.querySelector('.add-to-cart-btn');
            const outOfStockMessage = document.querySelector('.out-of-stock-message');
            const colorButtons = document.querySelectorAll('.color-btn');

            colorButtons.forEach(button => {
                button.addEventListener('click', function() {
                    if (this.classList.contains('color-out-stock')) {
                        addToCartBtn.style.display = 'none';
                        outOfStockMessage.style.display = 'block';
                    } else {
                        addToCartBtn.style.display = 'block';
                        outOfStockMessage.style.display = 'none';
                    }
                });
            });
            const quantityButtons = document.querySelectorAll('.quantity_btn');
            quantityButtons.forEach(button => {
                button.addEventListener('click', function() {
                    document.querySelector('.quantity_value').value = document.querySelector(
                        '.variant_qty').value;
                });
            });
        });
    </script>
    <script>
        // Function to handle button click
        function updateVariantPhoto(event) {
            // Get the data-image attribute from the clicked button
            var image = event.target.getAttribute('data-photo-url');
            var variant_id = event.target.getAttribute('data-variant-id');
            var color = event.target.getAttribute('data-color');
            var qty = event.target.getAttribute('color-stock');

            // Find the variant_photo input field and update its value
            document.querySelector('.variant_photo').value = image;
            document.querySelector('.variant_id').value = variant_id;
            document.querySelector('.variant_color').value = color;

            const out_ofstock = document.querySelector('.out');
            const low_ofstock = document.querySelector('.low');

            var addToCartBtn = document.querySelector('.add-to-cart-btn')
            if (qty < 4) {
                low_ofstock.style.display = 'block';
                out_ofstock.style.display = 'none';

                if (qty < 1) {
                    out_ofstock.style.display = 'block';
                    low_ofstock.style.display = 'none';

                }

            } else {
                low_ofstock.style.display = 'none';
                out_ofstock.style.display = 'none';

            }

        }

        // Add event listener to all buttons with class color-btn
        document.querySelectorAll('.color-btn').forEach(button => {
            button.addEventListener('click', updateVariantPhoto);
        });
    </script>
@endsection
