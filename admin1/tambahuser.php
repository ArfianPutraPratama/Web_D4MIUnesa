<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "webmi");

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Proses penambahan data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query untuk menambahkan data pengguna
    $insert_query = "INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)";
    $insert_stmt = $koneksi->prepare($insert_query);
    $insert_stmt->bind_param("ssss", $first_name, $last_name, $email, $password);
    $insert_stmt->execute();

    // Notifikasi dan pengalihan
    if ($insert_stmt->affected_rows > 0) {
        echo "<script>
                alert('Data berhasil ditambahkan.');
                window.location.href='index.php?hal=user';
              </script>";
        exit;
    } else {
        echo "Gagal menambahkan data.";
    }
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-9">
            <h2 class="text-center">Tambah Data Pengguna</h2>
            <form method="post" class="form-horizontal">
                <div class="form-group">
                    <label class="control-label col-sm-2">Nama Depan:</label>
                    <div class="col-sm-10">
                        <input type="text" name="first_name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Nama Belakang:</label>
                    <div class="col-sm-10">
                        <input type="text" name="last_name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Password:</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button class="btn btn-primary" name="submit">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>