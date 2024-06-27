<?php
ob_start(); // Start output buffering
include "PHP/cekSession.php";
require_once 'header.php';
$akun = $_SESSION['username']; 
include 'PHP/config.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['id'])) {
    $idBarangHilang = $_POST['id'];
    $query_select = "SELECT * FROM baranghilang WHERE idBarangHilang = '$idBarangHilang'";
    $result_select = mysqli_query($conn, $query_select);
    if (!$result_select) {
        die("Error: " . mysqli_error($conn));
    }
    $row = mysqli_fetch_assoc($result_select);
} else {
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $idBarangHilang = $_POST['idBH'];
    $updates = [];
    
    if (!empty($_POST['nbBaru'])) {
        $namaBarang = mysqli_real_escape_string($conn, $_POST['nbBaru']);
        $updates[] = "namaBarang = '$namaBarang'";
    }
    
    if (!empty($_POST['kbBaru'])) {
        $kategoriBarang = mysqli_real_escape_string($conn, $_POST['kbBaru']);
        $updates[] = "kategoriBarang = '$kategoriBarang'";
    }
    
    if (!empty($_POST['tglBaru'])) {
        $tglKehilangan = mysqli_real_escape_string($conn, $_POST['tglBaru']);
        $updates[] = "tanggalKehilangan = '$tglKehilangan'";
    }
    
    if (!empty($_POST['tmptBaru'])) {
        $tmptKehilangan = mysqli_real_escape_string($conn, $_POST['tmptBaru']);
        $updates[] = "tempatKehilangan = '$tmptKehilangan'";
    }
    
    if (!empty($_POST['kkBaru'])) {
        $kotaKabupaten = mysqli_real_escape_string($conn, $_POST['kkBaru']);
        $updates[] = "kotaKabupaten = '$kotaKabupaten'";
    }
    
    if (!empty($_POST['idBaru'])) {
        $informasiDetail = mysqli_real_escape_string($conn, $_POST['idBaru']);
        $updates[] = "informasiDetail = '$informasiDetail'";
    }
    
    if (!empty($_POST['nhBaru'])) {
        $noHP = mysqli_real_escape_string($conn, $_POST['nhBaru']);
        $updates[] = "noHP = '$noHP'";
    }

    if (!empty($_POST['selesaiBaru'])) {
        $status = mysqli_real_escape_string($conn, $_POST['selesaiBaru']);
        $updates[] = "status = '$status'";
    }
    
    if (!empty($_FILES['fotoBaru']['tmp_name'])) {
        $datagambar = addslashes(file_get_contents($_FILES['fotoBaru']['tmp_name']));
        $propertiesgambar = getimageSize($_FILES['fotoBaru']['tmp_name']);
        $updates[] = "tipeImage = '" . $propertiesgambar['mime'] . "', gambarBarang =  '" . $datagambar . "'";
    }

    if (count($updates) > 0) {
        $query = "UPDATE baranghilang SET " . implode(", ", $updates) . ", uploader='$akun' WHERE idBarangHilang = '$idBarangHilang'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "<script>alert('Barang berhasil diUpdate');</script>";
            header("Location: histori-barang-hilang.php");
            exit(); // Ensure script stops after redirect
        } else {
            echo "<script>alert('Barang gagal diUpdate');</script>";
        }
    } else {
        echo "<script>alert('Tidak ada data yang diupdate');</script>";
    }
    mysqli_close($conn);
    ob_end_flush(); // Flush the output buffer
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Barang Hilang</title>
    <link rel="stylesheet" href="../CSS/ubah-barang.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Merienda:wght@300..900&display=swap" rel="stylesheet">

</head>
<body>
    <div class="container">
        <div class="content">
            <div class="klaim">
                <p class="judul-content">Ubah Barang Hilang</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <div class="isi-klaim">
                    <div class="foto-barang">
                        <label for="fotoBaru"><img src="data:image/jpeg;base64,<?= base64_encode($row['gambarBarang']) ?>" alt="barang-klaim"></label>
                        <input type="file" name="fotoBaru" id="fotoBaru" accept="image/*">
                    </div>
                        <table>
                            <tr>
                                <th>Nama Barang</th>
                                <td><?= htmlspecialchars($row['namaBarang']) ?></td>
                                <td><label for="nbBaru">Nama Barang baru</label></td>
                                <td><input type="text" name="nbBaru" id="nbBaru"></td>
                            </tr>
                            <tr>
                                <th>Kategori Barang</th>
                                <td><?= htmlspecialchars($row['kategoriBarang'])?></td>
                                <td><label for="kbBaru">Kategori Barang baru</label></td>
                                <td><select name="kbBaru" id="kbBaru">
                                    <option value="0"></option>
                                    <option value="Accessoris">Accessoris</option>
                                    <option value="Kendaraan">Kendaraan</option>
                                    <option value="Elektronik">Elektronik</option>
                                    <option value="Document">Document</option>
                                    <option value="Dan Lain-lain">Dan Lain-lain</option>
                                </select></td>
                            </tr>
                            <tr>
                                <th>Tanggal Kehilangan</th>
                                <td><?= htmlspecialchars($row['tanggalKehilangan'])?></td>
                                <td><label for="nbBaru">Tanggal Kehilangan baru</label></td>
                                <td><input type="date" name="tglBaru" id="tglBaru"></td>
                            </tr>
                            <tr>
                                <th>Tempat Kehilangan</th>
                                <td><?= htmlspecialchars($row['tempatKehilangan'])?></td>
                                <td><label for="tmptBaru">Tempat Kehilangan baru</label></td>
                                <td><input type="text" name="tmptBaru" id="tmptBaru"></td>
                            </tr>
                            <tr>
                                <th>Kota/Kabupaten</th>
                                <td><?= htmlspecialchars($row['kotaKabupaten'])?></td>
                                <td><label for="nbBaru">Kota/Kabupaten baru</label></td>
                                <td><select name="kkBaru" id="kkBaru" class="kkBaru">
                                    <option value="0"></option>
                                    <option value="Kota Mataram">Kota Mataram</option>
                                    <option value="Lombok Barat">Lombok Barat</option>
                                    <option value="Lombok Timur">Lombok Tengah</option>
                                    <option value="Lombok Timur">Lombok Timur</option>
                                    <option value="Lombok Utara">Lombok Utara</option>
                                </select></td>
                            </tr>
                            <tr>
                                <th>Informasi Detail</th>
                                <td><?= htmlspecialchars($row['informasiDetail'])?></td>
                                <td><label for="idBaru">Informasi Detail baru</label></td>
                                <td><input type="text" name="idBaru" id="idBaru" maxlength="255"></td>
                            </tr>
                            <tr>
                                <th>Nomor Handphone</th>
                                <td><?= htmlspecialchars($row['noHP'])?></td>
                                <td><label for="nhBaru">Nomor Handphone baru</label></td>
                                <td><input type="text" name="nhBaru" id="nhBaru"></td>
                            </tr>
                        </table>
                        <div class="button-klaim">
                            <a href="histori-barang-hilang.php">Kembali</a>
                            <input type="hidden" name="idBH" value="<?= htmlspecialchars($row['idBarangHilang']) ?>">
                            <button type="submit" >Ubah</button>
                        </div>
                    </div>
                </form>
                
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
    <script src="../JS/home.js"></script>
    <script src="../JS/home.js"></script>
</body>
</html>