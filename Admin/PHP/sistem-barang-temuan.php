<?php
ob_start(); // Start output buffering
include "cekSession.php";
require_once 'header.php';
include 'config.php';

$akun = $_SESSION['username'];

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['delete'])) {
        $idBarangTemuan = $_POST['idBH'];
        $query_delete = "DELETE FROM barangTemuan WHERE idBarangTemuan = '$idBarangTemuan'";
        $result_delete = mysqli_query($conn, $query_delete);
        if ($result_delete) {
            echo "<script>alert('Barang berhasil dihapus');</script>";
            header("Location: sistem-barang-Temuan.php");
            exit(); // Ensure script stops after redirect
        } else {
            echo "<script>alert('Barang gagal dihapus');</script>";
        }
    } else {
        $idBarangTemuan = $_POST['idBH'];
        $updates = [];
        
        if (!empty($_POST['namaBarang'])) {
            $namaBarang = mysqli_real_escape_string($conn, $_POST['namaBarang']);
            $updates[] = "namaBarang = '$namaBarang'";
        }
        
        if (!empty($_POST['kategoriBarang'])) {
            $kategoriBarang = mysqli_real_escape_string($conn, $_POST['kategoriBarang']);
            $updates[] = "kategoriBarang = '$kategoriBarang'";
        }
        
        if (!empty($_POST['tglPenemuan'])) {
            $tglPenemuan = mysqli_real_escape_string($conn, $_POST['tglPenemuan']);
            $updates[] = "tanggalPenemuan = '$tglPenemuan'";
        }
        
        if (!empty($_POST['tmptPenemuan'])) {
            $tmptPenemuan = mysqli_real_escape_string($conn, $_POST['tmptPenemuan']);
            $updates[] = "tempatPenemuan = '$tmptPenemuan'";
        }
        
        if (!empty($_POST['kotaKabupaten'])) {
            $kotaKabupaten = mysqli_real_escape_string($conn, $_POST['kotaKabupaten']);
            $updates[] = "kotaKabupaten = '$kotaKabupaten'";
        }
        
        if (!empty($_POST['informasiDetail'])) {
            $informasiDetail = mysqli_real_escape_string($conn, $_POST['informasiDetail']);
            $updates[] = "informasiDetail = '$informasiDetail'";
        }
        
        if (!empty($_POST['noHP'])) {
            $noHP = mysqli_real_escape_string($conn, $_POST['noHP']);
            $updates[] = "noHP = '$noHP'";
        }
        
        if (!empty($_FILES['gambarBarang']['tmp_name'])) {
            $datagambar = addslashes(file_get_contents($_FILES['gambarBarang']['tmp_name']));
            $propertiesgambar = getimageSize($_FILES['gambarBarang']['tmp_name']);
            $updates[] = "tipeImage = '" . $propertiesgambar['mime'] . "', gambarBarang =  '" . $datagambar . "'";
        }

        if (count($updates) > 0) {
            $query = "UPDATE barangTemuan SET " . implode(", ", $updates) . " WHERE idBarangTemuan = '$idBarangTemuan'";
            $result = mysqli_query($conn, $query);
            if ($result) {
                echo "<script>alert('Barang berhasil diUpdate');</script>";
                header("Location: sistem-barang-Temuan.php");
                exit(); // Ensure script stops after redirect
            } else {
                echo "<script>alert('Barang gagal diUpdate');</script>";
            }
        } else {
            echo "<script>alert('Tidak ada data yang diupdate');</script>";
        }
    }
    mysqli_close($conn);
    ob_end_flush(); // Flush the output buffer
}

$search = '';
if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
}

