<?php
session_start();
require '../config/php/backend.php';
if (!isset($_SESSION['admin'])) {
    echo "<script>alert('akses ilegal');window.location='../login.php'</script>";
    exit;
}
$nama = $_SESSION['nama'];
$query = "SELECT * FROM petugas";
$data = query($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/asidenav.css">
    <link rel="stylesheet" href="../style/table.css">
    <title>Dashboard || pegawai</title>
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
                            <a href="./siswa.php"><img src="../assets/emoticon/svg/regular/bx-group.svg" style="width:15px; height:15px; margin-right:5px;">
                                <b>Tabel Siswa</b>
                            </a>
                        </li>
                        <li>
                            <a class="active" href="./pegawai.php">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="curentcolor" viewBox="0 0 24 24">
                                    <path d="M19 2H9c-1.103 0-2 .897-2 2v6H5c-1.103 0-2 .897-2 2v9a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V4c0-1.103-.897-2-2-2zM5 12h6v8H5v-8zm14 8h-6v-8c0-1.103-.897-2-2-2H9V4h10v16z" />
                                    <path d="M11 6h2v2h-2zm4 0h2v2h-2zm0 4.031h2V12h-2zM15 14h2v2h-2zm-8 .001h2v2H7z" />
                                </svg>
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
                    <a href="../config/php/logout.php"><img src="../assets/emoticon/svg/regular/bx-log-out.svg" style="width:15px; height:15px; margin-right:5px;"><b>Keluar</b></a>
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

    <div class="table">
        <h2>Data Pegawai</h2>
        <div class="table-wrapper">
            <table class="fl-table">
                <a href="../config/action/add/pegawai.php"><button class="form-insert"><svg fill="white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M19 11h-6V5h-2v6H5v2h6v6h2v-6h6z" />
                        </svg></button></a>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama_Petugas</th>
                        <th>No telp</th>
                        <th>Alamat</th>
                        <th>Jabatan</th>
                        <th>Pssword</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data as $row) : ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $row["NIP"] ?></td>
                            <td><?= $row["Nama_Petugas"] ?></td>
                            <td><?= $row["tlp"] ?></td>
                            <td><?= $row["Alamat"] ?></td>
                            <td><?= $row["Jabatan"] ?></td>
                            <td><?= $row["Password"] ?></td>
                            <td><a onclick="return confirm('Yakin ingin mengahpus petugas dengan nama : <?= $row['Nama_Petugas'] ?>')" class="icon-hps" href="../config/action/delete/all.php?id=<?= $row['NIP']; ?>&tabel=petugas&primary=NIP">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="curentcolor" viewBox="0 0 24 24">
                                        <path d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z" />
                                        <path d="M9 10h2v8H9zm4 0h2v8h-2z" />
                                    </svg>
                                </a>
                                <a class="icon-edit" href="../config/action/update/pegawai.php?id=<?= $row['NIP']; ?>">
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
</body>

</html>