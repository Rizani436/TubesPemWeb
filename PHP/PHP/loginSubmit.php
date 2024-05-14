<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "LoFo";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if(!$conn){
        die("Koneksi Gagal".mysql_error());
    }else{
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "SELECT * FROM akun WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0){
            $_SESSION['username'] = $username;
            header("Location: ../home.php");
        }else{
            // echo "Username atau password salah";
            header("Location: ../home.php");
        }
    }
?>