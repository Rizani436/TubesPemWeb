<?php
    include "PHP/cekSession.php";
    // require_once 'header.php';
    $akun = $_SESSION['username'];
    include 'PHP/config.php';

    // Ambil data akun dari database

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include 'PHP/config.php';
        if (!$conn) {
            die("Koneksi Gagal" . mysql_error());
        } else {
            $updates = [];
            if (!empty($_POST['username'])) {
                $username = $_POST['username'];
                $updates[] = "username = '$username'";
                $_SESSION['username'] = $username;
            }
            if (!empty($_POST['email'])) {
                $email = $_POST['email'];
                $updates[] = "email = '$email'";
            }
            if (!empty($_POST['password'])) {
                $password = $_POST['password'];
                $updates[] = "password = '$password'";
            }
            if (!empty($_POST['namaLengkap'])) {
                $namaLengkap = $_POST['namaLengkap'];
                $updates[] = "namaLengkap = '$namaLengkap'";
            }
            if (!empty($_POST['jenisKelamin'])) {
                $jenisKelamin = $_POST['jenisKelamin'];
                $updates[] = "jenisKelamin = '$jenisKelamin'";
            }
            if (!empty($_POST['alamat'])) {
                $alamat = $_POST['alamat'];
                $updates[] = "alamat = '$alamat'";
            }
            if (!empty($_POST['noHP'])) {
                $noHP = $_POST['noHP'];
                $updates[] = "noHP = '$noHP'";
            }
            if (!empty($_FILES['profile-picture']['tmp_name'])) {
                $datagambar = addslashes(file_get_contents($_FILES['profile-picture']['tmp_name']));
                $propertiesgambar = getimagesize($_FILES['profile-picture']['tmp_name']);
                $updates[] = "tipeImage = '" . $propertiesgambar['mime'] . "', fotoProfil =  '" . $datagambar . "'";
            }

            if (count($updates) > 0) {
                $query = "UPDATE akun SET " . implode(", ", $updates) . " WHERE username = '$akun'";
                $result = mysqli_query($conn, $query);
                if ($result) {
                    echo "<script>alert('Akun berhasil diUpdate');</script>";
                    header("Location: beranda.php");
                    exit();
                } else {
                    echo "<script>alert('Akun gagal diUpdate');</script>";
                }
            } else {
                echo "<script>alert('Tidak ada data yang diupdate');</script>";
            }
        }
    }
    $query = "SELECT * FROM akun WHERE username = '$akun'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../CSS/edit-profil.css">
    <link rel="stylesheet" href="../CSS/header.css">
    <style>
        .profil, .akun img {
            width: 100px; /* Adjust size as needed */
            height: 100px; /* Adjust size as needed */
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="container">
    <div class="header">
        <div class="logo">
            <img src="image/lofo.png" alt="logo">
            <h1>Lost & Found Lombok</h1>
        </div>
        <div class="menu-header">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li class="menu-dropdown"><button>Daftar Laporan</button>
                    <ul class="dropdown">
                        <li><a href="daftar-laporan-barang-hilang.php">Kehilangan Barang</a></li>
                        <li><a href="daftar-laporan-barang-temuan.php">Penemuan Barang</a></li>
                    </ul>
                </li>
                <li class="menu-dropdown"><button>Histori Laporan</button>
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
            <img src="icon/notifikasi.png" alt="notifikasi" class="notifikasi">
            <div class="jumlah-notifikasi">
                <p>1</p>
            </div>
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
                    <a href="edit-profil.php">Edit Profil</a>
                    <a href="PHP/logoutSubmit.php">Log Out</a>
                </div>
            </div>
        </div>
    </div>
        <div class="content">
            <div class="klaim">
                <div class="header-klaim">
                    <a href="beranda.php"><img src="icon/left-arrow.png" alt="Kembali" height="40" width="40"></a>
                    <p>Edit Profil</p>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                    <div class="profil-img">
                        <label for="profile-picture" class="custom-file-upload">
                        <img src="<?php echo empty($row['fotoProfil']) ? 'icon/profil.png' : 'data:' . $row['tipeImage'] . ';base64,' . base64_encode($row['fotoProfil']); ?>" alt="profil" height="100" width="100">
                        </label>
                        <input type="file" id="profile-picture" name="profile-picture" accept="image/*">
                    </div>
                    <table>
                        <tr>
                            <td><label for="username">Username</label></td>
                            <td><input type="text" name="username" value="<?php echo ($row['username']) ?>" id="username"></td>
                        </tr>
                        <tr>
                            <td><label for="email">Email</label></td>
                            <td><input type="text" name="email" value="<?php echo ($row['email']) ?>" id="email"></td>
                        </tr>
                        <tr>
                            <td><label for="password">Password</label></td>
                            <td><input type="password" name="password" value="<?php echo ($row['password']) ?>" id="password"></td>
                        </tr>
                        <tr>
                            <td><label for="namaLengkap">Nama Lengkap</label></td>
                            <td><input type="text" name="namaLengkap" value="<?php echo ($row['namaLengkap']) ?>" id="namaLengkap"></td>
                        </tr>
                        <tr>
                            <td><label for="jenisKelamin">Jenis Kelamin</label></td>
                            <td>
                                <select name="jenisKelamin" id="jenisKelamin">
                                    <option value="<?php echo ($row['jenisKelamin']) ?>"><?php echo ($row['jenisKelamin']) ?></option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="alamat">Alamat</label></td>
                            <td><input type="text" name="alamat" value="<?php echo ($row['alamat']) ?>" id="alamat"></td>
                        </tr>
                        <tr>
                            <td><label for="noHP">Nomor Handphone</label></td>
                            <td><input type="text" name="noHP" value="<?php echo ($row['noHP']) ?>" id="noHP"></td>
                        </tr>
                    </table>
                    <input type="submit" name="editForm" id="editForm" class="editForm" value="Ubah">
                </form>
            </div>
        </div>
        <div class="footer">
            <p><bold>&copy;</bold> 2024. LoFo: Lost & Found Lombok</p>
        </div>
    </div>
    <script src="../JS/home.js"></script>
</body>
</html>
