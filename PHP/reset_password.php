<?php
require 'PHP/config.php'; // Koneksi ke database

$email = $_POST['email'];
$newPassword = $_POST['newPassword'];

// Update password di database
$sql = "UPDATE akun SET password='$newPassword' WHERE email='$email'";
if ($conn->query($sql) === TRUE) {
    $message = "Password berhasil direset.";
    echo '<script>alert("' . $message . '"); window.location.href = "login.php";</script>';
} else {
    $error = "Terjadi kesalahan: " . $conn->error;
    echo '<script>alert("' . $error . '"); window.history.back();</script>';
}

$conn->close();
?>
