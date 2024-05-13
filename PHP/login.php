<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../CSS/login.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>LoFo</h1>
            <div class="menu-header">
                <ul>
                    <li><p>Create Account?</p></li>
                    <li><a href="signup.php">Sign UP</a></li>
                </ul>
            </div>
        </div>
        <div class="content">
            <div class="judul-content">
                <a href="beranda.php"><img src="../PHP/icon/left-arrow.png" alt="Left"></a>
                <p>Login</p>
            </div>
            <form action="home.php" method="post">
                <img src="../PHP/icon/profile.png" alt="profile">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" >
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
                <a href="#"><p>Lupa Password?</p></a>
                <input type="submit" value="Submit">
            </form>
            
        </div>
    </div>
</body>
</html>