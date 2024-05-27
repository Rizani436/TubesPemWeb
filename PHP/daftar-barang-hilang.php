<?php
function generateUniqueId($prefix = 'idBH') {
    return $prefix . rand(1000, 9999);
}
include "PHP/cekSession.php";
require_once 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'PHP/config.php';

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $idBarangHilang = generateUniqueId();
    $query_select = "SELECT idBarangHilang FROM baranghilang";
    $result_select = mysqli_query($conn, $query_select);
    while($row = mysqli_fetch_assoc($result_select)):
        if ($idBarangHilang == $row['idBarangHilang']) {
            $idBarangHilang = generateUniqueId();
        }
    endwhile;
    $uploader = $_SESSION['username'];
    $namaBarang = mysqli_real_escape_string($conn, $_POST['namaBarang']);
    $kategoriBarang = mysqli_real_escape_string($conn, $_POST['kategoriBarang']);
    $tglKehilangan = mysqli_real_escape_string($conn, $_POST['tglKehilangan']);
    $tmptKehilangan = mysqli_real_escape_string($conn, $_POST['tmptKehilangan']);
    $informasiDetail = mysqli_real_escape_string($conn, $_POST['informasiDetail']);
    $noHP = mysqli_real_escape_string($conn, $_POST['noHP']);
    $kotaKabupaten = mysqli_real_escape_string($conn, $_POST['kotaKabupaten']);
    $datagambar = addslashes(file_get_contents($_FILES['gambarBarang']['tmp_name']));
    $propertiesgambar = getimageSize($_FILES['gambarBarang']['tmp_name']);
    $query = "INSERT INTO baranghilang (idBarangHilang,uploader,namaBarang, kategoriBarang, tanggalKehilangan, tempatKehilangan, kotaKabupaten, informasiDetail, noHP,tipeImage, gambarBarang) VALUES ('$idBarangHilang','$uploader','$namaBarang', '$kategoriBarang', '$tglKehilangan', '$tmptKehilangan', '$kotaKabupaten', '$informasiDetail', '$noHP', '" . $propertiesgambar['mime'] . "', '" . $datagambar . "')";
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
                        <option value="Accessoris">Accessoris</option>
                        <option value="Kendaraan">Kendaraan</option>
                        <option value="Elektronik">Elektronik</option>
                        <option value="Document">Document</option>
                        <option value="Dan Lain-lain">Dan Lain-lain</option>
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
                        <option value="Kota Mataram">Kota Mataram</option>
                        <option value="Lombok Barat">Lombok Barat</option>
                        <option value="Lombok Timur">Lombok Tengah</option>
                        <option value="Lombok Timur">Lombok Timur</option>
                        <option value="Lombok Utara">Lombok Utara</option>
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
