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

        /* side scroll */

        .single_product_thumbnails {
            overflow-y: auto;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        @media (max-width: 768px) {
            .single_product_thumbnails ul li img {
                width: 60px;
            }
        }
    </style>

    <!-- ***** Product Area Starts ***** -->
    <section class="section" id="product">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="single_product_pics">
                        <div class="row">
                            <div class="col-lg-2 thumbnails_col order-lg-1 order-2">
                                {{-- <div class="single_product_thumbnails" style="overflow-y: scroll;">
                                    <ul>
                                        @foreach ($product->multi_photos as $key => $multi_photo)
                                            <li class="mb-2 h-100 {{ $key == 0 ? 'active' : '' }}"><img
                                                    src="{{ asset($multi_photo->photo_name) }}" alt=""
                                                    data-image="{{ asset($multi_photo->photo_name) }}"></li>
                                        @endforeach
                                    </ul>
                                </div> --}}
                                <div class="single_product_thumbnails">
                                    <ul>
                                        @foreach ($product->multi_photos as $key => $multi_photo)
                                            <li class="mb-2 h-100 {{ $key == 0 ? 'active' : '' }}">
                                                <img src="{{ asset($multi_photo->photo_name) }}" alt=""
                                                    data-image="{{ asset($multi_photo->photo_name) }}">
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>
                            <div class="col-lg-10 image_col order-lg-2 order-1">
                                <img class="single_product_image productImage"
                                    src="{{ asset($product->multi_photos[0]->photo_name) }}" alt="Main Product Image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="product_details">

                        @if ($inStock)
                            <div class="bg-dark text-light px-2 d-table">
                                In Stock
                            </div>
                        @else
                            <div class="bg-dark text-danger px-2 d-table">
                                Out of Stock
                            </div>
                        @endif

                        <div class="product_details_title mt-2">
                            <h2 class="text-capitalize">
                                {{ $product->product_name }}</h2>
                        </div>


                        <div class="product_price">{{ $minPrice }} BDT To {{ $maxPrice }} BDT</div>

                        <div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
                            <button class="main-border-button" id="openPopup"><a>Add to cart</a></button>

                            <div id="popup" class="popup">
                                <div class="popup-content">
                                    <span class="close" id="close">&times;</span>
                                    <h2>Add to Cart</h2>
                                    <div class="product-info">
                                        <img class="productImage" src="{{ asset($product->multi_photos[0]->photo_name) }}"
                                            alt="Product Image">
                                        <div class="product-details">
                                            <p class="text-capitalize" style="white-space: normal;">
                                                {{ $product->product_name }}</p>
                                            <div class="price">
                                                <p class="discount">
                                                    {{-- if has discount_price then parcentage --}}
                                                    <span class="discount-percent"></span>
                                                    {{-- Selling_price --}}
                                                    <span class="original-price"></span>
                                                </p>
                                                {{-- discount_price --}}
                                                <p class="discount-price"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-colors">
                                        <p>Color: <span class="color_name"></span></p>
                                        <div class="btn_wrap">
                                            @foreach ($product->product_variants as $variant)
                                                <button class="color-btn" data-color="{{ $variant->color }}"
                                                    data-image="{{ asset($variant->photo) }}"
                                                    data-variant-id="{{ $variant->id }}"
                                                    data-photo-url="{{ $variant->photo }}"
                                                    data-sizes="{{ json_encode($variant->variantSizes) }}">
                                                    {{ $variant->color }}
                                                </button>
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="product-sizes">
                                        <p>Size: <span class="size_name"></span></p>
                                        <div class="btn_wrap">
                                            {{-- size buttons show here if click color-btn --}}

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
                                        {{-- <input type="hidden" name="variant_color" class="variant_color" value="">
                                        <input type="hidden" name="variant_qty" class="variant_qty" value="">
                                        <input type="hidden" name="variant_id" class="variant_id" value="">
                                        <input type="hidden" name="variant_photo" class="variant_photo" value=""> --}}

                                        <input type="hidden" name="variant_color" id="variant_color_input">
                                        <input type="hidden" name="variant_id" id="variant_id_input">
                                        <input type="hidden" name="variant_photo" id="variant_photo_input">
                                        <input type="hidden" name="variant_size" id="variant_size_input">
                                        <input type="hidden" name="variant_qty" class="variant_qty" id="variant_qty" value="">

                                        <button type="submit" class="add-to-cart-btn disabled">Add to Cart</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p>{!! $product->long_description !!}</p>
                        </div>
                        {{-- <div class="free_delivery d-flex flex-row align-items-center justify-content-center">
                            <span class="ti-truck"></span><span>Message</span>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Product Area Ends ***** -->
@endsection

@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const colorButtons = document.querySelectorAll('.color-btn');
            const sizeContainer = document.querySelector('.product-sizes .btn_wrap');
            const colorNameSpan = document.querySelector('.product-colors .color_name');
            const sizeNameSpan = document.querySelector('.product-sizes .size_name');
            const variantColorInput = document.querySelector('input[name="variant_color"]');
            const variantIdInput = document.querySelector('input[name="variant_id"]');
            const variantPhotoInput = document.querySelector('input[name="variant_photo"]');
            const productImage = document.querySelector('.product-info .productImage');


            function showSizes(variant) {
                sizeContainer.innerHTML = ''; // Clear previous sizes

                if (variant && Array.isArray(variant.sizes)) {
                    variant.sizes.forEach((size, index) => {
                        const sizeButton = document.createElement('button');
                        sizeButton.classList.add('size-btn');
                        sizeButton.textContent = size.size;
                        sizeButton.dataset.sizeId = size.id; // Assuming each size has an id
                        sizeButton.dataset.sellingPrice = size.selling_price;
                        sizeButton.dataset.discountPrice = size.discount_price;


                        sizeContainer.appendChild(sizeButton);

                        // Select the first size by default
                        if (index === 0) {
                            sizeButton.classList.add('active');
                            sizeNameSpan.textContent = size.size; // Set default size name
                            updatePrice(size.selling_price, size.discount_price);
                        }
                    });
                } else {
                    console.error("Sizes are not defined or not an array:", variant.sizes);
                }
            }


            function selectColor(button) {
                const color = button.dataset.color;
                const imageUrl = button.dataset.image;
                const variantId = button.dataset.variantId;
                const variantPhotoUrl = button.dataset.photoUrl;

                document.getElementById('variant_color_input').value = color;
                document.getElementById('variant_id_input').value = variantId;
                document.getElementById('variant_photo_input').value = variantPhotoUrl;

                colorNameSpan.textContent = color;
                productImage.src = imageUrl;
                variantColorInput.value = color;
                variantIdInput.value = variantId;
                variantPhotoInput.value = variantPhotoUrl;
                document.getElementById('variant_qty').value = 1;
                // Show sizes for the selected color
                const selectedVariant = {
                    sizes: JSON.parse(button.dataset.sizes ||
                        '[]') // Default to an empty array if sizes are not defined
                };
                showSizes(selectedVariant);

                // Select the first size by default if available
                const firstSizeButton = sizeContainer.querySelector('.size-btn');
                if (firstSizeButton) {
                    firstSizeButton.click();
                }
            }

            // Add event listeners to color buttons
            colorButtons.forEach(button => {
                button.addEventListener('click', function() {
                    selectColor(button);
                });
            });

            // Select the first color by default
            if (colorButtons.length > 0) {
                colorButtons[0].click();
            }
        });


        /////////////////

        // Function to update the price
        function updatePrice(sellingPrice, discountPrice) {
            const discountPercentElement = document.querySelector('.discount-percent');
            const originalPriceElement = document.querySelector('.original-price');
            const discountPriceElement = document.querySelector('.discount-price');

            if (discountPrice > 0) {
                // Calculate discount percentage
                const discountPercent = Math.round(((sellingPrice - discountPrice) / sellingPrice) * 100);

                // Update the DOM with the values
                discountPercentElement.style.display = 'inline';
                originalPriceElement.style.display = 'inline';
                discountPriceElement.style.display = 'inline';

                originalPriceElement.style.textDecoration = 'line-through';

                discountPercentElement.textContent = `${discountPercent}%`;
                originalPriceElement.textContent = `${sellingPrice} BDT`;
                discountPriceElement.textContent = `${discountPrice} BDT`;
            } else {

                discountPriceElement.style.display = 'none';
                // discountPercentElement.style.display = 'none';
                // If there's no discount
                discountPercentElement.style.display = 'none'; // Hide discount percent
                originalPriceElement.style.display = 'inline'; // Hide original price
                originalPriceElement.style.textDecoration = 'auto'; // Hide original price
                originalPriceElement.textContent = `${sellingPrice} BDT`;

            }
        }

        // Set the first color and size on page load
        const firstColorBtn = document.querySelector('.color-btn');
        if (firstColorBtn) {
            firstColorBtn.click(); // Trigger click to select first color
        }


        document.querySelector('.product-sizes .btn_wrap').addEventListener('click', function(event) {
            if (event.target.classList.contains('size-btn')) {
                document.getElementById('quantity_value').value = 1;                
                document.getElementById('variant_qty').value = 1;
                // Remove 'active' class from all size buttons
                document.querySelectorAll('.size-btn').forEach(btn => btn.classList.remove(
                    'active'));

                // Add 'active' class to the clicked size button
                event.target.classList.add('active');

                // Update the size name
                const selectedSizeName = event.target.textContent;
                document.querySelector('.size_name').textContent = selectedSizeName;

                // Get the selected size data
                const sellingPrice = event.target.dataset.sellingPrice;
                const discountPrice = event.target.dataset.discountPrice;

                const selectedSizeId = event.target.dataset.sizeId;
                document.getElementById('variant_size_input').value = selectedSizeId;

                // Update the price
                updatePrice(sellingPrice, discountPrice);
            }
        });

        // Function to show sizes based on selected color
        function showSizes(variantBtn) {
            const sizes = JSON.parse(variantBtn.dataset.sizes);
            const sizeContainer = document.querySelector('.product-sizes .btn_wrap');
            sizeContainer.innerHTML = '';

            sizes.forEach((size, index) => {
                const sizeBtn = document.createElement('button');
                sizeBtn.classList.add('size-btn');
                sizeBtn.dataset.sellingPrice = size.selling_price;
                sizeBtn.dataset.discountPrice = size.discount_price;
                sizeBtn.dataset.sizeId = size.id;
                sizeBtn.dataset.sizeQuantity = size.quantity;
                sizeBtn.textContent = size.size;

                if (index === 0) {
                    sizeBtn.classList.add('active');
                    updatePrice(size.selling_price, size.discount_price);
                }

                sizeContainer.appendChild(sizeBtn);
            });
        }

        // Event delegation for color buttons
        document.querySelector('.product-colors .btn_wrap').addEventListener('click', function(event) {
            if (event.target.classList.contains('color-btn')) {
                // Remove 'active' class from all color buttons
                document.querySelectorAll('.color-btn').forEach(btn => btn.classList.remove(
                    'active'));

                // Add 'active' class to the clicked color button
                event.target.classList.add('active');

                // Show the sizes for the selected color
                showSizes(event.target);
            }
        });
    </script>
@endpush
