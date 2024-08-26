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

        img {
            width: 100%;
            border-radius: 8px;
        }

        h2 {
            text-align: center
        }

        .unsubscribe-btn {
            color: red;
            cursor: pointer;
            font-size: 12px;
        }
    </style>
</head>

<body>

    <div class="container">
        <a href="{{ route('home') }}">
            <img src="{{ asset($global_setting_data->logo) }}" alt="logo" style="width: 100px;margin-bottom: 20px;">
        </a>
        <img src="{{ asset($data->photo) }}" alt="Blog Photo">
        <p>{!! $body !!}</p>

        Thanks,<br>
        {{ config('app.name') }}
        <br>
        <a class="unsubscribe-btn" href="{{ route('unsubscribe',$subscriber_eamil) }}">Unsubscribe</a>
    </div>

</body>

</html>
