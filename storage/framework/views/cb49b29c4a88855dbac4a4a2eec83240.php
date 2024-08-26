

<?php $__env->startSection('admin'); ?>
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">All Return Order</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Return Order</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">

                </div>
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
                                <th>Date </th>
                                <th>Invoice </th>
                                <th>Amount </th>
                                <th>Payment </th>
                                <th>State </th>
                                <th>Reason </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td> <?php echo e($key + 1); ?> </td>
                                    <td><?php echo e($item->order_date); ?></td>
                                    <td><?php echo e($item->invoice_no); ?></td>
                                    <td>$<?php echo e($item->amount); ?></td>
                                    <td><?php echo e($item->payment_method); ?></td>
                                    <td>

                                        <?php if($item->return_order == 1): ?>
                                            <span class="badge rounded-pill bg-danger"> Pending </span>
                                        <?php elseif($item->return_order == 2): ?>
                                            <span class="badge rounded-pill bg-success"> Success </span>
                                        <?php endif; ?>
                                    </td>

                                    <td><?php echo e($item->return_reason); ?></td>

                                    <td>
                                        <a href="<?php echo e(route('admin.order.details', $item->id)); ?>" class="btn btn-info"
                                            title="Details"><i class="fa fa-eye"></i> </a>

                                        <a href="<?php echo e(route('return.request.approved', $item->id)); ?>" class="btn btn-danger"
                                            title="Approved" id="approved"><i class="fa-solid fa-person-circle-check"></i>
                                        </a>


                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl</th>
                                <th>Date </th>
                                <th>Invoice </th>
                                <th>Amount </th>
                                <th>Payment </th>
                                <th>State </th>
                                <th>Reason </th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>



    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\EIT2024\BagsLaravelWebsites\PresidentWebsite - size variant\resources\views/backend/return_order/return_request.blade.php ENDPATH**/ ?>