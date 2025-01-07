<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Form Pop-up</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f5f5f5;
    }

    #popup-form {
      width: 80%;
      max-width: 800px;
      /* Membatasi lebar maksimum */
      margin: 50px auto;
      padding: 20px;
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
      color: #00aaff;
      /* Warna judul sesuai gambar */
    }

    .form-container {
      display: flex;
      justify-content: space-between;
      gap: 20px;
    }

    .left-container,
    .right-container {
      flex: 1;
      padding: 20px;
      background-color: #f9f9f9;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #555;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
      color: #555;
    }

    input,
    textarea,
    button {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ddd;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input:focus,
    textarea:focus {
      border-color: #00aaff;
      /* Warna border saat fokus */
      outline: none;
      /* Menghapus outline default */
    }

    button {
      background-color: #00aaff;
      /* Warna tombol */
      color: #fff;
      font-weight: bold;
      border: none;
      cursor: pointer;
    }

    button:hover {
      background-color: #0077cc;
      /* Warna saat hover */
    }

    #close-popup {
      display: block;
      margin: 20px auto;
      background-color: #dc3545;
      color: #fff;
    }

    #close-popup:hover {
      background-color: #a71d2a;
    }
  </style>
</head>

<body>
  <div id="popup-form" style="display:block;">
    <h1>Form Seminar</h1>
    <form action="submit.php" method="POST" enctype="multipart/form-data"
      onsubmit="window.location.href='hot news.php'; return true;">
      <div class="form-container">
        <!-- Container Kiri: Informasi Pembayaran -->
        <div class="left-container">
          <h2>Info webinar</h2>
          <label for="name">Nama:</label>
          <input type="text" id="name" name="name" required>

          <label for="wa">Nomor WA:</label>
          <input type="text" id="wa" name="wa" required>

          <label for="proof">Bukti Pembayaran:</label>
          <input type="file" id="proof" name="proof" required>

          <label for="poster">Gambar Poster:</label>
          <input type="file" id="poster" name="poster" required>

          <label for="title">Judul:</label>
          <input type="text" id="title" name="title" required>

          <label for="description">Deskripsi(singkat):</label>
          <textarea id="description" name="description" required></textarea>
        </div>

        <div class="right-container">
          <h2>Detail Webinar</h2>
          <label for="title">Judul:</label>
          <input type="text" id="title" name="title" required>

          <label for="description">Deskripsi(full):</label>
          <textarea id="description" name="description" required></textarea>

          <label for="date">Tanggal:</label>
          <input type="date" id="date" name="date" required>

          <label for="time">Waktu:</label>
          <input type="time" id="time" name="time" required>

          <label for="platform">Tempat:</label>
          <input type="text" id="platform" name="platform" required>

          <label for="registration_link">Link Pendaftaran:</label>
          <input type="url" id="registration_link" name="registration_link" required>

          <label for="price">Htm:</label>
          <input type="number" id="price" name="price" step="0.01" required>

          <label for="payment_method">Metode Pembayaran:</label>
          <input type="text" id="payment_method" name="payment_method" required>

          <label for="account_details">Detail Akun:</label>
          <input type="text" id="account_details" name="account_details" required>

          <label for="poster">Gambar Poster:</label>
          <input type="file" id="poster" name="poster" required>
        </div>
      </div>
      <button type="submit">Kirim</button>
    </form>
    <a href="hot news.php"><button type="button" id="close-popup">Tutup</button></a>
  </div>

  <script>
    document.getElementById('close-popup').onclick = function () {
      document.getElementById('popup-form').style.display = 'none';
      // document.getElementById('overlay').style.display = 'none';
    };
  </script>
</body>

</html>