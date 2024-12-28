<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Box icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- css -->
    <link rel="stylesheet" href="css/login.css">
    <style>
    body{
        background-image: url("../images/asrama.jpg");
    }

    </style>

</head>

<body style="margin: 0">
    <img src="images/logo.png">
    <div class="container">
        <div class="login-box">
            <p>Selamat datang! 👋</p>
            <h3>Login sebagai helpdesk</h3>
            @if(session()->has('loginError'))
                <h4>{{ session('loginError') }}</h4>
            @endif
            <form action="/login" method="POST">
                @csrf
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username">
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password">
                </div>
                <button type="submit" class="login-btn">LOGIN</button>
            </form>
        </div>
    </div>
</body>

</html>