

<?php $__env->startSection('admin'); ?>
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Admin Order Details</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Admin Order Details</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <hr />


        <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Shipping Details</h4>
                    </div>
                    <hr>
                    <div class="card-body">
                        <table class="table" style="background:#F4F6FA;font-weight: 600;">
                            <tr>
                                <th>Shipping Name:</th>
                                <th><?php echo e($order->name); ?></th>
                            </tr>

                            <tr>
                                <th>Shipping Phone:</th>
                                <th><?php echo e($order->phone); ?></th>
                            </tr>

                            <tr>
                                <th>Shipping Email:</th>
                                <th><?php echo e($order->email); ?></th>
                            </tr>

                            <tr>
                                <th>Shipping Address:</th>
                                <th><?php echo e($order->adress); ?></th>
                            </tr>

                            <tr>
                                <th>Post Code :</th>
                                <th><?php echo e($order->post_code); ?></th>
                            </tr>

                            <tr>
                                <th>Order Date :</th>
                                <th><?php echo e($order->order_date); ?></th>
                            </tr>

                        </table>

                    </div>

                </div>
            </div>


            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Order Details
                            <span class="text-danger">Invoice : <?php echo e($order->invoice_no); ?> </span>
                        </h4>
                    </div>
                    <hr>
                    <div class="card-body">
                        <table class="table" style="background:#F4F6FA;font-weight: 600;">
                            <tr>
                                <th> Name :</th>
                                <th><?php echo e(@$order->user->name); ?></th>
                            </tr>

                            <tr>
                                <th>Phone :</th>
                                <th><?php echo e(@$order->user->phone); ?></th>
                            </tr>

                            <tr>
                                <th>Payment Type:</th>
                                <th><?php echo e($order->payment_method); ?></th>
                            </tr>


                            

                            <tr>
                                <th>Invoice:</th>
                                <th class="text-danger"><?php echo e($order->invoice_no); ?></th>
                            </tr>

                            <tr>
                                <th>Order Amonut:</th>
                                <th><?php echo e($order->amount); ?> BDT</th>
                            </tr>

                            <tr>
                                <th>Order Status:</th>
                                <th><span class="badge bg-danger" style="font-size: 15px;"><?php echo e($order->status); ?></span></th>
                            </tr>


                            <tr>
                                <th> </th>
                                <th>
                                    <?php if($order->status == 'pending'): ?>
                                        <a href="<?php echo e(route('pending-confirm', $order->id)); ?>"
                                            class="btn btn-block btn-success" id="confirm">Confirm Order</a>
                                    <?php elseif($order->status == 'confirm'): ?>
                                        <a href="<?php echo e(route('confirm-processing', $order->id)); ?>"
                                            class="btn btn-block btn-success" id="processing">Processing Order</a>
                                    <?php elseif($order->status == 'processing'): ?>
                                        <a href="<?php echo e(route('processing-delivered', $order->id)); ?>"
                                            class="btn btn-block btn-success" id="delivered">Delivered Order</a>
                                    <?php endif; ?>



                                </th>
                            </tr>

                        </table>

                    </div>

                </div>
            </div>
        </div>






        <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-1">
            <div class="col">
                <div class="card">


                    <div class="table-responsive">
                        <table class="table" style="font-weight: 600;">
                            <tbody>
                                <tr>
                                    <td class="col-md-1">
                                        <label>Image </label>
                                    </td>
                                    <td class="col-md-2">
                                        <label>Product Name </label>
                                    </td>
                                    <td class="col-md-2">
                                        <label>Product Code </label>
                                    </td>
                                    <td class="col-md-1">
                                        <label>Color </label>
                                    </td>
                                    <td class="col-md-1">
                                        <label>Size </label>
                                    </td>
                                    <td class="col-md-1">
                                        <label>Stock </label>
                                    </td>
                                    <td class="col-md-1">
                                        <label>Quantity </label>
                                    </td>

                                    <td class="col-md-3">
                                        <label>Price </label>
                                    </td>

                                </tr>


                                <?php $__currentLoopData = $orderItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        // Get the variant based on the color (if applicable) and product ID
                                        $variant = $item->product->product_variants
                                            ->where('color', $item->color)
                                            ->first();

                                        // Get the specific variant size based on the size from the order item
                                        $variantSize = $variant
                                            ? $variant->variantSizes->where('size', $item->size)->first()
                                            : null;

                                        // Retrieve the quantity for the variant size
                                        $quantity = $variantSize ? $variantSize->quantity : 0;
                                    ?>

                                    <tr>
                                        <td class="col-md-1">
                                            <label><img src="<?php echo e(asset($item->image)); ?>" style="width:50px; height:50px;">
                                            </label>
                                        </td>
                                        <td class="col-md-2">
                                            <label><?php echo e($item->product->product_name); ?></label>
                                        </td>


                                        <td class="col-md-2">
                                            <label><?php echo e($item->product->product_code); ?> </label>
                                        </td>
                                        <?php if($item->color): ?>
                                            <td class="col-md-1">
                                                <label><?php echo e($item->color); ?> </label>
                                            </td>
                                        <?php endif; ?>
                                        <td class="col-md-1">
                                            <label><?php echo e(@$item->size); ?> </label>
                                        </td>
                                        <td class="col-md-1">
                                            <label><?php echo e($quantity); ?></label>
                                        </td>
                                        <td class="col-md-1">
                                            <label><?php echo e($item->qty); ?> </label>
                                        </td>

                                        <td class="col-md-3">
                                            <label><?php echo e($item->price); ?> BDT <br> Total = <?php echo e($item->price * $item->qty); ?>

                                                BDT
                                            </label>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>

                    </div>



                </div>
            </div>

        </div>






    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\EIT2024\BagsLaravelWebsites\PresidentWebsite - size variant\resources\views/backend/orders/admin_order_details.blade.php ENDPATH**/ ?>