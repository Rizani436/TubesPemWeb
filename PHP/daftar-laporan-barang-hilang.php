<?php
include "PHP/cekSession.php";
require_once 'header.php';
$username = $_SESSION['username']; 
include 'PHP/config.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data to display
$query_select = "SELECT * FROM baranghilang";
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
    <title>Barang Hilang</title>
    <link rel="stylesheet" href="../CSS/daftar-laporan-barang-hilang.css">
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
                        <li><button>All</button></li>
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
                <p class="judul">Barang Hilang</p>
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
                                <th>Tanggal Kehilangan</th>
                                <td><?= htmlspecialchars($row['tanggalKehilangan']) ?></td>
                            </tr>
                            <tr>
                                <th>Tempat Kehilangan</th>
                                <td><?= htmlspecialchars($row['tempatKehilangan']) ?></td>
                            </tr>
                            <tr>
                                <th>Kota/Kabupaten</th>
                                <td><?= htmlspecialchars($row['kotaKabupaten']) ?></td>
                            </tr>
                            <tr>
                                <th>Informasi Detail</th>
                                <td><?= htmlspecialchars($row['informasiDetail']) ?></td>
                            </tr>
                            <tr>
                                <th>Nomor Handphone</th>
                                <td><?= htmlspecialchars($row['noHP']) ?></td>
                            </tr>
                        </table>
                        <div class="reaction">
                            <img src="icon/love-white.png" alt="">
                            <p class="love">0 likes</p>
                        </div>
                    </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="footer">
            <p><bold>&copy;</bold> 2024. LoFo: Lost & Found Lombok</p>
        </div>      
    </div>
    <script src="../JS/daftar-laporan-barang-hilang.js"></script>
</body>
</html>
<?php
// Close the connection
mysqli_close($conn);
?>
