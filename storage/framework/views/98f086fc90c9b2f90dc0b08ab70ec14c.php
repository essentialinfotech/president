

<?php $__env->startSection('main'); ?>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        h2 {
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-check-label {
            margin-left: 5px;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .btn-primary,
        .btn-success {
            width: 100%;
            margin-top: 20px;
        }

        .checkout_page .breadcrumb {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: start;
            background: transparent;
            padding-left: 0;
        }

        .checkout_page .breadcrumb i {
            padding: 0 10px;
        }

        .checkout_page .breadcrumb li a {
            color: #0d0d0d;
        }

        .checkout_page .confirm_info {
            margin-bottom: 20px;
        }

        .checkout_page .confirm_info .wrap {
            display: flex;
            flex-direction: row;
            align-items: center;
            border: 1px solid #e0e0e0;
            padding: 10px 20px;
            width: 100%;
            justify-content: space-between;
            border-radius: 10px;
            margin-bottom: 30px;
        }

        .checkout_page .confirm_info .wrap .com {
            display: flex;
            flex-direction: row;
            align-items: center;

        }

        .checkout_page .confirm_info .discount input {
            border: none;
            background: transparent;
            width: 100%;
        }

        .checkout-summary {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 20px;
        }

        .checkout-summary h5 {
            font-size: 18px;
            font-weight: 400;
            margin-bottom: 20px;
        }

        .checkout-summary span {
            font-size: 15px;
        }

        .checkout-summary .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .checkout_page .delivery_info {
            border: 1px solid #e0e0e0;
            padding: 30px;
            border-radius: 10px;
            margin-top: 20px;
        }

        .checkout_page .delivery_info h4 {
            font-size: 18px;
            margin-bottom: 50px;
        }

        .checkout_page .delivery_info .form-group {
            margin-bottom: 30px;
        }

        .checkout_page .delivery_info .form-group select {
            border-radius: 10px;
        }

        .checkout_page .delivery_info .form-group input {
            border-radius: 10px;
        }

        .checkout_page .confirm_info {
            border: 1px solid #e0e0e0;
            padding: 30px;
            border-radius: 10px;
            margin-top: 20px;
        }
    </style>
    <section style="margin-top: 110px;">
        <div class="checkout_page">
            <?php if(session('error')): ?>
                <div class="alert alert-danger">
                    <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?>
            <form action="<?php echo e(route('checkout.process')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <ul class="breadcrumb">
                                <li><a href="#">Address</a></li>
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                <li><a href="#">Shipping</a></li>
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                <li>Payment</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-7 col-md-12">
                            <div class="delivery_info">
                                <h4>Delivery Information</h4>
                                <div class="form-group">
                                    <label for="name">Recipient Name <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        id="name" value="<?php echo e(old('name', Auth::check() ? Auth::user()->name : '')); ?>"
                                        name="name">
                                    <?php $__errorArgs = ['name'];
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
                                <div class="form-group">
                                    <label for="phone" class="form-label">Recipient Phone Number <span
                                            class="text-danger">*</span> </label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">+88</div>
                                        </div>
                                        <input type="number" name="phone"
                                            class="form-control  <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="phone"
                                            value="<?php echo e(old('email', Auth::check() ? Auth::user()->phone : '')); ?>">
                                    </div>
                                    <?php $__errorArgs = ['phone'];
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
                                <div class="form-group">
                                    <label for="email"> Email <span class="text-danger">*</span> </label>
                                    <input type="text" id="email"
                                        class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="<?php echo e(old('email', Auth::check() ? Auth::user()->email : '')); ?>" name="email">
                                    <?php $__errorArgs = ['email'];
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
                                <div class="form-group">
                                    <label for="address">Recipient Address <span class="text-danger">*</span> </label>
                                    <textarea name="address" id="address" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e(old('address', Auth::check() ? Auth::user()->address : '')); ?></textarea>
                                    <?php $__errorArgs = ['address'];
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
                                <div class="form-group">
                                    <label for="post_code">Post Code</label>
                                    <input type="text" name="post_code" id="post_code"
                                        class="form-control <?php $__errorArgs = ['post_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="<?php echo e(old('post_code')); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="notes">Notes</label>
                                    <textarea name="notes" id="notes" class="form-control"><?php echo e(old('notes')); ?></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-5 col-md-12">
                            <div class="confirm_info">

                                <div class="form-group">
                                    <select class="form-control <?php $__errorArgs = ['payment_method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        name="payment_method" id="paymentMethod">
                                        <option selected disabled>-- Select Payment Method --</option>
                                        <option value="Cash On Delivery">Cash on Delivery</option>
                                        <option value="bKash">Bkash</option>
                                        <option value="Rocket">Rocket</option>
                                        <option value="Nagad">Nagad</option>
                                    </select>
                                    <?php $__errorArgs = ['payment_method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <?php $__errorArgs = ['sender_phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <?php $__errorArgs = ['transaction_id'];
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
                                <div class="card-info">
                                    <div class="row gy-3">

                                        <div class="col-md-6">
                                            <label for="sender_phone_number" class="form-label">Phone</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">+88</div>
                                                </div>
                                                <input type="number" name="sender_phone_number" class="form-control"
                                                    id="sender_phone_number">
                                            </div>
                                            <div class="invalid-feedback">
                                                Sender number is required.
                                            </div>
                                            <?php $__errorArgs = ['sender_phone_number'];
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

                                        <div class="col-md-6">
                                            <label for="transaction_id" class="form-label">Trx ID</label>
                                            <input type="text" name="transaction_id"
                                                class="form-control <?php $__errorArgs = ['transaction_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                id="transaction_id" placeholder="">
                                            <div class="invalid-feedback">
                                                TRX ID is required.
                                            </div>
                                            <?php $__errorArgs = ['transaction_id'];
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

                                        <div class="col-md-6">
                                            <label class="form-label">Send To (AGENT)</label>
                                            <input type="text" class="form-control" disabled
                                                placeholder="+880 1857670998">
                                            <div class="invalid-feedback">
                                                Expiration date required.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="confirm_info">
                                <input type="hidden" name="shipping_cost" id="form_shipping_cost_value">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="shipping_cost_check"
                                        id="insideDhaka" checked>
                                    <label class="form-check-label" for="insideDhaka">Inside Dhaka</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="shipping_cost_check"
                                        id="outsideDhaka">
                                    <label class="form-check-label" for="outsideDhaka">Outside Dhaka</label>
                                </div>
                            </div>


                            <?php if(session('cart')): ?>
                                <?php
                                    $totalQuantity = 0;
                                    $totalSellingPrice = 0;
                                    $totalDiscount = 0;

                                    foreach (session()->get('cart', []) as $details) {
                                        $quantity = $details['variant']['variant_size']['qty'];
                                        $sellingPrice = $details['variant']['variant_size']['selling_price'];
                                        $discountPrice = $details['variant']['variant_size']['discount_price'] ?? null;

                                        // Calculate total selling price (without discount)
                                        $totalSellingPrice += $sellingPrice * $quantity;

                                        // Calculate discount only if there is a discount price
                                        if ($discountPrice !== null) {
                                            $totalDiscount += ($sellingPrice - $discountPrice) * $quantity;
                                        }

                                        $totalQuantity += $quantity;
                                    }

                                    // Final product price after applying the discount
                                    $totalProductPrice = $totalSellingPrice - $totalDiscount;
                                ?>
                            <?php endif; ?>
                            
                            <div class="checkout-summary">
                                <h5>Checkout Summary</h5>
                                <div class="summary-row mb-0">
                                    <span>Original Product Price</span>
                                    <span><?php echo e(number_format($totalSellingPrice, 2)); ?> BDT</span>
                                </div>
                                <div class="summary-row">
                                    <span class="text-muted" style="font-size: 12px;">(<?php echo e($totalQuantity); ?> Items)</span>
                                </div>
                                <?php if($totalDiscount > 0): ?>
                                    <div class="summary-row">
                                        <span>Product Discount</span>
                                        <span>- <?php echo e(number_format($totalDiscount, 2)); ?> BDT</span>
                                    </div>
                                <?php endif; ?>
                                <div class="summary-row">
                                    <span>Shipping Cost</span>
                                    <span id="shippingCost">0 BDT</span>
                                </div>
                                <div class="summary-row">
                                    <span>Total Product Price</span>
                                    <span id="totalProductPrice"><?php echo e(number_format($totalProductPrice, 2)); ?> BDT</span>
                                </div>
                                <button type="submit" class="btn btn-primary">Order Now</button>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function() {
            // Initial total product price from server-side
            var initialTotalProductPrice = <?php echo e($totalProductPrice); ?>;

            // Function to update the summary
            function updateSummary() {
                let shippingCost = 0;

                // Determine the shipping cost based on selected option
                if ($('#insideDhaka').is(':checked')) {
                    shippingCost = 70;
                } else if ($('#outsideDhaka').is(':checked')) {
                    shippingCost = 120;
                }

                // Update the shipping cost in the summary
                $('#shippingCost').text(shippingCost + ' BDT');

                // Compute total product price after discount and add shipping cost
                let totalProductPrice = initialTotalProductPrice + shippingCost;

                // Update the total product price in the summary
                $('#totalProductPrice').text(totalProductPrice + ' BDT');
                $('#form_shipping_cost_value').val(shippingCost);
            }



            // Bind the updateSummary function to radio button change events
            $('input[name="shipping_cost_check"]').on('change', function() {
                updateSummary();
            });

            // Initialize summary on page load
            updateSummary();
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.master_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\EIT2024\BagsLaravelWebsites\PresidentWebsite - size variant\resources\views/frontend/pages/checkout/index.blade.php ENDPATH**/ ?>