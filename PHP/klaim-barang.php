<?php
    include "PHP/cekSession.php";
    require_once 'header.php';
    $akun = $_SESSION['username']; 
    include 'PHP/config.php';
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    if (isset($_POST['id'])) {
        $idBarangTemuan = $_POST['id'];
        $query_select = "SELECT * FROM barangTemuan WHERE idBarangTemuan = '$idBarangTemuan'";
        $result_select = mysqli_query($conn, $query_select);
        if (!$result_select) {
            die("Error: " . mysqli_error($conn));
        }
        $row = mysqli_fetch_assoc($result_select);
    }else{

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../CSS/klaim-barang.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="klaim">
                <p>Klaim Barang</p>
                <p>Jawablah pertanyaan di bawah ini sesuai dengan yang anda ketahui mengenai barang ini.</p>
                <p>Pertanyaan</p>
                <p><?php echo $row['informasiDetail'] ?></p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get" enctype="multipart/form-data">
                    <label for="jawaban">Jawaban Anda</label>
                    <textarea name="jawaban" id="" cols="50" rows="10"></textarea>
                    <button type="submit">Klaim</button>
                </form>
                <a href="daftar-laporan-barang-temuan.php"><button>Kembali</button></a>
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
    <!-- <script src="../JS/home.js"></script> -->
</body>
</html>