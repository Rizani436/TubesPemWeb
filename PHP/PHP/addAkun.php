
<?php
    $servername = "localhost";
    $usernameR = "root";
    $password = "";
    $dbname = "LoFo";
    $conn = new mysqli($servername, $usernameR, $password, $dbname);
    if(!$conn){
        die("Koneksi Gagal".mysql_error());
    }else{
        $username = $_POST['username'];
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
            $query = "INSERT INTO akun (username, password, namaLengkap, jenisKelamin, alamat, noHP) VALUES ('$username', '$password', '$namaLengkap', '$jenisKelamin', '$alamat', '$noHP')";
            $result = mysqli_query($conn, $query);
            if($result){
                header("Location: ../login.php");
            }else{
                echo "Akun gagal dibuat";
            }
        }else{
            echo "Password dan konfirmasi password tidak sama";
        }
        }
    }
?>
