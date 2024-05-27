<?php
include "cekSession.php";
require_once 'header.php';
$akun = $_SESSION['username']; 
include 'config.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query_select = "SELECT * FROM akun";

$result_select = mysqli_query($conn, $query_select);
if (!$result_select) {
    die("Error: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/akun.css">
    <title>Home Admin</title>
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="content-top">
                <p class="judul-content">Dashboard Admin</p>
                <p class="child-judul">Kelola Akun</p>
                <form action="/index">
                    <input type="text" name="" id="" class="cari">
                    <input type="submit" value="Cari">
                </form>
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Nomor Handphone</th>
                        <th>Action</th>
                    </tr>
                    <?php $i=1;
                    while($row = mysqli_fetch_assoc($result_select)): ?>
                    <tr data-id="<?= htmlspecialchars($row['username']) ?>">
                        <td><?php echo $i ?></td>
                        <td><?= htmlspecialchars($row['username']) ?></td>
                        <td><?= htmlspecialchars($row['password']) ?></td>
                        <td><?= htmlspecialchars($row['namaLengkap']) ?></td>
                        <td><?= htmlspecialchars($row['jenisKelamin']) ?></td>
                        <td><?= htmlspecialchars($row['alamat']) ?></td>
                        <td><?= htmlspecialchars($row['noHP']) ?></td>
                        <td>
                            <button type="button">Edit</button>
                            <button type="button">Hapus</button>
                        </td>
                    </tr>
                    <?php $i++; endwhile; ?>
                </table>
            </div>
            
        </div>
    </div>
    <script src="../JS/akun.js"></script>
</body>
</html>