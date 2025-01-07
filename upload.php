<?php
session_start();
include('koneksi.php');

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Proses upload
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $caption = htmlspecialchars($_POST['caption']);
    $year = intval($_POST['year']); // Ambil tahun dari form
    $targetDir = "uploads/"; // Folder tempat menyimpan gambar
    $fileName = basename($_FILES["photo"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    // Cek apakah direktori uploads ada, jika tidak buat
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true); // Buat direktori dengan izin 0755
    }

    // Validasi tipe file
    $allowedTypes = array("jpg", "jpeg", "png", "gif");
    if (in_array($fileType, $allowedTypes)) {
        // Pindahkan file ke folder tujuan
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFilePath)) {
            // Tentukan nama tabel berdasarkan tahun
            $tableName = "gallery" . $year;

            // Simpan informasi gambar ke database
            $sql = "INSERT INTO $tableName (file_name, caption) VALUES ('$fileName', '$caption')";
            if ($conn->query($sql) === TRUE) {
                echo "Image uploaded successfully.";
                header("Location: galery $year.php"); // Redirect ke galeri tahun yang sesuai
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Failed to upload image.";
        }
    } else {
        echo "Only JPG, JPEG, PNG, & GIF files are allowed.";
    }
}

$conn->close();
?>
