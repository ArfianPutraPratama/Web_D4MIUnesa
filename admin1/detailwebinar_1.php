<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

$koneksi = new mysqli("localhost", "root", "", "webmi"); // Inisialisasi koneksi database

// Cek koneksi
if ($koneksi->connect_error) {
	die("Koneksi gagal: " . $koneksi->connect_error);
}

// mendapatkan id di url
$id_webinar = $_GET['id'];

// mengambil data dari tabel webinar_1
$ambil_webinar = $koneksi->query("SELECT * FROM webinar_1 WHERE id = '$id_webinar'");
$pecah_webinar = $ambil_webinar->fetch_assoc();
?>

<h2>Detail Webinar</h2>

<div class="row">
	<div class="col-md-6">
		<table class="table">
			<tr>
				<th>Nama</th>
				<td><?php echo htmlspecialchars($pecah_webinar['name'] ?? 'Tidak ada'); ?></td>
			</tr>
			<tr>
				<th>WA</th>
				<td><?php echo htmlspecialchars($pecah_webinar['wa'] ?? 'Tidak ada'); ?></td>
			</tr>
			<tr>
				<th>Judul Webinar</th>
				<td><?php echo htmlspecialchars($pecah_webinar['title']); ?></td>
			</tr>
			<tr>
				<th>Deskripsi</th>
				<td><?php echo htmlspecialchars($pecah_webinar['description']); ?></td>
			</tr>
			<tr>
				<th>Path Poster</th>
				<td>
					<img src="../uploads/<?php echo htmlspecialchars($pecah_webinar['poster_path']); ?>"
						class="img-responsive" style="width: 100px;" alt="Poster">
				</td>
			</tr>
			<tr>
				<th>Tanggal Dibuat</th>
				<td><?php echo htmlspecialchars($pecah_webinar['created_at'] ?? 'Tidak ada'); ?></td>
			</tr>
			<tr>
				<th>Status</th>
				<td><?php echo htmlspecialchars($pecah_webinar['status'] ?? 'Tidak ada'); ?></td>
			</tr>
		</table>
	</div>
</div>

<!-- Tambahkan tombol Ubah dan Hapus -->


<form method="post" id="statusForm">
	<div class="form-group d-flex justify-content-end">
		<a href="index.php?hal=ubahwebinar_1&id=<?php echo $id_webinar; ?>" class="btn btn-warning">Ubah</a>
	</div>
</form>

<script>
	document.getElementById('submitButton').addEventListener('click', function () {
		var status = document.getElementById('statusSelect').value;
		if (status === 'Approve' || status === 'Reject') {
			// Redirect to approve_webinar.php with the selected status
			window.location.href = 'approve_webinar.php?id=<?php echo $id_webinar; ?>&action=' + status;
		} else {
			alert('Silakan pilih status.');
		}
	});
</script>