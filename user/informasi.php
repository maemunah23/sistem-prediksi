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
        <div class="contact-form-container">
            <h2>Contact Us</h2>
            <form action="informasi_process.php" method="post">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required>
    
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
    
                <label for="pesan">Pesan:</label>
                <textarea id="pesan" name="pesan" rows="4" required></textarea>
    
                <button type="submit">Submit</button>
            </form>
        </div>
    </body>
    </html>
