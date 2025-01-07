<?php
session_start();
include("koneksi.php"); // Pastikan koneksi database sudah ada

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $newPassword = trim($_POST['new_password']);

    // Cek apakah email ada di database
    $query = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $query->bind_param("s", $email);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        // Hash password baru
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update password di database
        $updateQuery = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
        $updateQuery->bind_param("ss", $hashedPassword, $email);

        if ($updateQuery->execute()) {
            $_SESSION['success'] = "Password has been updated successfully.";
        } else {
            $_SESSION['error'] = "Failed to update password. Please try again.";
        }
    } else {
        $_SESSION['error'] = "Email not found.";
    }

    // Redirect ke halaman login
    header("Location: login.php");
    exit;
}
?>