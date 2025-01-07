<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "webmi");

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

if (isset($_POST['tambah'])) {
    // Ambil data dari formulir
    $judul = htmlspecialchars($_POST['judul']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);
    $tanggal = htmlspecialchars($_POST['tanggal']);
    $waktu = htmlspecialchars($_POST['waktu']);
    $tempat = htmlspecialchars($_POST['tempat']);
    $link_pendaftaran = htmlspecialchars($_POST['link_pendaftaran']);
    $htm = htmlspecialchars($_POST['htm']);
    $metode_pembayaran = htmlspecialchars($_POST['metode_pembayaran']);
    $detail_akun = htmlspecialchars($_POST['detail_akun']);

    // Proses upload gambar
    $gambar_poster = $_FILES['gambar_poster']['name'];
    $tmp = $_FILES['gambar_poster']['tmp_name'];
    if (move_uploaded_file($tmp, "../uploads/" . $gambar_poster)) {
        // Query untuk menambahkan data
        $query = $koneksi->query("INSERT INTO webinar_2 (judul, deskripsi, tanggal, waktu, tempat, link_pendaftaran, htm, metode_pembayaran, detail_akun, gambar_poster) VALUES ('$judul', '$deskripsi', '$tanggal', '$waktu', '$tempat', '$link_pendaftaran', '$htm', '$metode_pembayaran', '$detail_akun', '$gambar_poster')");

        if ($query) {
            echo "<div class='alert alert-info'>Data berhasil ditambahkan.</div>";
            echo "<script> location='index.php?hal=webinar_2'; </script>"; // Redirect ke halaman galeri
        } else {
            echo "<div class='alert alert-danger'>Gagal menambahkan data ke database.</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Gagal mengunggah gambar.</div>";
    }
}
?>

<div class="container-fluid">
    <h2 class="text-center">Tambah Data Webinar</h2>
    <form method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="form-group">
            <label class="control-label col-sm-2">Judul Webinar</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="judul" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Deskripsi</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="deskripsi" required></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Tanggal</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="tanggal" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Waktu</label>
            <div class="col-sm-10">
                <input type="time" class="form-control" name="waktu" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Tempat</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="tempat" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Link Pendaftaran</label>
            <div class="col-sm-10">
                <input type="url" class="form-control" name="link_pendaftaran" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">HTM</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="htm" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Metode Pembayaran</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="metode_pembayaran" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Detail Akun</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="detail_akun" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Gambar Poster</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" name="gambar_poster" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button class="btn btn-primary" name="tambah">Tambah</button>
            </div>
        </div>
    </form>
</div>