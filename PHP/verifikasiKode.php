<!DOCTYPE html>
<html>
<head>
    <title>Verifikasi Kode</title>
</head>
<body>
    <form action="verify_code.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="code">Kode Verifikasi:</label>
        <input type="text" id="code" name="code" required>
        <button type="submit">Verifikasi</button>
    </form>
</body>
</html>
