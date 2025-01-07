<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "webmi");

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Ambil ID dari URL
$id = $_GET['id'];

// Query untuk mengambil data pengguna berdasarkan ID
$query = "SELECT * FROM users WHERE id = ?";
$stmt = $koneksi->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    echo "Pengguna tidak ditemukan.";
    exit;
}

// Proses pengeditan data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Update data pengguna
    $update_query = "UPDATE users SET first_name = ?, last_name = ?, email = ?, password = ? WHERE id = ?";
    $update_stmt = $koneksi->prepare($update_query);
    $update_stmt->bind_param("ssssi", $first_name, $last_name, $email, $password, $id);
    $update_stmt->execute();

    // Notifikasi dan pengalihan
    echo "<script>
            alert('Data berhasil diperbarui.');
            window.location.href='index.php?hal=user';
          </script>";
    exit;
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-9">
            <h2>Edit Data Pengguna</h2>
            <form method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="form-group">
                    <label class="control-label col-sm-2">Nama Depan:</label>
                    <div class="col-sm-10">
                        <input type="text" name="first_name"
                            value="<?php echo htmlspecialchars($user['first_name']); ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Nama Belakang:</label>
                    <div class="col-sm-10">
                        <input type="text" name="last_name" value="<?php echo htmlspecialchars($user['last_name']); ?>"
                            required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>"
                            required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Password:</label>
                    <div class="col-sm-10">
                        <input type="password" name="password"
                            value="<?php echo htmlspecialchars($user['password']); ?>" required>
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