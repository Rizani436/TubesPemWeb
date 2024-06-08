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
    <title>Daftar Laporan Klaim</title>
    <link rel="stylesheet" href="../CSS/daftar-laporan-klaim.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="klaim">
                <div class="header-klaim">
                    <a href="histori-barang-temuan.php"><img src="icon/left-arrow.png" alt="Kembali" height="40" width="40"></a>
                    <p>Daftar Laporan Klaim</p>
                </div>
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
                    <tr>
                        <td>Cristiano Ronaldo</td>
                        <td>CR7</td>
                        <td>Miami, USA</td>
                        <td><a href="laporan-klaim.php">Lihat Jawaban</a></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="footer">
            <div class="footer-content">
                <div class="footer-section about">
                    <h1 class="logo-text">
                        <img src="image/lofo.png" alt="Logo" height="50" width="50"> <!-- Add your logo file here -->
                        <span>Lost & Found Lombok</span>
                    </h1>
                    <p>
                        Menemukan kembali barang hilang, membawa ketenangan, dan mengembalikan harapan.
                    </p>
                    <div class="contact">
                        <span><img src="icon/icons8-phone-100.png" alt="Phone Icon"> &nbsp; +62 123 4567</span>
                        <span><img src="icon/emailicon.png" alt="Email Icon"> &nbsp; LostNFound.Lombok@gmail.com</span>
                    </div>
                </div>
                <div class="footer-section social">
                    <h2>Follow us</h2>
                    <div class="social-icons">
                        <a href="#"><img src="icon/facebookIcon.png" alt="Facebook Icon"></a>
                        <a href="#"><img src="icon/instagram.png" alt="Instagram Icon"></a>
                        <a href="#"><img src="icon/twitterx.png" alt="Twitter Icon"></a>
                        <a href="#"><img src="icon/linkedin.png" alt="LinkedIn Icon"></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                &copy; 2024 LoFo | Lost & Found Lombok
            </div>
        </div>     
    </div>
    <!-- <script src="../JS/home.js"></script> -->
</body>
</html>