<?php
session_start();
require '../config/php/backend.php';
if (!isset($_SESSION['admin'])) {
    echo "<script>alert('akses ilegal');window.location='../login.php'</script>";
    exit;
}
$nama = $_SESSION['nama'];
$siswa = query("SELECT * FROM Siswa");
$pendapatan = query("SELECT SUM(Jumlah) as total from pembayaran")[0];
$apend =  $pendapatan["total"];
$fpendapatan = "Rp. " . number_format($apend, 0, ',', '.');
$jmlS = count($siswa);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/asidenav.css">
    <link rel="stylesheet" href="../style/info.css">
    <title>Dashboard || Home</title>
</head>

<body>
    <aside>
        <nav class="navbar">
            <div class="sidebar">
                <div class="logo">
                    <h1 class="a1">MY-<p>SPP</p>
                    </h1>
                </div>
                <div class="isi">
                    <ul>
                        <li>
                            <a class="active" href="./">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentcolor" viewBox="0 0 24 24">
                                    <path d="M5 22h14a2 2 0 0 0 2-2v-9a1 1 0 0 0-.29-.71l-8-8a1 1 0 0 0-1.41 0l-8 8A1 1 0 0 0 3 11v9a2 2 0 0 0 2 2zm5-2v-5h4v5zm-5-8.59 7-7 7 7V20h-3v-5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v5H5z" />
                                </svg>
                                <b>Home</b>
                            </a>
                        </li>
                        <li>
                            <a href="./siswa.php"><img src="../assets/emoticon/svg/regular/bx-group.svg" style="width:15px; height:15px; margin-right:5px;">
                                <b>Tabel Siswa</b>
                            </a>
                        </li>
                        <li>
                            <a href="./pegawai.php">
                                <img src="../assets/emoticon/svg/regular/bx-buildings.svg" style="width:15px; height:15px; margin-right:5px;">
                                <b>Tabel Petugas</b>
                            </a>
                        </li>
                        <li>
                            <a href="./tarif.php">
                                <img src="../assets/emoticon/svg/regular/bx-table.svg" style="width:15px; height:15px; margin-right:5px;">
                                <b>Tabel SPP</b>
                            </a>
                        </li>
                        <li>
                            <a href="./pembayaran.php">
                                <img src="../assets/emoticon/svg/solid/bxs-bank.svg" style="width:17px; height:17px; margin-right:5px;">
                                <b>Pembayaran SPP</b>
                            </a>
                        </li>
                        <li>
                            <a href="./history.php">
                                <img src="../assets/emoticon/svg/regular/bx-history.svg" style="width:15px; height:15px; margin-right:5px; fill:white;">
                                <b>History Transaksi</b>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="../assets/emoticon/svg/solid/bxs-report.svg" style="width:15px; height:15px; margin-right:5px;">
                                <b>Laporan</b>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="logout">
                    <a href="../config/php/logout.php"><img src="../assets/emoticon/svg/regular/bx-log-out.svg" style="width:15px; height:15px; margin-right:5px;"><b>Logout</b></a>
                </div>
            </div>
        </nav>
        <div class="nav-profile">
            <ul>
                <li>

                </li>
                <li>
                    <div class="profile">
                        <div class="nama">
                            <span style="float:left; margin-top:5px;">
                                <p>Hai,<b> <?= $nama ?></b></p>
                            </span>
                        </div>
                        <span>
                            <a href="#" id="profile-menu">
                                <img class="gbr" src="../assets/img/user.jpg">
                            </a>
                        </span>
                    </div>
                </li>
            </ul>
        </div>
    </aside>
    <div class="subjudul">
        <h2>👋Hai, Welcome Back!</h2>
    </div>
    <div class="container">
        <div class="wrapper">
            <div class="info info-1">
                <h2>Siswa :</h2>
                <h2 class="no"><b><?= $jmlS ?></b></h2>
            </div>
            <div class="info info-2">
                <h2>Transaksi :</h2>
                <h2 class="no"><b> 12</b></h2>
            </div>
            <div class="info info-3">
                <h2>Pemasukan :</h2>
                <h2 class="no"><b><?= $fpendapatan ?></b></h2>
            </div>
        </div>
    </div>
    <script src="p.js"></script>
</body>

</html>