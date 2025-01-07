<?php
session_start();

// Sertakan koneksi database
include("koneksi.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validasi input kosong
    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "Email dan password wajib diisi!";
        header("Location: login.php");
        exit();
    }

    // Ambil data pengguna dari database
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Simpan data user di sesi
            $_SESSION['user'] = $user['email']; // Simpan email sebagai indikator login
            $_SESSION['success'] = "Login berhasil!";
            header("Location: index.php"); // Redirect ke halaman utama
            exit();
        } else {
            $_SESSION['error'] = "Password salah!";
        }
    } else {
        $_SESSION['error'] = "Akun tidak ditemukan!";
    }

    header("Location: login.php");
    exit();
}
?>
