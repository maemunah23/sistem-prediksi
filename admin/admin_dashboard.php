<?php
include 'db.php'; // Pastikan file db.php sudah memuat koneksi ke database
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

// Ambil data prediksi dari database
$sql_prediksi = "SELECT * FROM form_prediksi";
$result_prediksi = $conn->query($sql_prediksi);

// Ambil data kontak dari database
$sql_kontak = "SELECT * FROM contact_us";
$result_kontak = $conn->query($sql_kontak);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navbar">
        <h2>Admin Dashboard</h2>
        <ul>
            <li><a href="admin_dashboard.php">Home</a></li>
            <li><a href="tambah_berita.php">Tambah Berita</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="content">
        <div class="prediksi-section">
            <h2>Data Prediksi</h2>
            <a href="download_prediksi.php" class="btn-download">Download CSV</a>
            <table>
                <thead>
                    <tr>
                        <th>Tahun</th>
                        <th>Bulan</th>
                        <th>Minggu</th>
                        <th>Hari</th>
                        <th>Jumlah Pasokan</th>
                        <th>Hari Raya</th>
                        <th>Predicted Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result_prediksi->num_rows > 0) {
                        while ($row = $result_prediksi->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["tahun"] . "</td>";
                            echo "<td>" . $row["bulan"] . "</td>";
                            echo "<td>" . $row["minggu"] . "</td>";
                            echo "<td>" . $row["hari"] . "</td>";
                            echo "<td>" . $row["jumlahPasokan"] . "</td>";
                            echo "<td>" . ($row["hariRaya"] == 1 ? 'Ada' : 'Tidak Ada') . "</td>";
                            echo "<td>" . $row["predicted_price"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>Tidak ada data prediksi.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="kontak-section">
            <h2>Data Kontak</h2>
            <a href="download_kontak.php" class="btn-download">Download CSV</a>
            <table>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Pesan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result_kontak->num_rows > 0) {
                        while ($row = $result_kontak->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["nama"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["pesan"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>Tidak ada data kontak.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
