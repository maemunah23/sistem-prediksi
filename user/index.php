<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sistem Prediksi Harga Cabai Kecil</title>
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
            <li><a href="index.php">Home</a></li>
            <li><a href="form.php">Prediksi</a></li>
            <li><a href="informasi.php">Contact Us</a></li>
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
                    <img src="img/img1.jpg" alt="Cabai" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="img/img2.jpg" alt="Cabai" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="img/img3.jpg" alt="Cabai" class="d-block w-100">
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

        <!-- Contact Section -->
        <div id="contact" class="page" style="display:none;">
            <h1>Contact Us</h1>
            <p>Hubungi kami di contact@example.com.</p>
        </div>

        <!-- News Section -->
        <div class="news-section mt-5">
            <h2>Berita Terkini</h2>
            <div class="row">
                <?php
                include 'db.php';

                $sql = "SELECT * FROM berita ORDER BY id DESC"; // Menambahkan urutan berdasarkan id terbaru
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="col-md-4">';
                        echo '    <div class="card mb-4">';
                        echo '        <img src="img/' . $row["gambar"] . '" class="card-img-top" alt="' . htmlspecialchars($row["judul"]) . '">';
                        echo '        <div class="card-body">';
                        echo '            <h5 class="card-title">' . htmlspecialchars($row["judul"]) . '</h5>';
                        echo '            <p class="card-text">' . htmlspecialchars($row["deskripsi"]) . '</p>';
                        echo '            <a href="' . htmlspecialchars($row["link"]) . '" class="btn btn-primary" target="_blank">Baca Selengkapnya</a>';
                        echo '        </div>';
                        echo '    </div>';
                        echo '</div>';
                    }
                }
                
                 else {
                    echo '<p class="col-12">Tidak ada berita untuk ditampilkan.</p>';
                }

                $conn->close();
                ?>
            </div>
        </div>
    </div>
</body>
</html>
