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
<div class="col-lg-3 col-6 single_item">
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
</div>
<?php $__env->startPush('script'); ?>
    <script>
        let currentPage = 1; // Start with the first page
        const productsPerPage = 12; // Number of products per page

        $(document).on('click', '#loadMore', function() {
            currentPage++; // Increment the page number
            $.ajax({
                url: '<?php echo e(route('load.more.products')); ?>', // Adjust the route to match your web.php
                method: 'GET',
                data: {
                    page: currentPage,
                    per_page: productsPerPage
                },
                success: function(response) {
                    // Convert the HTML string into jQuery elements
                    const newProducts = $(response.html);

                    // Hide the new products initially
                    newProducts.hide();

                    // Append them to the container
                    $('#products').append(newProducts);

                    // Fade in the new products smoothly
                    newProducts.fadeIn(600);

                    // Remove the "Show More" button if there are no more products to load
                    if (response.remaining <= 0) {
                        $('#loadMore').remove();
                    }
                },
                error: function(xhr) {
                    console.error(xhr.responseText); // Log any error messages for debugging
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH E:\EIT2024\BagsLaravelWebsites\PresidentWebsite - size variant\resources\views/frontend/home/partials/load_product.blade.php ENDPATH**/ ?>