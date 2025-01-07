<?php
$koneksi = new mysqli("localhost", "root", "", "webmi");

if ($koneksi->connect_error) {
	die("Connection failed: " . $koneksi->connect_error);
}

// Pagination settings
$limit = 10; // Number of entries per page
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Fetch total entries
$total_result = $koneksi->query("SELECT COUNT(*) as total FROM webinar_1");
$total_row = $total_result->fetch_assoc();
$total_entries = $total_row['total'];
$total_pages = ceil($total_entries / $limit);

// Ambil data webinar
$query_webinar1 = $koneksi->query("SELECT * FROM webinar_1 LIMIT $limit OFFSET $offset");

if (!$query_webinar1) {
	die("Query failed: " . $koneksi->error);
}
?>
<div style="color: white; padding: 15px 10px 5px 50px; float: right; font-size: 16px;">
	<a href="index.php?hal=tambahwebinar_1" class="btn btn-primary">Tambah Data</a>
</div>

<h2>Data Webinar 1</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>WA</th>
			<th>Judul</th>
			<th>Deskripsi</th>
			<th>Bukti Pembayaran</th>
			<th>Path Poster</th>
			<th>Dibuat Pada</th>
			<th>Status</th>
			<th>Aksi</th>
			<th>hasil</th>
		</tr>
	</thead>

	<tbody>
		<?php $nomor = 1; ?>
		<?php while ($query_webinar1_item = $query_webinar1->fetch_assoc()) { ?>
			<tr>
				<td><?php echo $nomor; ?></td>
				<td><?php echo htmlspecialchars($query_webinar1_item["name"] ?? 'Tidak tersedia'); ?></td>
				<td><?php echo htmlspecialchars($query_webinar1_item["wa"] ?? 'Tidak tersedia'); ?></td>
				<td><?php echo htmlspecialchars($query_webinar1_item["title"] ?? 'Tidak tersedia'); ?></td>
				<td><?php echo htmlspecialchars($query_webinar1_item["description"] ?? 'Tidak tersedia'); ?></td>
				<td>
					<img src="../uploads/<?php echo basename(htmlspecialchars($query_webinar1_item['proof_path'])); ?>"
						alt="Bukti Pembayaran" class="proof-image"
						style="width:100px; height:auto; border-radius:8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);">
				</td>
				<td>
					<img src="../uploads/<?php echo basename(htmlspecialchars($query_webinar1_item['poster_path'])); ?>"
						alt="Poster"
						style="width:100px; height:auto; border-radius:8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);">
				</td>
				<td><?php echo htmlspecialchars($query_webinar1_item["created_at"] ?? 'Tidak tersedia'); ?></td>
				<td>
					<?php
					echo ($query_webinar1_item['status'] === 'approved' ? '✔️' :
						($query_webinar1_item['status'] === 'rejected' ? '❌' :
							($query_webinar1_item['status'] === 'pending' ? '➖' :
								htmlspecialchars($query_webinar1_item['status'] ?? 'Tidak tersedia'))));
					?>
				</td>
				<td style="width: 200px;">
					<a href="index.php?hal=detailwebinar_1&id=<?php echo $query_webinar1_item['id']; ?>"
						class="btn btn-info" style="margin: 5px;">Detail</a>
					<a href="#" onclick="confirmDelete(<?php echo $query_webinar1_item['id']; ?>)" class="btn btn-danger"
						style="margin: 5px;">Hapus</a>
				</td>
				<td style="width: 200px;">
					<a href="#" onclick="confirmAction('approve', <?php echo $query_webinar1_item['id']; ?>)"
						class="btn btn-success" style="margin: 5px;">Approve</a>
					<a href="#" onclick="confirmAction('reject', <?php echo $query_webinar1_item['id']; ?>)"
						class="btn btn-danger" style="margin: 5px;">Reject</a>
				</td>
			</tr>
			<?php $nomor++; ?>
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

<!-- Modal untuk menampilkan gambar -->
<div class="modal" id="imageModal" style="display:none;">
	<span class="close" id="closeModal">&times;</span>
	<img class="modal-content" id="modalImage" alt="Proof Image">
	<div id="caption"></div>
</div>

<style>
	.modal {
		display: none;
		/* Sembunyikan modal secara default */
		position: fixed;
		/* Tetap di tempat */
		z-index: 1000;
		/* Di atas elemen lain */
		left: 0;
		top: 0;
		width: 100%;
		/* Lebar penuh */
		height: 100%;
		/* Tinggi penuh */
		overflow: auto;
		/* Aktifkan scroll jika diperlukan */
		background-color: rgb(0, 0, 0);
		/* Latar belakang hitam */
		background-color: rgba(0, 0, 0, 0.9);
		/* Latar belakang hitam dengan transparansi */
	}

	.modal-content {
		margin: auto;
		display: block;
		width: 80%;
		/* Lebar gambar */
		max-width: 700px;
		/* Lebar maksimum */
	}

	.close {
		position: absolute;
		top: 15px;
		right: 35px;
		color: white;
		font-size: 40px;
		font-weight: bold;
		transition: 0.3s;
	}

	.close:hover,
	.close:focus {
		color: #bbb;
		text-decoration: none;
		cursor: pointer;
	}

	.approve-btn {
		background-color: initial;
		/* Warna default */
		color: initial;
		/* Warna teks default */
	}

	.approved {
		background-color: blue;
		/* Warna saat ditekan */
		color: white;
		/* Warna teks saat ditekan */
	}
</style>

<script>
	document.addEventListener("DOMContentLoaded", function () {
		// Ambil semua elemen gambar bukti pembayaran
		const proofImages = document.querySelectorAll('.proof-image');

		proofImages.forEach(image => {
			image.onclick = function () {
				const modal = document.getElementById("imageModal");
				const modalImg = document.getElementById("modalImage");
				const captionText = document.getElementById("caption");

				modal.style.display = "block";
				modalImg.src = this.src; // Set src gambar modal
				captionText.innerHTML = this.alt; // Set caption
			}
		});

		// Menutup modal ketika tombol close diklik
		document.getElementById("closeModal").onclick = function () {
			document.getElementById("imageModal").style.display = "none";
		}

		// Menutup modal ketika area di luar gambar diklik
		window.onclick = function (event) {
			const modal = document.getElementById("imageModal");
			if (event.target == modal) {
				modal.style.display = "none";
			}
		}
	});

	function changeButtonColor(button) {
		button.classList.add('approved'); // Tambahkan kelas saat ditekan

		// Kembalikan warna setelah beberapa detik (misalnya 2 detik)
		setTimeout(function () {
			button.classList.remove('approved'); // Hapus kelas setelah 2 detik
		}, 2000);
	}

	function confirmAction(action, id) {
		var message = action === 'approve' ? 'Apakah Anda yakin ingin menyetujui webinar ini?' : 'Apakah Anda yakin ingin menolak webinar ini?';
		if (confirm(message)) {
			window.location.href = 'approve_webinar.php?id=' + id + '&action=' + action;
		}
	}

	function confirmDelete(id) {
		if (confirm('Apakah Anda yakin ingin menghapus webinar ini?')) {
			window.location.href = 'index.php?hal=hapus_webinar_1&id=' + id;
		}
	}
</script>