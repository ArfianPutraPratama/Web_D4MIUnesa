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
$total_result = $koneksi->query("SELECT COUNT(*) as total FROM gallery2023");
$total_row = $total_result->fetch_assoc();
$total_entries = $total_row['total'];
$total_pages = ceil($total_entries / $limit);

// Fetch data from gallery2023 with limit and offset
$ambil_gallery_2023 = $koneksi->query("SELECT * FROM gallery2023 LIMIT $limit OFFSET $offset");
?>

<div style="color: white; padding: 15px 10px 5px 50px; float: right; font-size: 16px;">
    <a href="index.php?hal=tambahgallery" class="btn btn-primary">Tambah Data</a>
</div>

<h2>Data Galeri 2023</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama File</th>
            <th>Keterangan</th>
            <th>Tanggal Unggah</th>
            <th>Photo</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($gallery = $ambil_gallery_2023->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $gallery['id']; ?></td>
                <td><?php echo $gallery['file_name']; ?></td>
                <td><?php echo $gallery['caption']; ?></td>
                <td><?php echo $gallery['uploaded_on']; ?></td>
                <td style="text-align: center;">
                    <img src="../uploads/<?php echo htmlspecialchars($gallery['file_name']); ?>"
                        alt="<?php echo htmlspecialchars($gallery['caption']); ?>"
                        style="max-width: 100px; max-height: 100px;">
                </td>
                <td>
                    <a href="index.php?hal=ubahgallery&id=<?php echo $gallery['id']; ?>&year=2023"
                        class="btn-warning btn">Ubah</a>
                    <a href="hapusgallery.php?id=<?php echo $gallery['id']; ?>&year=2023" class="btn-danger btn">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<!-- Pagination -->
<div class="pagination">
    <a href="index.php?hal=gallery2023&page=<?php echo max(1, $page - 1); ?>" class="btn btn-secondary">Previous</a>
    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
        <a href="index.php?hal=gallery2023&page=<?php echo $i; ?>"
            class="btn <?php echo ($i === $page) ? 'btn-primary' : 'btn-secondary'; ?>">
            <?php echo $i; ?>
        </a>
    <?php endfor; ?>
    <a href="index.php?hal=gallery2023&page=<?php echo min($total_pages, $page + 1); ?>"
        class="btn btn-secondary">Next</a>
</div>