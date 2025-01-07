<?php
session_start();
$koneksi = new mysqli("localhost", "root", "", "webmi"); // Pastikan koneksi ke database sudah ada

// Ambil data dari tabel webinar_1 yang sudah disetujui
$query_webinar1 = $koneksi->query("SELECT * FROM webinar_1 WHERE status = 'approved' ORDER BY created_at DESC"); // Mengambil data terbaru


// Cek apakah ada notifikasi
$notification = isset($_SESSION['notification']) ? $_SESSION['notification'] : '';
unset($_SESSION['notification']); // Hapus notifikasi setelah ditampilkan
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Hot News</title>
  <link rel="stylesheet" href="CSS/hot news.css" />
  <link rel="stylesheet" href="CSS/footer.css" />
  <style>
    /* CSS untuk pop-up */
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
      background-color: rgba(0, 0, 0, 0.5);
      /* Latar belakang hitam dengan transparansi */
    }

    .modal-content {
      background-color: #fefefe;
      margin: 15% auto;
      /* 15% dari atas dan tengah */
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      /* Lebar modal */
      text-align: center;
    }

    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }

    .notification {
      display: none;
      position: fixed;
      top: 0;
      left: 50%;
      transform: translateX(-50%);
      background-color: #4CAF50;
      color: white;
      padding: 15px;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
      z-index: 1000;
      transition: top 0.5s ease;
    }

    .notification.show {
      display: block;
      top: 20px;
    }
  </style>
</head>

<body>
  <!-- Overlay untuk menutupi latar belakang saat form muncul -->
  <div id="overlay"></div>

  <!-- Div utama konten berita -->
  <div class="container" id="container">
    <div class="main-content">
      <!-- Promo Banner -->
      <?php if (isset($_SESSION['user'])): ?>
        <div class="promo-banner" style="text-align: center; margin-top: 30px;">
          <a href="#" id="promo-image-link">
            <img src="img/iklan.png" alt="Promo Gramedia" style="width: 100%; max-width: 900px; height: auto;" />
          </a>
        </div>
      <?php endif; ?>

      <script>
        document.getElementById('promo-image-link').onclick = function (event) {
          window.location.href = 'form host news.php';
          document.getElementById('popup-form').style.display = 'block';
          document.getElementById('overlay').style.display = 'block'; // Tampilkan overlay
        };
      </script>

      <!-- Search Bar -->
      <div class="search-bar">
        <input type="text" id="search-input" placeholder="Cari berita...">
        <button id="search-btn">Cari</button>
      </div>
      <script src="js/hot news.js"></script>
      <br />

      <div class="news-grid">
        <!-- Tampilkan data dari tabel webinar_1 -->
        <?php if ($query_webinar1->num_rows > 0): ?>
          <?php while ($query_webinar1_item = $query_webinar1->fetch_assoc()): ?>
            <div class="news-item">
              <a href="Himesco.php?id=<?php echo $query_webinar1_item['id']; ?>">
                <div class="image-content">
                  <img src="../uploads/<?php echo basename(htmlspecialchars($query_webinar1_item['poster_path'])); ?>"
                    alt="Poster" class="poster-img" />
                </div>
              </a>
              <div class="news-details">
                <h3><?php echo htmlspecialchars($query_webinar1_item['title']); ?></h3>
                <div class="news-meta">
                  <span><?php echo date('d F Y', strtotime($query_webinar1_item['created_at'])); ?></span> | <span>47
                    Views</span>
                </div>
                <p><?php echo htmlspecialchars($query_webinar1_item['description']); ?></p>
              </div>
            </div>
          <?php endwhile; ?>
        <?php else: ?>
          <p>Tidak ada berita yang tersedia.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <div class="button">
    <a href="index.php" class="contact-btn"> <---Back </a>
  </div>

  <!-- Footer -->
  <div id="footer-container"></div>
  <script src="js/footer.js"></script>

  <!-- Pop-up Modal -->
  <?php if (!empty($notification)): ?>
    <div id="notification" class="notification">
      <p><?php echo htmlspecialchars($notification); ?></p>
    </div>
  <?php endif; ?>

  <script>
    window.onload = function () {
      var notification = document.getElementById("notification");
      if (notification) {
        notification.classList.add("show");

        setTimeout(function () {
          notification.classList.remove("show");
        }, 3000);
      }
    };
  </script>
</body>

</html>

<?php
$koneksi->close(); // Tutup koneksi setelah selesai
?>