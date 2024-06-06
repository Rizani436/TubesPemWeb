<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <form action="reset_password.php" method="post">
        <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>">
        <label for="newPassword">Password Baru:</label>
        <input type="password" id="newPassword" name="newPassword" required>
        <button type="submit">Reset Password</button>
    </form>
</body>
</html>
