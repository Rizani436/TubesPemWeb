<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../CSS/home.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>LoFo</h1>
            <div class="menu-header">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li class="menu-dropdown"><a href="#">Daftar Laporan</a>
                        <ul class="dropdown">
                            <li><a href="#">Kehilangan Barang</a></li>
                            <li><a href="#">Penemuan Barang</a></li>
                        </ul>
                    </li>
                    <li class="menu-dropdown"><a href="#">Histori Laporan</a>
                    <ul class="dropdown">
                        <li><a href="#">Kehilangan Barang</a></li>
                        <li><a href="#">Penemuan Barang</a></li>
                    </ul>
                    </li>
                    <li class="menu-dropdown"><a href="#">Lapor</a>
                    <ul class="dropdown">
                        <li><a href="#">Kehilangan Barang</a></li>
                        <li><a href="#">Penemuan Barang</a></li>
                    </ul>
                    </li>
                </ul>    
            </div>
            <div class="akun-login">
                <img src="icon/notifikasi.png" alt="notifikasi" class="notifikasi">
                <div class="jumlah-notifikasi">
                    <p>1</p>
                </div>
                <img src="icon/profil.png" alt="Profil" class="profil">
                <div class="akun-profil">
                    <img src="icon/arrow-up.png" alt="Panah" class="panah">
                    <div class="akun">
                        <img src="icon/profil.png" alt="profil">
                        <p>rizalkurniawan._</p>
                    </div>
                    <div class="setting-akun">
                        <a href="#">Edit Profil</a>
                        <a href="#">Log Out</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="background-content">
                <div class="text-content">
                    <p>Menemukan kembali barang hilang</p>
                    <p>Membawa Ketenangan</p>
                    <p>dan Mengembalikan harapan</p>
                    <div class="search">
                        <input type="text" placeholder="Cari Barang Anda di sini...">
                        <img src="icon/search.png" alt="Searching">
                    </div>
                    <div class="input-content">
                        <span><a href="#">Barang Kehilangan</a></span>
                        <span><a href="#">Barang Temuan</a></span>
                    </div>
                </div>
            </div>
            <div class="isi-content">
                <div class="kategori">
                    <h1>Kategori</h1>
                    <div class="isi-kategori">
                        <div class="item">
                            <a href="#">
                            <img src="../PHP/icon/bags.png" alt="Accessoris">
                            <p>Accessoris</p>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="../PHP/icon/car.png" alt="Car">
                                <p>Kendaraan</p>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="../PHP/icon/responsive.png" alt="Accessoris">
                                <p>Elektronik</p>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="../PHP/icon/document.png" alt="Accessoris">
                                <p>Document</p>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="../PHP/icon/menu-bar.png" alt="Accessoris">
                                <p>Dan Lain-lain</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <p><bold>&copy;</bold> 2024. LoFo: Lost & Found Lombok</p>
        </div>      
    </div>
    <script src="../JS/home.js"></script>
</body>
</html>