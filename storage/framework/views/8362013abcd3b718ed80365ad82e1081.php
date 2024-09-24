<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Invoice</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }

        .font {
            font-size: 15px;
        }

        .authority {
            /*text-align: center;*/
            float: right
        }

        .authority h5 {
            margin-top: -10px;
            color: green;
            /*text-align: center;*/
            margin-left: 35px;
        }

        .thanks p {
            color: green;
            ;
            font-size: 16px;
            font-weight: normal;
            font-family: serif;
            margin-top: 20px;
        }
    </style>

</head>

<body>

    <table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">
        <tr>
            <td valign="top">
                <!--  -->
                <h2 style="color: green; font-size: 26px;"><strong>Essential Infotech</strong></h2>
            </td>
            <td align="right">
                <pre class="font">
               EIT Head Office
               Email:support@essential-infotech.com <br>
               Mob: 1245454545 <br>
               Dhaka 1230,Uttara <br>
              
            </pre>
            </td>
        </tr>

    </table>


    <table width="100%" style="background:white; padding:2px;"></table>

    <table width="100%" style="background: #F7F7F7; padding:0 5 0 5px;" class="font">
        <tr>
            <td>
                <p class="font" style="margin-left: 20px;">
                    <strong>Name:</strong> <?php echo e($order->name); ?> <br>
                    <strong>Email:</strong> <?php echo e($order->email); ?> <br>
                    <strong>Phone:</strong> <?php echo e($order->phone); ?> <br>

                    <strong>Address:</strong> <?php echo e($order->adress); ?> <br>
                    <strong>Post Code:</strong> <?php echo e($order->post_code); ?>

                </p>
            </td>
            <td>
                <p class="font">
                <h3><span style="color: green;">Invoice:</span> #<?php echo e($order->invoice_no); ?></h3>
                Order Date: <?php echo e($order->order_date); ?> <br>
                Delivery Date: <?php echo e($order->delivered_date); ?> <br>
                Payment Type : <?php echo e($order->payment_method); ?> </span>
                </p>
            </td>
        </tr>
    </table>
    <br />
    <h3>Products</h3>


    <table width="100%">
        <thead style="background-color: green; color:#FFFFFF;">
            <tr class="font">
                <th>Image</th>
                <th>Product Name</th>
                <th>Color</th>
                <th>Code</th>
                <th>Quantity</th>
                <th>Total </th>
            </tr>
        </thead>
        <tbody>

            <?php $__currentLoopData = $orderItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="font">
                    <td align="center">
                        <img src="<?php echo e(public_path($item->image)); ?>" height="50px;" width="50px;" alt="">
                    </td>
                    <td align="center"><?php echo e($item->product->product_name); ?></td>

                    <?php if($item->color == null): ?>
                        <td align="center"> ...</td>
                    <?php else: ?>
                        <td align="center"> <?php echo e($item->color); ?></td>
                    <?php endif; ?>


                    <td align="center"><?php echo e($item->product->product_code); ?></td>
                    <td align="center"><?php echo e($item->qty); ?></td>



                    <td align="center"><?php echo e($item->price); ?> BDT</td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <br>
    <table width="100%" style=" padding:0 10px 0 10px;">
        <tr>
            <td align="right">
                <h2><span style="color: green;">Subtotal:</span><?php echo e($order->amount - $order->shipping_cost); ?> BDT</h2>
                <h2><span style="color: green;">Shipping Charge:</span><?php echo e($order->shipping_cost); ?> BDT</h2>
                <h2><span style="color: green;">Total:</span> <?php echo e($order->amount); ?> BDT</h2>
                
            </td>
        </tr>
    </table>
    <div class="thanks mt-5">
        <p>Thanks For Buying Products..!!</p>
    </div>
    <div class="authority float-right mt-5">
        <p>-----------------------------------</p>
        <h5>Authority Signature:</h5>
    </div>
</body>

</html>
<?php /**PATH F:\XAMPP\htdocs\President\resources\views/backend/orders/admin_order_invoice.blade.php ENDPATH**/ ?>