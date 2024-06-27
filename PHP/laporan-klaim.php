<?php
include "PHP/cekSession.php";
require_once 'header.php';
include 'PHP/config.php';

// Periksa apakah $_POST['id'] diatur, jika tidak, inisialisasi ke string kosong
$penjawab = isset($_POST['id']) ? $_POST['id'] : '';
$idBarangTemuan = $_SESSION['idBarangTemuan'];

if (!empty($penjawab)) {
    $query_select = "SELECT * FROM jawabanPertanyaan WHERE penjawab = '$penjawab' and idBarangTemuan = '$idBarangTemuan'";
    $result_select = mysqli_query($conn, $query_select);
    if (!$result_select) {
        die("Error: " . mysqli_error($conn));
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['status'])) {
    $status = $_POST['status'];
    $query = "SELECT * FROM jawabanPertanyaan WHERE penjawab = '$penjawab' and idBarangTemuan = '$idBarangTemuan'";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }
    $row = mysqli_fetch_assoc($result);
    $idUser = $row['penjawab'];
    $query_user = "SELECT * FROM akun WHERE username = '$idUser'";
    $result_user = mysqli_query($conn, $query_user);
    if (mysqli_num_rows($result_user) > 0) {
        $pesan = $status === 'terima' ? "Telah menerima klaim barang Anda" : "Telah menolak klaim barang Anda";
        $idBarangTemuan = $_SESSION['idBarangTemuan'];
        $query_insert = "INSERT INTO notifikasi (idUser, pesanNotifikasi, idBarangTemuan) VALUES ('$idUser', '$pesan', '$idBarangTemuan')";
        if (!mysqli_query($conn, $query_insert)) {
            die("Error: " . mysqli_error($conn));
        }
        header('Location: daftar-laporan-klaim.php');
        exit();
    } else {
        echo "User tidak ditemukan.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Klaim</title>
    <link rel="stylesheet" href="../CSS/laporan-klaim.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Merienda:wght@300..900&display=swap" rel="stylesheet">

</head>
<body>
    <div class="container">
        <div class="content">
            <div class="klaim">
                <div class="popUp-terima">
                    <div class="terima">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                            <div class="header-terima">
                                <p>Klaim Barang</p>
                            </div>
                            <div class="isi-terima">
                                <p>Apakah Anda menerima klaim barang ini?</p>
                            </div>
                            <div class="footer-terima">
                                <button type="button">Tutup</button>
                                <input type="hidden" name="status" value="terima">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($penjawab) ?>">
                                <button type="submit">Terima</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="popUp-tolak">
                    <div class="tolak">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                            <div class="header-tolak">
                                <p>Klaim Barang</p>
                            </div>
                            <div class="isi-tolak">
                                <p>Apakah Anda menolak klaim barang ini?</p>
                            </div>
                            <div class="footer-tolak">
                                <button type="button">Tutup</button>
                                <input type="hidden" name="status" value="tolak">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($penjawab) ?>">
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
                    <?php 
                        $query = "SELECT * FROM barangTemuan WHERE idBarangTemuan = '$idBarangTemuan'";
                        $result = mysqli_query($conn, $query);
                        if (!$result) {
                            die("Error: " . mysqli_error($conn));
                        }
                        $gambar = mysqli_fetch_assoc($result); 
                    ?>
                    <img src="data:image/jpeg;base64,<?= base64_encode($gambar['gambarBarang']) ?>" alt="barang-klaim">
                    <p class="judul-klaim">Tas</p>
                    <table>
                        <?php while($row = mysqli_fetch_assoc($result_select)): ?>
                        <tr>
                            <td>Username</td>
                            <td><?= htmlspecialchars($row['penjawab']) ?></td>
                        </tr>
                        <tr>
                            <td>Pertanyaan</td>
                            <td><?= htmlspecialchars($row['pertanyaan']) ?></td>
                        </tr>
                        <tr>
                            <td>Jawaban Anda</td>
                            <td><?= htmlspecialchars($row['jawaban']) ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </table>
                    <div class="button-klaim">
                        <form class="Laporan" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                            <input type="hidden" name="status" value="tolak">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($penjawab) ?>">
                            <button type="submit" class="submitTolak">Tolak</button>
                        </form>
                        <form class="Laporan" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                            <input type="hidden" name="status" value="terima">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($penjawab) ?>">
                            <button type="submit" class="submitTerima">Terima</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="footer-content">
                <div class="footer-section about">
                    <h1 class="logo-text">
                        <img src="image/lofo.png" alt="Logo" height="50" width="50">
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
    <script src="../JS/laporan-klaim.js"></script>
</body>
</html>
