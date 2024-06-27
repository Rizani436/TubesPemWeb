<?php
include "PHP/cekSession.php";
require_once 'header.php';
$akun = $_SESSION['username']; 
include 'PHP/config.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$conditions = ["uploader = '$akun'"];
$locationFilter = "";
$categoryFilter = "";
$search = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" || isset($_GET['search'])) {
    if (!empty($_POST['location'])) {
        $locations = $_POST['location'];
        $locationFilter = implode(", ", $locations);
        $conditions[] = "kotaKabupaten IN ('" . implode("', '", $locations) . "')";
    }
    if (!empty($_POST['category'])) {
        $categories = $_POST['category'];
        $categoryFilter = implode(", ", $categories);
        $conditions[] = "kategoriBarang IN ('" . implode("', '", $categories) . "')";
    }
    if (!empty($_GET['search'])) {
        $search = mysqli_real_escape_string($conn, $_GET['search']);
        $conditions[] = "(namaBarang LIKE '%$search%' OR kategoriBarang LIKE '%$search%' OR tanggalPenemuan LIKE '%$search%' OR tempatPenemuan LIKE '%$search%' OR kotaKabupaten LIKE '%$search%' OR informasiDetail LIKE '%$search%' OR noHP LIKE '%$search%')";
    }
}

$query_select = "SELECT * FROM barangtemuan WHERE " . implode(" AND ", $conditions);

$result_select = mysqli_query($conn, $query_select);
if (!$result_select) {
    die("Error: " . mysqli_error($conn));
}

$lokasiText = "Semua Lokasi";
if (!empty($locationFilter)) {
    $lokasiText = $locationFilter;
}

$kategoriText = "Semua Kategori";
if (!empty($categoryFilter)) {
    $kategoriText = $categoryFilter;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Barang Temuan</title>
    <link rel="stylesheet" href="../CSS/histori-barang-temuan.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Merienda:wght@300..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="sidebar-left">
                <form id="searchForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
                    <div class="cari-barang">
                        <input type="search" name="search" placeholder="Cari Barang Anda di sini..." value="<?php echo htmlspecialchars($search); ?>">
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
                        <label for="Accessoris"> Aksesoris</label><br>
                        <input type="checkbox" id="Kendaraan" name="category[]" value="Kendaraan">
                        <label for="Kendaraan"> Kendaraan</label><br>
                        <input type="checkbox" id="Elektronik" name="category[]" value="Elektronik">
                        <label for="Elektronik"> Elektronik</label><br>
                        <input type="checkbox" id="Document" name="category[]" value="Document">
                        <label for="Document"> Dokumen</label><br>
                        <input type="checkbox" id="DanLainLain" name="category[]" value="Dan Lain-lain">
                        <label for="DanLainLain"> Dan Lain-lain</label><br>
                    </div>
                    <div class="filter">
                        <button type="submit">Cari</button>
                    </div>
                </form>
            </div>
            <div class="sidebar-right">
                <p class="judul">Riwayat Barang Temuan</p>
                <p class="lokasiText">Lokasi: <?php echo $lokasiText; ?></p>
                <p class="kategoriText">Kategori: <?php echo $kategoriText; ?></p>
                <?php if (mysqli_num_rows($result_select) == 0): ?>
                <div class="data-kosong">
                    <p>Tidak Ada Hasil yang Ditemukan</p>
                </div>
                <?php else: ?>
                <div class="isi-sidebar-right">
                    <?php while($row = mysqli_fetch_assoc($result_select)): ?>
                    <div class="item-barang" data-id="<?= htmlspecialchars($row['idBarangTemuan']) ?>">
                        <img src="data:image/jpeg;base64,<?= base64_encode($row['gambarBarang']) ?>" alt="Barang Temuan">
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
                            <div class="klaim">
                                <form class="Hapus" action="hapus-barang-Temuan.php" method="POST">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($row['idBarangTemuan']) ?>">
                                    <button type="submit">Hapus</button>
                                </form>
                                <form class ="Ubah" action="ubah-barang-Temuan.php" method="POST">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($row['idBarangTemuan']) ?>">
                                    <button type="submit">Ubah</button>
                                </form>
                                <form class ="Laporan" action="daftar-laporan-klaim.php" method="POST">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($row['idBarangTemuan']) ?>">
                                    <button type="submit">Laporan</button>
                                </form>
                            </div>
                        </div>
                        <div class="status">
                            <p>Status: <?= htmlspecialchars($row['status']) ?></p>
                            <form action="ubah-status.php" method="POST">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($row['idBarangTemuan']) ?>">
                                <select name="status">
                                    <option value="Selesai" <?= $row['status'] == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
                                    <option value="Diterima" <?= $row['status'] == 'Diterima' ? 'selected' : '' ?>>Diterima</option>
                                    <option value="Ditolak" <?= $row['status'] == 'Ditolak' ? 'selected' : '' ?>>Ditolak</option>
                                </select>
                                <button type="submit">Perbarui Status</button>
                            </form>
                        </div>
                    </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                </div>
            </div>
            <div class="back-top">
                <img src="icon/icons8-arrow-up.png" alt="Back to top">
            </div>
        </div>
        <div class="footer">
            <div class="footer-content">
                <div class="footer-section about">
                    <h1 class="logo-text">
                        <img src="image/lofo.png" alt="Logo" height="50" width="50"> <!-- Add your logo file here -->
                        <span>Lost & Found Lombok</span>
                    </h1>
                    <p>
                        Menemukan kembali barang hilang, membawa ketenangan, dan mengembalikan harapan.
                    </p>
                    <div class="contact">
                        <span><img src="icon/icons8-phone-100.png" alt="Phone Icon"> &nbsp; +62 123 4567</span>
                        <span><img src="icon/emailicon.png" alt="Email Icon"> &nbsp; LostNFound.Lombok@gmail.com</span>
                    </div>
                </div>
                <div class="footer-section social">
                    <h2>Ikuti kami</h2>
                    <div class="social-icons">
                        <a href="#"><img src="icon/facebookIcon.png" alt="Facebook Icon"></a>
                        <a href="#"><img src="icon/instagram.png" alt="Instagram Icon"></a>
                        <a href="#"><img src="icon/twitterx.png" alt="Twitter Icon"></a>
                        <a href="#"><img src="icon/linkedin.png" alt="LinkedIn Icon"></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                &copy; 2024 LoFo | Lost & Found Lombok
            </div> 
        </div>     
    </div>
    <script src="../JS/daftar-laporan-barang-hilang.js"></script>
</body>
</html>