
<?php $__env->startSection('main'); ?>
    
    <?php echo $__env->make('frontend.home.flow_cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



    <!-- ***** Products Area Starts ***** -->
    <section class="section" id="products">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2><?php echo e($category->name); ?> Products</h2>
                        <span>Check out all of our products.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <div class="filter-container-btn  text-center" id="filter-container-btn">
                        <i class="fa fa-filter" aria-hidden="true"></i>
                        <span>Filter</span>
                    </div>
                    <div class="filter-container" id="filter-container">

                        <div class="border_b">
                            <div class="wrap">
                                <div class="search">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                    <input type="text" placeholder="Search" onclick="openNav()">
                                </div>
                            </div>
                            <ul class="menu">

                                <li class="mb-2" style="background:<?php echo e(request()->is('products') ? '#CCCCCC' : ''); ?>">
                                    <a class="d-block" href="<?php echo e(route('products')); ?>" style="font-size: 14px;">All
                                        Products</a>
                                </li>

                                <li class="mb-2" style="background:<?php echo e(request()->is('discount') ? '#CCCCCC' : ''); ?>">
                                    <a class="d-block" href="<?php echo e(route('discount-products')); ?>"
                                        style="font-size: 14px;">Discount</a>
                                </li>
                                <li class="mb-2" style="background:<?php echo e(request()->is('new-arrivals') ? '#CCCCCC' : ''); ?>">
                                    <a class="d-block" href="<?php echo e(route('new-arrival-products')); ?>"
                                        style="font-size: 14px;">NEW ARRIVALS</a>
                                </li>
                            </ul>
                        </div>
                        <div class="filter-section border_b">
                            <div class="head">
                                <h5>Categories</h5>
                                <a class="toggle-icons" data-toggle="collapse" href="#multiCollapseExample1" role="button"
                                    aria-expanded="false" aria-controls="multiCollapseExample1">
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                    <i class="fa fa-angle-up active" aria-hidden="true"></i>
                                </a>
                            </div>
                            <ul class="scrollable collapse multi-collapse show" id="multiCollapseExample1">
                                <?php $__currentLoopData = $global_product_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li
                                        style="background:<?php echo e(request()->is('category/' . $category->slug) ? '#CCCCCC' : ''); ?>">
                                        <a class="d-block" href="<?php echo e(route('category.products', $category->slug)); ?>"
                                            style="font-size: 14px;"><?php echo e($category->name); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <h5><a href="">See More</a></h5>
                        </div>
                        <div class="filter-section">
                            <div class="head">
                                <h5>Price</h5>
                                <a class="toggle-icons-price" data-toggle="collapse" href="#multiCollapseExample2"
                                    role="button" aria-expanded="false" aria-controls="multiCollapseExample2">
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                    <i class="fa fa-angle-up active" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="price-filter collapse multi-collapse show" id="multiCollapseExample2">
                                <div class="slider">
                                    <div class="progress"></div>
                                </div>
                                <div class="range_input">
                                    <input type="range" min="0" max="2000" value="0" class="price-min">
                                    <input type="range" min="0" max="2000" value="2000" class="price-max">
                                </div>
                                <div class="price-inputs">
                                    <div class="wrap">
                                        <p style="font-size: 15px;">BDT</p>
                                        <div>
                                            <span style="font-size: 14px;"> Minimum Price</span>
                                            <input type="text" class="min-price" placeholder="Minimum Price"
                                                value="0">
                                        </div>
                                    </div>
                                    <div class="wrap">
                                        <p style="font-size: 15px;">BDT</p>
                                        <div>
                                            <span style="font-size: 14px;">Maximum Price</span>
                                            <input type="text" class="max-price" placeholder="Maximum Price"
                                                value="2000">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <h5 class="mb-2">Color</h5>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                id="inlineRadio1" value="option1">
                                        </div>
                                    </div>
                                    <button class="apply-btn">Apply</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="row product_area">
                        <?php $__currentLoopData = $category_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <div class="col-lg-4 col-md-6 col-6 single_item">
                                <div class="item">
                                    <a href="<?php echo e(route('product.details', $product->product_slug)); ?>">
                                        <div class="thumb">
                                            <img src="<?php echo e(asset(@$product->multi_photos[0]->photo_name)); ?>"
                                                alt="">
                                            
                                        </div>
                                        <div class="down-content">
                                            <div class="wrap">
                                                <h4><?php echo e($product->product_name); ?></h4>

                                            </div>

                                            <div class="price">
                                                <span class="product_price"> BDT</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        <div class="col-lg-12">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Products Area Ends ***** -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\EIT2024\BagsLaravelWebsites\PresidentWebsite - size variant\resources\views/frontend/pages/products/category_products.blade.php ENDPATH**/ ?>