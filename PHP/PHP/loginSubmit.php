<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "LoFo";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Koneksi Gagal" . mysqli_error());
    } else {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "SELECT * FROM akun WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            session_start();
            $_SESSION['username'] = $username;
            header("Location: ../home.php");
            exit(); // Ensure that further code is not executed after redirection
        } else {
            header("Location: ../home.php?login_failed=true");
            exit(); // Ensure that further code is not executed after redirection
        }
}
?>