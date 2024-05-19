<?php
include "PHP/cekSession.php";
require_once 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'PHP/config.php';

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $namaBarang = mysqli_real_escape_string($conn, $_POST['namaBarang']);
    $kategoriBarang = mysqli_real_escape_string($conn, $_POST['kategoriBarang']);
    $tglKehilangan = mysqli_real_escape_string($conn, $_POST['tglKehilangan']);
    $tmptKehilangan = mysqli_real_escape_string($conn, $_POST['tmptKehilangan']);
    $informasiDetail = mysqli_real_escape_string($conn, $_POST['informasiDetail']);
    $noHP = mysqli_real_escape_string($conn, $_POST['noHP']);
    $kotaKabupaten = mysqli_real_escape_string($conn, $_POST['kotaKabupaten']);
    $datagambar = addslashes(file_get_contents($_FILES['gambarBarang']['tmp_name']));
    $propertiesgambar = getimageSize($_FILES['gambarBarang']['tmp_name']);
    $query = "INSERT INTO baranghilang (namaBarang, kategoriBarang, tanggalKehilangan, tempatKehilangan, kotaKabupaten, informasiDetail, noHP,tipeImage, gambarBarang) VALUES ('$namaBarang', '$kategoriBarang', '$tglKehilangan', '$tmptKehilangan', '$kotaKabupaten', '$informasiDetail', '$noHP', '" . $propertiesgambar['mime'] . "', '" . $datagambar . "')";
    $result = mysqli_query($conn, $query);
        if ($result) {
            echo "<script>alert('Barang berhasil diupload');</script>";
        } else {
            echo "<script>alert('Barang gagal diupload');</script>";
        }
    mysqli_close($conn);
}
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
<<<<<<< HEAD
=======
        <div class="header">
            <div class="logo">
                <img src="image/lofo.png" alt="logo">
                <h1>Lost & Found Lombok</h1>
            </div>
            <div class="menu-header">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li class="menu-dropdown"><a href="#">Daftar Laporan</a>
                        <ul class="dropdown">
                            <li><a href="daftar-laporan-barang-hilang.php">Kehilangan Barang</a></li>
                            <li><a href="daftar-laporan-barang-temuan.php">Penemuan Barang</a></li>
                        </ul>
                    </li>
                    <li class="menu-dropdown"><a href="#">Histori Laporan</a>
                    <ul class="dropdown">
                        <li><a href="histori-barang-hilang.php">Kehilangan Barang</a></li>
                        <li><a href="histori-barang-temuan.php">Penemuan Barang</a></li>
                    </ul>
                    </li>
                    <li class="menu-dropdown"><a href="#">Lapor</a>
                    <ul class="dropdown">
                        <li><a href="daftar-barang-hilang.php">Kehilangan Barang</a></li>
                        <li><a href="daftar-barang-temuan.php">Penemuan Barang</a></li>
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
>>>>>>> c8e7f2d3c6f3be2f808bb271c409f686c4915416
        <div class="content">
            <div class="judul-content">
                <a href="home.php"><img src="../PHP/icon/left-arrow.png" alt="Left"></a>
                <p>Form Barang Hilang</p>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
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
                <script src="../JS/signup.js"></script>
            </form>
        </div>
        <div class="footer">
            <p><strong>&copy;</strong> 2024. LoFo: Lost & Found Lombok</p>
        </div>      
    </div>
    <script src="../JS/daftar-barang-hilang.js"></script>
</body>
</html>
