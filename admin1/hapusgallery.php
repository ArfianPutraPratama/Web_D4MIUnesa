<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "webmi");

if (isset($_GET['id']) && isset($_GET['year'])) {
	$id = $_GET['id'];
	$year = $_GET['year'];

	// Tentukan tabel berdasarkan tahun
	$table = "";
	if ($year == "2022") {
		$table = "gallery2022";
	} elseif ($year == "2023") {
		$table = "gallery2023";
	} elseif ($year == "2024") {
		$table = "gallery2024";
	} else {
		echo "<script> alert('Tahun tidak valid!'); </script>";
		echo "<script> location='index.php?hal=gallery'; </script>";
		exit;
	}

	// Hapus data dari tabel yang sesuai
	$query = $koneksi->prepare("DELETE FROM $table WHERE id = ?");
	$query->bind_param("i", $id);

	if ($query->execute()) {
		echo "<script> alert('Data berhasil dihapus'); </script>";
		echo "<script> location='index.php?hal=gallery$year'; </script>"; // Redirect ke halaman galeri yang sesuai
	} else {
		echo "<script> alert('Gagal menghapus data.'); </script>";
		echo "<script> location='index.php?hal=gallery$year'; </script>";
	}
} else {
	echo "<script> alert('ID atau Tahun tidak ditemukan!'); </script>";
	echo "<script> location='index.php?hal=gallery'; </script>";
}
?>