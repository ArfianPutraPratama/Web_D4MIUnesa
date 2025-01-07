<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "webmi");

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

if (isset($_POST['tambah'])) {
    // Ambil data dari formulir
    $name = htmlspecialchars($_POST['name']);
    $wa = htmlspecialchars($_POST['wa']);
    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);
    $proof_path = htmlspecialchars($_POST['proof_path']);
    $poster_path = $_FILES['poster_path']['name'];
    $tmp = $_FILES['poster_path']['tmp_name'];

    // Proses upload gambar
    if (move_uploaded_file($tmp, "../uploads/" . $poster_path)) {
        // Query untuk menambahkan data
        $query = $koneksi->query("INSERT INTO webinar_1 (name, wa, title, description, proof_path, poster_path) VALUES ('$name', '$wa', '$title', '$description', '$proof_path', '$poster_path')");

        if ($query) {
            echo "<div class='alert alert-info'>Data berhasil ditambahkan.</div>";
            echo "<script> location='index.php?hal=webinar_1'; </script>"; // Redirect ke halaman webinar_1
        } else {
            echo "<div class='alert alert-danger'>Gagal menambahkan data.</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Gagal mengunggah gambar.</div>";
    }
}
?>

<div class="container">
    <h2>Tambah Data Webinar</h2>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="form-group">
            <label>WA</label>
            <input type="text" class="form-control" name="wa" required>
        </div>
        <div class="form-group">
            <label>Judul</label>
            <input type="text" class="form-control" name="title" required>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea class="form-control" name="description" required></textarea>
        </div>
        <div class="form-group">
            <label>Path Bukti</label>
            <input type="text" class="form-control" name="proof_path" required>
        </div>
        <div class="form-group">
            <label>Path Poster</label>
            <input type="file" class="form-control" name="poster_path" required>
        </div>
        <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
    </form>
</div>