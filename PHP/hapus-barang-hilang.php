<?php
        include "PHP/cekSession.php";
        // require_once 'header.php';
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
        }else{
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $idBarangHilang = $_POST['idBH'];
            $query = "DELETE FROM `baranghilang` WHERE idBarangHilang = '$idBarangHilang'";
            $result = mysqli_query($conn, $query);
            if ($result) {
                echo "<script>alert('Barang berhasil DiHapus');</script>";
                header("Location: histori-barang-hilang.php");
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
    <link rel="stylesheet" href="../CSS/header.css">
    <style>
        .profil, .akun img {
            width: 100px; /* Adjust size as needed */
            height: 100px; /* Adjust size as needed */
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="container">
    <div class="header">
        <div class="logo">
            <img src="image/lofo.png" alt="logo">
            <h1>Lost & Found Lombok</h1>
        </div>
        <div class="menu-header">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li class="menu-dropdown"><button>Daftar Laporan</button>
                    <ul class="dropdown">
                        <li><a href="daftar-laporan-barang-hilang.php">Kehilangan Barang</a></li>
                        <li><a href="daftar-laporan-barang-temuan.php">Penemuan Barang</a></li>
                    </ul>
                </li>
                <li class="menu-dropdown"><button>Histori Laporan</button>
                    <ul class="dropdown">
                        <li><a href="histori-barang-hilang.php">Kehilangan Barang</a></li>
                        <li><a href="histori-barang-temuan.php">Penemuan Barang</a></li>
                    </ul>
                </li>
                <li class="menu-dropdown"><button>Lapor</button>
                    <ul class="dropdown">
                        <li><a href="daftar-barang-hilang.php">Kehilangan Barang</a></li>
                        <li><a href="daftar-barang-temuan.php">Penemuan Barang</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="akun-login">
            <img src="icon/notifikasi.png" alt="notifikasi" class="notifikasi">
            <div class="jumlah-notifikasi">
                <p>1</p>
            </div>
            <img src="<?php echo empty($row['fotoProfil']) ? 'icon/profil.png' : 'data:' . $row['tipeImage'] . ';base64,' . base64_encode($row['fotoProfil']); ?>" alt="Profil" class="profil">
            <div class="akun-profil">
                <img src="icon/arrow-up.png" alt="Panah" class="panah">
                <div class="akun">
                    <img src="<?php echo empty($row['fotoProfil']) ? 'icon/profil.png' : 'data:' . $row['tipeImage'] . ';base64,' . base64_encode($row['fotoProfil']); ?>" alt="profil">
                    <?php
                        echo "<p>$akun</p>";
                    ?>
                </div>
                <div class="setting-akun">
                    <a href="edit-profil.php">Edit Profil</a>
                    <a href="PHP/logoutSubmit.php">Log Out</a>
                </div>
            </div>
        </div>
    </div>
        <div class="content">
            <div class="klaim">
                <p class="judul-content">Hapus Barang Hilang</p>
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
                                <th>Tanggal Kehilangan</th>
                                <td><?= htmlspecialchars($row['tanggalKehilangan'])?></td>
                            </tr>
                            <tr>
                                <th>Tempat Kehilangan</th>
                                <td><?= htmlspecialchars($row['tempatKehilangan'])?></td>
                            </tr>
                            <tr>
                                <th>Kota/Kabupaten</th>
                                <td><?= htmlspecialchars($row['kotaKabupaten'])?></td>
                            </tr>
                            <tr>
                                <th>Informasi Detail</th>
                                <td><?= htmlspecialchars($row['informasiDetail'])?></td>
                            </tr>
                            <tr>
                                <th>Nomor Handphone</th>
                                <td><?= htmlspecialchars($row['noHP'])?></td>
                            </tr>
                        </table>
                        <div class="button-klaim">
                            <a href="histori-barang-hilang.php">Kembali</a>
                            <input type="hidden" name="idBH" value="<?= htmlspecialchars($row['idBarangHilang']) ?>">
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
    <script src="../JS/home.js"></script>
    <script src="../JS/home.js"></script>
    
</body>
</html>