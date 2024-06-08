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
    <title>Terima Klaim Barang</title>
    <link rel="stylesheet" href="../CSS/terima-klaim-barang.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="klaim">
                <div class="header-klaim">
                    <a href="notifikasi.php"><img src="icon/left-arrow.png" alt="Kembali" height="40" width="40"></a>
                    <p>Terima Laporan Klaim</p>
                </div>
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
                        <a href="https://wa.me/+62dst">
                            <img src="icon/social.png" alt="WhatsApp" height="50px" width="50px">
                            <p>Chat WhatsApp</p>
                        </a>
                    </div>
                </div>
                
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
    <script src="../JS/laporan-klaim.js"></script>
</body>
</html>