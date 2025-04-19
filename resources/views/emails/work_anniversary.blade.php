<!DOCTYPE html>
<html>
<head>
    <title>{{ $subject }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background-image: url('https://t4.ftcdn.net/jpg/01/81/05/01/360_F_181050160_rbvKnFgosJzvbrMvtvKMKRXZbWS2Ljd2.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        .content-box {
            background-color: rgba(255, 255, 255, 0.767); /* More transparent */
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        .header {
            background: #01050ae4;
            color: white;
            padding: 15px;
            font-size: 26px;
            font-weight: bold;
            border-radius: 8px;
        }

        .logo {
            max-width: 160px;
            margin: 15px auto;
        }

        .years {
            font-size: 22px;
            color: #ff5722;
            margin-top: 15px;
            font-weight: bold;
        }

        .button {
            display: inline-block;
            padding: 12px 24px;
            margin-top: 25px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            font-size: 16px;
        }

        .footer {
            margin-top: 30px;
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>
    {!! $body !!}
</body>
</html>



