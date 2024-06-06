<?php
require '../vendor/autoload.php';
require 'PHP/config.php'; // Memuat koneksi database

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$email = $_POST['email'];
$verificationCode = rand(100000, 999999); // 6 digit kode verifikasi

// Memeriksa apakah alamat email sudah ada dalam database
$checkSql = "SELECT * FROM password_resets WHERE email = '$email'";
$checkResult = $conn->query($checkSql);

if ($checkResult->num_rows > 0) {
    // Jika sudah ada, perbarui kode verifikasi yang ada
    $updateSql = "UPDATE password_resets SET code = '$verificationCode' WHERE email = '$email'";
    if ($conn->query($updateSql) === TRUE) {
        // Mengirim email
        $mail = new PHPMailer(true);

        try {
            // Pengaturan server
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'LostNFound.Lombok@gmail.com'; // Ganti dengan email Anda
            $mail->Password = 'vgbb pwet niha ghrh';   // Ganti dengan App Password Anda
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Penerima
            $mail->setFrom('LostNFound.Lombok@gmail.com', 'LoFo');
            $mail->addAddress($email);

            // Konten email
            $mail->isHTML(true);
            $mail->Subject = 'Kode Verifikasi Reset Password';
            $mail->Body    = 'Kode verifikasi Anda adalah ' . $verificationCode;

            $mail->send();
            echo 'Kode verifikasi telah diperbarui dan dikirim ke email Anda.';
            Header("Location: verifikasiKode.php");
        } catch (Exception $e) {
            echo "Pengiriman email gagal. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Terjadi kesalahan dalam memperbarui kode verifikasi: " . $conn->error;
    }
} else {
    // Jika belum ada, masukkan entri baru ke dalam database
    $insertSql = "INSERT INTO password_resets (email, code) VALUES ('$email', '$verificationCode')";
    if ($conn->query($insertSql) === TRUE) {
        // Mengirim email (seperti yang telah Anda lakukan sebelumnya)
        // ...
    } else {
        echo "Terjadi kesalahan dalam menyimpan kode verifikasi: " . $conn->error;
    }
}

$conn->close();
?>
