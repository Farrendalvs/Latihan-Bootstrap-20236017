<?php
include 'koneksi.php';

$query = mysqli_query($conn, "SELECT * FROM services");
$services = [];

while($row = mysqli_fetch_assoc($query)) {
    // Pastikan key ini ('judul' dan 'deskripsi') sama dengan nama kolom di tabel MySQL kamu
    $services[] = [
        'judul' => $row['judul'], 
        'deskripsi' => $row['deskripsi']
    ];
}

header('Content-Type: application/json');
echo json_encode($services);
?>