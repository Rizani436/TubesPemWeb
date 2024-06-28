<?php
// session_start();
$akun = $_SESSION['username'];
include 'PHP/config.php';

// Ambil data akun dari database
$query = "SELECT * FROM akun WHERE username = '$akun'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Ambil jumlah notifikasi yang belum dibaca
$query_notif = "SELECT COUNT(*) as unread_count FROM notifikasi WHERE idUser  = '$akun' AND `read` = 'belumDibaca'";
$result_notif = mysqli_query($conn, $query_notif);
$notif_data = mysqli_fetch_assoc($result_notif);
$unread_count = $notif_data['unread_count'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['message'])) {
        $message = $_POST['message'];
        $query_update = "UPDATE notifikasi SET `read` = 'sudahDibaca' WHERE pesanNotifikasi = '$message'";
        $result_update = mysqli_query($conn, $query_update);
        if (!$result_update) {
            die("Error: " . mysqli_error($conn));
        } else {
            header('Location: notifikasi.php');
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../CSS/header.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Merienda:wght@300..900&display=swap" rel="stylesheet">
</head>
<style>
        .profil, .akun img {
            width: 100px; /* Adjust size as needed */
            height: 100px; /* Adjust size as needed */
            border-radius: 50%;
            object-fit: cover;
        }
        .jumlah-notifikasi p {
            position: absolute;
            top: 0;
            right: 0;
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 5px;
            font-size: 12px;
        }
    </style>
<body>
<div class="container">
    <div class="header">
        <div class="logo">
            <img src="image/lofo.png" alt="logo">
            <h1>Lost & Found Lombok</h1>
        </div>
        <div class="menu-header">
            <ul>
                <li><a href="home.php">Beranda</a></li>
                <li class="menu-dropdown"><button>Daftar Laporan</button>
                    <ul class="dropdown">
                        <li><a href="daftar-laporan-barang-hilang.php">Kehilangan Barang</a></li>
                        <li><a href="daftar-laporan-barang-temuan.php">Penemuan Barang</a></li>
                    </ul>
                </li>
                <li class="menu-dropdown"><button>Riwayat Laporan</button>
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
            <a href="#" id="notifikasiLink">
                <img src="icon/notifikasi.png" alt="notifikasi" class="notifikasi">
                <?php if ($unread_count > 0) { ?>
                    <div class="jumlah-notifikasi">
                        <p><?php echo $unread_count; ?></p>
                    </div>
                <?php } ?>
            </a>
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
                    <a href="edit-profil.php">Perbarui Profil</a>
                    <a href="PHP/logoutSubmit.php">Keluar</a>
                </div>
            </div>
        </div>
    </div>
</div>
<form id="notificationForm" method="POST" style="display:none;">
    <input type="hidden" name="message" value="Telah menolak klaim barang Anda">
</form>
<script>
document.getElementById('notifikasiLink').addEventListener('click', function(event) {
    event.preventDefault();
    document.getElementById('notificationForm').submit();
});
</script>
<script src="../JS/home.js"></script>
</body>
</html>
