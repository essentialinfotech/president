<div class="col-lg-3 col-6 single_item">
    <div class="item">
        <a href="{{ route('product.details', $product->product_slug) }}">
            <div class="thumb">
                <img src="{{ asset(@$product->multi_photos[0]->photo_name) }}" alt="Product Photo" width="100%"
                    loading="lazy">
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
