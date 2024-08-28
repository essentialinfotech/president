@if (session('cart'))
    @php
        $totalQuantity = 0;
        $totalPrice = 0;
        foreach (session()->get('cart', []) as $details) {
            $totalQuantity += $details['variant']['variant_size']['qty'];

            if ($details['variant']['variant_size']['discount_price']) {
                $totalPrice +=
                    $details['variant']['variant_size']['discount_price'] * $details['variant']['variant_size']['qty'];
            } else {
                $totalPrice +=
                    $details['variant']['variant_size']['selling_price'] * $details['variant']['variant_size']['qty'];
            }
        }
    @endphp

    <a href="{{ route('cart.index') }}">
        <div class="flow_cart">
            <div class="wrap">
                <div>
                    <h2><span>{{ $totalQuantity }}</span> Items in My Cart</h2>
                    <p>{{ $totalPrice }} BDT</p>
                </div>
                <div class="cart_item">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <span>
                        {{ $totalQuantity }}
                    </span>
                </div>
            </div>
        </div>
    </a>
@endif
