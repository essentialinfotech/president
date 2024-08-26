@if (session('cart'))
    @php
        $totalQuantity = 0;
        $totalPrice = 0;
        foreach (session()->get('cart', []) as $details) {
            $totalQuantity += $details['variant']['quantity'];

            if ($details['discount_price']) {
                $totalPrice += $details['discount_price'] * @$details['variant']['quantity'];
            }
            $totalPrice += $details['selling_price'] * @$details['variant']['quantity'];
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
