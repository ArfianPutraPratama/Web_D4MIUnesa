<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "webmi");

// Cek koneksi
if ($koneksi->connect_error) {
  die("Koneksi gagal: " . $koneksi->connect_error);
}

// Ambil ID dari URL
$id = $_GET['id'];

// Query untuk menghapus data pengguna berdasarkan ID
$delete_query = "DELETE FROM users WHERE id = ?";
$stmt = $koneksi->prepare($delete_query);
$stmt->bind_param("i", $id);
$stmt->execute();

// Notifikasi dan pengalihan
if ($stmt->affected_rows > 0) {
  echo "<script>
            alert('Data berhasil dihapus.');
            window.location.href='index.php?hal=user';
          </script>";
} else {
  echo "<script>
            alert('Gagal menghapus data.');
            window.location.href='index.php?hal=user';
          </script>";
}

$stmt->close();
$koneksi->close();
?>