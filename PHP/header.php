<?php
    $username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../CSS/header.css">
</head>
<body>
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
                <img src="icon/profil.png" alt="Profil" class="profil">
                <div class="akun-profil">
                    <img src="icon/arrow-up.png" alt="Panah" class="panah">
                    <div class="akun">
                        <img src="icon/profil.png" alt="profil">
                        <?php
                            echo "<p>$username</p>";
                        ?>
                    </div>
                    <div class="setting-akun">
                        <a href="#">Edit Profil</a>
                        <a href="PHP/logoutSubmit.php">Log Out</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- <script src="../JS/home.js"></script> -->
</body>
</html>