<?php
session_start(); // Memulai session
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MI</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="CSS/navbar.css" />
  <link rel="stylesheet" href="CSS/footer.css" />
  <!-- Hubungkan ke file CSS eksternal -->
</head>
<main>

  <body>
    <!-- Navigation Bar Section -->
    <div id="navbar"></div>
    <!-- Tempat untuk navbar -->

    <script src="js/navbar.js"></script>
    <!-- Memuat file JavaScript terpisah -->

    <div id="footer-placeholder"></div>

    <script src="js/pop up.js"></script>

    <!-- Slider  -->
    <section>
      <div class="slider" id="slider">
        <div class="slides">
          <img src="img/angkatan 22.jpeg" alt="Gambar 1" />
          <div class="text">
            <p class="small-text">Welcome to</p>
            <div class="line"></div>
            <h1 class="main-title">D4MIUnesa</h1>
          </div>
        </div>

        <div class="slides">
          <img src="img/angkatan 23.jpeg" alt="Gambar 2" />
          <div class="text">
            <p class="small-text">Welcome to</p>
            <div class="line"></div>
            <h1 class="main-title">D4MIUnesa</h1>
          </div>
        </div>

        <div class="slides">
          <img src="img/angkatan 24.jpeg" alt="Gambar 3" />
          <div class="text">
            <p class="small-text">Welcome to</p>
            <div class="line"></div>
            <h1 class="main-title">D4MIUnesa</h1>
          </div>
        </div>
      </div>
    </section>
    <!-- Titik Slider -->
    <section>
      <div class="dot-container">
        <span class="dot active-dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
      </div>
    </section>

    <script src="js/halaman1.js"></script>
    <!-- AboutUs -->
    <section class="tentang-kami" id="tentang-kami">
      <div class="konten-tentang">
        <h2>D4 Manajemen Informatika UNESA</h2>
        <p>
          Program Studi D4 Manajemen Informatika di Fakultas Vokasi
          Universitas Negeri Surabaya merupakan transformasi dari D3 dengan
          fokus pada penguasaan teknologi informasi seperti pengembangan
          aplikasi Desktop, Web, Mobile, kecerdasan buatan, dan Big Data.
          Kurikulum berbasis kebutuhan industri masa kini, mencakup arsitektur
          perangkat lunak modern seperti Microservices dan teknologi adaptif.
          Mahasiswa dibekali keterampilan merancang solusi teknologi inovatif
          melalui pembelajaran praktis dan proyek, serta pemahaman tren masa
          depan seperti AI, IoT, dan analitik data. Selain keahlian teknis,
          lulusan juga dilengkapi soft skill seperti kerja tim dan manajemen
          proyek, siap berkontribusi sebagai software engineer, sistem analis,
          atau IT Entrepreneur di dunia kerja global.
        </p>
      </div>
      <div class="gambar-tentang">
        <iframe
          width="560"
          height="315"
          src="https://www.youtube.com/embed/4C-t8hUER8Q?si=UsiaUUfn6NddkwJl"
          title="YouTube video player"
          frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          referrerpolicy="strict-origin-when-cross-origin"
          allowfullscreen></iframe>
      </div>
    </section>
    <!-- visi-misi -->
    <section class="visi-misi" id="visi-misi">
      <div class="visi-content">
        <div class="backshadow">
          <h2>Visi</h2>
          <h1>
            Menjadi program studi yang unggul dan kompetitif untuk
            menghasilkan sarjana terapan dengan karakter tangguh, adaptif, dan
            inovatif berbasis kewirausahaan dalam bidang rekayasa perangkat
            lunak.
          </h1>
          <h2>Misi</h2>
          <p>
            Menyelenggarakan dan mengelola program studi yang profesional,
            akuntabel, transparan, dan berdaya saing untuk memperkuat ilmu
            bidang rekayasa perangkat lunak pada tingkat nasional maupun
            internasional
          </p>
          <p>
            Menyelenggarakan proses pembelajaran yang berkualitas untuk
            menghasilkan lulusan yang berpengetahuan di bidang rekayasa
            perangkat lunak dengan menerapkan prinsip kewirausahaan
          </p>
          <p>
            Menyelenggarakan penelitian yang inovatif dalam bidang rekayasa
            perangkat lunak untuk menghasilkan teknologi tepat guna.
          </p>
          <p>
            Menyelenggarakan pengabdian kepada masyarakat guna mengembangkan
            dan menerapkan ilmu pengetahuan dan teknologi bidang rekayasa
            perangkat lunak pada kehidupan masyarakat luas
          </p>
        </div>
      </div>
    </section>

    <!-- Tambahkan bagian ini untuk Judul Dokumentasi Event -->
    <section class="galeri-event" id="galeri-event">
      <div class="galeri-header">
        <h2>Gallery</h2>
        <p>
          Berikut adalah beberapa dokumentasi kegiatan terbaru yang telah
          dilaksanakan oleh Seluruh Angkatan 2022-2024.
        </p>
      </div>
      <div class="galeri-event">
        <div class="galeri-grid">
          <div class="galeri-item">
            <a href="galery 2022.php">
              <img src="img/angkatan 22.jpeg" alt="2023 A" />
            </a>
            <p>2022</p>
          </div>
          <div class="galeri-item">
            <a href="galery 2023.php">
              <img src="img/angkatan 23.jpeg" alt="2023 B" />
            </a>
            <p>2023</p>
          </div>
        </div>
      </div>
      <div class="galeri-event">
        <div class="galeri-grid">
          <div class="galeri-item">
            <a href="galery 2024.php">
              <img src="img/angkatan 24.jpeg" alt="2023 C" />
            </a>
            <p>2024</p>
          </div>
          <div class="galeri-item">
            <img src="img/gambar-event-4.jpg" alt="2023 D" />
            <p>Coming Soon</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Div utama konten berita -->
    <div class="container" id="container">
      <div class="main-content">
        <h2><span class="hot">Hot</span> <span class="news">News</span></h2>
        <br>
        <div class="news-grid">
          <!-- Berita 1 -->
          <div class="news-item">
            <a href="Momic.php">
              <img src="img/Momic.jpeg" alt="Web 3.0 News" />
            </a>
            <div class="news-details">
              <h3>🎮 Mobile Legend MI Competition (MOMIC) 2024 🎮</h3>
              <div class="news-meta">
                <span>05 Oktober 2024</span> | <span>47 Views</span>
              </div>
              <p>
                Halo Para Gamers! 👋🏻 Himpunan Mahasiswa Manajemen Informatika
                Universitas Negeri Surabaya dengan bangga mempersembahkan
                Mobile Legend MI Competition 2024 (MOMIC).
              </p>
            </div>
          </div>
          <!-- Berita 2 -->
          <div class="news-item">
            <a href="TEP.php">
              <img src="img/TEM.jpeg" alt="Web 3.0 News" />
            </a>
            <div class="news-details">
              <h3>PELATIHAN TEST OF ENGLISH PROFICIENCY (TEP) 2024</h3>
              <div class="news-meta">
                <span>05 Oktober 2024</span> | <span>47 Views</span>
              </div>
              <p>
                Apakah kamu ingin meningkatkan kemampuan bahasa Inggris dan
                mempersiapkan diri untuk sukses menghadapi Tes of English
                Proficiency (TEP)? Inilah kesempatanmu! 🎓
              </p>
            </div>
          </div>
          <!-- Berita 3 -->
          <div class="news-item">
            <a href="Sosialisasi.php">
              <img src="img/Telkom.jpeg" alt="Web 3.0 News" />
            </a>
            <div class="news-details">
              <h3>Sosialisasi Innovillage 2024</h3>
              <div class="news-meta">
                <span>05 Oktober 2024</span> | <span>47 Views</span>
              </div>
              <p>
                Mari bersama-sama mewujudkan ide-ide cemerlang untuk masa
                depan yang lebih baik! Jangan lewatkan kesempatan untuk
                bergabung dan berkontribusi.
              </p>
            </div>
          </div>
        </div>
        <!-- Button Seemore -->
        <div class="see-more-container">
          <a href="hot news.php" class="see-more-link">See More</a>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <div id="footer-container"></div>
    <script src="js/footer.js"></script>
  </body>
</main>

</html>