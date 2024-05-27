<?php
    $username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../CSS/dashboard.css">
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
            <img src="../PHP/icon/profil.png" alt="Logo">
            
            <div class="akun-profil">
                <div class="panah">
                    <img src="../PHP/icon/arrow-up.png" alt="">
                </div>
                <div class="akun">
                    <img src="../../PHP/icon/profil.png" alt="Logo">
                    <p><?php echo $username ?></p>
                </div>
                <div class="setting-akun">
                    <a href="#">Edit</a>
                    <a href="logoutSubmit.php">Logo Out</a>
                </div>
            </div>
            <!-- <p>Lost & Found Lombok</p> -->
        </div>
    </div>
    <script src="../JS/dashboard.js"></script>
    </div>
</body>
</html>