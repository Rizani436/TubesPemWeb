<?php
include "cekSession.php";
require_once 'header.php';
$akun = $_SESSION['username']; 
include 'config.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$search = '';
if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
}

$query_select = "SELECT * FROM baranghilang WHERE status = 'menunggu'";
if (!empty($search)) {
    $query_select .= " AND (namaBarang LIKE '%$search%' OR kategoriBarang LIKE '%$search%' OR tanggalKehilangan LIKE '%$search%' OR tempatKehilangan LIKE '%$search%' OR kotaKabupaten LIKE '%$search%' OR informasiDetail LIKE '%$search%' OR noHP LIKE '%$search%')";
}

$result_select = mysqli_query($conn, $query_select);
if (!$result_select) {
    die("Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/verifikasi-barang-hilang.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Merienda:wght@300..900&display=swap" rel="stylesheet">
    <title>Verifikasi Barang Hilang</title>
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="content-top">
                <p class="judul-content">Verifikasi Informasi</p>
                <p class="child-judul">Barang Hilang</p>
                <div class="form">
                    <a href="verifikasi-barang-temuan.php">Barang Temuan ></a>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
                        <input type="text" name="search" id="search" class="cari" placeholder="Cari..." value="<?php echo htmlspecialchars($search); ?>">
                        <input type="submit" value="Cari">
                    </form>
                </div>
                <table class="table">
                    <tr>
                        <th>Foto</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Tanggal Kehilangan</th>
                        <th>Tempat Kehilangan</th>
                        <th>Kota/Kabupaten</th>
                        <th>Informasi Detail</th>
                        <th>Nomor Handphone</th>
                        <th>Aksi</th>
                    </tr>
                    <?php if (mysqli_num_rows($result_select) == 0): ?>
                        <tr>
                            <td colspan="10">Tidak ada data</th>
                        </tr>
                    <?php else: ?>
                        <?php while($row = mysqli_fetch_assoc($result_select)): ?>
                            <tr data-id="<?= htmlspecialchars($row['idBarangHilang']) ?>">
                                <td><img src="data:image/jpeg;base64,<?= base64_encode($row['gambarBarang']) ?>" alt="" class="td-img"></td>
                                <td><?= htmlspecialchars($row['uploader']) ?></td>
                                <td><?= htmlspecialchars($row['namaBarang']) ?></td>
                                <td><?= htmlspecialchars($row['kategoriBarang']) ?></td>
                                <td><?= htmlspecialchars($row['tanggalKehilangan']) ?></td>
                                <td><?= htmlspecialchars($row['tempatKehilangan']) ?></td>
                                <td><?= htmlspecialchars($row['kotaKabupaten']) ?></td>
                                <td><?= htmlspecialchars($row['informasiDetail']) ?></td>
                                <td><?= htmlspecialchars($row['noHP']) ?></td>
                                <td>
                                    <button type="button" class="btn-terima" data-id="<?= htmlspecialchars($row['idBarangHilang']) ?>">Terima</button>
                                    <button type="button" class="btn-tolak" data-id="<?= htmlspecialchars($row['idBarangHilang']) ?>">Tolak</button>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </table>
                <?php endif; ?>
            </div> 
        </div>
    </div>

    <script src="../JS/verifikasi-barang-hilang.js"></script>
    <script src="../JS/dashboard2.js"></script>
    <!-- <script src="../JS/dashboard.js"></script>
    <script src="../JS/dashboard.js"></script> -->
    
</body>
</html>
