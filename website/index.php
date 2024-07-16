<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="navbar">
        <h2>Sistem Prediksi Harga Cabai Kecil</h2>
        <ul>
            <li><a href="index.php" >Home</a></li>
            <li><a href="form.php" >Prediksi</a></li>
            <li><a href="informasi.php" >Contact Us</a></li>
        </ul>
    </div>
  <div class="container-fluid mt-3">
    <div id="demo" class="carousel slide" data-bs-ride="carousel">

        <!-- Indicators/dots -->
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
          <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
          <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>
      
        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/img1.jpg "alt="Los Angeles" class="d-block w-100">
          </div>
          <div class="carousel-item">
            <img src="img/img2.jpg" alt="Chicago" class="d-block w-100">
          </div>
          <div class="carousel-item">
            <img src="img/img3.jpg" alt="New York" class="d-block w-100">
          </div>
        </div>
      
        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
      </div>
        <div id="contact" class="page" style="display:none;">
            <h1>Contact Us</h1>
            <p>Hubungi kami di contact@example.com.</p>
        </div>
    </div>
</body>
</html>
