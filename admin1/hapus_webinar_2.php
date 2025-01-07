<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "webmi");

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Cek apakah parameter 'id' ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data
    $query = $koneksi->query("DELETE FROM webinar_2 WHERE id = '$id'");

    if ($query) {
        echo "<div class='alert alert-info'>Data berhasil dihapus.</div>";
        echo "<script> location='index.php?hal=webinar_2'; </script>"; // Redirect ke halaman webinar_2
    } else {
        echo "<div class='alert alert-danger'>Gagal menghapus data.</div>";
    }
} else {
    echo "<div class='alert alert-danger'>ID tidak ditemukan.</div>";
}
?>