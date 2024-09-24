<?php if(session('cart')): ?>
    <?php
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
    ?>

    <a href="<?php echo e(route('cart.index')); ?>">
        <div class="flow_cart">
            <div class="wrap">
                <div>
                    <h2><span><?php echo e($totalQuantity); ?></span> Items in My Cart</h2>
                    <p><?php echo e($totalPrice); ?> BDT</p>
                </div>
                <div class="cart_item">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <span>
                        <?php echo e($totalQuantity); ?>

                    </span>
                </div>
            </div>
        </div>
    </a>
<?php endif; ?>
<?php /**PATH F:\XAMPP\htdocs\PresidentWebsite - size variant\resources\views/frontend/home/flow_cart.blade.php ENDPATH**/ ?>