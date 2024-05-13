<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../CSS/signup.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>LoFo</h1>
            <div class="menu-header">
                <ul>
                    <li><p>Do You Have Account?</p></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </div>
        </div>
        <div class="content">
            <div class="judul-content">
                <a href="beranda.php"><img src="../PHP/icon/left-arrow.png" alt="Left"></a>
                <p>Sign Up</p>
            </div>
            <form action="beranda.php" method="post">
                <div class="input-data">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="username">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="password">
                    <label for="confPassword">Konfrimasi Password</label>
                    <input type="text" name="confPassword" id="confPassword" class="confPassword">
                    <label for="namaLengkap">Nama Lengkap</label>
                    <input type="text" name="namaLengkap" id="namaLengkap" class="namaLengkap">
                    <label for="jenisKelamin">Jenis Kelamin</label>
                    <select name="jenisKelamin" id="jenisKelamin" class="jenisKelamin">
                        <option value="0"></option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="alamat">
                    <label for="noHP">Nomor Handphone</label>
                    <input type="text" name="noHP" id="noHP" class="noHP">
                    <input type="submit" value="Daftar">
                </div>
                <script src="../JS/signup.js"></script>
            </form>
        </div>
    </div>
</body>
</html>