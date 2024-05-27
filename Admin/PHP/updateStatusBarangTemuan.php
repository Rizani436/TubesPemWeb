<?php
include 'config.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $status = $_POST['status'];

    $query_update = "UPDATE barangtemuan SET status = '$status' WHERE idBarangTemuan = '$id'";
    echo $query_update;
    $stmt = mysqli_prepare($conn, $query_update);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Status berhasil diperbarui');</script>";
    } else {
        echo "<script>alert('Status gagal diperbarui');</script>";
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>
