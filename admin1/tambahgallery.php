<?php
$koneksi = new mysqli("localhost", "root", "", "webmi");

if ($koneksi->connect_error) {
	die("Connection failed: " . $koneksi->connect_error);
}
?>

<h2>Tambah Galeri</h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>ID</label>
		<input type="number" class="form-control" name="id" required>
	</div>
	<div class="form-group">
		<label>Nama File</label>
		<input type="text" class="form-control" name="file_name" required>
	</div>
	<div class="form-group">
		<label>Keterangan</label>
		<input type="text" class="form-control" name="caption" required>
	</div>
	<div class="form-group">
		<label>Tanggal Unggah</label>
		<input type="date" class="form-control" name="uploaded_on" required>
	</div>
	<div class="form-group">
		<label>Foto</label>
		<input type="file" class="form-control" name="foto" required>
	</div>
	<div class="form-group">
		<label>Tahun Galeri</label>
		<select class="form-control" name="year" required>
			<option value="2022">2022</option>
			<option value="2023">2023</option>
			<option value="2024">2024</option>
		</select>
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
</form>

<?php
if (isset($_POST['save'])) {
	$id = $_POST['id'];
	$file_name = $_POST['file_name'];
	$caption = $_POST['caption'];
	$uploaded_on = $_POST['uploaded_on'];
	$nama_foto = $_FILES['foto']['name'];
	$lokasi_foto = $_FILES['foto']['tmp_name'];
	$year = $_POST['year']; // Tahun galeri yang dipilih

	// Cek apakah ID sudah ada di tahun yang dipilih
	$result = $koneksi->query("SELECT id FROM gallery$year WHERE id = '$id'");
	if ($result->num_rows > 0) {
		echo "<div class='alert alert-danger'>ID sudah digunakan di galeri $year. Gunakan ID lain.</div>";
	} else {
		// Validasi upload file
		$allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
		$file_extension = strtolower(pathinfo($nama_foto, PATHINFO_EXTENSION));
		$max_file_size = 5 * 1024 * 1024; // 5 MB

		if (!in_array($file_extension, $allowed_extensions)) {
			echo "<div class='alert alert-danger'>Format file tidak diizinkan. Gunakan file JPG, JPEG, PNG, atau GIF.</div>";
		} elseif ($_FILES['foto']['size'] > $max_file_size) {
			echo "<div class='alert alert-danger'>Ukuran file terlalu besar. Maksimal 5MB.</div>";
		} else {
			// Pindahkan file ke folder uploads
			if (move_uploaded_file($lokasi_foto, "../uploads/" . $nama_foto)) {
				// Insert data ke tabel galeri sesuai tahun yang dipilih
				$query = $koneksi->query("INSERT INTO gallery$year (id, file_name, caption, uploaded_on) 
				VALUES('$id', '$nama_foto', '$caption', '$uploaded_on')");

				if ($query) {
					echo "<div class='alert alert-info'>Data berhasil disimpan ke galeri $year.</div>";
					echo "<meta http-equiv='refresh' content='1;url=index.php?hal=gallery$year'>"; // Redirect ke halaman galeri
				} else {
					echo "<div class='alert alert-danger'>Gagal menyimpan data ke database.</div>";
				}
			} else {
				echo "<div class='alert alert-danger'>Gagal mengunggah foto.</div>";
			}
		}
	}
}
?>