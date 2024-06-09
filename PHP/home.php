<?php
    include "PHP/cekSession.php";
    require_once 'header.php';
    $username = $_SESSION['username']; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../CSS/home.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="background-content">
                <div class="text-content">
                    <p>Menemukan kembali <span class="textSpan">barang hilang</span></p>
                    <p><span class="textSpan">Membawa</span> Ketenangan</p>
                    <p>dan Mengembalikan <span class="textSpan">harapan</span></p>
                    <div class="input-content">
                        <span><a href="daftar-laporan-barang-hilang.php">Barang Kehilangan</a></span>
                        <span><a href="daftar-laporan-barang-temuan.php">Barang Temuan</a></span>
                    </div>
                </div>
            </div>
            <div class="isi-content">
                <div class="kategori">
                    <h1>Kategori</h1>
                    <div class="isi-kategori">
                        <div class="item">
                            <button type="button">
                                <img src="../PHP/icon/bags.png" alt="Accessoris">
                                <p>Accessoris</p>
                            </button>
                            <div class="jenis">
                                <a href="daftar-laporan-barang-hilang.php?category=Accessoris">Barang Hilang</a>
                                <a href="daftar-laporan-barang-temuan.php?category=Accessoris">Barang Temuan</a>
                            </div>
                        </div>
                        <div class="item">
                            <button type="button">
                                <img src="../PHP/icon/car.png" alt="Car">
                                <p>Kendaraan</p>
                            </button>
                            <div class="jenis">
                                <a href="daftar-laporan-barang-hilang.php?category=Kendaraan">Barang Hilang</a>
                                <a href="daftar-laporan-barang-temuan.php?category=Kendaraan">Barang Temuan</a>
                            </div>
                        </div>
                        <div class="item">
                            <button type="button">
                                <img src="../PHP/icon/responsive.png" alt="Accessoris">
                                <p>Elektronik</p>
                            </button>
                            <div class="jenis">
                                <a href="daftar-laporan-barang-hilang.php?category=Elektronik">Barang Hilang</a>
                                <a href="daftar-laporan-barang-temuan.php?category=Elektronik">Barang Temuan</a>
                            </div>
                        </div>
                        <div class="item">
                            <button type="button">
                                <img src="../PHP/icon/document.png" alt="Accessoris">
                                <p>Document</p>
                            </button>
                            <div class="jenis">
                                <a href="daftar-laporan-barang-hilang.php?category=Document">Barang Hilang</a>
                                <a href="daftar-laporan-barang-temuan.php?category=Document">Barang Temuan</a>
                            </div>
                        </div>
                        <div class="item">
                            <button type="button">
                                <img src="../PHP/icon/menu-bar.png" alt="Accessoris">
                                <p>Dan Lain-lain</p>
                            </button>
                            <div class="jenis">
                                <a href="daftar-laporan-barang-hilang.php?category=Dan Lain-lain">Barang Hilang</a>
                                <a href="daftar-laporan-barang-temuan.php?category=Dan Lain-lain">Barang Temuan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                        <span><img src="icon/emailicon.png" alt="Email Icon"> &nbsp; LostNFound.Lombok@gmail.com</span>
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
    <script>
        var itemsElement = document.querySelectorAll('.item');
        itemsElement.forEach(function(itemElement) {
            var jenisElement = itemElement.querySelector('.jenis');
            itemElement.addEventListener("click", function(){
                if (jenisElement.style.display === 'none'){
                    jenisElement.style.display = 'flex';
                    // Menyembunyikan semua elemen '.jenis' yang tidak sedang aktif
                    itemsElement.forEach(function(item){
                        var otherJenisElement = item.querySelector('.jenis');
                        if (item !== itemElement && otherJenisElement.style.display === 'flex'){
                            otherJenisElement.style.display = 'none';
                        }
                    });
                } else {
                    jenisElement.style.display = 'none';
                }
            });
        });

        function isElementInViewport(el) {
            var rect = el.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        }

        function handleScrollAnimation() {
            var kategoriElement = document.querySelector('.content .isi-content .kategori');
            var itemElements = kategoriElement.querySelectorAll('.item');
            if (isElementInViewport(kategoriElement)) {
                itemElements.forEach(function(item) {
                    item.classList.add('active');
                });
            }else {
                itemElements.forEach(function(item) {
                    item.classList.remove('active');
                });
            }
        }
        window.addEventListener('scroll', handleScrollAnimation);
    

    </script>
</body>
</html>