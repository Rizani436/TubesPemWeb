<?php
require 'PHP/config.php'; // Koneksi ke database

$email = $_POST['email'];
$code = $_POST['code'];

// Cek kode verifikasi di database
$sql = "SELECT * FROM password_resets WHERE email='$email' AND code='$code'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Kode benar, arahkan ke halaman reset password
    echo 'Kode verifikasi benar. <a href="changepassword.php?email=' . $email . '">Reset Password</a>';
} else {
    echo 'Kode verifikasi salah. Silakan coba lagi.';
}

$conn->close();
?>
