<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Email Subject</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        p {
            color: #555;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            background-color: #007BFF;
            color: #ffffff;
            border-radius: 5px;
        }

        .footer {
            margin-top: 20px;
            color: #777;
        }
    </style>
</head>

<body>

    <div class="container">
        <a href="<?php echo e(route('home')); ?>">
            <img src="<?php echo e(asset($global_setting_data->logo)); ?>" alt="logo" style="width: 100px;margin-bottom: 20px;">
        </a>

        <p>Hello <?php echo e($global_setting_data->title); ?>,</p>

        <p><?php echo e($data['body']); ?></p>
        <p class="footer">Best regards,<br>
            <?php echo e($data['name']); ?><br>
            <?php echo e($data['phone']); ?><br>
            <?php echo e($data['email']); ?><br>
        </p>

        Thanks,<br>
        <?php echo e(config('app.name')); ?>

    </div>

</body>

</html>
<?php /**PATH E:\EIT2024\BagsLaravelWebsites\PresidentWebsite - size variant\resources\views/mail/contact_email.blade.php ENDPATH**/ ?>