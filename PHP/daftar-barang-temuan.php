<?php
function generateUniqueId($prefix = 'idBT') {
    return $prefix . rand(1000, 9999);
}
include "PHP/cekSession.php";
require_once 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'PHP/config.php';

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $idBarangTemuan = generateUniqueId();
    $query_select = "SELECT idBarangTemuan FROM barangTemuan";
    $result_select = mysqli_query($conn, $query_select);
    while($row = mysqli_fetch_assoc($result_select)):
        if ($idBarangTemuan == $row['idBarangTemuan']) {
            $idBarangTemuan = generateUniqueId();
        }
    endwhile;
    $uploader = $_SESSION['username'];
    $namaBarang = mysqli_real_escape_string($conn, $_POST['namaBarang']);
    $kategoriBarang = mysqli_real_escape_string($conn, $_POST['kategoriBarang']);
    $tglPenemuan = mysqli_real_escape_string($conn, $_POST['tglPenemuan']);
    $tmptPenemuan = mysqli_real_escape_string($conn, $_POST['tmptPenemuan']);
    $informasiDetail = mysqli_real_escape_string($conn, $_POST['informasiDetail']);
    $noHP = mysqli_real_escape_string($conn, $_POST['noHP']);
    $kotaKabupaten = mysqli_real_escape_string($conn, $_POST['kotaKabupaten']);
    $datagambar = addslashes(file_get_contents($_FILES['gambarBarang']['tmp_name']));
    $propertiesgambar = getimageSize($_FILES['gambarBarang']['tmp_name']);
    $query = "INSERT INTO barangtemuan (idBarangTemuan,uploader,namaBarang, kategoriBarang, tanggalPenemuan, tempatPenemuan, kotaKabupaten, informasiDetail, noHP,tipeImage, gambarBarang) VALUES ('$idBarangTemuan','$uploader','$namaBarang', '$kategoriBarang', '$tglPenemuan', '$tmptPenemuan', '$kotaKabupaten', '$informasiDetail', '$noHP', '" . $propertiesgambar['mime'] . "', '" . $datagambar . "')";
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
    <title>Pendaftaran Barang Temuan</title>
    <link rel="stylesheet" href="../CSS/daftar-barang-hilang.css">
</head>
<body>
    <div class="container">
        <div class="content">
        <div class="judul-content">
                <a href="home.php"><img src="../PHP/icon/left-arrow.png" alt="Left"></a>
                <p>Form Barang Temuan</p>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <div class="input-data">
                    <label for="namaBarang">Nama Barang</label>
                    <input type="text" name="namaBarang" id="namaBarang" class="namaBarang">
                    <p class="p-namaBarang"></p>
                    <label for="kategoriBarang">Kategori Barang</label>
                    <select name="kategoriBarang" id="kategoriBarang" class="kategoriBarang">
                        <option value="0"></option>
                        <option value="Accessoris">Accessoris</option>
                        <option value="Kendaraan">Kendaraan</option>
                        <option value="Elektronik">Elektronik</option>
                        <option value="Document">Document</option>
                        <option value="Dan Lain-lain">Dan Lain-lain</option>
                    </select>
                    <p class="p-kategoriBarang"></p>
                    <label for="tglPenemuan">Tanggal Penemuan</label>
                    <input type="date" name="tglPenemuan" id="tglPenemuan" class="tglPenemuan">
                    <p class="p-tglPenemuan"></p>
                    <label for="tmptPenemuan">Tempat Penemuan</label>
                    <input type="text" name="tmptPenemuan" id="tmptPenemuan" class="tmptPenemuan">
                    <p class="p-tmptPenemuan"></p>
                    <label for="kotaKabupaten">Kota/Kabupaten</label>
                    <select name="kotaKabupaten" id="kotaKabupaten" class="kotaKabupaten">
                        <option value="0"></option>
                        <option value="Kota Mataram">Kota Mataram</option>
                        <option value="Lombok Barat">Lombok Barat</option>
                        <option value="Lombok Timur">Lombok Tengah</option>
                        <option value="Lombok Timur">Lombok Timur</option>
                        <option value="Lombok Utara">Lombok Utara</option>
                    </select>
                    <p class="p-kotaKabupaten"></p>
                    <label for="informasiDetail">Pertanyaan yang ingin diajukan mengenai barang</label>
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
    <!-- <script src="../JS/daftar-barang-temuan.js"></script> -->
</body>
</html>