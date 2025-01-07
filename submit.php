<?php
session_start();

$koneksi = new mysqli("localhost", "root", "", "webmi");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$name = $_POST['name'];
$wa = $_POST['wa'];
$title = $_POST['title'];
$description = $_POST['description'];
$date = $_POST['date'];
$time = $_POST['time'];
$platform = $_POST['platform'];
$registration_link = $_POST['registration_link'];
$price = $_POST['price'];
$payment_method = $_POST['payment_method'];
$account_details = $_POST['account_details'];

$proof_path = 'uploads/' . basename($_FILES['proof']['name']);
$poster_path = 'uploads/' . basename($_FILES['poster']['name']);

if (!file_exists('uploads')) {
    mkdir('uploads', 0777, true);
}

move_uploaded_file($_FILES['proof']['tmp_name'], $proof_path);
move_uploaded_file($_FILES['poster']['tmp_name'], $poster_path);

$created_at = date('Y-m-d H:i:s');
$status = 'pending';

// Cek apakah data sudah ada di seminar
$check_seminar = $koneksi->prepare("SELECT COUNT(*) FROM seminar WHERE name = ? AND title = ?");
$check_seminar->bind_param("ss", $name, $title);
$check_seminar->execute();
$check_seminar->bind_result($exists_seminar);
$check_seminar->fetch();
$check_seminar->close();

if ($exists_seminar == 0) {
    $stmt_seminar = $koneksi->prepare("INSERT INTO seminar (name, wa, proof, poster, title, description) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt_seminar->bind_param("ssssss", $name, $wa, $proof_path, $poster_path, $title, $description);
    $stmt_seminar->execute();
    $stmt_seminar->close();
}

// Cek apakah data sudah ada di webinar_1
$check_webinar_1 = $koneksi->prepare("SELECT COUNT(*) FROM webinar_1 WHERE name = ? AND title = ?");
$check_webinar_1->bind_param("ss", $name, $title);
$check_webinar_1->execute();
$check_webinar_1->bind_result($exists_webinar_1);
$check_webinar_1->fetch();
$check_webinar_1->close();

if ($exists_webinar_1 == 0) {
    $stmt_webinar_1 = $koneksi->prepare("INSERT INTO webinar_1 (name, wa, title, description, proof_path, poster_path) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt_webinar_1->bind_param("ssssss", $name, $wa, $title, $description, $proof_path, $poster_path);
    $stmt_webinar_1->execute();
    $stmt_webinar_1->close();
}

// Cek apakah data sudah ada di webinar_2
$check_webinar_2 = $koneksi->prepare("SELECT COUNT(*) FROM webinar_2 WHERE judul = ? AND tanggal = ? AND waktu = ?");
$check_webinar_2->bind_param("sss", $title, $date, $time);
$check_webinar_2->execute();
$check_webinar_2->bind_result($exists_webinar_2);
$check_webinar_2->fetch();
$check_webinar_2->close();

if ($exists_webinar_2 == 0) {
    $stmt_webinar_2 = $koneksi->prepare("INSERT INTO webinar_2 (judul, deskripsi, tanggal, waktu, tempat, link_pendaftaran, htm, metode_pembayaran, detail_akun, gambar_poster, status, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt_webinar_2->bind_param("ssssssssssss", $title, $description, $date, $time, $platform, $registration_link, $price, $payment_method, $account_details, $poster_path, $status, $created_at);
    $stmt_webinar_2->execute();
    $stmt_webinar_2->close();
}

// Simpan notifikasi di session
$_SESSION['notification'] = "Data masih dalam verifikasi.";

$_SESSION['last_entry'] = [
    'name' => $name,
    'wa' => $wa,
    'title' => $title,
    'description' => $description,
    'date' => $date,
    'time' => $time,
    'platform' => $platform,
    'registration_link' => $registration_link,
    'price' => $price,
    'payment_method' => $payment_method,
    'account_details' => $account_details,
    'proof_path' => $proof_path,
    'poster_path' => $poster_path,
];

header("Location: hot news.php");
exit();
?>