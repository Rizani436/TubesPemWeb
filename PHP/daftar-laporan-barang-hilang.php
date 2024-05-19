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
    <title>Barang Hilang</title>
    <link rel="stylesheet" href="../CSS/daftar-laporan-barang-hilang.css">
</head>
<body>
    <div class="container">
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
                <p class="judul">Barang Hilang</p>
                <p class="resultText"></p>
                <!-- <div class="data-kosong">
                    <p>No Result</p>
                </div> -->
                <div class="isi-sidebar-right">
                    <div class="item-barang">
                        <div class="user">
                            <img src="icon/profil.png" alt="">
                            <p class="username">skyway_</p>
                        </div>
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
                                <th>Tanggal Kehilangan</th>
                                <td>22-01-2020</td>
                            </tr>
                            <tr>
                                <th>Tempat Kehilangan</th>
                                <td>Parkir</td>
                            </tr>
                            <tr>
                                <th>Kota/Kabupaten</th>
                                <td>Lombok Barat</td>
                            </tr>
                            <tr>
                                <th>Informasi Detail</th>
                                <td>Terkadang dalam sunyi malam, langit menjadi saksi kesendirian seseorang yang tengah menapaki lorong-lorong kehidupan, mencari arti dan makna yang tersembunyi di balik kerumitan dunia. "Langit malam memberi saksi pada perjalanan kesendirian seseorang, yang</td>
                            </tr>
                            <tr>
                                <th>Nomor Handphone</th>
                                <td>092039903294</td>
                            </tr>
                        </table>
                        <div class="reaction">
                            <img src="icon/love-white.png" alt="">
                            <p class="love">0 likes</p>
                        </div>
                    </div>
                    <div class="item-barang">
                        <div class="user">
                            <img src="icon/profil.png" alt="">
                            <p class="username">skyway_</p>
                        </div>
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
                                <th>Tanggal Kehilangan</th>
                                <td>22-01-2020</td>
                            </tr>
                            <tr>
                                <th>Tempat Kehilangan</th>
                                <td>Parkir</td>
                            </tr>
                            <tr>
                                <th>Kota/Kabupaten</th>
                                <td>Lombok Barat</td>
                            </tr>
                            <tr>
                                <th>Informasi Detail</th>
                                <td>Terkadang dalam sunyi malam, langit menjadi saksi kesendirian seseorang yang tengah menapaki lorong-lorong kehidupan, mencari arti dan makna yang tersembunyi di balik kerumitan dunia. "Langit malam memberi saksi pada perjalanan kesendirian seseorang, yang</td>
                            </tr>
                            <tr>
                                <th>Nomor Handphone</th>
                                <td>092039903294</td>
                            </tr>
                        </table>
                        <div class="reaction">
                            <img src="icon/love-white.png" alt="">
                            <p class="love">0 likes</p>
                        </div>
                    </div>
                    <div class="item-barang">
                        <div class="user">
                            <img src="icon/profil.png" alt="">
                            <p class="username">skyway_</p>
                        </div>
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
                                <th>Tanggal Kehilangan</th>
                                <td>22-01-2020</td>
                            </tr>
                            <tr>
                                <th>Tempat Kehilangan</th>
                                <td>Parkir</td>
                            </tr>
                            <tr>
                                <th>Kota/Kabupaten</th>
                                <td>Lombok Barat</td>
                            </tr>
                            <tr>
                                <th>Informasi Detail</th>
                                <td>Terkadang dalam sunyi malam, langit menjadi saksi kesendirian seseorang yang tengah menapaki lorong-lorong kehidupan, mencari arti dan makna yang tersembunyi di balik kerumitan dunia. "Langit malam memberi saksi pada perjalanan kesendirian seseorang, yang</td>
                            </tr>
                            <tr>
                                <th>Nomor Handphone</th>
                                <td>092039903294</td>
                            </tr>
                        </table>
                        <div class="reaction">
                            <img src="icon/love-white.png" alt="">
                            <p class="love">0 likes</p>
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
    <script src="../JS/daftar-laporan-barang-hilang.js"></script>
</body>
</html>