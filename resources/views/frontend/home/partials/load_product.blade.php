@php
    $minPrice = null;
    $maxPrice = null;
    $inStock = false;

    foreach ($product->product_variants as $variant) {
        foreach ($variant->variantSizes as $size) {
            $price = $size->discount_price > 0 ? $size->discount_price : $size->selling_price;

            if (is_null($minPrice) || $price < $minPrice) {
                $minPrice = $price;
            }

            if (is_null($maxPrice) || $price > $maxPrice) {
                $maxPrice = $price;
            }

            if ($size->quantity > 0) {
                $inStock = true; // Product is in stock
            }
        }
    }
@endphp
<div class="col-lg-3 col-6 single_item">
    <div class="item">
        <a href="{{ route('product.details', $product->product_slug) }}">
            <div class="thumb">
                <img src="{{ asset(@$product->multi_photos[0]->photo_name) }}" alt="Product Photo" width="100%"
                    loading="lazy">
                <div class="stock">

                    @if ($inStock)
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
                    <h4 class="text-capitalize">{{ $product->product_name }}</h4>
                </div>
                <div class="price">

                    <span class="product_price">{{ $minPrice }} To {{ $maxPrice }}
                        BDT</span>


                </div>
            </div>
        </a>
    </div>
</div>
