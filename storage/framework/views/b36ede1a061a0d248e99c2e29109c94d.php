

<?php $__env->startSection('admin'); ?>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Dashboard</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"> Blog</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNew">
                    Add New
                </button>
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
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Photo</th>
                                <th>Title</th>
                                <th>Short Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key + 1); ?></td>
                                    <td>
                                        <img src="<?php echo e(asset($item->photo)); ?>" alt="Product Thambnail"
                                            style="width:40px; height:40px;">
                                    </td>
                                    <td><?php echo e($item->title); ?></td>
                                    <td><?php echo Str::words($item->short_description, 2, ' ...'); ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#edit_<?php echo e($item->id); ?>">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <form method="post" action="<?php echo e(route('blogs.destroy', $item->id)); ?>">
                                                <?php echo method_field('delete'); ?>
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="btn btn-danger btn-sm ms-2"
                                                    onClick="return confirm('Are you sure?');"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        </div>

                                    </td>
                                    <!-- Modal -->
                                    <div class="modal fade" id="edit_<?php echo e($item->id); ?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Blog</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?php echo e(route('blogs.update', $item->id)); ?>" method="post"
                                                        enctype="multipart/form-data">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('put'); ?>

                                                        <div class="mb-4">
                                                            <label class="form-label"> Photo *</label>
                                                            <div class=" form-group text-secondary">
                                                                <input type="file" name="photo" class="form-control"
                                                                    onchange="document.getElementById('edit_photo_<?php echo e($item->id); ?>').src = window.URL.createObjectURL(this.files[0])" />
                                                                <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>
                                                        </div>
                                                        <div class="mb-4">
                                                            <img id="edit_photo_<?php echo e($item->id); ?>"
                                                                src="/<?php echo e($item->photo); ?>" alt="photo"
                                                                style="width: 100px;">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="img" class="form-label">Photo Alt</label>
                                                            <input type="text" name="photo_alt"
                                                                value="<?php echo e($item->photo_alt); ?>" class="form-control" />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="img" class="form-label">Title</label>
                                                            <input type="text" name="title"
                                                                value="<?php echo e($item->title); ?>" class="form-control" />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="img" class="form-label">Slug</label>
                                                            <input type="text" name="slug"
                                                                value="<?php echo e($item->slug); ?>" class="form-control" />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="img" class="form-label">Short
                                                                Description</label>
                                                            <textarea name="short_description" class="form-control"><?php echo e($item->short_description); ?></textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="img" class="form-label">Long
                                                                Description</label>
                                                            <textarea name="long_description" class="form-control mytextarea"><?php echo e($item->long_description); ?></textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="img" class="form-label">Meta Title</label>
                                                            <input type="text" name="meta_title"
                                                                value="<?php echo e($item->meta_title); ?>" class="form-control" />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="img" class="form-label">Meta
                                                                Description</label>
                                                            <input type="text" name="meta_description"
                                                                value="<?php echo e($item->meta_description); ?>"
                                                                class="form-control" />
                                                        </div>
                                                        <div class="mb-4">
                                                            <label class="form-label"></label>
                                                            <button type="submit" class="btn btn-success">Save
                                                                Changes</button>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>




    

    <!-- Modal -->
    <div class="modal fade" id="addNew" tabindex="-1" aria-labelledby="addNewLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewLabel">Add New</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="myForm" action="<?php echo e(route('blogs.store')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        
                        <div class="mb-3">
                            <label for="img" class="form-label">Photo</label>
                            <input type="file" name="photo" class="form-control"
                                onchange="document.getElementById('photo').src = window.URL.createObjectURL(this.files[0])" />
                        </div>
                        <div class="mb-3">
                            <img id="photo" src="" alt="" style="width: 100px;">
                        </div>
                        
                        <div class="mb-3">
                            <label for="img" class="form-label">Photo Alt</label>
                            <input type="text" name="photo_alt" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="img" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="img" class="form-label">Slug</label>
                            <input type="text" name="slug" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="img" class="form-label">Short Description</label>
                            <textarea name="short_description" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="img" class="form-label">Long Description</label>
                            <textarea name="long_description" class="form-control mytextarea"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="img" class="form-label">Meta Title</label>
                            <input type="text" name="meta_title" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="img" class="form-label">Meta
                                Description</label>
                            <input type="text" name="meta_description" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="img" class="form-label">Want to send this to subscribers?</label>
                            <select name="subscriber_send_option" class="form-control">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    title: {
                        required: true,
                    },
                    slug: {
                        required: true,
                    },
                },
                messages: {
                    title: {
                        required: 'Please Enter Title',
                    },
                    slug: {
                        required: 'Please Enter Slug',
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

<?php echo $__env->make('admin.admin_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\EIT2024\BagsLaravelWebsites\PresidentWebsite - size variant\resources\views/backend/blog/blogs.blade.php ENDPATH**/ ?>