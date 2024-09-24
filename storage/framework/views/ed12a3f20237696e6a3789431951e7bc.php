<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="first-item">
                    
                    <h4>Address</h4>
                    <ul class="pr-4">
                        <li><a href="#"><?php echo e($global_setting_data->address); ?></a></li>
                        <li><a href="#"><?php echo e($global_setting_data->email); ?></a></li>
                        <li><a href="#"><?php echo e($global_setting_data->phone_1); ?></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2">
                <h4>Top Categories</h4>
                <ul>
                    <?php $__currentLoopData = $global_product_categories->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(route('category.products', $category->slug)); ?>"><?php echo e($category->name); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <div class="col-lg-2">
                <h4>Useful Links</h4>
                <ul>
                    <li><a href="<?php echo e(route('home')); ?>">Home Page</a></li>
                    
                    <li><a href="<?php echo e(route('contact')); ?>">Contact Us</a></li>
                    <li><a href="<?php echo e(route('privacy-policy')); ?>">Privecy Policy</a></li>
                    <li><a href="<?php echo e(route('terms-conditions')); ?>">Term & Condition</a></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <h4><?php echo e($global_page_item->about_heading); ?></h4>
                <p class="text-light"><?php echo $global_page_item->about_short_description; ?></p>
            </div>
            <div class="col-lg-12">
                <div class="under-footer">
                    <p>Copyright © 2024 Essential Infotech. All Rights Reserved.</p>
                    <ul>
                        <?php $__currentLoopData = $global_socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e($item->url); ?>"><?php echo $item->icon; ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php /**PATH F:\XAMPP\htdocs\President\resources\views/frontend/body/footer.blade.php ENDPATH**/ ?>