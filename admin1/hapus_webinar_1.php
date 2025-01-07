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
    // Debug: Tampilkan ID
    echo "ID yang akan dihapus: " . htmlspecialchars($id);

    // Hapus data dari tabel webinar_1
    $query = $koneksi->query("DELETE FROM webinar_1 WHERE id = '$id'");

    if ($query) {
        $_SESSION['message'] = "Data berhasil dihapus.";
    } else {
        $_SESSION['message'] = "Gagal menghapus data: " . $koneksi->error;
    }
} else {
    $_SESSION['message'] = "ID tidak ditemukan.";
}

// Redirect kembali ke halaman webinar_1
header("Location: index.php?hal=webinar_1");
exit();
?>