<?php
session_start();
require '../config/php/backend.php';
if (!isset($_SESSION['admin'])) {
    echo "<script>alert('akses ilegal');window.location='../login.php'</script>";
    exit;
}
$nama = $_SESSION['nama'];
$query = "SELECT * FROM siswa INNER JOIN tarif USING(Angkatan);";
$data = query($query);
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
    <title>Dashboard || Siswa</title>
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
                        <a href="./">
                            <img src="../assets/emoticon/svg/regular/bx-home-alt.svg" style="width:15px; height:15px; margin-right:5px;">
                            <b>Home</b>
                        </a>
                    </li>
                    <li>
                        <a class="active" href="./siswa.php">
                            <svg xmlns="http://www.w3.org/2000/svg" filter="cruntcolor" viewBox="0 0 24 24">
                                <path d="M16.604 11.048a5.67 5.67 0 0 0 .751-3.44c-.179-1.784-1.175-3.361-2.803-4.44l-1.105 1.666c1.119.742 1.8 1.799 1.918 2.974a3.693 3.693 0 0 1-1.072 2.986l-1.192 1.192 1.618.475C18.951 13.701 19 17.957 19 18h2c0-1.789-.956-5.285-4.396-6.952z" />
                                <path d="M9.5 12c2.206 0 4-1.794 4-4s-1.794-4-4-4-4 1.794-4 4 1.794 4 4 4zm0-6c1.103 0 2 .897 2 2s-.897 2-2 2-2-.897-2-2 .897-2 2-2zm1.5 7H8c-3.309 0-6 2.691-6 6v1h2v-1c0-2.206 1.794-4 4-4h3c2.206 0 4 1.794 4 4v1h2v-1c0-3.309-2.691-6-6-6z" />
                            </svg>
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
                    <?php $i = 1; ?>
                    <?php foreach ($data as $row) : ?>
                        <tr>
                            <td><?= $row["NISN"] ?></td>
                            <td><?= $row["Nis"] ?></td>
                            <td><?= $row["Nama_Siswa"] ?></td>
                            <td><?= $row["Kelas"] ?></td>
                            <td><?= $row["Alamat"] ?></td>
                            <td><?= $row["Tlp"] ?></td>
                            <td><?= $row["Nominal"] ?></td>
                            <td><a href="http://"><button>Bayar</button></a></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                <tbody>
            </table>
        </div>
    </div>

    <script src="p.js"></script>
</body>

</html>