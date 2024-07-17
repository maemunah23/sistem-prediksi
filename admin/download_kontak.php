<?php
include 'db.php';

// Query untuk ambil data kontak
$sql_kontak = "SELECT * FROM contact_us";
$result_kontak = $conn->query($sql_kontak);

// Header untuk file CSV
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data_kontak.csv');

// Output buffer agar bisa menulis langsung ke file CSV
$output = fopen('php://output', 'w');

// Tulis header kolom
fputcsv($output, array('Nama', 'Email', 'Pesan'));

// Tulis data kontak ke file CSV
while ($row = $result_kontak->fetch_assoc()) {
    fputcsv($output, $row);
}

fclose($output);
?>
