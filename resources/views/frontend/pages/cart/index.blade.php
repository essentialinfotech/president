@extends('frontend.master_dashboard')

@section('main')
    <style>
        .alert {
            width: fit-content;
            position: absolute;
            top: 60px;
            right: 0;
            transition: 3s;
            z-index: 999;
        }
    </style>
    <section style="margin-top: 100px;">
        <div class="cart_page">
            <div class="back_bar">
                <a href="{{ route('home') }}">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                    <p>Home Page</p>
                </a>
            </div>
            <div class="container my-5">
                <div class="">
                    @if (session('success'))
                        <div class="alert alert-success" id="success-alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('cart'))
                        @php
                            $totalQuantity = 0;
                            $totalSellingPrice = 0;
                            $totalDiscount = 0;

                            foreach (session()->get('cart', []) as $details) {
                                $quantity = $details['variant']['variant_size']['qty'];
                                $sellingPrice = $details['variant']['variant_size']['selling_price'];
                                $discountPrice = $details['variant']['variant_size']['discount_price'] ?? null;

                                // Calculate total selling price (without discount)
                                $totalSellingPrice += $sellingPrice * $quantity;

                                // Calculate discount only if there is a discount price
                                if ($discountPrice !== null) {
                                    $totalDiscount += ($sellingPrice - $discountPrice) * $quantity;
                                }

                                $totalQuantity += $quantity;
                            }

                            // Final product price after applying the discount
                            $totalProductPrice = $totalSellingPrice - $totalDiscount;
                        @endphp

                        <div class="row">
                            <div class="col-lg-8">
                                <div class="cart_head">
                                    <h4>My Cart ({{ $totalQuantity }})</h4>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div class="wrap">
                                            <input type="checkbox" id="selectAll">
                                            <label for="selectAll">Select All</label>
                                            <form action="{{ route('cart.clear') }}" method="post" id="deleteAllForm"
                                                class="d-inline">
                                                @csrf
                                                <a href="#" class="text-danger ms-3" id="deleteAllLink"
                                                    style="display: none">Delete all</a>
                                            </form>
                                            <form action="{{ route('cart.remove.selected') }}" method="post"
                                                id="deleteSelectedForm" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="selected_items" id="selectedItems">
                                                <a href="#" class="text-danger ms-3" id="deleteSelectedLink"
                                                    style="display: none">Remove selected items</a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="row product-card">
                                    @foreach (session('cart', []) as $id => $details)
                                        <div class="col-md-12 border-bottom">
                                            <div class="d-flex justify-content-between wrap">
                                                <div class="wrap_info d-flex">
                                                    <input class="form-check-input me-3 item-checkbox" type="checkbox"
                                                        value="{{ $id }}">
                                                    <img src="{{ @$details['variant']['photo'] }}" alt="Product Image">
                                                    <div class="product-info flex-column">
                                                        <h5>{{ $details['name'] }} </h5>
                                                        <p>Size: {{ $details['variant']['variant_size']['size'] }}</p>
                                                        @if ($details['variant']['variant_size']['discount_price'])
                                                            <p class="price text-muted d-block">
                                                                <del>{{ @$details['variant']['variant_size']['selling_price'] }}
                                                                    BDT</del>
                                                            </p>
                                                            <h5 class="price d-block">
                                                                {{ $details['variant']['variant_size']['discount_price'] }}
                                                                BDT</h5>
                                                        @else
                                                            <h5 class="price d-block">
                                                                {{ @$details['variant']['variant_size']['selling_price'] }}
                                                                BDT
                                                            </h5>
                                                        @endif
                                                    </div>
                                                </div>
                                                @php
                                                    $stock = App\Models\ProductVariantSize::where(
                                                        'product_variant_id',
                                                        $details['variant']['id'],
                                                    )
                                                        ->where('size', $details['variant']['variant_size']['size'])
                                                        ->first()->quantity;
                                                @endphp
                                                <div class="ms-auto d-flex align-items-center">
                                                    <form action="{{ route('cart.update', $id) }}" method="post"
                                                        class="data-stock stock d-flex align-items-center mx-2"
                                                        data-stock="{{ $stock }}">
                                                        @csrf
                                                        <a class="btn btn-outline-secondary btn-sm minus">-</a>
                                                        <input
                                                            class="form-control form-control-sm mx-2 text-center quantity_value"
                                                            type="text" name="quantity"
                                                            value="{{ @$details['variant']['variant_size']['qty'] }}"
                                                            style="width: 60px;" id="quantity_value" />
                                                        <a class="btn btn-outline-secondary btn-sm plus">+</a>

                                                        <button class="btn btn-sm btn-success m-0 ml-2">Update</button>
                                                    </form>

                                                    <form action="{{ route('cart.remove', $id) }}" method="post">
                                                        @csrf
                                                        <button type="submit"
                                                            class="btn trash btn-outline-danger btn-sm m-0"><i
                                                                class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                            @if ($stock < 5)
                                                <p class="mt-2 text-danger">Only {{ $stock }} stocks left. </p>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-lg-4" style="margin-top: 65px;">
                                <div class="checkout-summary">
                                    <h5>Checkout Summary</h5>
                                    <div class="summary-row mb-0">
                                        <span>Original Product Price</span>
                                        <span>{{ number_format($totalSellingPrice, 2) }} BDT</span>
                                    </div>
                                    <div class="summary-row">
                                        <span class="text-muted" style="font-size: 12px;">({{ $totalQuantity }}
                                            Items)</span>
                                    </div>
                                    @if ($totalDiscount > 0)
                                        <div class="summary-row">
                                            <span>Product Discount</span>
                                            <span>- {{ number_format($totalDiscount, 2) }} BDT</span>
                                        </div>
                                    @endif
                                    <div class="summary-row">
                                        <span>Total Product Price</span>
                                        <span>{{ number_format($totalProductPrice, 2) }} BDT</span>
                                    </div>
                                    <a href="{{ route('checkout.index') }}" class="btn btn-dark w-100 mt-3">Checkout Now</a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="text-center pt-5 border-bottom">
                            <img style="width: 150px" src="{{ asset('empty_cart.jpg') }}" alt="empty_cart">
                            <h4>Your cart is empty!</h4>
                            <p>Let’s take a look at some products you might love.</p>
                            <a href="{{ route('products') }}" class="btn btn-sm btn-dark my-4">Continue Shopping</a>
                        </div>
                    @endif

                    <div class="recom">
                        <div class="slick_wrap">
                            <h4 class="">You might also like</h4>
                            {{-- <div class="slider_btn">
                                <i class="fa fa-angle-left left_btn" aria-hidden="true"></i>|<i
                                    class="fa fa-angle-right right_btn" aria-hidden="true"></i>
                            </div> --}}
                        </div>

                        <div class="row product_area {{ count($global_products) > 6 ? 'recommendations' : '' }}">
                            @foreach ($global_products->take(12) as $product)
                                <div class="col-lg-2 col-md-6 col-6 single_item">
                                    @include('frontend.pages.products.partials.product_item', [
                                        'product' => $product,
                                    ])
                                </div>
                                <!-- Repeat for other recommendation products -->
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const quantityButtons = document.querySelectorAll('.quantity_btn');
            quantityButtons.forEach(button => {
                button.addEventListener('click', function() {
                    document.querySelector('.quantity_value').value = document.querySelector(
                        '.quantity_value').innerText;
                });
            });

            const deleteAllLink = document.getElementById('deleteAllLink');
            const deleteSelectedLink = document.getElementById('deleteSelectedLink');
            const deleteAllForm = document.getElementById('deleteAllForm');
            const deleteSelectedForm = document.getElementById('deleteSelectedForm');
            const selectAllCheckbox = document.getElementById('selectAll');
            const itemCheckboxes = document.querySelectorAll('.item-checkbox');
            const selectedItemsInput = document.getElementById('selectedItems');

            selectAllCheckbox.addEventListener('change', function() {
                itemCheckboxes.forEach(checkbox => {
                    checkbox.checked = selectAllCheckbox.checked;
                });
                updateDeleteButtons();
            });

            itemCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', updateDeleteButtons);
            });

            deleteAllLink.addEventListener('click', function(e) {
                e.preventDefault();
                deleteAllForm.submit();
            });

            deleteSelectedLink.addEventListener('click', function(e) {
                e.preventDefault();
                const selectedItems = Array.from(itemCheckboxes)
                    .filter(checkbox => checkbox.checked)
                    .map(checkbox => checkbox.value);
                selectedItemsInput.value = JSON.stringify(selectedItems);
                deleteSelectedForm.submit();
            });

            function updateDeleteButtons() {
                const anyItemSelected = Array.from(itemCheckboxes).some(checkbox => checkbox.checked);
                const allItemsSelected = Array.from(itemCheckboxes).every(checkbox => checkbox.checked);
                deleteAllLink.style.display = allItemsSelected ? 'inline' : 'none';
                deleteSelectedLink.style.display = anyItemSelected && !allItemsSelected ? 'inline' : 'none';
            }

            updateDeleteButtons();
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var successAlert = document.getElementById('success-alert');
            if (successAlert) {
                setTimeout(function() {
                    successAlert.style.display = 'none';
                }, 10000); // 10000 milliseconds = 10 seconds
            }
        });
    </script>
@endsection
