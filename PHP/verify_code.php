<?php
require 'PHP/config.php'; // Koneksi ke database

$email = $_POST['email'];
$code = $_POST['code'];

// Cek kode verifikasi di database
$sql = "SELECT * FROM password_resets WHERE email='$email' AND code='$code'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Kode benar, arahkan ke halaman reset password
    echo '<script type="text/javascript">';
    echo 'alert("Kode verifikasi benar.");';
    echo 'window.location.href = "changepassword.php?email=' . $email . '";';
    echo '</script>';
} else {
    echo '<script type="text/javascript">';
    echo 'alert("Email atau Kode verifikasi salah. Silakan coba lagi.");';
    echo 'window.location.href = "verifikasiKode.php";';
    echo '</script>';
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: rgba(200, 190, 140, 1);
        }
    </style>
</head>
<body>
    
</body>
</html>