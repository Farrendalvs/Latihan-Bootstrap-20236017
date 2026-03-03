<?php
// 1. Menghubungkan ke database
include 'koneksi.php';

// 2. PROSES SIMPAN DATA (Jika tombol 'Simpan' diklik)
if (isset($_POST['tambah'])) {
    $tahun  = $_POST['tahun'];
    $jumlah = $_POST['jumlah'];
    
    // Perintah untuk memasukkan data ke tabel penjualan
    $query = "INSERT INTO penjualan (tahun, jumlah) VALUES ('$tahun', '$jumlah')";
    
    if (mysqli_query($conn, $query)) {
        // Jika berhasil, segarkan halaman agar data muncul di tabel bawah
        header("Location: update_grafik.php?status=sukses");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// 3. PROSES HAPUS DATA (Jika tombol 'Hapus' diklik)
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM penjualan WHERE id=$id");
    header("Location: update_grafik.php?status=terhapus");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Update Grafik Penjualan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body { background-color: #f9f8f6; padding: 40px 0; font-family: sans-serif; }
        .card { border: none; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .btn-custom { background-color: #758A93; color: white; }
        .btn-custom:hover { background-color: #5d6e75; color: white; }
    </style>
</head>
<body>

<div class="container">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h2 style="color: #758A93;">Pengaturan Grafik DAPOERBARRU</h2>
            <p class="text-muted">Kelola data tahunan untuk ditampilkan di grafik website utama</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5 mb-4">
            <div class="card p-4">
                <h5 class="font-weight-bold mb-3">Tambah Data Baru</h5>
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Tahun Penjualan</label>
                        <input type="number" name="tahun" class="form-control" placeholder="Contoh: 2026" required>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Produk Terjual (Pcs)</label>
                        <input type="number" name="jumlah" class="form-control" placeholder="Contoh: 500" required>
                    </div>
                    <button type="submit" name="tambah" class="btn btn-custom btn-block">Simpan ke Database</button>
                </form>
                <hr>
                <a href="index.php" class="btn btn-outline-secondary btn-block">Kembali ke Beranda Web</a>
            </div>
        </div>

        <div class="col-md-7">
            <div class="card p-4">
                <h5 class="font-weight-bold mb-3">Data Saat Ini</h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Tahun</th>
                            <th>Jumlah (Pcs)</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Mengambil data dari database untuk ditampilkan di tabel
                        $ambil_data = mysqli_query($conn, "SELECT * FROM penjualan ORDER BY tahun ASC");
                        
                        if (mysqli_num_rows($ambil_data) > 0) {
                            while($row = mysqli_fetch_array($ambil_data)) {
                        ?>
                        <tr>
                            <td><?php echo $row['tahun']; ?></td>
                            <td><?php echo $row['jumlah']; ?> Pcs</td>
                            <td class="text-center">
                                <a href="update_grafik.php?hapus=<?php echo $row['id']; ?>" 
                                   class="btn btn-danger btn-sm" 
                                   onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                        <?php 
                            }
                        } else {
                            echo "<tr><td colspan='3' class='text-center text-muted'>Belum ada data di database.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>