<div class="col-lg-3 col-6 single_item">
    <div class="item">
        <a href="<?php echo e(route('product.details', $product->product_slug)); ?>">
            <div class="thumb">
                <img src="<?php echo e(asset(@$product->multi_photos[0]->photo_name)); ?>" alt="Product Photo" width="100%"
                    loading="lazy">
                <div class="stock">
                    <?php
                        $product_variant_qty = $product->product_variants->sum('quantity');
                    ?>
                    <?php if($product_variant_qty > 0): ?>
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
                    <h4><?php echo e($product->product_name); ?></h4>
                </div>
                <div class="price">
                    <?php if($product->discount_price): ?>
                        <span class="product_price"><?php echo e($product->discount_price); ?> BDT</span>
                        <span class="discount"><?php echo e($product->selling_price); ?> BDT</span>
                    <?php else: ?>
                        <span class="product_price"><?php echo e($product->selling_price); ?> BDT</span>
                    <?php endif; ?>
                </div>
            </div>
        </a>
    </div>
</div>
<?php /**PATH E:\EIT2024\BagsLaravelWebsites\PresidentWebsite - size variant\resources\views/frontend/home/partials/product.blade.php ENDPATH**/ ?>