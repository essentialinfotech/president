<style>
    .image-container {
        position: relative;
    }

    .dark-image {
        display: block;
        width: 100%;
        height: auto;
    }

    .image-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        /* Adjust the alpha value (0.5) to control the darkness */
        pointer-events: none;
        /* Ensures the overlay doesn't interfere with clicking on the image */
    }
</style>
<div class="main-banner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="left-content">
                    <div class="thumb">
                        <div class="image-container">
                            <img src="<?php echo e(asset($global_home_page_item->hero_banner_img)); ?>" alt="banner"
                                class="dark-image">
                            <div class="image-overlay"></div>
                        </div>
                        <div class="inner-content">
                            <h4><?php echo e($global_home_page_item->hero_description); ?></h4>
                            <span><?php echo e($global_home_page_item->hero_title); ?></span>
                            <div class="main-border-button">
                                <a
                                    href="<?php echo e($global_home_page_item->hero_btn_url); ?>"><?php echo e($global_home_page_item->hero_btn_text); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="right-content">
                    <div class="row">
                        <?php $__currentLoopData = $global_product_categories->where('is_banner', 'Yes')->sortBy('order')->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="image-container">
                                            <img src="<?php echo e($category->photo); ?>" alt="<?php echo e($category->name); ?>"
                                                class="dark-image">
                                            <div class="image-overlay"></div>
                                        </div>
                                        <div class="inner-content">
                                            <h4><?php echo e($category->name); ?></h4>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4><?php echo e($category->name); ?></h4>
                                                
                                                <div class="main-border-button">
                                                    <a href="<?php echo e(route('category.products', $category->slug)); ?>">Discover
                                                        More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH F:\XAMPP\htdocs\PresidentWebsite - size variant\resources\views/frontend/home/hero_section.blade.php ENDPATH**/ ?>