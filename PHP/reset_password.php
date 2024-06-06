<?php
require 'PHP/config.php'; // Koneksi ke database

$email = $_POST['email'];
$newPassword = $_POST['newPassword'];

// Update password di database
$sql = "UPDATE akun SET password='$newPassword' WHERE email='$email'";
if ($conn->query($sql) === TRUE) {
    echo 'Password berhasil direset. <a href="login.php">Login</a>';
} else {
    echo 'Terjadi kesalahan: ' . $conn->error;
}

$conn->close();
?>
