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
    <link rel="stylesheet" href="../CSS/notifikasi.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="klaim">
                <p>Notifikasi</p>
                <table>
                    <tr>
                        <th>Pesan</th>
                        <th>Tautan</th>
                    </tr>
                    <!-- <tr  class="data-kosong">
                        <td colspan="2">Data Tidak Ada</td>
                    </tr> -->
                    <tr>
                        <td>Pelapor telah menerima klaim barang Anda</td>
                        <td><a href="#" class="tampil">Tampilkan</a></td>
                    </tr>
                    <tr>
                        <td>Pelapor telah menolak klaim barang Anda</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="footer">
            <p><bold>&copy;</bold> 2024. LoFo: Lost & Found Lombok</p>
        </div>      
    </div>
    <script src="../JS/home.js"></script>
</body>
</html>