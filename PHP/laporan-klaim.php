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
                <p class="judul-content">Laporan Klaim</p>
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
            <p><bold>&copy;</bold> 2024. LoFo: Lost & Found Lombok</p>
        </div>      
    </div>
    <script src="../JS/home.js"></script>
    <script src="../JS/laporan-klaim.js"></script>
</body>
</html>