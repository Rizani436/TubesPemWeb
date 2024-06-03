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
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $idBarangTemuan = $_POST['idBH'];
            $query = "DELETE FROM `barangTemuan` WHERE idBarangTemuan = '$idBarangTemuan'";
            $result = mysqli_query($conn, $query);
            if ($result) {
                echo "<script>alert('Barang berhasil DiHapus');</script>";
                header("Location: histori-barang-temuan.php");
            } else {
                echo "<script>alert('Barang gagal DiHapus');</script>";
            }
            mysqli_close($conn);
        
        } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Klaim</title>
    <link rel="stylesheet" href="../CSS/hapus-histori.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="klaim">
                <p class="judul-content">Hapus Barang Temuan</p>
                <div class="isi-klaim">
                    <img src="data:image/jpeg;base64,<?= base64_encode($row['gambarBarang']) ?>">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <th>Nama Barang</th>
                                <td><?= htmlspecialchars($row['namaBarang']) ?></td>
                            </tr>
                            <tr>
                                <th>Kategori Barang</th>
                                <td><?= htmlspecialchars($row['kategoriBarang'])?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Penemuan</th>
                                <td><?= htmlspecialchars($row['tanggalPenemuan'])?></td>
                            </tr>
                            <tr>
                                <th>Tempat Penemuan</th>
                                <td><?= htmlspecialchars($row['tempatPenemuan'])?></td>
                            </tr>
                            <tr>
                                <th>Kota/Kabupaten</th>
                                <td><?= htmlspecialchars($row['kotaKabupaten'])?></td>
                            </tr>
                            <tr>
                                <th>Pertanyaan yang diajukan</th>
                                <td><?= htmlspecialchars($row['informasiDetail'])?></td>
                            </tr>
                            <tr>
                                <th>Nomor Handphone</th>
                                <td><?= htmlspecialchars($row['noHP'])?></td>
                            </tr>
                        </table>
                        <div class="button-klaim">
                            <a href="histori-barang-Temuan.php">Kembali</a>
                            <input type="hidden" name="idBH" value="<?= htmlspecialchars($row['idBarangTemuan']) ?>">
                            <button type="submit">Hapus</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
        <div class="footer">
            <p><bold>&copy;</bold> 2024. LoFo: Lost & Found Lombok</p>
        </div>      
    </div>
    <script src="../JS/home.js"></script>
</body>
</html>