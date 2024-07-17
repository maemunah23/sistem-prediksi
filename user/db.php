<?php
$servername = "localhost";
$username = "root"; // Sesuaikan dengan username database kamu
$password = ""; // Sesuaikan dengan password database kamu
$dbname = "sistem-prediksi"; // Sesuaikan dengan nama database kamu

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
