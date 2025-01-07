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

    // Ambil data berdasarkan ID
    $query = $koneksi->query("SELECT * FROM webinar_1 WHERE id = '$id'");
    if ($query && $query->num_rows > 0) {
        $pecah = $query->fetch_assoc();
    } else {
        die("Data tidak ditemukan.");
    }
} else {
    die("ID tidak ditemukan.");
}

if (isset($_POST['ubah'])) {
    // Ambil data dari formulir
    $name = htmlspecialchars($_POST['name'] ?? '');
    $wa = htmlspecialchars($_POST['wa'] ?? '');
    $title = htmlspecialchars($_POST['title'] ?? '');
    $description = htmlspecialchars($_POST['description'] ?? '');
    $proof_path = htmlspecialchars($pecah['proof_path'] ?? '');
    $poster_path = $_FILES['poster_path']['name'] ?? '';
    $tmp = $_FILES['poster_path']['tmp_name'] ?? '';

    // Proses upload gambar jika ada
    if (!empty($poster_path) && !empty($tmp)) {
        move_uploaded_file($tmp, "../uploads/" . $poster_path);
        $query = $koneksi->query("UPDATE webinar_1 SET name='$name', wa='$wa', title='$title', description='$description', proof_path='$proof_path', poster_path='$poster_path' WHERE id='$id'");
    } else {
        // Jika tidak ada gambar baru, tetap gunakan path gambar lama
        $query = $koneksi->query("UPDATE webinar_1 SET name='$name', wa='$wa', title='$title', description='$description', proof_path='$proof_path' WHERE id='$id'");
    }

    if ($query) {
        echo "<div class='alert alert-info'>Data berhasil diubah.</div>";
        echo "<script> location='index.php?hal=webinar_1'; </script>"; // Redirect ke halaman webinar_1
    } else {
        echo "<div class='alert alert-danger'>Gagal mengubah data.</div>";
    }
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-9">
            <h2 class="text-center">Ubah Data Webinar 2</h2>
            <!-- Formulir untuk mengubah data -->
            <form method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="form-group">
                    <label class="control-label col-sm-2">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name"
                            value="<?php echo htmlspecialchars($pecah['name']); ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">WA</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="wa"
                            value="<?php echo htmlspecialchars($pecah['wa']); ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title"
                            value="<?php echo htmlspecialchars($pecah['title']); ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="description"
                            required><?php echo htmlspecialchars($pecah['description']); ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="description"
                            required><?php echo htmlspecialchars($pecah['description']); ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Path Poster</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="poster_path" id="poster_path"
                            onchange="previewImage(event)">
                        <div class="image-container"
                            style="margin-top: 10px; border: 1px solid #ccc; padding: 10px; border-radius: 5px; display: inline-block;">
                            <img id="preview"
                                src="../uploads/<?php echo basename(htmlspecialchars($pecah['poster_path'])); ?>"
                                alt="Poster" style="width: 20%; height: auto; border-radius: 5px;">
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
        </div>
    </div>
</div>