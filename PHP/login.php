<?php
include 'PHP/config.php';
session_start();
if (isset($_SESSION['username'])) {
    header("Location: home.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!$conn) {
        die("Koneksi Gagal" . mysqli_error());
    } else {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "SELECT * FROM akun WHERE username = '$username' AND password = '$password'";
        $queryAdmin = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
        
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['username'] = $username;
            header("Location: home.php");
        } else {
            $resultAdmin = mysqli_query($conn, $queryAdmin);
            if (mysqli_num_rows($resultAdmin) > 0) {
                $_SESSION['username'] = $username;
                header("Location: ../Admin/PHP/dashboard.php");
            } else {
                echo "<script>alert('Username atau Password salah');</script>";
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
    <title>Log In</title>
    <link rel="stylesheet" href="../CSS/login.css">
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
                    <li><p>Create Account?</p></li>
                    <li><a href="signup.php">Sign UP</a></li>
                </ul>
            </div>
        </div>
        <div class="content">
            <div class="judul-content">
                <a href="beranda.php"><img src="../PHP/icon/left-arrow.png" alt="Left"></a>
                <p>Login</p>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <img src="../PHP/icon/profile.png" alt="profile">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" >
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
                <a href="lupaPassword.php"><p>Lupa Password?</p></a>
                <input type="submit" value="Log In">
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

    <?php if (isset($message)) { ?>
        <script>
            alert("<?php echo $message; ?>");
        </script>
    <?php } ?>
</body>
</html>