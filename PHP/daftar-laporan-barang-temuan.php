<?php
include "PHP/cekSession.php";
require_once 'header.php';
$username = $_SESSION['username']; 
include 'PHP/config.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query_select = "SELECT * FROM barangtemuan";
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
    <title>Barang Temuan</title>
    <link rel="stylesheet" href="../CSS/daftar-laporan-barang-temuan.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="sidebar-left">
                <div class="cari-barang">
                    <input type="text" placeholder="Cari Barang Anda di sini...">
                    <img src="icon/Cari.png" alt="Searching">
                </div>
                <div class="lokasi-barang">
                    <p>Kota/Kabupaten</p>
                    <ul>
                        <li><button>All</a></li>
                        <li><button>Kota Mataram</button></li>
                        <li><button>Lombok Barat</button></li>
                        <li><button>Lombok Tengah</button></li>
                        <li><button>Lombok Timur</button></li>
                        <li><button>Lombok Utara</button></li>
                    </ul>
                </div>
                <div class="kategori">
                    <p>Kategori</p>
                    <ul>
                        <li><button>All</button></li>
                        <li><button>Accessoris</button></li>
                        <li><button>Kendaraan</button></li>
                        <li><button>Elektronik</button></li>
                        <li><button>Document</button></li>
                        <li><button>Dan Lain-lain</button></li>
                    </ul>
                </div>
            </div>
            <div class="sidebar-right">
                <p class="judul">Barang Temuan</p>
                <p class="resultText"></p>
            <?php if (mysqli_num_rows($result_select) == 0): ?>
                <div class="data-kosong">
                    <p>No Result</p>
                </div>
            <?php else: ?>
                <div class="isi-sidebar-right">
                    <?php while($row = mysqli_fetch_assoc($result_select)): ?>
                    <div class="item-barang">
                        <div class="user">
                            <img src="icon/profil.png" alt="">
                            <p class="username"><?= htmlspecialchars($row['uploader']) ?></p>
                        </div>
                        <img src="data:image/jpeg;base64,<?= base64_encode($row['gambarBarang']) ?>" alt="Barang Hilang">
                        <table>
                            <tr>
                                <th>Nama Barang</th>
                                <td><?= htmlspecialchars($row['namaBarang']) ?></td>
                            </tr>
                            <tr>
                                <th>Kategori Barang</th>
                                <td><?= htmlspecialchars($row['kategoriBarang']) ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Penemuan</th>
                                <td><?= htmlspecialchars($row['tanggalPenemuan']) ?></td>
                            </tr>
                            <tr>
                                <th>Tempat Penemuan</th>
                                <td><?= htmlspecialchars($row['tempatPenemuan']) ?></td>
                            </tr>
                            <tr>
                                <th>Kota/Kabupaten</th>
                                <td><?= htmlspecialchars($row['kotaKabupaten']) ?></td>
                            </tr>
                        </table>
                        <div class="reaction">
                            <div class="like">
                                <img src="icon/love-white.png" alt="">
                                <p class="love">0 likes</p>
                            </div>
                            <div class="klaim">
                                <p><a href="#">Klaim</a></p>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="footer">
            <p><bold>&copy;</bold> 2024. LoFo: Lost & Found Lombok</p>
        </div>      
    </div>
    <!-- <script src="../JS/home.js"></script> -->
    <script src="../JS/daftar-laporan-barang-temuan.js"></script>
</body>
</html>