<?php
session_start();
include('koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gallery</title>
    <link rel="stylesheet" href="CSS/galery 2024.css" />
    <link rel="stylesheet" href="CSS/footer.css" />
  </head>

  <body>
    <div id="footer-placeholder"></div>

    <div class="container">
      <!-- Ambil data gambar dari database -->
    <?php
    $sql = "SELECT * FROM gallery2024 ORDER BY uploaded_on DESC"; // Pastikan nama tabel benar
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="image-wrapper">';
            echo '<img src="uploads/' . $row["file_name"] . '" alt="' . htmlspecialchars($row["caption"]) . '">';
            echo '<p>' . htmlspecialchars($row["caption"]) . '</p>';
            echo '</div>';
        }
    } else {
        echo "<p>No images found.</p>";
    }
    ?>
    </div>

    <div class="galleryedit">
      <?php include 'editgallery.php'; ?>
    </div>
    <!-- Lightbox element -->
    <div id="lightbox" class="lightbox">
      <span class="close">&times;</span>
      <img class="lightbox-content" id="lightbox-image" src="" />
      <div class="caption" id="caption"></div>
    </div>
    <div id="footer-container"></div>
    <script src="js/footer.js"></script>
    <script src="js/galery.js"></script>
  </body>
</html>

<?php
$conn->close();
?>