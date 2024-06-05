<?php
    include "PHP/cekSession.php";
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
                $propertiesgambar = getimageSize($_FILES['profile-picture']['tmp_name']);
                $updates[] = "tipeImage = '" . $propertiesgambar['mime'] . "', fotoProfil =  '" . $datagambar . "'";
            }

            if (count($updates) > 0) {
                $query = "UPDATE akun SET " . implode(", ", $updates) . " WHERE username = '$akun'";
                $result = mysqli_query($conn, $query);
                if ($result) {
                    echo "<script>alert('Akun berhasil diUpdate');</script>";
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
</head>
<body>
    <div class="container">
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
                            <td><input type="text" name="username" id="username"></td>
                        </tr>
                        <tr>
                            <td><label for="password">Password</label></td>
                            <td><input type="password" name="password" id="password"></td>
                        </tr>
                        <tr>
                            <td><label for="namaLengkap">Nama Lengkap</label></td>
                            <td><input type="text" name="namaLengkap" id="namaLengkap"></td>
                        </tr>
                        <tr>
                            <td><label for="jenisKelamin">Jenis Kelamin</label></td>
                            <td>
                                <select name="jenisKelamin" id="jenisKelamin">
                                    <option value="0"></option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="alamat">Alamat</label></td>
                            <td><input type="text" name="alamat" id="alamat"></td>
                        </tr>
                        <tr>
                            <td><label for="noHP">Nomor Handphone</label></td>
                            <td><input type="text" name="noHP" id="noHP"></td>
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
