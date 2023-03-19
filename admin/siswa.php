<?php
session_start();
require '../config/php/backend.php';
if (!isset($_SESSION['admin'])) {
    echo "<script>alert('akses ilegal');window.location='../login.php'</script>";
    exit;
}
$nama = $_SESSION['nama'];
$query = "SELECT * FROM siswa inner join kelas on siswa.idkelas = kelas.idkelas inner join tarif on kelas.idtarif = tarif.id";
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
                            <a href="./">
                                <img src="../assets/emoticon/svg/regular/bx-home-alt.svg" style="width:15px; height:15px; margin-right:5px;">
                                <b>Beranda</b>
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
                            <a href="./kelas.php">
                                <img src="../assets/emoticon/svg/solid/bxs-user-detail.svg" style="width:15px; height:15px; margin-right:5px;">
                                <b>Tabel Kelas</b>
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
                                <b>Riwayat Transaksi</b>
                            </a>
                        </li>
                        <li>
                            <a href="./laporan.php">
                                <img src="../assets/emoticon/svg/solid/bxs-report.svg" style="width:15px; height:15px; margin-right:5px;">
                                <b>Laporan</b>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="logout">
                    <a href="../config/php/logout.php"><img src="../assets/emoticon/svg/regular/bx-log-out.svg" style="width:15px; height:15px; margin-right:5px;"><b>keluar</b></a>
                </div>
            </div>
        </nav>
        <div class="nav-profile">
            <ul>
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

    <div class="table">
        <h2>Data Siswa</h2>
        <div class="table-wrapper">
            <table class="fl-table">
                <a href="../config/action/add/siswa.php"><button class="form-insert"><svg fill="white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M19 11h-6V5h-2v6H5v2h6v6h2v-6h6z" />
                        </svg></button></a>
                <thead>
                    <tr>
                        <th>NISN</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Password</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Alamat</th>
                        <th>No telp</th>
                        <th>Angkatan</th>
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
                            <td><?= $row["Password"] ?></td>
                            <td><?= $row["kelas"] ?></td>
                            <td><?= $row["jurusan"] ?></td>
                            <td><?= $row["Alamat"] ?></td>
                            <td><?= $row["Tlp"] ?></td>
                            <td><?= $row["Angkatan"] ?></td>
                            <td><?= $row["Nominal"] ?></td>
                            <td><a onclick="return confirm('Yakin ingin menghapus siswa : <?= $row['Nama_Siswa'] ?>')" class="icon-hps" href="../config/action/delete/all.php?id=<?= $row['Nis']; ?>&tabel=siswa&primary=Nis">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="curentcolor" viewBox="0 0 24 24">
                                        <path d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z" />
                                        <path d="M9 10h2v8H9zm4 0h2v8h-2z" />
                                    </svg>
                                </a>
                                <a class="icon-edit" href="../config/action/update/siswa.php?id=<?= $row["Nis"] ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="curentcolor" viewBox="0 0 24 24">
                                        <path d="M18.404 2.998c-.757-.754-2.077-.751-2.828.005l-1.784 1.791L11.586 7H7a.998.998 0 0 0-.939.658l-4 11c-.133.365-.042.774.232 1.049l2 2a.997.997 0 0 0 1.049.232l11-4A.998.998 0 0 0 17 17v-4.586l2.207-2.207v-.001h.001L21 8.409c.378-.378.586-.881.585-1.415 0-.535-.209-1.038-.588-1.415l-2.593-2.581zm-3.111 8.295A.996.996 0 0 0 15 12v4.3l-9.249 3.363 4.671-4.671c.026.001.052.008.078.008A1.5 1.5 0 1 0 9 13.5c0 .026.007.052.008.078l-4.671 4.671L7.7 9H12c.266 0 .52-.105.707-.293L14.5 6.914 17.086 9.5l-1.793 1.793zm3.206-3.208-2.586-2.586 1.079-1.084 2.593 2.581-1.086 1.089z" />
                                    </svg>
                                </a>
                            </td>
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