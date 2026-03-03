<?php
// 1. Hubungkan ke database
include 'koneksi.php';

// 2. Cek apakah ada data yang dikirim melalui method POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 3. Ambil data dari input form (pastikan name-nya sesuai)
    $nama  = mysqli_real_escape_string($conn, $_POST['nama']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pesan = mysqli_real_escape_string($conn, $_POST['pesan']);

    // 4. Masukkan data ke tabel 'pesan'
    $query = "INSERT INTO pesan (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";

    if (mysqli_query($conn, $query)) {
        // Jika berhasil, munculkan pesan dan kembali ke halaman utama
        echo "<script>
                alert('Pesan kamu sudah terkirim ke DapoerBarru!');
                window.location.href='index.php';
              </script>";
    } else {
        // Jika gagal, tampilkan error
        echo "Wah, ada error nih: " . mysqli_error($conn);
    }
}
?>