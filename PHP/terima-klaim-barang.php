<?php
include "PHP/cekSession.php";
require_once 'header.php';
$username = $_SESSION['username']; 
include 'PHP/config.php';

if (isset($_POST['update_read']) && $_POST['update_read'] == 'sudahDibaca') {
    $id = $_POST['id'];
    $query_update = "UPDATE notifikasi SET `read` = 'sudahDibaca' WHERE notification_id = '$id'";
    $result_update = mysqli_query($conn, $query_update);
    if (!$result_update) {
        die("Error: " . mysqli_error($conn));
    }
}

$id = $_POST['id'];
$query_select = "SELECT * FROM notifikasi WHERE notification_id = '$id'";
$result_select = mysqli_query($conn, $query_select);
if (!$result_select) {
    die("Error: " . mysqli_error($conn));
}
$row = mysqli_fetch_assoc($result_select);
$idBarangTemuan = $row['idBarangTemuan'];
$query_select = "SELECT * FROM barangTemuan WHERE idBarangTemuan = '$idBarangTemuan'";
$result_select = mysqli_query($conn, $query_select);
if (!$result_select) {
    die("Error: " . mysqli_error($conn));
}
$row = mysqli_fetch_assoc($result_select);
$noHP = $row['noHP']; // Ambil nomor HP dari database

// Ganti 0 di awal nomor dengan +62
if (substr($noHP, 0, 1) === '0') {
    $noHP = '+62' . substr($noHP, 1);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terima Klaim Barang</title>
    <link rel="stylesheet" href="../CSS/terima-klaim-barang.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Merienda:wght@300..900&display=swap" rel="stylesheet">

</head>
<body>
    <div class="container">
        <div class="content">
            <div class="klaim">
                <div class="header-klaim">
                    <a href="notifikasi.php"><img src="icon/left-arrow.png" alt="Kembali" height="40" width="40"></a>
                    <p>Terima Laporan Klaim</p>
                </div>
                <div class="isi-klaim">
                <img src="data:image/jpeg;base64,<?= base64_encode($row['gambarBarang']) ?>" alt="Barang Temuan">
                    <p class="judul-klaim">Tas</p>
                    <table>
                        <tr>
                            <th>Username</th>
                            <td><?php echo $row['uploader'] ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Penemuan</th>
                            <td><?php echo $row['tanggalPenemuan'] ?></td>
                        </tr>
                        <tr>
                            <th>Tempat Penemuan</th>
                            <td><?php echo $row['tempatPenemuan'] ?></td>
                        </tr>
                        <tr>
                            <th>Kota/Kabupaten</th>
                            <td><?php echo $row['kotaKabupaten'] ?></td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td><?php echo $row['kategoriBarang'] ?></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td class="td-terima"><p>Diterima</p></td>
                        </tr>
                    </table>
                    <div class="button-klaim">
                        <a href="https://wa.me/<?= $noHP ?>">
                            <img src="icon/social.png" alt="WhatsApp" height="50px" width="50px">
                            <p>Chat WhatsApp</p>
                        </a>
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