$query_select = "SELECT * FROM barangTemuan";
if (!empty($search)) {
    $query_select .= " WHERE namaBarang LIKE '%$search%' OR kategoriBarang LIKE '%$search%' OR tanggalPenemuan LIKE '%$search%' OR tempatPenemuan LIKE '%$search%' OR kotaKabupaten LIKE '%$search%' OR informasiDetail LIKE '%$search%' OR noHP LIKE '%$search%'";
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
    <link rel="stylesheet" href="../CSS/sistem-barang-hilang.css">
    <title>Kelola Sistem Barang Temuan</title>
</head>
<body>
    <div class="container">
        <div class="content">           
            <div class="popUp-terima" style="display:none;">
                <div class="terima">
                    <form class="formTerima" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                        <div class="isi-klaim">
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
                                            <option value="Lombok Tengah">Lombok Tengah</option>
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
                                <button type="button" onclick="document.querySelector('.popUp-terima').style.display = 'none';">Tutup</button>
                                <input type="hidden" name="idBH" id="idBH">
                                <button type="submit">Ubah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="popUp-tolak" style="display:none;">
                <div class="tolak">
                    <form class="formTolak" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="header-tolak">
                            <p>Kelola Sistem Penemuan Barang</p>
                        </div>
                        <div class="isi-tolak">
                            <p>Apakah sistem menghapus kasus Penemuan barang ini ?</p>
                        </div>
                        <div class="footer-tolak">
                            <button type="button" onclick="document.querySelector('.popUp-tolak').style.display = 'none';">Batal</button>
                            <input type="hidden" name="idBH" id="idBH_tolak">
                            <button type="submit" name="delete">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="content-top">
                <p class="judul-content">Kelola Sistem</p>
                <p class="child-judul">Barang Temuan</p>
                <div class="form">
                    <a href="sistem-barang-hilang.php">Barang Hilang ></a>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
                        <input type="text" name="search" id="search" class="cari" placeholder="Cari...">
                        <input type="submit" value="Cari">
                    </form>
                </div>
                <?php 
                if (mysqli_num_rows($result_select) == 0): ?>
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
                    <tr>
                        <td colspan="11">Tidak ada data</td>
                    </tr>
                </table>
                <?php else: ?>
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
                    <?php
                    while ($row = mysqli_fetch_assoc($result_select)): ?>
                        <tr data-id="<?= htmlspecialchars($row['idBarangTemuan']) ?>">
                        <td><img src="data:image/jpeg;base64,<?= base64_encode($row['gambarBarang']) ?>" alt="" class="td-img"></td>
                            <td><?= htmlspecialchars($row['uploader']) ?></td>
                            <td class="td-namaBarang"><?= htmlspecialchars($row['namaBarang']) ?></td>
                            <td class="td-kategoriBarang"><?= htmlspecialchars($row['kategoriBarang']) ?></td>
                            <td class="td-tanggalPenemuan"><?= htmlspecialchars($row['tanggalPenemuan']) ?></td>
                            <td class="td-tempatPenemuan"><?= htmlspecialchars($row['tempatPenemuan']) ?></td>
                            <td class="td-kotaKabupaten"><?= htmlspecialchars($row['kotaKabupaten']) ?></td>
                            <td class="td-informasiDetail"><?= htmlspecialchars($row['informasiDetail']) ?></td>
                            <td class="td-noHP"><?= htmlspecialchars($row['noHP']) ?></td>
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
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script src="../JS/dashboard2.js"></script>
    <script>
        var btn_terima = document.querySelectorAll('.btn-terima');
        btn_terima.forEach(function(button) {
            button.addEventListener('click', function() {
                var row = button.closest('tr');
                var id = row.dataset.id;
                var namaBarang = row.querySelector('.td-namaBarang').textContent;
                var kategoriBarang = row.querySelector('.td-kategoriBarang').textContent;
                var tanggalPenemuan = row.querySelector('.td-tanggalPenemuan').textContent;
                var tempatPenemuan = row.querySelector('.td-tempatPenemuan').textContent;
                var kotaKabupaten = row.querySelector('.td-kotaKabupaten').textContent;
                var informasiDetail = row.querySelector('.td-informasiDetail').textContent;
                var noHP = row.querySelector('.td-noHP').textContent;
                
                document.querySelector('#idBH').value = id;
                document.querySelector('#namaBarang').value = namaBarang;
                document.querySelector('#kategoriBarang').value = kategoriBarang;
                document.querySelector('#tglPenemuan').value = tanggalPenemuan;
                document.querySelector('#tmptPenemuan').value = tempatPenemuan;
                document.querySelector('#kotaKabupaten').value = kotaKabupaten;
                document.querySelector('#informasiDetail').value = informasiDetail;
                document.querySelector('#noHP').value = noHP;
                
                document.querySelector('.popUp-terima').style.display = 'flex';
                document.body.classList.add('no-scroll');
            });
        });

        var tutup = document.querySelector('.footer-terima button[type="button"]');
        tutup.addEventListener('click', function(){
            document.querySelector('.popUp-terima').style.display = 'none';
            document.body.classList.remove('no-scroll');
        });

        var btn_tolak = document.querySelectorAll('.btn-tolak');
        btn_tolak.forEach(function(button) {
            button.addEventListener('click', function() {
                var row = button.closest('tr');
                var id = row.dataset.id;
                
                document.querySelector('#idBH_tolak').value = id;
                document.querySelector('.popUp-tolak').style.display = 'flex';
                document.body.classList.add('no-scroll');
            });
        });

        var tutup2 = document.querySelector('.footer-tolak button[type="button"]');
        tutup2.addEventListener('click', function(){
            document.querySelector('.popUp-tolak').style.display = 'none';
            document.body.classList.remove('no-scroll');
        });

        const formTerima = document.querySelector('.formTerima');
        const informasiDetail = document.querySelector('.informasiDetail');
        const pInformasiDetail = document.querySelector('.p-informasiDetail');

        formTerima.addEventListener('submit', function(event) {
            if (informasiDetail.value.length > 255) {
                pInformasiDetail.textContent = 'Panjang Maksikal Karakter 255';
                pInformasiDetail.style.color = 'red';
                event.preventDefault();
            } else {
                pInformasiDetail.textContent = '';
            }
        });
    </script>
</body>
</html>
