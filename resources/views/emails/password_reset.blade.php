<!DOCTYPE html>
<html>
<head>
    <title>Password Reset</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            line-height: 1.6;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background: #f9f9f9;
        }
        h1 {
            color: #007bff;
        }
        .button {
            display: inline-block;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <p>Hello Dear,</p>
        <p>Your password has been successfully reset. Here is your new password:</p>
        <p><h5>{{ $password }}</h5></p>
        <p>Please log in and change your password as soon as possible to ensure your account’s security.</p>
        <p>Thank you,<br>99CodeHub<br>Conatct No: 80536-15639</p>
    </div>
</body>
</html>
