<?php
session_start();
$akun = $_SESSION['username'];
include 'PHP/config.php';

// Ambil data akun dari database
$query = "SELECT * FROM akun WHERE username = '$akun'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
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
</div>
<script src="../JS/home.js"></script>
</body>
</html>
