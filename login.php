<?php
session_start();
$loginMessage = "";

// Ambil pesan error/sukses dari sesi
if (isset($_SESSION['error'])) {
    $loginMessage = "<div class='alert alert-danger'>{$_SESSION['error']}</div>";
    unset($_SESSION['error']);
} elseif (isset($_SESSION['success'])) {
    $loginMessage = "<div class='alert alert-success'>{$_SESSION['success']}</div>";
    unset($_SESSION['success']);
}
?>


<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="CSS/login.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: url('img/6666.png') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Welcome Back!</h2>
        <?= $loginMessage; ?> <!-- Tampilkan pesan error/sukses -->

        <form action="proses_login.php" method="POST">
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Password" required>
            <div class="form-group remember-me">
                <input type="checkbox" id="customCheck" class="custom-control-input"
                    onclick="togglePasswordVisibility()">
                <label for="customCheck">Remember Me</label>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>

        <div class="links">
            <a href="forgot-password.php">Forgot Password?</a>
            <div class="text-center">
                <a href="register.php">Create an Account!</a>
            </div>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.querySelector('input[name="password"]');
            if (passwordInput.type === "password") {
                passwordInput.type = "text"; // Ubah tipe menjadi text untuk menampilkan password
            } else {
                passwordInput.type = "password"; // Kembalikan tipe menjadi password untuk menyembunyikan
            }
        }
    </script>
</body>

</html>