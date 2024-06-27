<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: home.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link rel="stylesheet" href="../CSS/beranda.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Merienda:wght@300..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <img src="image/lofo.png" alt="logo">
                <h1>Lost & Found Lombok</h1>
            </div>
            <div class="menu-header">
                <ul>
                    <li><a href="login.php">Masuk</a></li>
                    <li><a href="signup.php">Daftar</a></li>
                </ul>
            </div>
        </div>
        <div class="content">
            <div class="background-content">
                <div class="text-content">
                    <p>Menemukan kembali <span class="textSpan">barang hilang</span></p>
                    <p><span class="textSpan">Membawa</span> Ketenangan</p>
                    <p>dan Mengembalikan <span class="textSpan">harapan</span></p>
                    <div class="input-content">
                        <span><a href="login.php">Barang Kehilangan</a></span>
                        <span><a href="login.php">Barang Temuan</a></span>
                    </div>
                </div>
            </div>
            <div class="isi-content">
                <div class="kategori">
                    <h1>Kategori</h1>
                    <div class="isi-kategori">
                        <div class="item">
                            <a href="login.php">
                            <img src="../PHP/icon/bags.png" alt="Accessoris">
                            <p>Aksesoris</p>
                            </a>
                        </div>
                        <div class="item">
                            <a href="login.php">
                                <img src="../PHP/icon/car.png" alt="Car">
                                <p>Kendaraan</p>
                            </a>
                        </div>
                        <div class="item">
                            <a href="login.php">
                                <img src="../PHP/icon/responsive.png" alt="Accessoris">
                                <p>Elektronik</p>
                            </a>
                        </div>
                        <div class="item">
                            <a href="login.php">
                                <img src="../PHP/icon/document.png" alt="Accessoris">
                                <p>Dokumen</p>
                            </a>
                        </div>
                        <div class="item">
                            <a href="login.php">
                                <img src="../PHP/icon/menu-bar.png" alt="Accessoris">
                                <p>Dan Lain-lain</p>
                            </a>
                        </div>
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
                    <h2>Ikuti kami</h2>
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
</body>
</html>