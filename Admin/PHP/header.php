<?php
include 'config.php';
$akun = $_SESSION['username'];

// Ambil data akun dari database
$query = "SELECT * FROM admin WHERE username = '$akun'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../CSS/dashboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Merienda:wght@300..900&display=swap" rel="stylesheet">
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
        <div class="header-left">
            <div class="judul-header">
                <img src="../../PHP/image/icons8-menu-50.png" alt=""class='menu-left'>
                <p class="judul-header">Lost & Found Lombok</p>
            </div>
            
            <div class="header-left-menu">
                <div class="menu-top">
                    <img src="../../PHP/icon/left-arrow.png" alt="" class="close-menu">
                    <img src="../../PHP/image/lofo.png" alt="" class="logo">
                </div>
                <div class="menu-bottom">
                    <ul>
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li><a href="akun.php">Kelola Akun</a></li>
                        <li class="menu-dropdown"><button>Verifikasi Informasi ></button>
                            <ul class="dropdown">
                                <li><a href="verifikasi-barang-hilang.php">Kehilangan Barang</a></li>
                                <li><a href="verifikasi-barang-temuan.php">Penemuan Barang</a></li>
                            </ul>
                        </li>
                        <li class="menu-dropdown"><button>Kelola Sistem ></button>
                            <ul class="dropdown">
                                <li><a href="sistem-barang-hilang.php">Kehilangan Barang</a></li>
                                <li><a href="sistem-barang-temuan.php">Penemuan Barang</a></li>
                            </ul>
                        </li>
                    </ul>    
                </div>
            </div>
        </div>
        <div class="header-right">
            <img src="<?php echo empty($row['fotoProfil']) ? 'icon/profil.png' : 'data:' . $row['tipeImage'] . ';base64,' . base64_encode($row['fotoProfil']); ?>" alt="Profil" class="profil">
            
            <div class="akun-profil">
                <div class="panah">
                    <img src="../PHP/icon/arrow-up.png" alt="">
                </div>
                <div class="akun">
                    <img src="<?php echo empty($row['fotoProfil']) ? 'icon/profil.png' : 'data:' . $row['tipeImage'] . ';base64,' . base64_encode($row['fotoProfil']); ?>" alt="profil">
                    <?php
                        echo "<p>$akun</p>";
                    ?>
                </div>
                <div class="setting-akun">
                    <a href="edit-profil.php">Perbarui Profil</a>
                    <a href="logoutSubmit.php">Keluar</a>
                </div>
            </div>
            <!-- <p>Lost & Found Lombok</p> -->
        </div>
    </div>
    <script src="../JS/header.js"></script>
    </div>
</body>
</html>