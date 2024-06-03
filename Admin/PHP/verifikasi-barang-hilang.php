<?php
include "cekSession.php";
require_once 'header.php';
$akun = $_SESSION['username']; 
include 'config.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query_select = "SELECT * FROM baranghilang WHERE status = 'menunggu'";

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
    <title>Home Admin</title>
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="popUp-terima">
                <div class="terima">
                    <div class="close">
                        <p>x</p>
                    </div>
                    <div class="header-terima">
                        <p>Verifikasi Informasi Kehilangan Barang</p>
                    </div>
                    <div class="isi-terima">
                        <p>Apakah sistem menerima kasus kehilangan barang ini ?</p>
                    </div>
                    <div class="footer-terima">
                        <button type="button" id="btnTutupTerima">Tutup</button>
                        <button type="button" id="btnTerima">Terima</button>
                    </div>
                </div>
            </div>
            <div class="popUp-tolak">
                <div class="tolak">
                    <div class="close">
                        <p>x</p>
                    </div>
                    <div class="header-tolak">
                        <p>Verifikasi Informasi Kehilangan Barang</p>
                    </div>
                    <div class="isi-tolak">
                        <p>Apakah sistem menolak kasus kehilangan barang ini ?</p>
                    </div>
                    <div class="footer-tolak">
                        <button type="button" id="btnTutupTolak">Tutup</button>
                        <button type="button" id="btnTolak">Tolak</button>
                    </div>
                </div>
            </div>
            <div class="content-top">
                <p class="judul-content">Verifikasi Informasi</p>
                <p class="child-judul">Barang Hilang</p>
                <div class="form">
                    <a href="verifikasi-barang-temuan.php">Barang Temuan ></a>
                    <form action="/index">
                        <input type="text" name="" id="" class="cari">
                        <input type="submit" value="Cari">
                    </form>
                </div>
                <?php if (mysqli_num_rows($result_select) == 0): ?>
                <div class="data-kosong">
                    <p>No Result</p>
                </div>
                <?php else: ?>
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
                            <th>Action</th>
                        </tr>
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
    <script src="../JS/dashboard.js"></script>
    <script src="../JS/dashboard.js"></script>
    
</body>
</html>
