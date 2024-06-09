<?php
ob_start();
include "cekSession.php";
require_once 'header.php';
include 'config.php';

$akun = $_SESSION['username'];

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['delete'])) {
        $username = $_POST['username'];
        $query_delete = "DELETE FROM akun WHERE username = '$username'";
        $result_delete = mysqli_query($conn, $query_delete);
        if ($result_delete) {
            echo "<script>alert('Akun berhasil dihapus');</script>";
            header("Location: akun.php");
            exit(); 
        } else {
            echo "<script>alert('Akun gagal dihapus');</script>";
        }
    } else {
        $username = $_POST['username'];
        $updates = [];
        
        if (!empty($_POST['email'])) {
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $updates[] = "email = '$email'";
        }
        
        if (!empty($_POST['password'])) {
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $updates[] = "password = '$password'";
        }
        
        if (!empty($_POST['namaLengkap'])) {
            $namaLengkap = mysqli_real_escape_string($conn, $_POST['namaLengkap']);
            $updates[] = "namaLengkap = '$namaLengkap'";
        }
        
        if (!empty($_POST['jenisKelamin'])) {
            $jenisKelamin = mysqli_real_escape_string($conn, $_POST['jenisKelamin']);
            $updates[] = "jenisKelamin = '$jenisKelamin'";
        }
        
        if (!empty($_POST['alamat'])) {
            $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
            $updates[] = "alamat = '$alamat'";
        }
        
        if (!empty($_POST['noHP'])) {
            $noHP = mysqli_real_escape_string($conn, $_POST['noHP']);
            $updates[] = "noHP = '$noHP'";
        }
        
        if (!empty($_FILES['fotoProfil']['tmp_name'])) {
            $datafotoProfil = addslashes(file_get_contents($_FILES['fotoProfil']['tmp_name']));
            $propertiesfotoProfil = getimagesize($_FILES['fotoProfil']['tmp_name']);
            $updates[] = "tipeImage = '" . $propertiesfotoProfil['mime'] . "', fotoProfil =  '" . $datafotoProfil . "'";
        }

        if (count($updates) > 0) {
            $query = "UPDATE akun SET " . implode(", ", $updates) . " WHERE username = '$username'";
            $result = mysqli_query($conn, $query);
            if ($result) {
                echo "<script>alert('Akun berhasil diUpdate');</script>";
                header("Location: akun.php");
                exit();
            } else {
                echo "<script>alert('Akun gagal diUpdate');</script>";
            }
        } else {
            echo "<script>alert('Tidak ada data yang diupdate');</script>";
        }
    }
    mysqli_close($conn);
    ob_end_flush();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/akun.css">
    <title>Kelola Akun</title>
</head>
<body>
    <div class="container">
        <div class="content">           
            <div class="popUp-terima" style="display:none;">
                <div class="terima">
                    <form class="formTerima" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                        <div class="isi-klaim">
                            <div class="header-terima">    
                                <p>Kelola Akun</p>
                                <p>Ubah Akun</p>
                            </div>
                            <div class="isi-terima">
                                <table>
                                    <tr>
                                        <td><label for="username">Username</label></td>
                                        <td><input type="text" name="username" id="username_input" class="username"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="email">Email</label></td>
                                        <td><input type="email" name="email" id="email" class="email"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="password">Password</label></td>
                                        <td><input type="password" name="password" id="password" class="password"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="namaLengkap">Nama Lengkap</label></td>
                                        <td><input type="text" name="namaLengkap" id="namaLengkap" class="namaLengkap"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="jenisKelamin">Jenis Kelamin</label></td>
                                        <td><select name="jenisKelamin" id="jenisKelamin" class="jenisKelamin">
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <td><label for="alamat">Alamat</label></td>
                                        <td><input type="text" name="alamat" id="alamat" class="alamat"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="noHP">Nomor Handphone</label></td>
                                        <td><input type="text" name="noHP" id="noHP" class="noHP"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="fotoProfil">Foto Profil</label></td>
                                        <td><input type="file" name="fotoProfil" id="fotoProfil" accept="image/*"></td>
                                    </tr>
                                </table>    
                            </div>
                            <div class="footer-terima">
                                <button type="button" onclick="document.querySelector('.popUp-terima').style.display = 'none';">Tutup</button>
                                <input type="hidden" name="original_username" id="original_username">
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
                            <p>Kelola Akun</p>
                        </div>
                        <div class="isi-tolak">
                            <p>Apakah sistem menghapus akun ini?</p>
                        </div>
                        <div class="footer-tolak">
                            <button type="button" onclick="document.querySelector('.popUp-tolak').style.display = 'none';">Batal</button>
                            <input type="hidden" name="username" id="username_tolak">
                            <button type="submit" name="delete">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="content-top">
                <p class="judul-content">Dashboard Admin</p>
                <p class="child-judul">Kelola Akun</p>
                <div class="form">
                    <form action="/index">
                        <input type="text" name="" id="" class="cari">
                        <input type="submit" value="Cari">
                    </form>
                </div>
                <table class="table">
                    <tr>
                        <th>Foto Profil</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Nomor Handphone</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $query_select = "SELECT * FROM akun";
                    $result_select = mysqli_query($conn, $query_select);
                    if (!$result_select) {
                        die("Error: " . mysqli_error($conn));
                    }
                    while ($row = mysqli_fetch_assoc($result_select)): ?>
                        <tr data-id="<?= htmlspecialchars($row['username']) ?>">
                            <td><img src="data:image/jpeg;base64,<?= base64_encode($row['fotoProfil']) ?>" alt="" class="td-img"></td>
                            <td class="td-username"><?= htmlspecialchars($row['username']) ?></td>
                            <td class="td-email"><?= htmlspecialchars($row['email']) ?></td>
                            <td class="td-password"><?= htmlspecialchars($row['password']) ?></td>
                            <td class="td-namaLengkap"><?= htmlspecialchars($row['namaLengkap']) ?></td>
                            <td class="td-jenisKelamin"><?= htmlspecialchars($row['jenisKelamin']) ?></td>
                            <td class="td-alamat"><?= htmlspecialchars($row['alamat']) ?></td>
                            <td class="td-noHP"><?= htmlspecialchars($row['noHP']) ?></td>
                            <td>
                                <button type="button" class="btn-terima" data-id="<?= htmlspecialchars($row['username']) ?>">Ubah</button>
                                <button type="button" class="btn-tolak" data-id="<?= htmlspecialchars($row['username']) ?>">Hapus</button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
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
                var username = row.querySelector('.td-username').textContent;
                var email = row.querySelector('.td-email').textContent;
                var password = row.querySelector('.td-password').textContent;
                var namaLengkap = row.querySelector('.td-namaLengkap').textContent;
                var jenisKelamin = row.querySelector('.td-jenisKelamin').textContent;
                var alamat = row.querySelector('.td-alamat').textContent;
                var noHP = row.querySelector('.td-noHP').textContent;
                
                document.querySelector('#original_username').value = id;
                document.querySelector('#username_input').value = username;
                document.querySelector('#email').value = email;
                document.querySelector('#password').value = password;
                document.querySelector('#namaLengkap').value = namaLengkap;
                document.querySelector('#jenisKelamin').value = jenisKelamin;
                document.querySelector('#alamat').value = alamat;
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
                
                document.querySelector('#username_tolak').value = id;
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
