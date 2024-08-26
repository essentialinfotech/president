

<?php $__env->startSection('admin'); ?>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item active" aria-current="page">All Product</li>
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
                                <th>Thumbnail</th>
                                <th>Product Name</th>
                                <th>Product Code</th>
                                <th>Category</th>
                                <th>Stock</th>
                                <th>Selling Price</th>
                                <th>Discount Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key + 1); ?></td>
                                    <td>
                                        <img src="<?php echo e(asset(optional($item->multi_photos->first())->photo_name ?? 'default-image.jpg')); ?>"
                                            alt="Product Thumbnail" style="width:40px; height:40px;" loading="lazy">

                                        
                                    </td>
                                    <td><?php echo e($item->product_name); ?></td>
                                    <td><?php echo e($item->product_code); ?></td>
                                    <td><?php echo e($item->product_category->name); ?></td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td><?php echo e($item->status == 1 ? 'Active' : 'Inactive'); ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <!-- Button trigger modal -->
                                            <a type="button" class="btn btn-info btn-sm"
                                                href="<?php echo e(route('products.edit', $item->id)); ?>">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form method="post" action="<?php echo e(route('products.destroy', $item->id)); ?>">
                                                <?php echo method_field('delete'); ?>
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="btn btn-danger btn-sm ms-2"
                                                    onClick="return confirm('Are you sure?');"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        </div>

                                    </td>
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
                <form id="myForm" action="<?php echo e(route('products.store')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Multi Photos</label>
                            <input type="file" name="photos[]" class="form-control" multiple />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" name="product_name" class="form-control" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select name="product_category_id" class="form-control">
                                <option value="">Select..</option>
                                <?php $__currentLoopData = $product_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>">
                                        <?php echo e($category->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Code</label>
                            <input type="text" name="product_code" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">YouTube Video Link</label>
                            <input type="text" name="video_link" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Short Descp</label>
                            <textarea name="short_description" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Long Descp</label>
                            <textarea name="long_description" class="form-control mytextarea"></textarea>
                        </div>

                        <div id="variants">
                            <div class="variant">
                                <h4 class="mt-4">Variant - 1</h4>
                                <div class="variant-sizes">
                                    <div class="row size-row">
                                        <div class="col-2">
                                            <label for="size">Size</label>
                                            <input type="text" class="form-control" name="variants[0][sizes][0][size]"
                                                required>
                                        </div>
                                        <div class="col-2">
                                            <label for="quantity">quantity</label>
                                            <input type="number" min="1" class="form-control"
                                                name="variants[0][sizes][0][quantity]" required>
                                        </div>
                                        <div class="col-3">
                                            <label for="selling_price">Selling Price</label>
                                            <input type="number" min="1" class="form-control"
                                                name="variants[0][sizes][0][selling_price]" required>
                                        </div>
                                        <div class="col-3">
                                            <label for="discount_price">Discount Price</label>
                                            <input type="number" min="1" class="form-control"
                                                name="variants[0][sizes][0][discount_price]">
                                        </div>
                                        <div class="col-2 fa-2x mt-3">
                                            <span class="text-danger remove-size" onclick="removeSize(this)"
                                                style="cursor: pointer; display: none;"> <i class="bx bx-x"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-sm btn-success w-auto add-size-btn mt-1"><i
                                        class="bx bx-plus"></i>Add Size</button>
                                <div>
                                    <label for="color">Color</label>
                                    <input type="text" class="form-control" name="variants[0][color]" required>
                                </div>
                                <div>
                                    <label for="photo">Photo</label>
                                    <input type="file" class="form-control" name="variants[0][photo]" required>
                                </div>
                            </div>
                        </div>
                        <button type="button" id="addVariant" class="btn btn-success btn-sm mt-3">
                            <i class="bx bx-plus"></i> Add Variant</button>
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
                    'photos[]': {
                        required: true,
                    },
                    product_name: {
                        required: true,
                    },
                    product_code: {
                        required: true,
                    },
                    product_category_id: {
                        required: true,
                    },
                    'selling_price[]': {
                        required: true,
                    },
                    product_quantity: {
                        required: true,
                    },

                },
                messages: {
                    'photos[]': {
                        required: 'Please Choose Product Photos',
                    },
                    product_name: {
                        required: 'Please Enter Product Name',
                    },
                    product_code: {
                        required: 'Please Enter Product Code',
                    },
                    product_category_id: {
                        required: 'Please Select Product Category',
                    },
                    'selling_price[]': {
                        required: 'Please Enter Selling Price',
                    },
                    product_quantity: {
                        required: 'Please Enter quantity',
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
    

    <script>
        let variantCount = 1;

        document.getElementById('addVariant').addEventListener('click', function() {
            const variantsDiv = document.getElementById('variants');
            const newVariant = document.createElement('div');
            newVariant.classList.add('variant');
            newVariant.innerHTML = `
        <h4 class="mt-4">
            <span class="text-danger remove-variant" onclick="removeVariant(this)" style="cursor: pointer;"> 
                <i class="bx bx-x"></i>
            </span> 
            Variant - ${variantCount + 1}
        </h4>
        <div class="variant-sizes">
            <div class="row size-row">
                <div class="col-2">
                    <label for="size">Size</label>
                    <input type="text" class="form-control" name="variants[${variantCount}][sizes][0][size]" required>
                </div>
                <div class="col-2">
                    <label for="quantity">Quantity</label>
                    <input type="number" min="1" class="form-control" name="variants[${variantCount}][sizes][0][quantity]" required>
                </div>
                <div class="col-3">
                    <label for="selling_price">Selling Price</label>
                    <input type="number" min="1" class="form-control" name="variants[${variantCount}][sizes][0][selling_price]" required>
                </div>
                <div class="col-3">
                    <label for="discount_price">Discount Price</label>
                    <input type="number" min="1" class="form-control" name="variants[${variantCount}][sizes][0][discount_price]">
                </div> 
                <div class="col-2 fa-2x mt-3">
                    <span class="text-danger remove-size" onclick="removeSize(this)" style="cursor: pointer;">
                        <i class="bx bx-x"></i>
                    </span>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-sm btn-success w-auto add-size-btn mt-1"><i class="bx bx-plus"></i>Add Size</button>
        <div>
            <label for="color">Color</label>
            <input type="text" class="form-control" name="variants[${variantCount}][color]" required>
        </div>
        <div>
            <label for="photo">Photo</label>
            <input type="file" class="form-control" name="variants[${variantCount}][photo]" required>
        </div>
    `;
            variantsDiv.appendChild(newVariant);

            // Hide the first "remove-size" button
            const firstRemoveSizeBtn = newVariant.querySelector('.remove-size');
            firstRemoveSizeBtn.style.display = 'none';

            variantCount++;
        });

        // Function to remove a variant
        function removeVariant(button) {
            const variantDiv = button.closest('.variant');
            variantDiv.remove();
        }

        // Function to remove a size
        function removeSize(button) {
            const sizeRow = button.closest('.size-row');
            sizeRow.remove();
        }

        // Event delegation for dynamically added "Add More Size" buttons
        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('add-size-btn')) {
                const variantDiv = event.target.closest('.variant');
                const sizeRows = variantDiv.querySelectorAll('.size-row');
                const newSizeRow = sizeRows[0].cloneNode(true);

                // Reset input values in the cloned size row
                newSizeRow.querySelectorAll('input').forEach(input => input.value = '');

                const lastSizeIndex = sizeRows.length;
                newSizeRow.querySelectorAll('input').forEach((input, index) => {
                    const name = input.name.replace(/\[sizes\]\[\d+\]/, `[sizes][${lastSizeIndex}]`);
                    input.name = name;
                });

                variantDiv.querySelector('.variant-sizes').appendChild(newSizeRow);

                // Show the "remove-size" button for the new size row
                newSizeRow.querySelector('.remove-size').style.display = 'inline';
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\EIT2024\BagsLaravelWebsites\PresidentWebsite - size variant\resources\views/backend/product/products.blade.php ENDPATH**/ ?>