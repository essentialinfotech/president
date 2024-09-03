

<?php $__env->startSection('main'); ?>
    <section style="margin-top: 110px;">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home"
                            role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
                        <a class="nav-link" id="v-pills-orders-tab" data-toggle="pill" href="#v-pills-orders" role="tab"
                            aria-controls="v-pills-orders" aria-selected="false">Orders</a>
                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile"
                            role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                        <a class="nav-link" id="v-pills-change-password-tab" data-toggle="pill"
                            href="#v-pills-change-password" role="tab" aria-controls="v-pills-change-password"
                            aria-selected="false">Change Password</a>
                        
                        <a class="nav-link" id="v-pills-returns-tab" data-toggle="pill" href="#v-pills-returns"
                            role="tab" aria-controls="v-pills-returns" aria-selected="false">Returns</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home-tab">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Welcome, <?php echo e(Auth::user()->name); ?>!</h4>
                                    <p class="card-text mb-5">Here you can manage your profile and orders.</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-orders" role="tabpanel" aria-labelledby="v-pills-orders-tab">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Orders</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Invoice No</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Total</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($order->invoice_no); ?></td>
                                                        <td><?php echo e($order->invoice_no); ?></td>
                                                        <td><?php echo e($order->status); ?></td>
                                                        <td><?php echo e($order->amount); ?> BDT</td>
                                                        <td>
                                                            <a href="<?php echo e(route('user.order-details', $order->invoice_no)); ?>"
                                                                class="btn btn-info" title="Details"><i
                                                                    class="fa fa-eye"></i> </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <!-- Add more orders here -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                            aria-labelledby="v-pills-profile-tab">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Profile</h4>

                                    
                                    <div id="profileAlertMessage" class="alert" role="alert" style="display: none;">
                                    </div>
                                    

                                    <form id="updateProfileForm" action="<?php echo e(route('user.update.profile')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                value="<?php echo e(Auth::user()->name); ?>">
                                            <span id="name_error" class="text-danger"></span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" id="email"
                                                value="<?php echo e(Auth::user()->email); ?>">
                                            <span id="email_error" class="text-danger"></span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="number" name="phone" class="form-control" id="phone"
                                                value="<?php echo e(Auth::user()->phone); ?>">
                                            <span id="phone_error" class="text-danger"></span>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-change-password" role="tabpanel"
                            aria-labelledby="v-pills-change-password-tab">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Change Password</h4>
                                    
                                    <div id="alertMessage" role="alert" style=""></div>
                                    
                                    <form id="updatePasswordForm" action="<?php echo e(route('user.update.password')); ?>"
                                        method="POST">
                                        <?php echo csrf_field(); ?>
                                        <div class="mb-3">
                                            <label for="old_password" class="form-label">Old Password</label>
                                            <input type="password" name="old_password" id="old_password"
                                                class="form-control <?php $__errorArgs = ['old_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                placeholder="Old Password" />
                                            <span class="text-danger" id="old_password_error"></span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="new_password" class="form-label">New Password</label>
                                            <input type="password" name="new_password" id="new_password"
                                                class="form-control <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                placeholder="New Password" />
                                            <span class="text-danger" id="new_password_error"></span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="new_password_confirmation" class="form-label">Confirm New
                                                Password</label>
                                            <input type="password" name="new_password_confirmation"
                                                id="new_password_confirmation"
                                                class="form-control <?php $__errorArgs = ['new_password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                placeholder="Confirm New Password" />
                                            <span class="text-danger" id="new_password_confirmation_error"></span>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-returns" role="tabpanel"
                            aria-labelledby="v-pills-returns-tab">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Return orders</h4>
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Sl</th>
                                                    <th>Date </th>
                                                    <th>Invoice </th>
                                                    <th>Amount </th>
                                                    <th>Payment </th>
                                                    <th>Status </th>
                                                    <th>Reason </th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $return_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td> <?php echo e($key + 1); ?> </td>
                                                        <td><?php echo e($item->order_date); ?></td>
                                                        <td><?php echo e($item->invoice_no); ?></td>
                                                        <td><?php echo e($item->amount); ?> BDT</td>
                                                        <td><?php echo e($item->payment_method); ?></td>
                                                        <td>

                                                            <?php if($item->return_order == 1): ?>
                                                                <span class="badge rounded-pill bg-danger"> Pending </span>
                                                            <?php elseif($item->return_order == 2): ?>
                                                                <span class="badge rounded-pill bg-success"> Success
                                                                </span>
                                                            <?php endif; ?>
                                                        </td>

                                                        <td><?php echo e($item->return_reason); ?></td>

                                                        <td>
                                                            <a href="<?php echo e(route('user.order-details', $item->invoice_no)); ?>"
                                                                class="btn btn-info" title="Details"><i
                                                                    class="fa fa-eye"></i> </a>
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
                </div>
            </div>
        </div>






    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function() {
            $('#updatePasswordForm').on('submit', function(e) {
                e.preventDefault();

                // Clear previous error messages
                $('#old_password_error').text('');
                $('#new_password_error').text('');
                $('#new_password_confirmation_error').text('');
                $('#alertMessage').hide().removeClass("alert-success alert-danger");

                $.ajax({
                    url: $(this).attr('action'), // The form action URL
                    method: $(this).attr('method'), // The form method (POST)
                    data: $(this).serialize(), // Serialize form data
                    success: function(response) {
                        // Handle success
                        $('#alertMessage').text('Password changed successfully!')
                            .addClass("alert-success")
                            .removeClass("alert-danger")
                            .show();
                    },
                    error: function(response) {
                        // Handle validation errors
                        if (response.responseJSON.errors) {
                            var errors = response.responseJSON.errors;
                            if (errors.old_password) {
                                $('#old_password_error').text(errors.old_password[0]);
                            }
                            if (errors.new_password) {
                                $('#new_password_error').text(errors.new_password[0]);
                            }
                            if (errors.new_password_confirmation) {
                                $('#new_password_confirmation_error').text(errors
                                    .new_password_confirmation[0]);
                            }
                        } else if (response.status === 401) {
                            // Handle old password mismatch
                            $('#alertMessage').text("Old Password Doesn't Match!!")
                                .addClass("alert-danger")
                                .removeClass("alert-success")
                                .show();
                        }
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#updateProfileForm').on('submit', function(e) {
                e.preventDefault();

                // Clear previous error messages
                $('#name_error').text('');
                $('#email_error').text('');
                $('#phone_error').text('');
                $('#profileAlertMessage').hide().removeClass("alert-success alert-danger");

                $.ajax({
                    url: $(this).attr('action'), // The form action URL
                    method: $(this).attr('method'), // The form method (POST)
                    data: $(this).serialize(), // Serialize form data
                    success: function(response) {
                        // Handle success
                        $('#profileAlertMessage').text('Profile Updated Successfully!')
                            .addClass("alert-success")
                            .removeClass("alert-danger")
                            .show();
                    },
                    error: function(response) {
                        // Handle validation errors
                        if (response.responseJSON.errors) {
                            var errors = response.responseJSON.errors;
                            if (errors.name) {
                                $('#name_error').text(errors.name[0]);
                            }
                            if (errors.email) {
                                $('#email_error').text(errors.email[0]);
                            }
                            if (errors.phone) {
                                $('#phone_error').text(errors.phone[0]);
                            }
                        } else {
                            $('#profileAlertMessage').text(
                                    'An error occurred. Please try again.')
                                .addClass("alert-danger")
                                .removeClass("alert-success")
                                .show();
                        }
                    }
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.master_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\EIT2024\BagsLaravelWebsites\PresidentWebsite - size variant\resources\views/frontend/user-frontend/user_dashboard.blade.php ENDPATH**/ ?>