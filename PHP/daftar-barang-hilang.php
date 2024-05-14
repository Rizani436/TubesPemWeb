<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Barang Hilang</title>
    <link rel="stylesheet" href="../CSS/daftar-barang-hilang.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>LoFo</h1>
            <div class="menu-header">
                <ul>
                    <li><a href="home.php">Home</a></li>
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
            <div class="judul-content">
                <a href="home.php"><img src="../PHP/icon/left-arrow.png" alt="Left"></a>
                <p>Form Barang Hilang</p>
            </div>
            <form action="beranda.php" method="post">
                <div class="input-data">
                    <label for="namaBarang">Nama Barang</label>
                    <input type="text" name="namaBarang" id="namaBarang" class="namaBarang">
                    <p class="p-namaBarang"></p>
                    <label for="kategoriBarang">Kategori Barang</label>
                    <select name="kategoriBarang" id="kategoriBarang" class="kategoriBarang">
                        <option value="0"></option>
                        <option value="A">Accessoris</option>
                        <option value="K">Kendaraan</option>
                        <option value="E">Elektronik</option>
                        <option value="D">Document</option>
                        <option value="DLL">Dan Lain-lain</option>
                    </select>
                    <p class="p-kategoriBarang"></p>
                    <label for="tglKehilangan">Tanggal Kehilangan</label>
                    <input type="date" name="tglKehilangan" id="tglKehilangan" class="tglKehilangan">
                    <p class="p-tglKehilangan"></p>
                    <label for="tmptKehilangan">Tempat Kehilangan</label>
                    <input type="text" name="tmptKehilangan" id="tmptKehilangan" class="tmptKehilangan">
                    <p class="p-tmptKehilangan"></p>
                    <label for="kotaKabupaten">Kota/Kabupaten</label>
                    <select name="kotaKabupaten" id="kotaKabupaten" class="kotaKabupaten">
                        <option value="0"></option>
                        <option value="KM">Kota Mataram</option>
                        <option value="LB">Lombok Barat</option>
                        <option value="LTG">Lombok Tengah</option>
                        <option value="LTM">Lombok Timur</option>
                        <option value="LU">Lombok Utara</option>
                    </select>
                    <p class="p-kotaKabupaten"></p>
                    <label for="informasiDetail">Informasi Detail</label>
                    <input type="text" name="informasiDetail" id="informasiDetail" class="informasiDetail">
                    <p class="p-informasiDetail"></p>
                    <label for="noHP">Nomor Handphone</label>
                    <input type="text" name="noHP" id="noHP" class="noHP">
                    <p class="p-noHP"></p>
                    <label for="gambarBarang">Gambar Barang</label>
                    <input type="file" name="gambarBarang" id="gambarBarang" accept="image/*">
                    <p class="p-gambarBarang"></p>
                    <input type="submit" value="Daftar">
                </div>
                <!-- <script src="../JS/signup.js"></script> -->
            </form>
        </div>
        <div class="footer">
            <p><bold>&copy;</bold> 2024. LoFo: Lost & Found Lombok</p>
        </div>      
    </div>
    <!-- <script src="../JS/home.js"></script> -->
    <script src="../JS/daftar-barang-hilang.js"></script>
</body>
</html>