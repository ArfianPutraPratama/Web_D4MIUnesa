<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "webmi");

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Query untuk mengambil data pengguna
$query = "SELECT id, first_name, last_name, email, password, created_at FROM users";
$ambil = $koneksi->query($query);

// Cek apakah ada data
if ($ambil->num_rows > 0) {
    echo '<h2 style="color: red;">Data Pengguna</h2>';
    echo '<div style="text-align: right; margin-bottom: 20px;">
            <a href="index.php?hal=tambahuser&id=" class="btn btn-primary">Tambah Data</a>
          </div>';

    echo '<table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Depan</th>
                    <th>Nama Belakang</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>';

    $nomor = 1;
    while ($pecah = $ambil->fetch_assoc()) {
        echo '<tr>
                <td>' . $nomor . '</td>
                <td>' . htmlspecialchars($pecah['first_name']) . '</td>
                <td>' . htmlspecialchars($pecah['last_name']) . '</td>
                <td>' . htmlspecialchars($pecah['email']) . '</td>
                <td>' . htmlspecialchars($pecah['password']) . '</td>
                
                <td>
                    <a href="index.php?hal=ubahuser&id=' . $pecah['id'] . '" class="btn-warning btn">Ubah</a>
                    <a href="#" class="btn-danger btn" onclick="confirmDelete(' . $pecah['id'] . ')">Hapus</a>
                </td>
            </tr>';
        $nomor++;
    }

    echo '</tbody></table>';
} else {
    echo '<p>Tidak ada data pengguna yang tersedia.</p>';
}

$koneksi->close();
?>

<script>
    function confirmDelete(id) {
        if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
            window.location.href = "index.php?hal=hapususer&id=" + id;
        }
    }
</script>