<?php
session_start();
include('koneksi.php');

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Login/Logout</title>
    <link rel="stylesheet" href="CSS/navbar.css"> <!-- Link ke file CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <header class="navbar">
        <div class="navbar-container">
            <!-- Logo -->
            <a href="#" class="navbar-logo">
                <img src="img/logo.png" alt="Logo">
            </a>

            <!-- Navigation Links -->
            <nav class="navbar-menu">
                <ul>
                    <li><a href="#slide">Home</a></li>
                    <li><a href="#tentang-kami">About</a></li>
                    <li><a href="#galeri-event">Gallery</a></li>
                    <li><a href="#container">News</a></li>
                </ul>
            </nav>

            <!-- Tombol Login/Logout -->
            <div class="button-container">
                <?php if (isset($_SESSION['user'])): ?>
                    <!-- Jika sudah login -->
                    <a href="logout.php" class="transparent-button-white">Logout</a>
                <?php else: ?>
                    <!-- Jika belum login -->
                    <a href="login.php" class="transparent-button-white">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </header>