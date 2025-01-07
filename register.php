<?php
// Start session
session_start();

// Include database configuration
include("koneksi.php");

// Inisialisasi variabel untuk pesan notifikasi
$registerMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = trim($_POST['first_name']);
    $lastName = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $repeatPassword = trim($_POST['repeat_password']);

    // Check for empty fields
    if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($repeatPassword)) {
        $_SESSION['error'] = "All fields are required!";
        header("Location: register.php");
        exit;
    }

    // Check if passwords match
    if ($password !== $repeatPassword) {
        $_SESSION['error'] = "Passwords do not match!";
        header("Location: register.php");
        exit;
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into the database
    $sql = "INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $firstName, $lastName, $email, $hashedPassword);

    if ($stmt->execute()) {
        // Ambil data pengguna yang baru saja didaftarkan
        $user_id = $conn->insert_id; // Ambil ID pengguna yang baru saja ditambahkan
        $query = "SELECT first_name, last_name FROM users WHERE id = '$user_id'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            // Simpan data pengguna di sesi
            $_SESSION['user_id'] = $user_id;
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];
            $_SESSION['success'] = "Registration successful. Please log in.";
            header("Location: login.php");
            exit;
        }
    } else {
        $_SESSION['error'] = "Registration failed. Please try again.";
        header("Location: register.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <link rel="stylesheet" href="CSS/register.css">
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

        <h2>Create an Account!</h2>
        <form action="proses_register.php" method="POST">
            <input type="text" name="first_name" placeholder="First Name" required>
            <input type="text" name="last_name" placeholder="Last Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="repeat_password" placeholder="Repeat Password" required>
            <button type="submit" class="btn">Register Account</button>
        </form>
        <div class="links">
            <a href="forgot-password.php">Forgot Password?</a>
            <a href="login.php">Already have an account? Login!</a>
        </div>

    </div>

</body>

</html>