
<?php $__env->startSection('main'); ?>
    <div class="d-flex justify-content-center align-items-center vh-100 bg-light">
        <div class="px-3 text-center">
            <h1 class="display-1 font-weight-bold">404</h1>
            <p class="lead">Oops! The page you are looking for cannot be found.</p>
            
            <a href="/" class="btn btn-primary">Go to Homepage</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\XAMPP\htdocs\President\resources\views/errors/404.blade.php ENDPATH**/ ?>