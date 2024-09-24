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
        <?php $__currentLoopData = $global_products->sortByDesc('created_at')->take(12); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                <button id="loadMore" class="btn btn-dark">Show More</button>
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
<?php $__env->stopPush(); ?>
<?php /**PATH F:\XAMPP\htdocs\PresidentWebsite - size variant\resources\views/frontend/home/product_section.blade.php ENDPATH**/ ?>