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
    <link rel="stylesheet" href="../CSS/laporan-klaim.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="klaim">
                <div class="popUp-terima">
                    <div class="terima">
                        <form action="daftar-laporan-klaim.php">
                            <div class="header-terima">
                                <p>Klaim Barang</p>
                            </div>
                            <div class="isi-terima">
                                <p>Apakah Anda menerima klaim barang ini ?</p>
                            </div>
                            <div class="footer-terima">
                                <button type="button">Tutup</button>
                                <button type="submit">Terima</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="popUp-tolak">
                    <div class="tolak">
                        <form action="daftar-laporan-klaim.php">
                            <div class="header-tolak">
                                <p>Klaim Barang</p>
                            </div>
                            <div class="isi-tolak">
                                <p>Apakah Anda menolak klaim barang ini ?</p>
                            </div>
                            <div class="footer-tolak">
                                <button type="button">Tutup</button>
                                <button type="submit">Tolak</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="header-klaim">
                    <a href="daftar-laporan-klaim.php"><img src="icon/left-arrow.png" alt="Kembali" height="40" width="40"></a>
                    <p>Laporan Klaim</p>

                </div>
                <div class="isi-klaim">
                    <img src="image/sembalun.jpg" alt="barang-klaim">
                    <p class="judul-klaim">Tas</p>
                    <table>
                        <tr>
                            <td>Username</td>
                            <td>skyway._</td>
                        </tr>
                        <tr>
                            <td>Pertanyaan</td>
                            <td>berapa isi dalam dompet itu?</td>
                        </tr>
                        <tr>
                            <td>Jawaban Anda</td>
                            <td>500 Ribu</td>
                        </tr>
                    </table>
                    <div class="button-klaim">
                        <button type="button" class="btn-tolak">Tolak</button>
                        <button type="button" class="btn-terima">Terima</button>
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