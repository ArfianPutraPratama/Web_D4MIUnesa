<?php
session_start();
$message = "";

// Ambil pesan error/sukses dari sesi
if (isset($_SESSION['error'])) {
    $message = "<div class='alert alert-danger'>{$_SESSION['error']}</div>";
    unset($_SESSION['error']);
} elseif (isset($_SESSION['success'])) {
    $message = "<div class='alert alert-success'>{$_SESSION['success']}</div>";
    unset($_SESSION['success']);
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="CSS/forgot-password.css"> <!-- Pastikan path ini benar -->
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
        <h2>Forgot Your Password?</h2>
        <?= $message; ?> <!-- Tampilkan pesan error/sukses -->

        <form action="proses_forgot_password.php" method="POST">
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="new_password" placeholder="New Password" required>
            <button type="submit" class="btn">Send Reset Link</button>
        </form>

        <div class="links">
            <a href="login.php">Back to Login</a>
        </div>
    </div>
</body>

</html>