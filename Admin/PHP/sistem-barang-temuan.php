<?php
include "cekSession.php";
require_once 'header.php';
$akun = $_SESSION['username']; 
include 'config.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query_select = "SELECT * FROM barangtemuan where status != 'menunggu'";

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
    <link rel="stylesheet" href="../CSS/sistem-barang-hilang.css">
    <title>Kelola Sistem Barang Temuan</title>
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="popUp-terima">
                <div class="terima">
                    <form action="sistem-barang-temuan.php" method="get" class="formTerima">
                        <div class="header-terima">    
                            <p>Kelola Sistem Penemuan Barang</p>
                            <p>Ubah Kasus</p>
                        </div>
                        <div class="isi-terima">
                            <table>
                                <tr>
                                    <td><label for="namaBarang">Nama Barang</label></td>
                                    <td><input type="text" name="namaBarang" id="namaBarang" class="namaBarang"></td>
                                    
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><p class="p-namaBarang"></p></td>
                                </tr>
                                <tr>
                                    <td><label for="kategoriBarang">Kategori Barang</label></td>
                                    <td><select name="kategoriBarang" id="kategoriBarang" class="kategoriBarang">
                                        <option value="0"></option>
                                        <option value="Accessoris">Accessoris</option>
                                        <option value="Kendaraan">Kendaraan</option>
                                        <option value="Elektronik">Elektronik</option>
                                        <option value="Document">Document</option>
                                        <option value="Dan Lain-lain">Dan Lain-lain</option>
                                    </select></td>
                                    
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><p class="p-kategoriBarang"></p></td>
                                </tr>
                                <tr>
                                    <td><label for="tglPenemuan">Tanggal Penemuan</label></td>
                                    <td><input type="date" name="tglPenemuan" id="tglPenemuan" class="tglPenemuan"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><p class="p-tglPenemuan"></p></td>
                                </tr>
                                <tr>
                                    <td><label for="tmptPenemuan">Tempat Penemuan</label></td>
                                    <td><input type="text" name="tmptPenemuan" id="tmptPenemuan" class="tmptPenemuan"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><p class="p-tmptPenemuan"></p></td>
                                </tr>
                                <tr>
                                    <td><label for="kotaKabupaten">Kota/Kabupaten</label></td>
                                    <td><select name="kotaKabupaten" id="kotaKabupaten" class="kotaKabupaten">
                                        <option value="0"></option>
                                        <option value="Kota Mataram">Kota Mataram</option>
                                        <option value="Lombok Barat">Lombok Barat</option>
                                        <option value="Lombok Timur">Lombok Tengah</option>
                                        <option value="Lombok Timur">Lombok Timur</option>
                                        <option value="Lombok Utara">Lombok Utara</option>
                                    </select></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><p class="p-kotaKabupaten"></p></td>
                                </tr>
                                <tr>
                                    <td><label for="informasiDetail">Informasi Detail</label></td>
                                    <td><input type="text" name="informasiDetail" id="informasiDetail" class="informasiDetail"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><p class="p-informasiDetail"></p></td>
                                </tr>
                                <tr>
                                    <td><label for="noHP">Nomor Handphone</label></td>
                                    <td><input type="text" name="noHP" id="noHP" class="noHP"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><p class="p-noHP"></p></td>
                                </tr>
                                <tr>
                                    <td><label for="gambarBarang">Gambar Barang</label></td>
                                    <td><input type="file" name="gambarBarang" id="gambarBarang" accept="image/*"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><p class="p-gambarBarang"></p></td>
                                </tr>
                            </table>    
                        </div>
                        <div class="footer-terima">
                            <button type="button">Tutup</button>
                            <button type="submit">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="popUp-tolak">
                <div class="tolak">
                    <div class="header-tolak">
                        <p>Kelola Sistem Penemuan Barang</p>
                    </div>
                    <div class="isi-tolak">
                        <p>Apakah sistem menghapus kasus Penemuan barang ini ?</p>
                    </div>
                    <div class="footer-tolak">
                        <button type="button">Batal</button>
                        <button type="submit">Hapus</button>
                    </div>
                </div>
            </div>
            <div class="content-top">
                <p class="judul-content">Kelola Sistem</p>
                <p class="child-judul">Barang Temuan</p>
                <div class="form">
                    <a href="sistem-barang-hilang.php">Barang Hilang ></a>
                    <form action="/index">
                        <input type="text" name="" id="" class="cari">
                        <input type="submit" value="Cari">
                    </form>
                </div>
                <table class="table">
                    <tr>
                        <th>Foto</th>
                        <th>Username</th>
                        <th>Nama Barang</th>
                        <th>Kategori Barang</th>
                        <th>Tanggal Penemuan</th>
                        <th>Tempat Penemuan</th>
                        <th>Kota/Kabupaten</th>
                        <th>Informasi Detail</th>
                        <th>Nomor Handphone</th>
                        <th>Action</th>
                        <th>Status</th>
                    </tr>
                    <?php while($row = mysqli_fetch_assoc($result_select)): ?>
                        <tr data-id="<?= htmlspecialchars($row['idBarangTemuan']) ?>">
                        <td><img src="data:image/jpeg;base64,<?= base64_encode($row['gambarBarang']) ?>" alt="" class="td-img"></td>
                            <td><?= htmlspecialchars($row['uploader']) ?></td>
                            <td><?= htmlspecialchars($row['namaBarang']) ?></td>
                            <td><?= htmlspecialchars($row['kategoriBarang']) ?></td>
                            <td><?= htmlspecialchars($row['tanggalPenemuan']) ?></td>
                            <td><?= htmlspecialchars($row['tempatPenemuan']) ?></td>
                            <td><?= htmlspecialchars($row['kotaKabupaten']) ?></td>
                            <td><?= htmlspecialchars($row['informasiDetail']) ?></td>
                            <td><?= htmlspecialchars($row['noHP']) ?></td>
                        <td>
                            <button type="button" class="btn-terima" data-id="<?= htmlspecialchars($row['idBarangTemuan']) ?>">Ubah</button>
                            <button type="button" class="btn-tolak" data-id="<?= htmlspecialchars($row['idBarangTemuan']) ?>">Hapus</button>
                        </td>
                        <td>
                            <?php if ($row['status'] == 'Diterima'): ?>
                                <p class="proses">Proses</p>
                            <?php elseif ($row['status'] == 'Ditolak'): ?>
                                <p class="ditolak"><?= htmlspecialchars($row['status']) ?></p>
                            <?php elseif ($row['status'] == 'Selesai'): ?>
                                <p class="selesai"><?= htmlspecialchars($row['status']) ?></p>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </table>
            </div>
            
        </div>
    </div>
    <script src="../JS/sistem-barang-hilang.js"></script>
</body>
</html>