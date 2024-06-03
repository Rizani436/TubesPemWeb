<?php
    include "PHP/cekSession.php";
    require_once 'header.php';
    $username = $_SESSION['username']; 
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
                    <a href="#"><img src="icon/left-arrow.png" alt="Kembali" height="40" width="40"></a>
                    <p>Edit Profil</p>

                </div>
                <form action="edit-profil.php">
                    <div class="profil-img">
                        <label for="profile-picture" class="custom-file-upload">
                            <img src="icon/profil.png" alt="profil picture" height="100" width="100">
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
                        <tr>
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