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

//ambil data dari form
$nama = mysqli_real_escape_string($conn, $_POST['nama']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$pesan = mysqli_real_escape_string($conn, $_POST['pesan']);

//debbunging
var_dump($_POST);
 
// Masukkan data ke dalam tabel contact_us
$sql_insert = "INSERT INTO contact_us (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";
if ($conn->query($sql_insert) === TRUE) {
    echo "Data berhasil dimasukkan";
    header('Location: informasi.php');
} else {
    echo "Error: " . $sql_insert . "<br>" . $conn->error;
}

$conn->close();
?>
