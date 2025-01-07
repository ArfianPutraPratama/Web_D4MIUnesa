<?php
include 'koneksi.php';

$id = $_POST['id'];
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$tanggal = $_POST['tanggal'];
$waktu = $_POST['waktu'];
$tempat = $_POST['tempat'];
$link_pendaftaran = $_POST['link_pendaftaran'];
$htm = $_POST['htm'];
$metode_pembayaran = $_POST['metode_pembayaran'];
$detail_akun = $_POST['detail_akun'];

// Proses upload gambar jika ada
if ($_FILES['gambar_poster']['name']) {
    $gambar_poster = $_FILES['gambar_poster']['name'];
    $tmp = $_FILES['gambar_poster']['tmp_name'];
    move_uploaded_file($tmp, "../uploads/" . $gambar_poster);
    $query = $koneksi->query("UPDATE webinar_2 SET judul='$judul', deskripsi='$deskripsi', tanggal='$tanggal', waktu='$waktu', tempat='$tempat', link_pendaftaran='$link_pendaftaran', htm='$htm', metode_pembayaran='$metode_pembayaran', detail_akun='$detail_akun', gambar_poster='$gambar_poster' WHERE id='$id'");
} else {
    // Jika tidak ada gambar baru, tetap gunakan gambar lama
    $query = $koneksi->query("UPDATE webinar_2 SET judul='$judul', deskripsi='$deskripsi', tanggal='$tanggal', waktu='$waktu', tempat='$tempat', link_pendaftaran='$link_pendaftaran', htm='$htm', metode_pembayaran='$metode_pembayaran', detail_akun='$detail_akun' WHERE id='$id'");
}

if ($query) {
    echo "<script>alert('Data berhasil diubah'); location='admin1/webinar_2.php';</script>";
} else {
    echo "<script>alert('Data gagal diubah'); location='admin1/webinar_2.php';</script>";
}
?>