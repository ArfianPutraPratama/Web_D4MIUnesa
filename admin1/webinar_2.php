<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "webmi");

// Cek koneksi
if ($koneksi->connect_error) {
	die("Koneksi gagal: " . $koneksi->connect_error);
}

// Pagination settings
$limit = 10; // Number of entries per page
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Fetch total entries
$total_result = $koneksi->query("SELECT COUNT(*) as total FROM webinar_2");
$total_row = $total_result->fetch_assoc();
$total_entries = $total_row['total'];
$total_pages = ceil($total_entries / $limit);

// Fetch data from webinar_2 with limit and offset
$query_webinar2 = $koneksi->query("SELECT * FROM webinar_2 LIMIT $limit OFFSET $offset");

if (!$query_webinar2) {
	die("Query failed: " . $koneksi->error);
}
?>

<div style="color: white; padding: 15px 10px 5px 50px; float: right; font-size: 16px;">
	<a href="index.php?hal=tambahwebinar_2" class="btn btn-primary">Tambah Data</a>
</div>

<h2>Data Webinar 2</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Judul Webinar</th>
			<th>Deskripsi</th>
			<th>Tanggal</th>
			<th>Waktu</th>
			<th>Tempat</th>
			<th>Link Pendaftaran</th>
			<th>HTM</th>
			<th>Metode Pembayaran</th>
			<th>Detail Akun</th>
			<th>Gambar Poster</th>
			<th>Status</th>
			<th>Aksi</th>
		</tr>
	</thead>

	<tbody>
		<?php $nomor = 1; ?>
		<?php while ($pecah = $query_webinar2->fetch_assoc()) { ?>
			<tr>
				<td> <?php echo $nomor; ?> </td>
				<td> <?php echo htmlspecialchars($pecah["judul"]); ?> </td>
				<td> <?php echo htmlspecialchars($pecah["deskripsi"]); ?> </td>
				<td> <?php echo htmlspecialchars($pecah["tanggal"]); ?> </td>
				<td> <?php echo htmlspecialchars($pecah["waktu"]); ?> </td>
				<td> <?php echo htmlspecialchars($pecah["tempat"]); ?> </td>
				<td> <a href="<?php echo htmlspecialchars($pecah["link_pendaftaran"]); ?>" target="_blank">Link</a> </td>
				<td> Rp. <?php echo number_format($pecah["htm"]); ?> </td>
				<td> <?php echo htmlspecialchars($pecah["metode_pembayaran"]); ?> </td>
				<td> <?php echo htmlspecialchars($pecah["detail_akun"]); ?> </td>
				<td>
					<img src="../uploads/<?php echo basename(htmlspecialchars($pecah['gambar_poster'])); ?>" alt="Poster"
						style="width:100px; height:auto; border-radius:8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);">
				</td>
				<td>
					<?php
					echo ($pecah['status'] === 'approved' ? '✔️' :
						($pecah['status'] === 'rejected' ? '❌' :
							($pecah['status'] === 'pending' ? '➖' :
								htmlspecialchars($pecah['status'] ?? 'Tidak tersedia'))));
					?>
				</td>
				<td style="width: 200px;">
					<a href="index.php?hal=ubahwebinar_2&id=<?php echo $pecah['id']; ?>" class="btn btn-warning"
						style="margin: 5px;">Ubah</a>
					<a href="#" onclick="confirmDelete(<?php echo $pecah['id']; ?>)" class="btn btn-danger"
						style="margin: 5px;">Hapus</a>
				</td>
			</tr>
			<?php $nomor++ ?>
		<?php } ?>
	</tbody>
</table>

<!-- Pagination -->
<div class="pagination">
	<a href="index.php?hal=webinar_1&page=<?php echo max(1, $page - 1); ?>" class="btn btn-secondary">Previous</a>
	<?php for ($i = 1; $i <= $total_pages; $i++): ?>
		<a href="index.php?hal=webinar_1&page=<?php echo $i; ?>"
			class="btn <?php echo ($i === $page) ? 'btn-primary' : 'btn-secondary'; ?>">
			<?php echo $i; ?>
		</a>
	<?php endfor; ?>
	<a href="index.php?hal=webinar_1&page=<?php echo min($total_pages, $page + 1); ?>"
		class="btn btn-secondary">Next</a>
</div>

<script>
	function confirmAction(action, id) {
		var message = action === 'approve' ? 'Apakah Anda yakin ingin menyetujui webinar ini?' : 'Apakah Anda yakin ingin menolak webinar ini?';
		if (confirm(message)) {
			window.location.href = 'approve_webinar.php?id=' + id + '&action=' + action;
		}
	}

	function confirmDelete(id) {
		if (confirm('Apakah Anda yakin ingin menghapus webinar ini?')) {
			window.location.href = 'index.php?hal=hapus_webinar_2&id=' + id;
		}
	}
</script>