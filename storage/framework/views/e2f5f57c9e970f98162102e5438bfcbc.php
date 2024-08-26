<!-- **** New Collection Starts **** -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-heading">
                    <h2>New Collection</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row m-0 product_area">
        <?php $__currentLoopData = $global_products->take(12); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($product->discount_price): ?>
                <?php
                    $discountPercentage =
                        (($product->selling_price - $product->discount_price) / $product->selling_price) * 100;
                    $roundPercentage = round($discountPercentage);
                ?>
            <?php endif; ?>
            <div class="col-lg-2 col-6 single_item">
                <div class="item">
                    <a href="<?php echo e(route('product.details', $product->product_slug)); ?>">
                        <div class="thumb">
                            <img src="<?php echo e(asset(@$product->multi_photos[0]->photo_name)); ?>" alt="Product Photo"
                                width="100%" loading="lazy">
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
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>
<!-- **** New Collection Ends **** -->

<!-- SLIDER -->
<section class="banner">
    <div class="banner_slider">
        <div class="single_slider">
            <img src="<?php echo e(asset($global_home_page_item->story_banner_img)); ?>" alt="" width="100%"
                loading="lazy">
        </div>
    </div>
    <div class="banner_content">
        
        <h4><?php echo e($global_home_page_item->story_title); ?></h4>
        <a href="#"><?php echo e($global_home_page_item->story_subtitle); ?></a>
    </div>
</section>
<!-- SLIDER -->

<!-- **** Our Collection Starts **** -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-heading">
                    <h2>Our Collections</h2>
                </div>
            </div>
        </div>
    </div>


    <div class="row m-0 product_area" id="products">
        <?php $__currentLoopData = $global_products->take(12); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('frontend.home.partials.product', ['product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <?php if($global_products->count() > 12): ?>
        <div class="row">
            <div class="col-12 text-center mt-3">
                <button id="loadMore" class="btn btn-primary">Show More</button>
            </div>
        </div>
    <?php endif; ?>





</section>
<!-- **** Our Collection Ends **** -->

<?php $__env->startPush('script'); ?>
    <script>
        $('.banner_slider').slick({
            dots: false,
            infinite: true,
            speed: 1000,
            fade: true,
            autoplay: true,
            cssEase: 'linear',
            pauseOnHover: false,
        });
    </script>

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
<?php /**PATH E:\EIT2024\BagsLaravelWebsites\PresidentWebsite - size variant\resources\views/frontend/home/product_section.blade.php ENDPATH**/ ?>