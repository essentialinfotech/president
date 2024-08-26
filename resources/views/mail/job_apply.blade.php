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
    </style>
</head>

<body>
    <div class="container">
        <p>
            Name: {{ $data['name'] }}<br>
            Phone: {{ $data['phone'] }}<br>
            Email: {{ $data['email'] }}<br>
            Gender: {{ $data['gender'] }}<br>
            Before Company: {{ $data['before_company'] }}<br>
            Join: {{ $data['join_days'] }}<br>
        </p>
        <p>Cover Letter:</p>
        <p>{{ $data['cover_letter'] }}</p>

        Thanks,<br>
        {{ config('app.name') }}
    </div>

</body>

</html>
