<?php
include 'db.php';

// Query untuk ambil data prediksi
$sql_prediksi = "SELECT * FROM form_prediksi";
$result_prediksi = $conn->query($sql_prediksi);

// Header untuk file CSV
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data_prediksi.csv');

// Output buffer agar bisa menulis langsung ke file CSV
$output = fopen('php://output', 'w');

// Tulis header kolom
fputcsv($output, array('Tahun', 'Bulan', 'Minggu', 'Hari', 'Jumlah Pasokan', 'Hari Raya', 'Predicted Price'));

// Tulis data prediksi ke file CSV
while ($row = $result_prediksi->fetch_assoc()) {
    fputcsv($output, $row);
}

fclose($output);
?>
