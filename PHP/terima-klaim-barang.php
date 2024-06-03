<?php
    include "PHP/cekSession.php";
    require_once 'header.php';
    $username = $_SESSION['username']; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Klaim</title>
    <link rel="stylesheet" href="../CSS/terima-klaim-barang.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="klaim">
                <p class="judul-content">Laporan Klaim</p>
                <div class="isi-klaim">
                    <img src="image/sembalun.jpg" alt="barang-klaim">
                    <p class="judul-klaim">Tas</p>
                    <table>
                        <tr>
                            <th>Username</th>
                            <td>Pelapor</td>
                        </tr>
                        <tr>
                            <th>Tanggal Penemuan</th>
                            <td>02-10-2003</td>
                        </tr>
                        <tr>
                            <th>Tempat Penemuan</th>
                            <td>Masjid</td>
                        </tr>
                        <tr>
                            <th>Kota/Kabupaten</th>
                            <td>Kota Mataram</td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td>Aksesoris</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td class="td-terima"><p>Diterima</p></td>
                        </tr>
                    </table>
                    <div class="button-klaim">
                        <a href="https://wa.me/+62dst">Chat WhatsApp</a>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="footer">
            <p><bold>&copy;</bold> 2024. LoFo: Lost & Found Lombok</p>
        </div>      
    </div>
    <script src="../JS/home.js"></script>
    <script src="../JS/laporan-klaim.js"></script>
</body>
</html>