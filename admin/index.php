<?php
session_start();
if (!isset($_SESSION['admin'])) {
    echo "<script>alert('akses ilegal');window.location='../login.php'</script>";
    exit;
}
$nama = $_SESSION['nama'];
$query = "SELECT * FROM";
$no = 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/asidenav.css">
    <link rel="stylesheet" href="../style/table.css">
    <title>Dashboard</title>
</head>

<body>
    <nav class="navbar">
        <div class="sidebar">
            <div class="logo">
                <h1 class="a1">MY-<p>SPP</p>
                </h1>
            </div>
            <div class="isi">
                <ul>
                    <li>
                        <a href="">
                            <img src="../assets/emoticon/svg/regular/bx-home-alt.svg" style="width:15px; height:15px; margin-right:5px;">
                            <b>Home</b>
                        </a>
                    </li>
                    <li>
                        <a href=""><img src="../assets/emoticon/svg/regular/bx-group.svg" style="width:15px; height:15px; margin-right:5px;">
                            <b>Tabel Siswa</b>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="../assets/emoticon/svg/regular/bx-buildings.svg" style="width:15px; height:15px; margin-right:5px;">
                            <b>Tabel Petugas</b>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="../assets/emoticon/svg/regular/bx-table.svg" style="width:15px; height:15px; margin-right:5px;">
                            <b>Tabel SPP</b>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="../assets/emoticon/svg/solid/bxs-bank.svg" style="width:17px; height:17px; margin-right:5px;">
                            <b>Pembayaran SPP</b>
                        </a>
                    </li>
                    <li>
                        <a href="">
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

    <div class="table">
        <h2>Data Siswa</h2>
        <div class="table-wrapper">
            <table class="fl-table">
                <thead>
                    <tr>
                        <th>NISN</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Alamat</th>
                        <th>No telp</th>
                        <th>Nominal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Content 1</td>
                        <td>Content 1</td>
                        <td>Content 1</td>
                        <td>Content 1</td>
                        <td>Content 1</td>
                        <td>Content 1</td>
                        <td>Content 1</td>
                        <td><a href="http://"><button>Bayar</button></a></td>
                    </tr>

                <tbody>
            </table>
        </div>
    </div>

    <script src="p.js"></script>
</body>

</html>