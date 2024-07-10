<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistem-prediksi"; // Ganti dengan nama database Anda

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari form
$tahun = $_POST['tahun'];
$bulan = $_POST['bulan'];
$minggu = $_POST['minggu'];
$hari = $_POST['hari'];
$jumlahPasokan = $_POST['jumlahPasokan'];
$hariRaya = $_POST['hariRaya'];
$predicted_price = $_POST['predicted_price'];

// Debugging
var_dump($_POST);

        // Masukkan hasil prediksi ke dalam tabel hasil_tes
        $sql_insert = "INSERT INTO form_prediksi (tahun, bulan, minggu, hari, jumlahPasokan, hariRaya, predicted_price) VALUES ('$tahun', '$bulan', '$minggu', '$hari', '$jumlahPasokan', '$hariRaya', '$precited_price')";
        if ($conn->query($sql_insert) === TRUE) {
            echo "Data berhasil dimasukkan";
        } else {
            echo "Error: " . $sql_insert . "<br>" . $conn->error;
        }

$conn->close();
?>
