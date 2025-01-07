<?php
session_start();
$koneksi = new mysqli("localhost", "root", "", "webmi");

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Cek apakah parameter 'id' ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $action = $_GET['action']; // 'approve' atau 'reject'

    // Update status di webinar_2
    $status = ($action === 'approve') ? 'approved' : 'rejected';
    $updateWebinar2 = $koneksi->query("UPDATE webinar_2 SET status='$status' WHERE id='$id'");

    // Update status di webinar_1 (asumsi ada kolom status di tabel ini)
    $updateWebinar1 = $koneksi->query("UPDATE webinar_1 SET status='$status' WHERE id='$id'");

    // Cek apakah query berhasil
    if ($updateWebinar2 && $updateWebinar1) {
        $_SESSION['message'] = "Data berhasil " . ($action == 'approve' ? "disetujui." : "ditolak.");
    } else {
        $_SESSION['message'] = "Gagal mengubah status data.";
    }
} else {
    $_SESSION['message'] = "ID tidak ditemukan.";
}

// Tutup koneksi hanya sekali
$koneksi->close();

// Redirect kembali ke halaman admin
header("Location: index.php?hal=webinar_1");
exit();
?>