<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <title><?php echo e($global_setting_data->title); ?></title>
    <link rel="shortcut icon" href="/<?php echo e($global_setting_data->favicon); ?>" type="image/x-icon" />


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/assets/css/bootstrap.min.css')); ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/style.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/owl-carousel.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/lightbox.css')); ?>">
    <!-- Toast -->
    
    
    <!-- Toast -->
    
    
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/slick-theme.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/slick.css')); ?>">

</head>



<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <?php echo $__env->make('frontend.body.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.body.chat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- ***** Header Area End ***** -->

    <?php echo $__env->yieldContent('main'); ?>


    <!-- ***** Footer Start ***** -->
    <?php echo $__env->make('frontend.body.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    <!-- Bootstrap -->
    <script src="<?php echo e(asset('frontend/assets/js/popper.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/bootstrap.min.js')); ?>"></script>

    <!-- Plugins -->
    <script src="<?php echo e(asset('frontend/assets/js/owl-carousel.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/accordions.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/datepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/scrollreveal.min.js')); ?>"></script>
    
    <script src="<?php echo e(asset('frontend/assets/js/jquery.counterup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/imgfix.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/lightbox.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/isotope.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/Isotope/isotope.pkgd.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/filter.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/quantity.js')); ?>"></script>

    <!-- Global Init -->
    <script src="<?php echo e(asset('frontend/assets/js/cart.js')); ?>"></script>
    
    <script src="<?php echo e(asset('frontend/assets/js/slick.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/slick.min.js')); ?>"></script>


    <script src="<?php echo e(asset('adminbackend/assets/js/validate.min.js')); ?>"></script>
    
    <script src="<?php echo e(asset('frontend/assets/js/custom.js')); ?>"></script>






    <?php if($errors->any()): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <script>
                iziToast.error({
                    title: 'Error',
                    position: 'topRight',
                    message: '<?php echo e($error); ?>',
                });
            </script>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <?php if(session()->get('error')): ?>
        <script>
            iziToast.error({
                title: 'Error',
                message: '<?php echo e(session()->get('error')); ?>',
            });
        </script>
    <?php endif; ?>
    <?php if(session()->get('success')): ?>
        <script>
            iziToast.success({
                position: 'topRight',
                message: '<?php echo e(session()->get('success')); ?>',
            });
        </script>
    <?php endif; ?>
    <?php echo $__env->yieldPushContent('script'); ?>
</body>

</html>
<?php /**PATH E:\EIT2024\BagsLaravelWebsites\PresidentWebsite - size variant\resources\views/frontend/master_dashboard.blade.php ENDPATH**/ ?>