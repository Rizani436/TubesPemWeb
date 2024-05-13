<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../CSS/daftar-laporan-barang-hilang.css">
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
            <div class="sidebar-left">
                <input type="text" placeholder="Cari barang anda di sini">
                <div class="lokasi-barang">
                    <label for="kotaKabupaten">Kota/Kabupaten: </label>
                    <select name="kotaKabupaten" id="kotaKabupaten">
                        <option value="0">...</option>
                        <option value="M">Kota Mataram</option>
                        <option value="B">Lombok Barat</option>
                        <option value="M">Lombok Timur</option>
                        <option value="TG">Lombok Tengah</option>
                        <option value="U">Lombok Utara</option>
                    </select>
                </div>
                <div class="kategori">
                    <ul> Kategori
                        <li><a href="#">All</a></li>
                        <li><a href="#">Accessoris</a></li>
                        <li><a href="#">Kendaraan</a></li>
                        <li><a href="#">Elektronik</a></li>
                        <li><a href="#">Document</a></li>
                        <li><a href="#">Dan Lain-lain</a></li>
                    </ul>
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