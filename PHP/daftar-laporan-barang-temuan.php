<?php
include "PHP/cekSession.php";
require_once 'header.php';
$username = $_SESSION['username']; 
include 'PHP/config.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$conditions = [];
$locationFilter = "";
$categoryFilter = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['location'])) {
        $locations = $_POST['location'];
        $locationFilter = implode("', '", $locations);
        $conditions[] = "kotaKabupaten IN ('$locationFilter')";
    }
    if (!empty($_POST['category'])) {
        $categories = $_POST['category'];
        $categoryFilter = implode("', '", $categories);
        $conditions[] = "kategoriBarang IN ('$categoryFilter')";
    }
}
$query_select = "SELECT * FROM barangtemuan WHERE status = 'diterima'";
if (!empty($conditions)) {
    $query_select .= " AND " . implode(" AND ", $conditions);
}

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
                <form id="searchForm" action="/search" method="GET">
                    <div class="cari-barang">
                        <input type="search" name="query" placeholder="Cari Barang Anda di sini...">
                        <button type="submit" class="icon-cari"><img src="icon/Cari.png" alt="Searching"></button>
                    </div>
                </form>
                <form id="filterForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="lokasi-barang">
                        <p>Kota/Kabupaten</p>
                        <input type="checkbox" id="KotaMataram" name="location[]" value="Kota Mataram">
                        <label for="KotaMataram"> Kota Mataram</label><br>
                        <input type="checkbox" id="LombokBarat" name="location[]" value="Lombok Barat">
                        <label for="LombokBarat"> Lombok Barat</label><br>
                        <input type="checkbox" id="LombokTengah" name="location[]" value="Lombok Tengah">
                        <label for="LombokTengah"> Lombok Tengah</label><br>
                        <input type="checkbox" id="LombokTimur" name="location[]" value="Lombok Timur">
                        <label for="LombokTimur"> Lombok Timur</label><br>
                        <input type="checkbox" id="LombokUtara" name="location[]" value="Lombok Utara">
                        <label for="LombokUtara"> Lombok Utara</label><br>
                    </div>
                    <div class="kategori">
                        <p>Kategori</p>
                        <input type="checkbox" id="Accessoris" name="category[]" value="Accessoris">
                        <label for="Accessoris"> Accessoris</label><br>
                        <input type="checkbox" id="Kendaraan" name="category[]" value="Kendaraan">
                        <label for="Kendaraan"> Kendaraan</label><br>
                        <input type="checkbox" id="Elektronik" name="category[]" value="Elektronik">
                        <label for="Elektronik"> Elektronik</label><br>
                        <input type="checkbox" id="Document" name="category[]" value="Document">
                        <label for="Document"> Document</label><br>
                        <input type="checkbox" id="DanLainLain" name="category[]" value="Dan Lain-lain">
                        <label for="DanLainLain"> Dan Lain-lain</label><br>
                    </div>
                    <div class="filter">
                        <button type="submit">Filter</button>
                    </div>
                </form>
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
                                <form class ="Laporan" action="klaim-barang.php" method="POST">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($row['idBarangTemuan']) ?>">
                                    <button type="submit">Klaim</button>
                                </form>
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