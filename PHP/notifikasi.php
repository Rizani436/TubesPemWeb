<?php
    include "PHP/cekSession.php";
    require_once 'header.php';
    $akun = $_SESSION['username']; 
    include 'PHP/config.php';
    $query_select = "SELECT * FROM notifikasi WHERE idUser = '$akun'";
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
    <title>Notifikasi</title>
    <link rel="stylesheet" href="../CSS/notifikasi.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Merienda:wght@300..900&display=swap" rel="stylesheet">

</head>
<body>
    <div class="container">
        <div class="content">
            <div class="klaim">
                <div class="header-klaim">
                    <a href="home.php"><img src="icon/left-arrow.png" alt="Kembali" height="40" width="40"></a>
                    <p>Notifikasi</p>
                </div>
                <table>
                    <tr>
                        <th>Pesan</th>
                        <th>Tautan</th>
                    </tr>
                    <?php if (mysqli_num_rows($result_select) == 0): ?>
                        <tr>
                            <td colspan="4">Tidak ada data</th>
                        </tr>
                    <?php else: ?>
                    <?php while($row = mysqli_fetch_assoc($result_select)): ?>
                    <tr>
                        <td><?php
                            echo $row['pesanNotifikasi'];
                        ?>
                        </td>
                        <?php if($row['pesanNotifikasi'] == "Telah menerima klaim barang Anda"): ?>
                            <form class="Laporan" action="terima-klaim-barang.php" method="POST">
                                <td>
                                <input type="hidden" name="id" value="<?= htmlspecialchars($row['notification_id']) ?>">
                                <input type="hidden" name="update_read" value="sudahDibaca">
                                <button type="submit">Tampilkan</button>
                                </td>
                            </form>
                        <?php else: ?>
                            <td></td>
                        <?php endif; ?>
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
