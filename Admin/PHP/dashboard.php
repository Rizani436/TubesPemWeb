<?php
    include "cekSession.php";
    require_once 'header.php';
    // $username = $_SESSION['username']; 
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
                            <p>50</p>
                            <a href="#">Lihat Detail >></a>
                        </div>
                        <img src="../PHP/icon/akun.png" alt="">
                    </div>
                </div>
                <div class="box-item">
                    <p class="judul-box">Jumlah Verifikasi</p>
                    <p>Barang Hilang</p>
                    <div class="total">
                        <div class="total-teks">
                            <p>50</p>
                            <a href="#">Lihat Detail >></a>
                        </div>
                        <img src="../PHP/icon/verifikasi-hilang.png" alt="">
                    </div>
                </div>
                <div class="box-item">
                    <p class="judul-box">Jumlah Verifikasi</p>
                    <p>Barang Temuan</p>
                    <div class="total">
                        <div class="total-teks">
                            <p>50</p>
                            <a href="#">Lihat Detail >></a>
                        </div>
                        <img src="../PHP/icon/verifikasi-temuan.png" alt="">
                    </div>
                </div>
                <div class="box-item">
                    <p class="judul-box">Jumlah Laporan</p>
                    <p>Barang Hilang</p>
                    <div class="total">
                        <div class="total-teks">
                            <p>50</p>
                            <a href="#">Lihat Detail >></a>
                        </div>
                        <img src="../PHP/icon/barang-hilang.png" alt="">
                    </div>
                </div>
                <div class="box-item">
                    <p class="judul-box">Jumlah Laporan</p>
                    <p>Barang Temuan</p>
                    <div class="total">
                        <div class="total-teks">
                            <p>50</p>
                            <a href="#">Lihat Detail >></a>
                        </div>
                        <img src="../PHP/icon/barang-temuan.png" alt="">
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <script src="../JS/dashboard.js"></script>
    <script src="../JS/dashboard.js"></script>
    
</body>
</html>