<?php
    include "cekSession.php";
    // require_once 'header.php';
    $akun = $_SESSION['username'];
    include 'config.php';

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
                $query = "UPDATE admin SET " . implode(", ", $updates) . " WHERE username = '$akun'";
                $result = mysqli_query($conn, $query);
                if ($result) {
                    echo "<script>alert('Akun berhasil diUpdate');</script>";
                    header("Location: dashboard.php");
                    exit();
                } else {
                    echo "<script>alert('Akun gagal diUpdate');</script>";
                }
            } else {
                echo "<script>alert('Tidak ada data yang diupdate');</script>";
            }
        }
    }
    $query = "SELECT * FROM admin WHERE username = '$akun'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perbarui Profil</title>
    <!-- <link rel="stylesheet" href="../CSS/dashboard.css"> -->
    <link rel="stylesheet" href="../CSS/edit-profil.css"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Merienda:wght@300..900&display=swap" rel="stylesheet">
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
        <div class="header-left">
            <div class="judul-header">
                <img src="../../PHP/image/icons8-menu-50.png" alt=""class='menu-left'>
                <p class="judul-header">Lost & Found Lombok</p>
            </div>
            
            <div class="header-left-menu">
                <div class="menu-top">
                    <img src="../../PHP/icon/left-arrow.png" alt="" class="close-menu">
                    <img src="../../PHP/image/lofo.png" alt="" class="logo">
                </div>
                <div class="menu-bottom">
                    <ul>
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li><a href="akun.php">Kelola Akun</a></li>
                        <li class="menu-dropdown"><button>Verifikasi Informasi ></button>
                            <ul class="dropdown">
                                <li><a href="verifikasi-barang-hilang.php">Kehilangan Barang</a></li>
                                <li><a href="verifikasi-barang-temuan.php">Penemuan Barang</a></li>
                            </ul>
                        </li>
                        <li class="menu-dropdown"><button>Kelola Sistem ></button>
                            <ul class="dropdown">
                                <li><a href="sistem-barang-hilang.php">Kehilangan Barang</a></li>
                                <li><a href="sistem-barang-temuan.php">Penemuan Barang</a></li>
                            </ul>
                        </li>
                    </ul>    
                </div>
            </div>
        </div>
        <div class="header-right">
            <img src="<?php echo empty($row['fotoProfil']) ? 'icon/profil.png' : 'data:' . $row['tipeImage'] . ';base64,' . base64_encode($row['fotoProfil']); ?>" alt="Profil" class="profil">
            
            <div class="akun-profil">
                <div class="panah">
                    <img src="../PHP/icon/arrow-up.png" alt="">
                </div>
                <div class="akun">
                    <img src="<?php echo empty($row['fotoProfil']) ? 'icon/profil.png' : 'data:' . $row['tipeImage'] . ';base64,' . base64_encode($row['fotoProfil']); ?>" alt="profil">
                    <?php
                        echo "<p>$akun</p>";
                    ?>
                </div>
                <div class="setting-akun">
                    <a href="edit-profil.php">Perbarui Profil</a>
                    <a href="logoutSubmit.php">Keluar</a>
                </div>
            </div>
            <!-- <p>Lost & Found Lombok</p> -->
        </div>
    </div>
        <div class="content">
            <div class="klaim">
                <div class="header-klaim">
                    <a href="dashboard.php"><img src="icon/left-arrow.png" alt="Kembali" height="40" width="40"></a>
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
                            <td><label for="password">Password</label></td>
                            <td><input type="password" name="password" value="<?php echo ($row['password']) ?>" id="password"></td>
                        </tr>
                        <tr>
                            <td><label for="namaLengkap">Nama Lengkap</label></td>
                            <td><input type="text" name="namaLengkap" value="<?php echo ($row['namaLengkap']) ?>" id="namaLengkap"></td>
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
    </div>
    <script src="../JS/edit-profil.js"></script>
</body>
</html>
