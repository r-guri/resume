<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 10px 0;
            background-color: #007bff;
            color: #ffffff;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 20px;
        }
        .content p {
            font-size: 16px;
            line-height: 1.6;
            color: #333;
        }
        .content .password {
            font-size: 18px;
            font-weight: bold;
            background-color: #f1f1f1;
            padding: 10px;
            text-align: center;
            border-radius: 8px;
            margin: 10px 0;
            color: #333;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #777;
            padding: 10px;
            border-top: 1px solid #f1f1f1;
        }
        .footer a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Password Reset Confirmation</h1>
        </div>
        <div class="content">
            <h2><b>Dear</b> {{$username}},</h2>
            <p>We are writing to inform you that your password for your account with the email address <strong>{{$email}}</strong> has been successfully reset.</p>
            
            <p>Your new password is:</p>
            <div class="password">{{ $password }}</p></div>
            
            <p>We kindly request you to log in using this new password and update it to something more memorable as soon as possible for security reasons.</p>
            
            <p>Thank you for choosing <strong>99codehub.cloud</strong></p>

            <p>Kind Regards,<br><b>Team 99CodeHub</b></p>
        </div>
        <div class="footer">
            <p>&copy; 2024 99CodeHub. All rights reserved.</p>
            <p><a href="https://www.99codehub.cloud/">Visit our website</a></p>
        </div>
    </div>
</body>
</html>


