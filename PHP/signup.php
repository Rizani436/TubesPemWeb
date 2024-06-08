
<?php
    session_start();
    if (isset($_SESSION['username'])) {
        header("Location: home.php");
        exit();
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'PHP/config.php';
    if(!$conn){
        die("Koneksi Gagal".mysql_error());
    }else{
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confPassword = $_POST['confPassword'];
        $namaLengkap = $_POST['namaLengkap'];
        $jenisKelamin = $_POST['jenisKelamin'];
        $alamat = $_POST['alamat'];
        $noHP = $_POST['noHP'];
        $queryUsername = "SELECT * FROM akun WHERE username = '$username'";
        $namaAkun = mysqli_query($conn, $queryUsername);
        if(mysqli_num_rows($namaAkun) > 0){
            echo "Username sudah digunakan";
        }else{
        if($password == $confPassword && $password != "" && $confPassword != ""){
            $query = "INSERT INTO akun (username, password, namaLengkap, jenisKelamin, alamat, noHP,email) VALUES ('$username', '$password', '$namaLengkap', '$jenisKelamin', '$alamat', '$noHP','$email')";
            $result = mysqli_query($conn, $query);
            if($result){
                header("Location: login.php");
            }else{
                echo "<script>alert('Akun gagal dibuat');</script>";
            }
        }else{
            echo "<script>alert('Password dan konfirmasi password tidak sama');</script>";
        }
        }
    }
    }
?>
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
            <div class="logo">
                <img src="image/lofo.png" alt="logo">
                <h1>Lost & Found Lombok</h1>
            </div>
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
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="input-data">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="username">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="email">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="password">
                    <label for="confPassword">Konfrimasi Password</label>
                    <input type="password" name="confPassword" id="confPassword" class="confPassword">
                    <label for="namaLengkap">Nama Lengkap</label>
                    <input type="text" name="namaLengkap" id="namaLengkap" class="namaLengkap">
                    <label for="jenisKelamin">Jenis Kelamin</label>
                    <select name="jenisKelamin" id="jenisKelamin" class="jenisKelamin">
                        <option value="0"></option>
                        <option value="Laki-Laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="alamat">
                    <label for="noHP">Nomor Handphone</label>
                    <input type="text" name="noHP" id="noHP" class="noHP">
                    <input type="submit" value="Sign Up">
                </div>
                <script src="../JS/signup.js"></script>
            </form>
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
                    <h2>Follow us</h2>
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
</body>
</html>