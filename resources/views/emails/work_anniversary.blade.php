<!DOCTYPE html>
<html>
<head>
    <title>Happy Work Anniversary!</title>
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
    <div class="container">
        <div class="content-box">
            <div class="header">🎉 Happy Work Anniversary! 🎉</div>

            <img src="https://ronakoptik.com/assets/img/Ronak%20Logo.png" class="logo" alt="Company Logo">

            <h2>Dear {{ $employee->name }},</h2>
            <p><span style="font-size: 22px; font-weight: bold;">Congratulations</span> on completing another fantastic year with <strong>Ronak Optik India</strong>! 🎊</p>

            <div class="years">
                🎯 🎯 You've completed <strong>{{ $years }}</strong> amazing {{ $years == 1 ? 'year' : 'years' }}!
            </div>

            <p>We truly appreciate your dedication, hard work, and contributions to our team. Your efforts help us grow and succeed every day.</p>
            <p>Thank you for being a valuable part of our organization. Wishing you continued success in the years ahead!</p>

            <!-- <div class="footer" style="text-align: left;">
                <p>Best Regards,</p>
                <p><strong>Ronak Optik</strong></p>
            </div> -->
        </div>
    </div>
</body>
</html>
