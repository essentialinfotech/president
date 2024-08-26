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
            text-align: center;
            color: #777;
        }
    </style>
</head>

<body>

    <div class="container">
        <a href="{{ route('home') }}">
            <img src="{{ asset($global_setting_data->logo) }}" alt="logo" style="width: 100px;margin-bottom: 20px;">
        </a>
        <h1>For {{ $data['service'] }}</h1>

        <p>Hello Essential-Infotech,</p>

        <p>{{ $data['body'] }}</p>
        <p class="footer">Best regards,<br>
            {{ $data['name'] }}<br>
            {{ $data['phone'] }}<br>
            {{ $data['email'] }}<br>
        </p>

        Thanks,<br>
        {{ config('app.name') }}
    </div>

</body>

</html>
