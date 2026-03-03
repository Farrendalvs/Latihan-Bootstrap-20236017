<?php
include 'koneksi.php'; // Pastikan file koneksi.php sudah benar

header('Content-Type: application/json'); // Memberitahu browser ini format data JSON

$query = mysqli_query($conn, "SELECT * FROM grafik ORDER BY tahun ASC");
$tahun = [];
$penjualan = [];

while ($row = mysqli_fetch_assoc($query)) {
    $tahun[] = $row['tahun'];
    $penjualan[] = (int)$row['penjualan'];
}

// Kirim data ke grafik
echo json_encode([
    'labels' => $tahun,
    'data' => $penjualan
]);
?>