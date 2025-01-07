<div class="container-fluid">
	<h2>Edit Foto</h2>

	<?php
	// Koneksi ke database
	$koneksi = new mysqli("localhost", "root", "", "webmi");
	if ($koneksi->connect_error) {
		die("Connection failed: " . $koneksi->connect_error);
	}

	// Cek apakah parameter 'id' dan 'year' ada di URL
	if (isset($_GET['id']) && isset($_GET['year'])) {
		$id = $_GET['id'];
		$year = $_GET['year'];

		// Tentukan nama tabel berdasarkan tahun
		$table_name = "gallery" . $year;

		// Ambil data dari tabel yang sesuai
		$query = $koneksi->query("SELECT * FROM $table_name WHERE id='$id'");

		// Cek apakah data ditemukan
		if ($query->num_rows == 0) {
			echo "<div class='alert alert-danger'>Data tidak ditemukan.</div>";
			exit;
		}

		$pecah = $query->fetch_assoc();
	} else {
		die("ID atau Tahun tidak ditemukan.");
	}
	?>

	<form method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label>ID</label>
			<input type="number" class="form-control" name="id" value="<?php echo $pecah['id']; ?>" readonly>
		</div>
		<div class="form-group">
			<label>Nama File</label>
			<input type="text" class="form-control" name="file_name"
				value="<?php echo htmlspecialchars($pecah['file_name']); ?>" required>
		</div>
		<div class="form-group">
			<label>Foto Saat Ini</label>
			<div>
				<img src="../uploads/<?php echo basename(htmlspecialchars($pecah['file_name'])); ?>" alt="Foto"
					style="width:100px; height:auto;">
			</div>
		</div>
		<div class="form-group">
			<label>Ganti Foto</label>
			<input type="file" class="form-control" name="new_file">
		</div>
		<div class="form-group">
			<label>Keterangan</label>
			<input type="text" class="form-control" name="caption" value="<?php echo $pecah['caption']; ?>" required>
		</div>
		<div class="form-group">
			<label>Tanggal Unggah</label>
			<input type="datetime-local" class="form-control" name="uploaded_on"
				value="<?php echo date('Y-m-d\TH:i', strtotime($pecah['uploaded_on'])); ?>" required>
		</div>

		<button class="btn btn-primary" name="ubah">Ubah</button>
	</form>

	<?php
	if (isset($_POST['ubah'])) {
		$file_name = htmlspecialchars($_POST['file_name']);
		$caption = htmlspecialchars($_POST['caption']);
		$uploaded_on = $_POST['uploaded_on'];

		// Proses upload gambar jika ada
		if ($_FILES['new_file']['name']) {
			$new_file = $_FILES['new_file']['name'];
			$tmp = $_FILES['new_file']['tmp_name'];
			move_uploaded_file($tmp, "../uploads/" . $new_file);

			// Update database dengan file baru
			$query = $koneksi->query("UPDATE $table_name SET file_name='$new_file', caption='$caption', uploaded_on='$uploaded_on' WHERE id='$id'");
		} else {
			// Jika tidak ada gambar baru, update tanpa mengganti file
			$query = $koneksi->query("UPDATE $table_name SET file_name='$file_name', caption='$caption', uploaded_on='$uploaded_on' WHERE id='$id'");
		}

		if ($query) {
			echo "<div class='alert alert-info'>Data Terubah</div>";
			echo "<script> location='index.php?hal=gallery$year'; </script>"; // Redirect ke halaman galeri
		} else {
			echo "<div class='alert alert-danger'>Gagal mengubah data ke database.</div>";
		}
	}
	?>