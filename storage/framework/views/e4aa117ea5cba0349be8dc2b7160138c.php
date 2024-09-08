

<?php $__env->startSection('main'); ?>
    <section style="margin-top: 110px;">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-3">
                    <div class="nav flex-column nav-pills">
                        <a class="nav-link active" href="<?php echo e(route('dashboard')); ?>">Dashboard</a>

                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h4>Order Details <span class="text-success">Invoice: <?php echo e($order->invoice_no); ?></span>
                            </h4>
                        </div>
                        <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-1">
                            <div class="col">
                                <div class="table-responsive">
                                    <table class="table" style="font-weight: 600;">
                                        <tbody>
                                            <tr>
                                                <td class="col-md-1">
                                                    <label>Image </label>
                                                </td>
                                                <td class="col-md-3">
                                                    <label>Product Name </label>
                                                </td>
                                                <td class="col-md-2">
                                                    <label>Code </label>
                                                </td>
                                                <td class="col-md-1">
                                                    <label>Color </label>
                                                </td>
                                                <td class="col-md-1">
                                                    <label>Quantity </label>
                                                </td>

                                                <td class="col-md-3">
                                                    <label>Price </label>
                                                </td>

                                            </tr>

                                            <?php
                                                $grandTotal = 0;
                                            ?>
                                            <?php $__currentLoopData = $orderItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $totalPrice = $item->price * $item->qty;
                                                    $grandTotal += $totalPrice;
                                                ?>
                                                <tr>
                                                    <td class="col-md-1">
                                                        <label><img src="<?php echo e(asset($item->image)); ?>"
                                                                style="width:50px; height:50px;">
                                                        </label>
                                                    </td>
                                                    <td class="col-md-2">
                                                        <label><?php echo e($item->product->product_name); ?></label>
                                                    </td>


                                                    <td class="col-md-2">
                                                        <label><?php echo e($item->product->product_code); ?> </label>
                                                    </td>
                                                    <?php if($item->color == null): ?>
                                                        <td class="col-md-1">
                                                            <label>.... </label>
                                                        </td>
                                                    <?php else: ?>
                                                        <td class="col-md-1">
                                                            <label><?php echo e($item->color); ?> </label>
                                                        </td>
                                                    <?php endif; ?>

                                                    <td class="col-md-1">
                                                        <label><?php echo e($item->qty); ?> </label>
                                                    </td>

                                                    <td class="col-md-3">
                                                        <label><?php echo e($item->price); ?> BDT <br> Total =
                                                            <?php echo e($item->price * $item->qty); ?>

                                                            BDT
                                                        </label>
                                                    </td>

                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td colspan="5" class="text-right"><strong>Grand Total:</strong></td>
                                                <td><?php echo e($grandTotal); ?> BDT</td>
                                            </tr>

                                        </tbody>
                                    </table>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>






    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\EIT2024\BagsLaravelWebsites\PresidentWebsite - size variant\resources\views/frontend/user-frontend/user_order_details.blade.php ENDPATH**/ ?>