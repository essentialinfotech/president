
<?php $__env->startSection('main'); ?>
    
    <?php echo $__env->make('frontend.home.flow_cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <style>
        .color-btn {
            position: relative;
        }

        .color-out-stock {
            background-color: #d3d1d1;
            color: gray;
        }

        .color-out-stock::before {
            background: linear-gradient(to bottom right, transparent, transparent calc(50% - 1px), rgba(0, 0, 0, .5) 50%, transparent calc(50% + 1px), transparent);
            content: "";
            height: 100%;
            left: 0;
            position: absolute;
            top: 0;
            width: 100%;
            z-index: 2;
        }

        .out-of-stock-message {
            display: none;
            color: red;
        }
    </style>

    <!-- ***** Product Area Starts ***** -->
    <section class="section" id="product">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="single_product_pics">
                        <div class="row">
                            <div class="col-lg-3 thumbnails_col order-lg-1 order-2">
                                <div class="single_product_thumbnails" style="overflow-y: scroll;">
                                    <ul>
                                        <?php $__currentLoopData = $product->multi_photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $multi_photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="mb-2 h-100 <?php echo e($key == 0 ? 'active' : ''); ?>"><img
                                                    src="<?php echo e(asset($multi_photo->photo_name)); ?>" alt=""
                                                    data-image="<?php echo e(asset($multi_photo->photo_name)); ?>"></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-9 image_col order-lg-2 order-1">
                                <img class="single_product_image productImage"
                                    src="<?php echo e(asset($product->multi_photos[0]->photo_name)); ?>" alt="Main Product Image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="product_details">
                        <?php
                            $product_variant_qty = $product->product_variants->sum('quantity');
                        ?>
                        <?php if($product_variant_qty > 0): ?>
                            <div class="bg-dark text-light px-2 d-table">
                                In Stock
                            </div>
                        <?php else: ?>
                            <div class="bg-dark text-danger px-2 d-table">
                                Out of Stock
                            </div>
                        <?php endif; ?>

                        <div class="product_details_title mt-2">
                            <h2>
                                <?php echo e($product->product_name); ?></h2>
                        </div>

                        <?php if($product->discount_price): ?>
                            <?php
                                $discountPercentage =
                                    (($product->selling_price - $product->discount_price) / $product->selling_price) *
                                    100;
                                $roundPercentage = round($discountPercentage);
                            ?>

                            <div class="original_price mt-1"><?php echo e($product->selling_price); ?> BDT</div>
                            <div class="product_price"><?php echo e($product->discount_price); ?> BDT</div>
                            <p class="bg-dark text-light px-2 d-table"><?php echo e($roundPercentage); ?>% Off</p>
                        <?php else: ?>
                            <div class="product_price"><?php echo e($product->selling_price); ?> BDT</div>
                        <?php endif; ?>

                        <div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
                            <button class="main-border-button" id="openPopup"><a>Add to cart</a></button>

                            <div id="popup" class="popup">
                                <div class="popup-content">
                                    <span class="close">&times;</span>
                                    <h2>Add to Cart</h2>
                                    <div class="product-info">
                                        <img class="productImage" src="<?php echo e(asset($product->multi_photos[0]->photo_name)); ?>"
                                            alt="Product Image">
                                        <div class="product-details">
                                            <p style="    white-space: normal;"><?php echo e($product->product_name); ?></p>
                                            <div class="price">
                                                <?php if($product->discount_price): ?>
                                                    <p class="discount">
                                                        <span class="discount-percent"><?php echo e(@$roundPercentage); ?>%</span>
                                                        <span class="original-price"><?php echo e($product->selling_price); ?>

                                                            BDT</span>
                                                    </p>
                                                    <p class="main_price"><?php echo e($product->discount_price); ?> BDT</p>
                                                <?php else: ?>
                                                    <p class="main_price"><?php echo e($product->selling_price); ?> BDT</p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-colors">
                                        <p>Color: <span class="color_name"></span></p>
                                        <div class="btn_wrap">
                                            <?php $__currentLoopData = $product->product_variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <button
                                                    class="color-btn <?php echo e($variant->quantity > 0 ? '' : 'color-out-stock'); ?> "
                                                    color-stock="<?php echo e($variant->quantity); ?>"
                                                    data-color="<?php echo e($variant->color); ?>"
                                                    data-image="<?php echo e(asset($variant->photo)); ?>"
                                                    data-variant-id="<?php echo e($variant->id); ?>"
                                                    data-photo-url="<?php echo e($variant->photo); ?>"><?php echo e($variant->color); ?></button>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </div>
                                    </div>
                                    <div class="quantites">
                                        <button class="quantity_btn q_minus">-</button>
                                        <input type="text" class="text-center" value="1" style="width: 40px;"
                                            id="quantity_value" disabled>
                                        <button class="quantity_btn q_plus">+</button>
                                    </div>
                                    <form action="<?php echo e(route('cart.add', $product->id)); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="variant_color" class="variant_color" value="">
                                        <input type="hidden" name="variant_qty" class="variant_qty" value="">
                                        <input type="hidden" name="variant_id" class="variant_id" value="">
                                        <input type="hidden" name="variant_photo" class="variant_photo" value="">
                                        <button type="submit" class="add-to-cart-btn disabled">Add to Cart</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p><?php echo $product->long_description; ?></p>
                        </div>
                        <div class="free_delivery d-flex flex-row align-items-center justify-content-center">
                            <span class="ti-truck"></span><span>Message</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Product Area Ends ***** -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const addToCartBtn = document.querySelector('.add-to-cart-btn');
            const outOfStockMessage = document.querySelector('.out-of-stock-message');
            const colorButtons = document.querySelectorAll('.color-btn');

            colorButtons.forEach(button => {
                button.addEventListener('click', function() {
                    if (this.classList.contains('color-out-stock')) {
                        addToCartBtn.style.display = 'none';
                        outOfStockMessage.style.display = 'block';
                    } else {
                        addToCartBtn.style.display = 'block';
                        outOfStockMessage.style.display = 'none';
                    }
                });
            });
            const quantityButtons = document.querySelectorAll('.quantity_btn');
            quantityButtons.forEach(button => {
                button.addEventListener('click', function() {
                    document.querySelector('.quantity_value').value = document.querySelector(
                        '.variant_qty').value;
                });
            });
        });
    </script>
    <script>
        // Function to handle button click
        function updateVariantPhoto(event) {
            // Get the data-image attribute from the clicked button
            var image = event.target.getAttribute('data-photo-url');
            var variant_id = event.target.getAttribute('data-variant-id');
            var color = event.target.getAttribute('data-color');
            var qty = event.target.getAttribute('color-stock');

            // Find the variant_photo input field and update its value
            document.querySelector('.variant_photo').value = image;
            document.querySelector('.variant_id').value = variant_id;
            document.querySelector('.variant_color').value = color;

            const out_ofstock = document.querySelector('.out');
            const low_ofstock = document.querySelector('.low');

            var addToCartBtn = document.querySelector('.add-to-cart-btn')
            if (qty < 4) {
                low_ofstock.style.display = 'block';
                out_ofstock.style.display = 'none';

                if (qty < 1) {
                    out_ofstock.style.display = 'block';
                    low_ofstock.style.display = 'none';

                }

            } else {
                low_ofstock.style.display = 'none';
                out_ofstock.style.display = 'none';

            }

        }

        // Add event listener to all buttons with class color-btn
        document.querySelectorAll('.color-btn').forEach(button => {
            button.addEventListener('click', updateVariantPhoto);
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\EIT2024\BagsLaravelWebsites\PresidentWebsite - size variant\resources\views/frontend/pages/products/details_product.blade.php ENDPATH**/ ?>