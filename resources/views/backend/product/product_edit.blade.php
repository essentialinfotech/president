@extends('admin.admin_dashboard')

@section('admin')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <!-- Button trigger modal -->
                <a type="button" class="btn btn-primary" href="{{ route('products.index') }}">
                    All Product
                </a>
            </div>
        </div>
        <!--end breadcrumb-->
        <hr />
        <div class="card">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">

                <form id="myForm" action="{{ route('products.update', $product->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="img" class="form-label">Multi Photos</label>
                        <input type="file" name="photos[]" class="form-control" multiple />
                    </div>

                    <div class="mb-3">
                        <label for="img" class="form-label">Existing Images</label>
                        <div class="row">
                            @foreach ($product->multi_photos as $image)
                                <div class="col-md-2">
                                    <div class="form-group mb-3" style="position: relative;">
                                        <img class="w-100 rounded" src="{{ asset($image->photo_name) }}" alt="Garage Photo">
                                        <a class="btn btn-danger btn-sm" style="position: absolute; right:0; top:0"
                                            href="{{ route('admin.multiphoto-photo.delete', $image->id) }}" id="delete"
                                            class="btn btn-danger btn-sm" data-bs-toggle="tooltip" title="Delete Data">
                                            <span aria-hidden="true">&times;</span>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="img" class="form-label">Product Name</label>
                        <input type="text" name="product_name" value="{{ $product->product_name }}"
                            class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label for="img" class="form-label">Category</label>
                        <select name="product_category_id" class="form-control">
                            <option value="">Select..</option>
                            @foreach ($product_categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == $product->product_category_id ? 'selected' : '' }}>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="img" class="form-label">Code</label>
                        <input type="text" name="product_code" value="{{ $product->product_code }}"
                            class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label for="img" class="form-label">Short Descp</label>
                        <textarea name="short_description" class="form-control">{{ $product->short_description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="img" class="form-label">Long Descp</label>
                        <textarea name="long_description" class="form-control mytextarea">{{ $product->long_description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Is Bundle?</label>
                        <select name="is_bundle" class="form-control" id="is_bundle">
                            <option value="No" {{ $product->is_bundle == 'No' ? 'selected' : '' }}>No</option>
                            <option value="Yes" {{ $product->is_bundle == 'Yes' ? 'selected' : '' }}>Yes</option>
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
                                @foreach ($product->product_variants as $variant)
                                    <tr>
                                        <td>{{ $variant->color }}</td>
                                        <td>
                                            @if ($variant->photo)
                                                <img src="{{ asset($variant->photo) }}" alt="Variant Photo" width="100">
                                            @endif
                                        </td>
                                        <td>
                                            @foreach ($variant->variantSizes as $variant_size)
                                                <p>
                                                    <span><strong>Size:</strong>{{ $variant_size->size }}</span>
                                                    <span><strong>Qty:</strong>{{ $variant_size->quantity }}</span>

                                                    @if ($variant_size->discount_price)
                                                        <span>
                                                            <strong>Selling
                                                                Price:</strong><del
                                                                class="text-danger">{{ $variant_size->selling_price }}</del></span>
                                                        <span>
                                                            <strong>Discount
                                                                Price:</strong><span
                                                                class="text-success">{{ $variant_size->discount_price }}</span></span>
                                                    @else
                                                        <span><strong>Selling
                                                                Price:</strong><span
                                                                class="text-success">{{ $variant_size->selling_price }}</span></span>
                                                    @endif
                                                </p>
                                            @endforeach

                                        </td>
                                        <td>


                                            <a href="{{ route('admin.product-variant-delete', $variant->id) }}"
                                                class="btn btn-sm" title="Delete" onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
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
@endsection
