<?php
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
?>


<div class="item">
    <a href="<?php echo e(route('product.details', $product->product_slug)); ?>">
        <div class="thumb">
            <img src="<?php echo e(asset(@$product->multi_photos[0]->photo_name)); ?>" alt="Product Photo" width="100%"
                loading="lazy">
            <div class="stock">

                <?php if($inStock): ?>
                    <div class="m-1 rounded stock_in px-1">
                        In Stock
                    </div>
                <?php else: ?>
                    <div class="m-1 rounded stock_out px-1">
                        Out of Stock
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="down-content">
            <div class="wrap">
                <h4 class="text-capitalize"><?php echo e($product->product_name); ?></h4>
            </div>
            <div class="price">

                <span class="product_price"><?php echo e($minPrice); ?> To <?php echo e($maxPrice); ?>

                    BDT</span>


            </div>
        </div>
    </a>
</div>
<?php /**PATH E:\EIT2024\BagsLaravelWebsites\PresidentWebsite - size variant\resources\views/frontend/pages/products/partials/product_item.blade.php ENDPATH**/ ?>