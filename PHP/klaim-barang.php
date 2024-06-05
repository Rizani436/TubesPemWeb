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
            <p><bold>&copy;</bold> 2024. LoFo: Lost & Found Lombok</p>
        </div>      
    </div>
    <script src="../JS/home.js"></script>
</body>
</html>