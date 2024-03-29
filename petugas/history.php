<?php
session_start();
error_reporting(0);
require '../config/php/backend.php';
if (!isset($_SESSION['petugas'])) {
    echo "<script>alert('akses ilegal');window.location='../login.php'</script>";
    exit;
}
$nama = $_SESSION['nama'];
$mintahun = query('SELECT Year(Tgl) FROM pembayaran ORDER BY Tgl ASC')[0];
$maxtahun = query('SELECT Year(Tgl) FROM pembayaran ORDER BY Tgl DESC')[0];
$years = range($mintahun["Year(Tgl)"], $maxtahun["Year(Tgl)"]);
if (isset($_POST["cari"])) {
    if ($_POST['bulan'] == 'all' && $_POST['tahun'] == 'all') {
        $query =  query("SELECT MONTH(pembayaran.Tgl) as bulan ,Year(pembayaran.Tgl) as tahun, IdPembayaran, Jumlah,Tgl,Nama_Petugas,Nis, siswa.Nama_Siswa , siswa.idkelas, pembayaran.Jumlah, pembayaran.Angkatan, kelas.kelas,pembayaran.Tgl_Bayar FROM pembayaran inner join siswa using(Nis) inner join kelas using(idkelas) ORDER BY No DESC");
    } elseif ($_POST['tahun'] == 'all') {
        $bulanvald = $_POST['bulan'];
        $query =  query("SELECT MONTH(pembayaran.Tgl) as bulan ,Year(pembayaran.Tgl) as tahun, IdPembayaran, Jumlah,Tgl,Nama_Petugas,Nis, siswa.Nama_Siswa , siswa.idkelas, pembayaran.Jumlah, pembayaran.Angkatan, kelas.kelas,pembayaran.Tgl_Bayar FROM pembayaran inner join siswa using(Nis) inner join kelas using(idkelas) WHERE MONTH(pembayaran.Tgl) = '$bulanvald' ORDER BY No DESC");
    } elseif ($_POST['bulan'] == 'all') {
        $tahunvald = $_POST['tahun'];
        $query =  query("SELECT MONTH(pembayaran.Tgl) as bulan ,Year(pembayaran.Tgl) as tahun, IdPembayaran, Jumlah,Tgl,Nama_Petugas,Nis, siswa.Nama_Siswa , siswa.idkelas, pembayaran.Jumlah, pembayaran.Angkatan, kelas.kelas,pembayaran.Tgl_Bayar FROM pembayaran inner join siswa using(Nis) inner join kelas using(idkelas) WHERE YEAR(pembayaran.Tgl) = '$tahunvald' ORDER BY No DESC");
    } else {
        $tahunvald = $_POST['tahun'];
        $bulanvald = $_POST['bulan'];
        $query =  query("SELECT MONTH(pembayaran.Tgl) as bulan ,Year(pembayaran.Tgl) as tahun, IdPembayaran, Jumlah,Tgl,Nama_Petugas,Nis, siswa.Nama_Siswa , siswa.idkelas, pembayaran.Jumlah, pembayaran.Angkatan, kelas.kelas,pembayaran.Tgl_Bayar FROM pembayaran inner join siswa using(Nis) inner join kelas using(idkelas) WHERE YEAR(pembayaran.Tgl) = '$tahunvald' AND MONTH(pembayaran.Tgl) = '$bulanvald' ORDER BY No DESC");
    }
} else {
    $query =  query("SELECT MONTH(pembayaran.Tgl) as bulan ,Year(pembayaran.Tgl) as tahun, IdPembayaran, Jumlah,Tgl,Nama_Petugas,Nis, siswa.Nama_Siswa , siswa.idkelas, pembayaran.Jumlah, pembayaran.Angkatan, kelas.kelas,pembayaran.Tgl_Bayar FROM pembayaran inner join siswa using(Nis) inner join kelas using(idkelas) ORDER BY No DESC");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/asidenav.css">
    <link rel="stylesheet" href="../style/table.css">
    <title>Dashboard || Riwayat</title>
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
                            <a href="./pembayaran.php">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="curentcolor" viewBox="0 0 24 24">
                                    <path d="M2 8v4.001h1V18H2v3h16l3 .001V21h1v-3h-1v-5.999h1V8L12 2 2 8zm4 10v-5.999h2V18H6zm5 0v-5.999h2V18h-2zm7 0h-2v-5.999h2V18zM14 8a2 2 0 1 1-4.001-.001A2 2 0 0 1 14 8z" />
                                </svg>
                                <b>Pembayaran SPP</b>
                            </a>
                        </li>
                        <li>
                            <a class="active" href="./history.php">
                                <svg xmlns="http://www.w3.org/2000/svg" color="curentcolor" viewBox="0 0 24 24">
                                    <path d="M12 8v5h5v-2h-3V8z" />
                                    <path d="M21.292 8.497a8.957 8.957 0 0 0-1.928-2.862 9.004 9.004 0 0 0-4.55-2.452 9.09 9.09 0 0 0-3.626 0 8.965 8.965 0 0 0-4.552 2.453 9.048 9.048 0 0 0-1.928 2.86A8.963 8.963 0 0 0 4 12l.001.025H2L5 16l3-3.975H6.001L6 12a6.957 6.957 0 0 1 1.195-3.913 7.066 7.066 0 0 1 1.891-1.892 7.034 7.034 0 0 1 2.503-1.054 7.003 7.003 0 0 1 8.269 5.445 7.117 7.117 0 0 1 0 2.824 6.936 6.936 0 0 1-1.054 2.503c-.25.371-.537.72-.854 1.036a7.058 7.058 0 0 1-2.225 1.501 6.98 6.98 0 0 1-1.313.408 7.117 7.117 0 0 1-2.823 0 6.957 6.957 0 0 1-2.501-1.053 7.066 7.066 0 0 1-1.037-.855l-1.414 1.414A8.985 8.985 0 0 0 13 21a9.05 9.05 0 0 0 3.503-.707 9.009 9.009 0 0 0 3.959-3.26A8.968 8.968 0 0 0 22 12a8.928 8.928 0 0 0-.708-3.503z" />
                                </svg>
                                <b>Riwayat Transaksi</b>
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
        <h2>Riwayat Pembayaran</h2>
        <div class="table-wrapper">
            <table class="fl-table">
                <div class="form-cari">
                    <form action="" name="formcri" method="POST">
                        <select id="bulan" name="bulan" class="select-bulan">
                            <option selected value="all">-Semua Bulan-</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                        <select name="tahun" class="select-tahun">
                            <option selected value="all">-Semua Tahun</option>
                            <?php foreach ($years as $year) : ?>
                                <option value="<?= $year; ?>"><?= $year; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit" name="cari" class="tombol-cari">
                            <svg xmlns="http://www.w3.org/2000/svg" width='15px' height='15px' fill="white" viewBox="0 0 24 24">
                                <path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z" />
                            </svg>
                            Cari
                        </button>
                    </form>
                </div>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id Pembayaran</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Nama petugas</th>
                        <th>Kelas</th>
                        <th>Angkatan</th>
                        <th>Tanggal pembayaran</th>
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($query as $row) :
                        $bulanIndo = [
                            '1' => 'Januari',
                            '2' => 'Februari',
                            '3' => 'Maret',
                            '4' => 'April',
                            '5' => 'Mei',
                            '6' => 'Juni',
                            '7' => 'Juli',
                            '8' => 'Agustus',
                            '9' => 'September',
                            '10' => 'Oktober',
                            '11' => 'November',
                            '12' => 'Desember',
                        ];
                        $vbulan = $row['bulan'];
                        $bulan = $bulanIndo["$vbulan"];
                    ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $row['IdPembayaran'] ?></td>
                            <td><?= $row['Nis'] ?></td>
                            <td><?= $row['Nama_Siswa'] ?></td>
                            <td><?= $row['Nama_Petugas'] ?> </td>
                            <td><?= $row['kelas'] ?></td>
                            <td><?= $row['Angkatan'] ?></td>
                            <td><?= $row['Tgl_Bayar'] ?></td>
                            <td><?= $bulan ?></td>
                            <td><?= $row['tahun'] ?></td>
                            <td><?= $row['Jumlah'] ?></td>
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