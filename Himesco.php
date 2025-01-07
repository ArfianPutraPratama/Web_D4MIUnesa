<?php
session_start();
$koneksi = new mysqli("localhost", "root", "", "webmi"); // Pastikan koneksi ke database sudah ada

// Ambil ID dari URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$query_string = "SELECT * FROM webinar_2 WHERE id = ?";
$query = $koneksi->prepare($query_string);

// Ambil data terbaru dari tabel webinar_2 yang sudah disetujui
$stmt_webinar_2 = $koneksi->prepare("SELECT * FROM webinar_2 WHERE id = ?"); // Pastikan ini adalah string
$stmt_webinar_2->bind_param("i", $id);
$stmt_webinar_2->execute();
$result_webinar_2 = $stmt_webinar_2->get_result();
$entry_webinar_2 = $result_webinar_2->fetch_assoc();

// Ambil data terbaru dari tabel webinar_1 yang sudah disetujui
$query_webinar_1 = "SELECT * FROM webinar_1 WHERE status = 'approved' AND id = ? ORDER BY id DESC LIMIT 1";
$stmt_webinar_1 = $koneksi->prepare($query_webinar_1);
$stmt_webinar_1->bind_param("i", $id);
$stmt_webinar_1->execute();
$result_webinar_1 = $stmt_webinar_1->get_result();
$entry_webinar_1 = $result_webinar_1->fetch_assoc();

// Pastikan data dari webinar_1 ada.
if ($entry_webinar_1) {
  $author_name = $entry_webinar_1['name']; // Ambil nama dari webinar_1
} else {
  $author_name = "Nama tidak tersedia"; // Pesan alternatif jika tidak ada
}

if (isset($_SESSION['message'])) {
  echo "<div class='alert alert-info'>" . $_SESSION['message'] . "</div>";
  unset($_SESSION['message']);
}

// Pastikan data dari webinar ada
if (!$entry_webinar_2) {
  die("Data webinar tidak ditemukan.");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Webinar Details</title>
  <link rel="stylesheet" href="CSS/Himesco.css" />
</head>

<body>
  <div class="container">
    <div class="article">
      <div class="text-content">
        <h1><?php echo htmlspecialchars($entry_webinar_2['judul']); ?></h1>
        <p class="description"><?php echo htmlspecialchars($entry_webinar_2['deskripsi']); ?></p>
        <div class="author-info">
          <img src="../uploads/<?php echo basename(htmlspecialchars($entry_webinar_2['gambar_poster'])); ?>"
            alt="Author Image" class="author-img" />
          <div class="author-details">
            <p class="post-time">A few hours ago · 5 min read</p>
          </div>
        </div>
      </div>
      <div class="image-content">
        <img src="../uploads/<?php echo basename(htmlspecialchars($entry_webinar_2['gambar_poster'])); ?>" alt="Gambar"
          id="popup-img">
      </div>

      <!-- Pop-up -->
      <div class="popup" id="popup">
        <span class="close" id="close-popup">&times;</span>
        <img src="img/Himesco.jpeg" alt="Pop-up Image" id="popup-img-full">
      </div>

    </div>
    <div class="content-container">
      <p class="share-text">Share this</p>
      <div class="article-body">
        <p class="first-paragraph">
          <span
            class="dropcap"><?php echo htmlspecialchars(substr($entry_webinar_2['deskripsi'], 0, 1)); ?></span><?php echo htmlspecialchars(substr($entry_webinar_2['deskripsi'], 1)); ?>
        </p>
        <h2>📜 TIMELINE</h2>
        <p>
          🗓️ Hari/Tanggal : <?php echo htmlspecialchars($entry_webinar_2['tanggal']); ?>
        <p>
          📱 tempat : <?php echo htmlspecialchars($entry_webinar_2['tempat']); ?>
        </p>
        <p>
          📆 HTM: <?php echo htmlspecialchars($entry_webinar_2['htm']); ?>
        </p>
        <h2>💡 Benefit yang akan kamu dapatkan</h2>
        <p>📜 E-Sertifikat</p>
        <p>📚 Ilmu berharga</p>
        <p>📊 Mendapat jangkauan relasi yang luas</p>

        </p>
        <h2>Pembayaran melalui:</h2>
        <ul>
          <br>
          <li>Pembayaran : <?php echo htmlspecialchars($entry_webinar_2['metode_pembayaran']); ?></li>
          <br>
        </ul>
        <br>
        <h2>🔗 Link Pendaftaran:</h2>
        <p><a href="<?php echo htmlspecialchars($entry_webinar_2['link_pendaftaran']); ?>">Link Daftar Klik di sini</a>
        </p>

        <p>DAFTAR SEKARANG KARENA KUOTA ZOOM TERBATAS!!</p>

        <?php

        if (isset($_SESSION['last_entry'])) {
          $entry = $_SESSION['last_entry'];
          echo "<h2>Data Terakhir yang Disimpan:</h2>";
          echo "<p><strong>Nama:</strong> " . htmlspecialchars($entry['name']) . "</p>";
          echo "<p><strong>Nomor WA:</strong> " . htmlspecialchars($entry['wa']) . "</p>";
          echo "<p><strong>Judul:</strong> " . htmlspecialchars($entry['title']) . "</p>";
          echo "<p><strong>Deskripsi:</strong> " . htmlspecialchars($entry['description']) . "</p>";
          echo "<p><strong>Tanggal:</strong> " . htmlspecialchars($entry['date']) . "</p>";
          echo "<p><strong>Waktu:</strong> " . htmlspecialchars($entry['time']) . "</p>";
          echo "<p><strong>Platform:</strong> " . htmlspecialchars($entry['platform']) . "</p>";
          echo "<p><strong>Tempat:</strong> " . htmlspecialchars($entry['location']) . "</p>"; // Tambahkan tempat yang diambil dari database webinar di submit.php
          echo "<p><strong>Link Pendaftaran:</strong> <a href='" . htmlspecialchars($entry['registration_link']) . "'>" . htmlspecialchars($entry['registration_link']) . "</a></p>";
          echo "<p><strong>htm:</strong> " . htmlspecialchars($entry['price']) . "</p>";
          echo "<p><strong>Metode Pembayaran:</strong> " . htmlspecialchars($entry['payment_method']) . "</p>";
          echo "<p><strong>Detail Akun:</strong> " . htmlspecialchars($entry['account_details']) . "</p>";
          echo "<img src='" . htmlspecialchars($entry['poster_path']) . "' alt='Poster' class='poster-img' />";
          // Hapus data dari session setelah ditampilkan
          unset($_SESSION['last_entry']);
        }
        ?>

      </div>
      <div class="button">
        <a href="hot news.php" class="contact-btn"> <---Back </a>
      </div>
      <script src="js/s hot news.js"></script>
    </div>

</body>

</html>
<?php
$stmt_webinar_2->close();
$stmt_webinar_1->close();
$koneksi->close(); // Tutup koneksi setelah selesai
?>