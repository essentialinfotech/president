

<?php $__env->startSection('admin'); ?>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item active" aria-current="page">Edit Product Variant</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <!-- Button trigger modal -->
                <a type="button" class="btn btn-primary" href="<?php echo e(route('products.index')); ?>">
                    Products
                </a>
            </div>
        </div>
        <!--end breadcrumb-->
        <hr />
        <div class="card">
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <div class="card-body">
                <form action="<?php echo e(route('admin.product-variant-update', $variant->id)); ?>" method="POST"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="modal-body">
                        <div>
                            <label>Color</label>
                            <input type="text" class="form-control" name="color" value="<?php echo e($variant->color); ?>"
                                required>
                        </div>
                        <div>
                            <label>Quantity</label>
                            <input type="number" class="form-control" name="quantity" value="<?php echo e($variant->quantity); ?>"
                                required>
                        </div>
                        <div>
                            <label>Photo</label>
                            <input type="file" class="form-control" name="photo">
                        </div>
                        <?php if($variant->photo): ?>
                            <div class="mt-4">
                                <img style="width: 100px" src="<?php echo e(asset($variant->photo)); ?>" alt="">
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save
                            changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            $('#myForm').validate({

                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\EIT2024\BagsLaravelWebsites\PresidentWebsite - size variant\resources\views/backend/product/product_variant_edit.blade.php ENDPATH**/ ?>