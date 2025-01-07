<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="CSS/form.css">
  <title>Edit Gallery</title>
</head>

<body>
  <div class="editgallery">
    <?php if (isset($_SESSION['user'])): ?>
      <button class="add-photo-button" onclick="showPopup()">Add Photo</button>
      <div class="button">
        <a href="index.php" class="add-photo-button">Back</a>
      </div>
    <?php endif; ?>
  </div>

  <!-- Popup Form -->
  <div class="popup-form" id="popupForm">
    <div class="form-container">
      <span class="close-button" onclick="closePopup()">&times;</span>
      <h1>Add Photo</h1>
      <form action="upload.php" method="POST" enctype="multipart/form-data">
        <div class="input-container">
          <label>Select Photo:</label>
          <input type="file" id="photo" name="photo" accept="image/*" required>

          <label for="title">Caption:</label>
          <input type="text" id="caption" name="caption" placeholder="Enter caption" required>
        </div>

        <label for="year">Year:</label>
        <select id="year" name="year" required>
          <?php
          // Menentukan tahun berdasarkan halaman
          if (strpos($_SERVER['PHP_SELF'], '2022') !== false) {
            echo '<option value="2022">2022</option>';
          } elseif (strpos($_SERVER['PHP_SELF'], '2023') !== false) {
            echo '<option value="2023">2023</option>';
          } elseif (strpos($_SERVER['PHP_SELF'], '2024') !== false) {
            echo '<option value="2024">2024</option>';
          }
          ?>
        </select>

        <button type="submit">Upload Photo</button>
      </form>

    </div>
  </div>

  <script src="js/form.js"></script>
</body>

</html>