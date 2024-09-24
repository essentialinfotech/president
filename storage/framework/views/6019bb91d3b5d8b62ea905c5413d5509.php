
<?php $__env->startSection('title', $page_data['privacy_policy_seo_title']); ?>
<?php $__env->startSection('meta_description', $page_data['privacy_policy_seo_meta_description']); ?>
<?php $__env->startSection('og_image', $page_data['privacy_policy_banner']); ?>
<?php $__env->startSection('twitter_image', $page_data['privacy_policy_banner']); ?>
<?php $__env->startSection('main'); ?>
    <!-- Bread Curmb Section -->
    <div 
    class="about-page-heading " id="top"
        style=" background-image: url('<?php echo e(asset($page_data->privacy_policy_banner)); ?>');  background-position: center; background-repeat: no-repeat;background-size: cover;">
        <div class="container d-flex flex-column gap-2 align-items-center justify-content-center">
            <div class="head-title pb-2">
                <h2 class="text-light">Privacy Policy</h2>
            </div>
            <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Privacy Policy</li>
                </ol>
            </nav>
        </div>
    </div>


    <!-- Start Term Condition Section -->
    <section>
        <div class="container">
            <div class="head-title">
                <h2><?php echo e($page_data->privacy_policy_heading); ?></h2>
                <p><?php echo e($page_data->privacy_policy_short_description); ?></p>
            </div>

            <?php echo $page_data->privacy_policy_details; ?>


        </div>
    </section>
    <!-- End Term Condition Section -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\XAMPP\htdocs\President\resources\views/frontend/pages/privacy_policy.blade.php ENDPATH**/ ?>