<?php
    include "PHP/cekSession.php";
    require_once 'header.php';
    include 'PHP/config.php';
    if(isset($_POST['id'])){
        $_SESSION['idBarangTemuan'] = $_POST['id'];
    }
    $idBarangTemuan = $_SESSION['idBarangTemuan'];
    $query_select = "SELECT DISTINCT penjawab FROM jawabanPertanyaan WHERE idBarangTemuan = '$idBarangTemuan'";
    $result_select = mysqli_query($conn, $query_select);
    if (!$result_select) {
        die("Error: " . mysqli_error($conn));
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Laporan Klaim</title>
    <link rel="stylesheet" href="../CSS/daftar-laporan-klaim.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="klaim">
                <div class="header-klaim">
                    <a href="histori-barang-temuan.php"><img src="icon/left-arrow.png" alt="Kembali" height="40" width="40"></a>
                    <p>Daftar Laporan Klaim</p>
                </div>
                <table>
                    <tr>
                        <td>Nama</td>
                        <td>Username</td>
                        <td>Alamat</td>
                        <td>Tombol</td>
                    </tr>
                    <?php if (mysqli_num_rows($result_select) == 0): ?>
                        <tr>
                            <td colspan="4" class="td-kosong">Tidak ada data</th>
                        </tr>
                    <?php else: ?>
                    <?php while($row = mysqli_fetch_assoc($result_select)): ?>
                        <?php 
                            $tempPenjawab = $row['penjawab'];
                            $query = "SELECT * FROM akun WHERE username = '$tempPenjawab'";
                            $result = mysqli_query($conn, $query);
                            if (!$result) {
                                die("Error: " . mysqli_error($conn));
                            }
                            $data = mysqli_fetch_assoc($result); 
                        ?>
                    <tr>
                        <td><?= htmlspecialchars($data['namaLengkap']) ?></td>
                        <td><?= htmlspecialchars($data['username']) ?></td>
                        <td><?= htmlspecialchars($data['alamat']) ?></td>
                        <td>
                            <form class="Laporan" action="laporan-klaim.php" method="POST">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($row['penjawab']) ?>">
                                <button type="submit">Lihat Jawaban</button>
                            </form>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php endif; ?>
                </table>
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
    <!-- <script src="../JS/home.js"></script> -->
</body>
</html>
