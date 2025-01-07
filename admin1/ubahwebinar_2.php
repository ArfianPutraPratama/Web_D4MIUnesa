<?php

// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "webmi");

// Cek apakah parameter 'id' ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data berdasarkan ID
    $query = $koneksi->query("SELECT * FROM webinar_2 WHERE id = '$id'");
    $pecah = $query->fetch_assoc();
} else {
    die("ID tidak ditemukan.");
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-9">
            <h2 class="text-center">Ubah Data Webinar</h2>

            <!-- Formulir untuk mengubah data -->
            <form method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="form-group">
                    <label class="control-label col-sm-2">Judul Webinar</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="judul" value="<?php echo $pecah['judul']; ?>"
                            required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="deskripsi"
                            required><?php echo $pecah['deskripsi']; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Tanggal</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="tanggal" value="<?php echo $pecah['tanggal']; ?>"
                            required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Waktu</label>
                    <div class="col-sm-10">
                        <input type="time" class="form-control" name="waktu" value="<?php echo $pecah['waktu']; ?>"
                            required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Tempat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tempat" value="<?php echo $pecah['tempat']; ?>"
                            required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Link Pendaftaran</label>
                    <div class="col-sm-10">
                        <input type="url" class="form-control" name="link_pendaftaran"
                            value="<?php echo $pecah['link_pendaftaran']; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">HTM</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="htm" value="<?php echo $pecah['htm']; ?>"
                            required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Metode Pembayaran</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="metode_pembayaran"
                            value="<?php echo $pecah['metode_pembayaran']; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Detail Akun</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="detail_akun"
                            value="<?php echo $pecah['detail_akun']; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Gambar Poster</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="gambar_poster" id="gambar_poster"
                            onchange="previewImage(event)">
                        <div class="image-container"
                            style="margin-top: 10px; border: 1px solid #ccc; padding: 10px; border-radius: 5px; display: inline-block;">
                            <img id="preview"
                                src="../uploads/<?php echo basename(htmlspecialchars($pecah['gambar_poster'])); ?>"
                                alt="Poster" style="width: 30%; height: auto; border-radius: 5px;">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button class="btn btn-primary" name="ubah">Ubah</button>
                    </div>
                </div>
            </form>

            <script>
                function previewImage(event) {
                    const preview = document.getElementById('preview');
                    const file = event.target.files[0];
                    const reader = new FileReader();

                    reader.onload = function () {
                        preview.src = reader.result;
                    }

                    if (file) {
                        reader.readAsDataURL(file);
                    } else {
                        preview.src = ''; // Reset if no file is selected
                    }
                }
            </script>

            <?php
            if (isset($_POST['ubah'])) {
                // Ambil data yang diinputkan
                $judul = htmlspecialchars($_POST['judul']);
                $deskripsi = htmlspecialchars($_POST['deskripsi']);
                $tanggal = htmlspecialchars($_POST['tanggal']);
                $waktu = htmlspecialchars($_POST['waktu']);
                $tempat = htmlspecialchars($_POST['tempat']);
                $link_pendaftaran = htmlspecialchars($_POST['link_pendaftaran']);
                $htm = htmlspecialchars($_POST['htm']);
                $metode_pembayaran = htmlspecialchars($_POST['metode_pembayaran']);
                $detail_akun = htmlspecialchars($_POST['detail_akun']);
                $id = $pecah['id']; // ID yang sama
            
                // Proses upload gambar jika ada
                if ($_FILES['gambar_poster']['name']) {
                    $gambar_poster = $_FILES['gambar_poster']['name'];
                    $tmp = $_FILES['gambar_poster']['tmp_name'];
                    if (move_uploaded_file($tmp, "../uploads/" . $gambar_poster)) {
                        $query = $koneksi->query("UPDATE webinar_2 SET judul='$judul', deskripsi='$deskripsi', tanggal='$tanggal', waktu='$waktu', tempat='$tempat', link_pendaftaran='$link_pendaftaran', htm='$htm', metode_pembayaran='$metode_pembayaran', detail_akun='$detail_akun', gambar_poster='$gambar_poster' WHERE id='$id'");
                    } else {
                        echo "<div class='alert alert-danger'>Gagal mengunggah gambar.</div>";
                    }
                } else {
                    // Jika tidak ada gambar baru, update tanpa gambar
                    $query = $koneksi->query("UPDATE webinar_2 SET judul='$judul', deskripsi='$deskripsi', tanggal='$tanggal', waktu='$waktu', tempat='$tempat', link_pendaftaran='$link_pendaftaran', htm='$htm', metode_pembayaran='$metode_pembayaran', detail_akun='$detail_akun' WHERE id='$id'");
                }

                if ($query) {
                    echo "<div class='alert alert-info'>Data Terubah</div>";
                    echo "<script> location='index.php?hal=webinar_2'; </script>"; // Redirect ke halaman galeri
                } else {
                    echo "<div class='alert alert-danger'>Gagal mengubah data ke database.</div>";
                }
            }
            ?>
        </div>
    </div>
</div>