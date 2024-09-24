

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
                        <li class="breadcrumb-item active" aria-current="page">Product Category</li>
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
            
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Is Top Show</th>
                                <th>Is Banner Show</th>
                                <th>Order</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $product_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key + 1); ?></td>
                                    <td>
                                        <img class="rounded" style="width: 80px;" src="/<?php echo e($item->photo); ?>" alt="">
                                    </td>
                                    <td><?php echo e($item->name); ?></td>
                                    <td><?php echo e($item->is_top); ?></td>
                                    <td><?php echo e($item->is_banner); ?></td>
                                    <td><?php echo e($item->order); ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#edit_<?php echo e($item->id); ?>">
                                                <i class="fas fa-edit"></i>
                                            </button>

                                            <form method="post"
                                                action="<?php echo e(route('product-categories.destroy', $item->id)); ?>">
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
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Product Category
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?php echo e(route('product-categories.update', $item->id)); ?>"
                                                        method="post" enctype="multipart/form-data">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('put'); ?>

                                                        
                                                        <div class="row mb-3">
                                                            <div class="col-sm-3">
                                                                <h6 class="mb-0">Category Photo</h6>
                                                            </div>
                                                            <div class="col-sm-9 text-secondary">
                                                                <input type="file" name="photo" class="form-control"
                                                                    onchange="document.getElementById('photo_<?php echo e($item->id); ?>').src = window.URL.createObjectURL(this.files[0])" />
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col-sm-3">
                                                            </div>
                                                            <div class="col-sm-9 text-secondary">
                                                                <img id="photo_<?php echo e($item->id); ?>"
                                                                    src="<?php echo e(asset($item->photo)); ?>" alt="photo"
                                                                    style="width: 100px;">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="mb-3">
                                                            <label for="img" class="form-label">Category Name</label>
                                                            <input type="text" name="name" class="form-control"
                                                                value="<?php echo e($item->name); ?>" />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="img" class="form-label">Is Top Show?</label>
                                                            <select name="is_top" class="form-control">
                                                                <option value="Yes"
                                                                    <?php echo e($item->is_top == 'Yes' ? 'selected' : ''); ?>>Yes
                                                                </option>
                                                                <option value="No"
                                                                    <?php echo e($item->is_top == 'No' ? 'selected' : ''); ?>>No
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="img" class="form-label">Is Banner Show?</label>
                                                            <select name="is_banner" class="form-control">
                                                                <option value="Yes"
                                                                    <?php echo e($item->is_banner == 'Yes' ? 'selected' : ''); ?>>Yes
                                                                </option>
                                                                <option value="No"
                                                                    <?php echo e($item->is_banner == 'No' ? 'selected' : ''); ?>>No
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Order</label>
                                                            <input type="number" min="0" name="order"
                                                                value="<?php echo e($item->order); ?>" class="form-control" />
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
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewLabel">Add New</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="myForm" action="<?php echo e(route('product-categories.store')); ?>" method="post"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Category Photo</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="file" name="photo" class="form-control"
                                    onchange="document.getElementById('add_photo').src = window.URL.createObjectURL(this.files[0])" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <img id="add_photo" src="<?php echo e(asset('default.png')); ?>" alt="photo"
                                    style="width: 100px;">
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="img" class="form-label">Category Name</label>
                            <input type="text" name="name" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="img" class="form-label">Is Top Show?</label>
                            <select name="is_top" class="form-control">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="img" class="form-label">Is Banner Show?</label>
                            <select name="is_banner" class="form-control">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Order</label>
                            <input type="number" min="0" name="order" class="form-control" />
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    photo: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: 'Please Enter Name',
                    },
                    photo: {
                        required: 'Please Choose a Photo',
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

<?php echo $__env->make('admin.admin_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\XAMPP\htdocs\President\resources\views/backend/product_category/product_categories.blade.php ENDPATH**/ ?>