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
            <div class="col-lg-2 col-6 single_item">
                <?php echo $__env->make('frontend.pages.products.partials.product_item', ['product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
            
            
                <?php echo $__env->make('frontend.home.partials.load_product', ['product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <?php if($global_products->count() > 12): ?>
        <div class="row m-0">
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