<?php
    include "cekSession.php";
    require_once 'header.php';
    $akun = $_SESSION['username'];
    include 'config.php';

    // Query untuk mendapatkan jumlah data
    $queryAkun = "SELECT COUNT(*) AS totalAkun FROM akun";
    $queryBarangHilang = "SELECT COUNT(*) AS totalBarangHilang FROM baranghilang WHERE status != 'menunggu'";
    $queryBarangTemuan = "SELECT COUNT(*) AS totalBarangTemuan FROM barangtemuan WHERE status != 'menunggu'";
    $queryVerifikasiBarangHilang = "SELECT COUNT(*) AS totalVerifikasiBarangHilang FROM baranghilang WHERE status = 'menunggu'";
    $queryVerifikasiBarangTemuan = "SELECT COUNT(*) AS totalVerifikasiBarangTemuan FROM barangtemuan WHERE status = 'menunggu'";

    // Eksekusi query
    $resultAkun = mysqli_query($conn, $queryAkun);
    $resultBarangHilang = mysqli_query($conn, $queryBarangHilang);
    $resultBarangTemuan = mysqli_query($conn, $queryBarangTemuan);
    $resultVerifikasiBarangHilang = mysqli_query($conn, $queryVerifikasiBarangHilang);
    $resultVerifikasiBarangTemuan = mysqli_query($conn, $queryVerifikasiBarangTemuan);

    // Ambil hasil query
    $totalAkun = mysqli_fetch_assoc($resultAkun)['totalAkun'];
    $totalBarangHilang = mysqli_fetch_assoc($resultBarangHilang)['totalBarangHilang'];
    $totalBarangTemuan = mysqli_fetch_assoc($resultBarangTemuan)['totalBarangTemuan'];
    $totalVerifikasiBarangHilang = mysqli_fetch_assoc($resultVerifikasiBarangHilang)['totalVerifikasiBarangHilang'];
    $totalVerifikasiBarangTemuan = mysqli_fetch_assoc($resultVerifikasiBarangTemuan)['totalVerifikasiBarangTemuan'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/dashboard.css">
    <title>Home Admin</title>
</head>
<body>
    <div class="container">
        <div class="content">
            <p class="judul-content">Dashboard Admin</p>
            <p class="child-judul">Dashboard</p>
            <div class="box">
                <div class="box-item">
                    <p class="judul-box">Jumlah Akun</p>
                    <div class="total">
                        <div class="total-teks">
                            <p><?php echo $totalAkun; ?></p>
                            <a href="akun.php">Lihat Detail >></a>
                        </div>
                        <img src="../PHP/icon/akun.png" alt="">
                    </div>
                </div>
                <div class="box-item">
                    <p class="judul-box">Jumlah Verifikasi</p>
                    <p>Barang Hilang</p>
                    <div class="total">
                        <div class="total-teks">
                            <p><?php echo $totalVerifikasiBarangHilang; ?></p>
                            <a href="verifikasi-barang-hilang.php">Lihat Detail >></a>
                        </div>
                        <img src="../PHP/icon/verifikasi-hilang.png" alt="">
                    </div>
                </div>
                <div class="box-item">
                    <p class="judul-box">Jumlah Verifikasi</p>
                    <p>Barang Temuan</p>
                    <div class="total">
                        <div class="total-teks">
                            <p><?php echo $totalVerifikasiBarangTemuan; ?></p>
                            <a href="verifikasi-barang-temuan.php">Lihat Detail >></a>
                        </div>
                        <img src="../PHP/icon/verifikasi-temuan.png" alt="">
                    </div>
                </div>
                <div class="box-item">
                    <p class="judul-box">Jumlah Laporan</p>
                    <p>Barang Hilang</p>
                    <div class="total">
                        <div class="total-teks">
                            <p><?php echo $totalBarangHilang; ?></p>
                            <a href="sistem-barang-hilang.php">Lihat Detail >></a>
                        </div>
                        <img src="../PHP/icon/barang-hilang.png" alt="">
                    </div>
                </div>
                <div class="box-item">
                    <p class="judul-box">Jumlah Laporan</p>
                    <p>Barang Temuan</p>
                    <div class="total">
                        <div class="total-teks">
                            <p><?php echo $totalBarangTemuan; ?></p>
                            <a href="sistem-barang-temuan.php">Lihat Detail >></a>
                        </div>
                        <img src="../PHP/icon/barang-temuan.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <script src="../JS/dashboard.js"></script> -->
</body>
</html>
