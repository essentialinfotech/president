

<?php $__env->startSection('admin'); ?>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <!-- Button trigger modal -->
                <a type="button" class="btn btn-primary" href="<?php echo e(route('products.index')); ?>">
                    All Product
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

                <form id="myForm" action="<?php echo e(route('products.update', $product->id)); ?>" method="post"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('put'); ?>
                    <div class="mb-3">
                        <label for="img" class="form-label">Multi Photos</label>
                        <input type="file" name="photos[]" class="form-control" multiple />
                    </div>

                    <div class="mb-3">
                        <label for="img" class="form-label">Existing Images</label>
                        <div class="row">
                            <?php $__currentLoopData = $product->multi_photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-2">
                                    <div class="form-group mb-3" style="position: relative;">
                                        <img class="w-100 rounded" src="<?php echo e(asset($image->photo_name)); ?>" alt="Garage Photo">
                                        <a class="btn btn-danger btn-sm" style="position: absolute; right:0; top:0"
                                            href="<?php echo e(route('admin.multiphoto-photo.delete', $image->id)); ?>" id="delete"
                                            class="btn btn-danger btn-sm" data-bs-toggle="tooltip" title="Delete Data">
                                            <span aria-hidden="true">&times;</span>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="img" class="form-label">Product Name</label>
                        <input type="text" name="product_name" value="<?php echo e($product->product_name); ?>"
                            class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label for="img" class="form-label">Category</label>
                        <select name="product_category_id" class="form-control">
                            <option value="">Select..</option>
                            <?php $__currentLoopData = $product_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>"
                                    <?php echo e($category->id == $product->product_category_id ? 'selected' : ''); ?>>
                                    <?php echo e($category->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="img" class="form-label">Code</label>
                        <input type="text" name="product_code" value="<?php echo e($product->product_code); ?>"
                            class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label for="img" class="form-label">Short Descp</label>
                        <textarea name="short_description" class="form-control"><?php echo e($product->short_description); ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="img" class="form-label">Long Descp</label>
                        <textarea name="long_description" class="form-control mytextarea"><?php echo e($product->long_description); ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Is Bundle?</label>
                        <select name="is_bundle" class="form-control" id="is_bundle">
                            <option value="No" <?php echo e($product->is_bundle == 'No' ? 'selected' : ''); ?>>No</option>
                            <option value="Yes" <?php echo e($product->is_bundle == 'Yes' ? 'selected' : ''); ?>>Yes</option>
                        </select>
                    </div>


                    <div id="variants">
                        <h4>Existing Variant</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Color</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Size + Qty + price</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $product->product_variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($variant->color); ?></td>
                                        <td>
                                            <?php if($variant->photo): ?>
                                                <img src="<?php echo e(asset($variant->photo)); ?>" alt="Variant Photo" width="100">
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php $__currentLoopData = $variant->variantSizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant_size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <p>
                                                    <span><strong>Size:</strong><?php echo e($variant_size->size); ?></span>
                                                    <span><strong>Qty:</strong><?php echo e($variant_size->quantity); ?></span>

                                                    <?php if($variant_size->discount_price): ?>
                                                        <span>
                                                            <strong>Selling
                                                                Price:</strong><del
                                                                class="text-danger"><?php echo e($variant_size->selling_price); ?></del></span>
                                                        <span>
                                                            <strong>Discount
                                                                Price:</strong><span
                                                                class="text-success"><?php echo e($variant_size->discount_price); ?></span></span>
                                                    <?php else: ?>
                                                        <span><strong>Selling
                                                                Price:</strong><span
                                                                class="text-success"><?php echo e($variant_size->selling_price); ?></span></span>
                                                    <?php endif; ?>
                                                </p>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </td>
                                        <td>


                                            <a href="<?php echo e(route('admin.product-variant-delete', $variant->id)); ?>"
                                                class="btn btn-sm" title="Delete" onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>


                    </div>

                    <div class="mb-4">
                        <button type="button" id="addVariant" class="btn btn-primary btn-sm mt-3"> <i
                                class="bx bx-plus"></i>
                            Add New Variant</button>
                    </div>
                    <div class="mb-4 float-end">
                        <label class="form-label"></label>
                        <button type="submit" class="btn btn-success">Save
                            Changes</button>
                    </div>

                </form>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
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
         <div>
            <label for="color">Color</label>
            <input type="text" class="form-control" name="variants[${variantCount}][color]" required>
        </div>
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

<?php echo $__env->make('admin.admin_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\EIT2024\BagsLaravelWebsites\PresidentWebsite - size variant\resources\views/backend/product/product_edit.blade.php ENDPATH**/ ?>