<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
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
    <div class="content">
        <div id="prediksi" class="page">
            <h1>Prediksi Harga Cabai Kecil</h1>
            <form id="predictionForm"  method="POST">
                <label for="tahun">Tahun:</label>
                <input type="number" id="tahun" name="tahun" required>

                <label for="bulan">Bulan:</label>
                <select id="bulan" name="bulan" required>
                    <option value="Januari">Januari</option>
                    <option value="Februari">Februari</option>
                    <option value="Maret">Maret</option>
                    <option value="April">April</option>
                    <option value="Mei">Mei</option>
                    <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>
                    <option value="Agustus">Agustus</option>
                    <option value="September">September</option>
                    <option value="Oktober">Oktober</option>
                    <option value="November">November</option>
                    <option value="Desember">Desember</option>
                </select>

                <label for="minggu">Minggu:</label>
                <select id="minggu" name="minggu" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>

                <label for="hari">Hari:</label>
                <select id="hari" name="hari" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                </select>

                <label for="jumlahPasokan">Jumlah Pasokan:</label>
                <input type="number" id="jumlahPasokan" name="jumlahPasokan" required>

                <label for="hariRaya">Hari Raya:</label>
                <select id="hariRaya" name="hariRaya" required>
                    <option value="1">Ada</option>
                    <option value="0">Tidak Ada</option>
                </select>
                <button type="submit">Prediksi</button>
            </form>
            <div id="result"></div>
        </div>
        <div id="contact" class="page" style="display:none;">
            <h1>Contact Us</h1>
            <p>Hubungi kami di contact@example.com.</p>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
