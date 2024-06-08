<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/verifikasi-kode.css">
    <title>Verifikasi Kode</title>
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="judul-content">
                <h1>Verifikasi Kode</h1>

            </div>
            <form action="verify_code.php" method="post" class="center-form">
                <div class="emailClass">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="codeClass">
                    <label for="code">Kode Verifikasi:</label>
                    <input type="text" id="code" name="code" required>
                </div>
                <div class="submitForm">
                    <a href="lupaPassword.php">Kembali</a>
                    <button type="submit">Verifikasi</button>
                </div>
            </form>
        </div>
        <div class="footer">
            <div class="footer-content">
                <div class="footer-section about">
                    <h1 class="logo-text">
                        <img src="image/lofo.png" alt="Logo" height="50" width="50"> <!-- Add your logo file here -->
                        <span>Lost & Found Lombok</span>
                    </h1>
                    <p>
                        Menemukan kembali barang hilang, membawa ketenangan, dan mengembalikan harapan.
                    </p>
                    <div class="contact">
                        <span><img src="icon/icons8-phone-100.png" alt="Phone Icon"> &nbsp; +62 123 4567</span>
                        <span><img src="icon/emailicon.png" alt="Email Icon"> &nbsp; lostnfound.lombok@gmail.com</span>
                    </div>
                </div>
                <div class="footer-section social">
                    <h2>Follow us</h2>
                    <div class="social-icons">
                        <a href="#"><img src="icon/facebookIcon.png" alt="Facebook Icon"></a>
                        <a href="#"><img src="icon/instagram.png" alt="Instagram Icon"></a>
                        <a href="#"><img src="icon/twitterx.png" alt="Twitter Icon"></a>
                        <a href="#"><img src="icon/linkedin.png" alt="LinkedIn Icon"></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                &copy; 2024 LoFo | Lost & Found Lombok
            </div>
        </div>
    </div>
</body>
</html>


<!-- <!DOCTYPE html>
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
</html> -->