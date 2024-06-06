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
        $idBarangHilang = $_POST['idBH'];
        $query_delete = "DELETE FROM baranghilang WHERE idBarangHilang = '$idBarangHilang'";
        $result_delete = mysqli_query($conn, $query_delete);
        if ($result_delete) {
            echo "<script>alert('Barang berhasil dihapus');</script>";
            header("Location: sistem-barang-hilang.php");
            exit(); // Ensure script stops after redirect
        } else {
            echo "<script>alert('Barang gagal dihapus');</script>";
        }
    } else {
        $idBarangHilang = $_POST['idBH'];
        $updates = [];
        
        if (!empty($_POST['namaBarang'])) {
            $namaBarang = mysqli_real_escape_string($conn, $_POST['namaBarang']);
            $updates[] = "namaBarang = '$namaBarang'";
        }
        
        if (!empty($_POST['kategoriBarang'])) {
            $kategoriBarang = mysqli_real_escape_string($conn, $_POST['kategoriBarang']);
            $updates[] = "kategoriBarang = '$kategoriBarang'";
        }
        
        if (!empty($_POST['tglKehilangan'])) {
            $tglKehilangan = mysqli_real_escape_string($conn, $_POST['tglKehilangan']);
            $updates[] = "tanggalKehilangan = '$tglKehilangan'";
        }
        
        if (!empty($_POST['tmptKehilangan'])) {
            $tmptKehilangan = mysqli_real_escape_string($conn, $_POST['tmptKehilangan']);
            $updates[] = "tempatKehilangan = '$tmptKehilangan'";
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
            $query = "UPDATE baranghilang SET " . implode(", ", $updates) . " WHERE idBarangHilang = '$idBarangHilang'";
            $result = mysqli_query($conn, $query);
            if ($result) {
                echo "<script>alert('Barang berhasil diUpdate');</script>";
                header("Location: sistem-barang-hilang.php");
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/sistem-barang-hilang.css">
    <title>Kelola Sistem Barang Hilang</title>
</head>
<body>
    <div class="container">
        <div class="content">           
            <div class="popUp-terima" style="display:none;">
                <div class="terima">
                    <form class="formTerima" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                        <div class="isi-klaim">
                            <div class="header-terima">    
                                <p>Kelola Sistem Kehilangan Barang</p>
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
                                        <td><label for="tglKehilangan">Tanggal Kehilangan</label></td>
                                        <td><input type="date" name="tglKehilangan" id="tglKehilangan" class="tglKehilangan"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><p class="p-tglKehilangan"></p></td>
                                    </tr>
                                    <tr>
                                        <td><label for="tmptKehilangan">Tempat Kehilangan</label></td>
                                        <td><input type="text" name="tmptKehilangan" id="tmptKehilangan" class="tmptKehilangan"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><p class="p-tmptKehilangan"></p></td>
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
                            <p>Kelola Sistem Kehilangan Barang</p>
                        </div>
                        <div class="isi-tolak">
                            <p>Apakah sistem menghapus kasus kehilangan barang ini ?</p>
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
                <p class="child-judul">Barang Hilang</p>
                <div class="form">
                    <a href="sistem-barang-temuan.php">Barang Temuan ></a>
                    <form action="/index">
                        <input type="text" name="" id="" class="cari">
                        <input type="submit" value="Cari">
                    </form>
                </div>
                <?php
                $query_select = "SELECT * FROM barangHilang";
                $result_select = mysqli_query($conn, $query_select); 
                if (mysqli_num_rows($result_select) == 0): ?>
                <div class="data-kosong">
                    <p>No Result</p>
                </div>
                <?php else: ?>
                <table class="table">
                    <tr>
                        <th>Foto</th>
                        <th>Username</th>
                        <th>Nama Barang</th>
                        <th>Kategori Barang</th>
                        <th>Tanggal Kehilangan</th>
                        <th>Tempat Kehilangan</th>
                        <th>Kota/Kabupaten</th>
                        <th>Informasi Detail</th>
                        <th>Nomor Handphone</th>
                        <th>Action</th>
                        <th>Status</th>
                    </tr>
                    <?php
                    $query_select = "SELECT * FROM baranghilang";
                    $result_select = mysqli_query($conn, $query_select);
                    if (!$result_select) {
                        die("Error: " . mysqli_error($conn));
                    }
                    while ($row = mysqli_fetch_assoc($result_select)): ?>
                        <tr data-id="<?= htmlspecialchars($row['idBarangHilang']) ?>">
                        <td><img src="data:image/jpeg;base64,<?= base64_encode($row['gambarBarang']) ?>" alt="" class="td-img"></td>
                            <td><?= htmlspecialchars($row['uploader']) ?></td>
                            <td class="td-namaBarang"><?= htmlspecialchars($row['namaBarang']) ?></td>
                            <td class="td-kategoriBarang"><?= htmlspecialchars($row['kategoriBarang']) ?></td>
                            <td class="td-tanggalKehilangan"><?= htmlspecialchars($row['tanggalKehilangan']) ?></td>
                            <td class="td-tempatKehilangan"><?= htmlspecialchars($row['tempatKehilangan']) ?></td>
                            <td class="td-kotaKabupaten"><?= htmlspecialchars($row['kotaKabupaten']) ?></td>
                            <td class="td-informasiDetail"><?= htmlspecialchars($row['informasiDetail']) ?></td>
                            <td class="td-noHP"><?= htmlspecialchars($row['noHP']) ?></td>
                        <td>
                            <button type="button" class="btn-terima" data-id="<?= htmlspecialchars($row['idBarangHilang']) ?>">Ubah</button>
                            <button type="button" class="btn-tolak" data-id="<?= htmlspecialchars($row['idBarangHilang']) ?>">Hapus</button>
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
    <script>
        var btn_terima = document.querySelectorAll('.btn-terima');
        btn_terima.forEach(function(button) {
            button.addEventListener('click', function() {
                var row = button.closest('tr');
                var id = row.dataset.id;
                var namaBarang = row.querySelector('.td-namaBarang').textContent;
                var kategoriBarang = row.querySelector('.td-kategoriBarang').textContent;
                var tanggalKehilangan = row.querySelector('.td-tanggalKehilangan').textContent;
                var tempatKehilangan = row.querySelector('.td-tempatKehilangan').textContent;
                var kotaKabupaten = row.querySelector('.td-kotaKabupaten').textContent;
                var informasiDetail = row.querySelector('.td-informasiDetail').textContent;
                var noHP = row.querySelector('.td-noHP').textContent;
                
                document.querySelector('#idBH').value = id;
                document.querySelector('#namaBarang').value = namaBarang;
                document.querySelector('#kategoriBarang').value = kategoriBarang;
                document.querySelector('#tglKehilangan').value = tanggalKehilangan;
                document.querySelector('#tmptKehilangan').value = tempatKehilangan;
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
