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
    <title>Sign Up</title>
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
                <a href="changepassword.php"><p>Lupa Password?</p></a>
                <input type="submit" value="Submit">
            </form>
        </div>
        <div class="footer">
            <p><bold>&copy;</bold> 2024. LoFo: Lost & Found Lombok</p>
        </div>  
    </div>

    <?php if (isset($message)) { ?>
        <script>
            alert("<?php echo $message; ?>");
        </script>
    <?php } ?>
</body>
</html>