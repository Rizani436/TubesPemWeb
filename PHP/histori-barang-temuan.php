<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histori Barang Temuan</title>
    <link rel="stylesheet" href="../CSS/histori-barang-temuan.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <img src="image/lofo.png" alt="logo">
                <h1>Lost & Found Lombok</h1>
            </div>
            <div class="menu-header">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li class="menu-dropdown"><button>Daftar Laporan</button>
                        <ul class="dropdown">
                            <li><a href="daftar-laporan-barang-hilang.php">Kehilangan Barang</a></li>
                            <li><a href="daftar-laporan-barang-temuan.php">Penemuan Barang</a></li>
                        </ul>
                    </li>
                    <li class="menu-dropdown"><button>Histori Laporan</button>
                    <ul class="dropdown">
                        <li><a href="histori-barang-hilang.php">Kehilangan Barang</a></li>
                        <li><a href="histori-barang-temuan.php">Penemuan Barang</a></li>
                    </ul>
                    </li>
                    <li class="menu-dropdown"><button>Lapor</button>
                    <ul class="dropdown">
                        <li><a href="daftar-barang-hilang.php">Kehilangan Barang</a></li>
                        <li><a href="daftar-barang-temuan.php">Penemuan Barang</a></li>
                    </ul>
                    </li>
                </ul>    
            </div>
            <div class="akun-login">
                <img src="icon/notifikasi.png" alt="notifikasi" class="notifikasi">
                <div class="jumlah-notifikasi">
                    <p>1</p>
                </div>
                <img src="icon/profil.png" alt="Profil" class="profil">
                <div class="akun-profil">
                    <img src="icon/arrow-up.png" alt="Panah" class="panah">
                    <div class="akun">
                        <img src="icon/profil.png" alt="profil">
                        <p>rizalkurniawan._</p>
                    </div>
                    <div class="setting-akun">
                        <a href="#">Edit Profil</a>
                        <a href="#">Log Out</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="sidebar-left">
                <div class="cari-barang">
                    <input type="text" placeholder="Cari Barang Anda di sini...">
                    <img src="icon/Cari.png" alt="Searching">
                </div>
                <div class="lokasi-barang">
                    <p>Kota/Kabupaten</p>
                    <ul>
                        <li><button>All</a></li>
                        <li><button>Kota Mataram</button></li>
                        <li><button>Lombok Barat</button></li>
                        <li><button>Lombok Tengah</button></li>
                        <li><button>Lombok Timur</button></li>
                        <li><button>Lombok Utara</button></li>
                    </ul>
                </div>
                <div class="kategori">
                    <p>Kategori</p>
                    <ul>
                        <li><button>All</button></li>
                        <li><button>Accessoris</button></li>
                        <li><button>Kendaraan</button></li>
                        <li><button>Elektronik</button></li>
                        <li><button>Document</button></li>
                        <li><button>Dan Lain-lain</button></li>
                    </ul>
                </div>
            </div>
            <div class="sidebar-right">
                <p class="judul">Histori Barang Temuan</p>
                <p class="resultText"></p>
                <!-- <div class="data-kosong">
                    <p>No Result</p>
                </div> -->
                <div class="isi-sidebar-right">
                    <div class="item-barang">
                        <img src="image/background.jpg" alt="">
                        <table>
                            <tr>
                                <th>Nama Barang</th>
                                <td>Dompet</td>
                            </tr>
                            <tr>
                                <th>Kategori Barang</th>
                                <td>Accessoris</td>
                            </tr>
                            <tr>
                                <th>Tanggal Penemuan</th>
                                <td>22-01-2020</td>
                            </tr>
                            <tr>
                                <th>Tempat Penemuan</th>
                                <td>Parkir</td>
                            </tr>
                            <tr>
                                <th>Kota/Kabupaten</th>
                                <td>Lombok Barat</td>
                            </tr>
                        </table>
                        <div class="reaction">
                            <div class="like">
                                <p class="love">0 likes</p>
                            </div>
                            <div class="klaim">
                                <p><a href="#">Hapus</a></p>
                                <p><a href="#">Ubah</a></p>
                                <p><a href="#">Laporan</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="item-barang">
                        <img src="image/background.jpg" alt="">
                        <table>
                            <tr>
                                <th>Nama Barang</th>
                                <td>Dompet</td>
                            </tr>
                            <tr>
                                <th>Kategori Barang</th>
                                <td>Accessoris</td>
                            </tr>
                            <tr>
                                <th>Tanggal Penemuan</th>
                                <td>22-01-2020</td>
                            </tr>
                            <tr>
                                <th>Tempat Penemuan</th>
                                <td>Parkir</td>
                            </tr>
                            <tr>
                                <th>Kota/Kabupaten</th>
                                <td>Lombok Barat</td>
                            </tr>
                        </table>
                        <div class="reaction">
                            <div class="like">
                                <p class="love">0 likes</p>
                            </div>
                            <div class="klaim">
                                <p><a href="#">Hapus</a></p>
                                <p><a href="#">Ubah</a></p>
                                <p><a href="#">Laporan</a></p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="footer">
            <p><bold>&copy;</bold> 2024. LoFo: Lost & Found Lombok</p>
        </div>      
    </div>
    <!-- <script src="../JS/home.js"></script> -->
    <script src="../JS/histori-barang-temuan.js"></script>
</body>
</html>