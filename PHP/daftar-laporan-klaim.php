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
    <link rel="stylesheet" href="../CSS/daftar-laporan-klaim.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="klaim">
                <p>Daftar Laporan Klaim</p>
                <table>
                    <tr>
                        <td>Nama</td>
                        <td>Username</td>
                        <td>Alamat</td>
                        <td>Tombol</td>
                    </tr>
                    <!-- <tr  class="data-kosong">
                        <td colspan="4">Data Tidak Ada</td>
                    </tr> -->
                    <tr>
                        <td>Lionel Messi</td>
                        <td>LeoMessi</td>
                        <td>Miami, USA</td>
                        <td><a href="laporan-klaim.php">Lihat Jawaban</a></td>
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