

<?php $__env->startSection('admin'); ?>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Privacy Policy Page Content</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Privacy Policy Page Content</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <hr />
        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Edit Privacy Policy Page Content</h5>
                <hr />
                <form id="myForm" action="<?php echo e(route('admin.privacy-policy-page-update')); ?>" method="post"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Banner (Min Width: 1400px & Min Height: 332px)</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="file" name="privacy_policy_banner" class="form-control"
                                onchange="document.getElementById('privacy_policy_banner').src = window.URL.createObjectURL(this.files[0])" />
                            <?php $__errorArgs = ['privacy_policy_banner'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <img id="privacy_policy_banner" src="<?php echo e(asset($page_data->privacy_policy_banner)); ?>"
                                alt="privacy_policy_banner" style="width: 100px;">
                        </div>
                    </div>
                    

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Heading</h6>
                        </div>
                        <div class=" form-group col-sm-9 text-secondary">
                            <input type="text" name="privacy_policy_heading" class="form-control"
                                value="<?php echo e($page_data->privacy_policy_heading); ?>" />
                            <?php $__errorArgs = ['privacy_policy_heading'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Short Description</h6>
                        </div>
                        <div class=" form-group col-sm-9 text-secondary">
                            <textarea class="form-control" name="privacy_policy_short_description" id=""><?php echo e($page_data->privacy_policy_short_description); ?></textarea>
                            <?php $__errorArgs = ['privacy_policy_short_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">SEO Title</h6>
                        </div>
                        <div class=" form-group col-sm-9 text-secondary">
                            <input type="text" name="privacy_policy_seo_title" class="form-control"
                                value="<?php echo e($page_data->privacy_policy_seo_title); ?>" />
                            <?php $__errorArgs = ['privacy_policy_seo_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Meta Description</h6>
                        </div>
                        <div class=" form-group col-sm-9 text-secondary">
                            <textarea class="form-control" name="privacy_policy_seo_meta_description" id=""><?php echo e($page_data->privacy_policy_seo_meta_description); ?></textarea>
                            <?php $__errorArgs = ['privacy_policy_seo_meta_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Details</h6>
                        </div>
                        <div class=" form-group col-sm-9 text-secondary">
                            <textarea class="form-control mytextarea" name="privacy_policy_details" rows="10"><?php echo e($page_data->privacy_policy_details); ?></textarea>
                            <?php $__errorArgs = ['privacy_policy_details'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9 text-secondary">
                            <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    privacy_policy_heading: {
                        required: true,
                    },
                },
                messages: {
                    privacy_policy_heading: {
                        required: 'Please Enter Heading',
                    },
                },
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

<?php echo $__env->make('admin.admin_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\EIT2024\BagsLaravelWebsites\PresidentWebsite - size variant\resources\views/backend/privacy_policy_page.blade.php ENDPATH**/ ?>