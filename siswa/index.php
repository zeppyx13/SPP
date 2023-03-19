<?php
error_reporting(0);
session_start();
require '../config/php/backend.php';
if (!isset($_SESSION['siswa'])) {
    echo "<script>alert('akses ilegal');window.location='../login.php'</script>";
    exit;
}
$nama = $_SESSION['nama'];
$no = 1;
$nis = $_SESSION['Nis'];
$query = "SELECT * FROM siswa inner join kelas WHERE Nis = '$nis'";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/asidenav.css">
    <link rel="stylesheet" href="../style/table.css">
    <link rel="stylesheet" href="../style/siswatable.css">
    <title>Dashboard || Pembayaran</title>
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
                                <svg xmlns="http://www.w3.org/2000/svg" fill="curentcolor" viewBox="0 0 24 24">
                                    <path d="M2 8v4.001h1V18H2v3h16l3 .001V21h1v-3h-1v-5.999h1V8L12 2 2 8zm4 10v-5.999h2V18H6zm5 0v-5.999h2V18h-2zm7 0h-2v-5.999h2V18zM14 8a2 2 0 1 1-4.001-.001A2 2 0 0 1 14 8z" />
                                </svg>
                                <b>Pembayaran SPP</b>
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

    <div style="margin-top: 5%;" class="table">
        <div class="table-wrapper-siswa">
            <table class="fl-table-siswa">
                <?php
                $hasil = mysqli_query($konek, $query);
                $row = mysqli_fetch_assoc($hasil);
                $nis = $row['Nis'];
                ?>
                <thead>
                    <tr>
                        <th colspan="3">Data siswa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="jdl"><b>NISN</b></td>
                        <td class="titik2">:</td>
                        <td class="hasil"><?= $row['Nis']; ?></td>
                    </tr>
                    <tr>
                        <td class=" jdl"><b>Nama</b></td>
                        <td class="titik2">:</td>
                        <td class="hasil"><?= $row['Nama_Siswa']; ?></td>
                    </tr>
                    <tr>
                        <td class="jdl"><b>Kelas</b></td>
                        <td class="titik2">:</td>
                        <td class="hasil"><?= $row['kelas']; ?></td>
                    </tr>
                <tbody>
            </table>
        </div>
        <hr>
        <div class="table-wrapper">
            <?php
            $tahun = date('Y');
            if (@$row) {
            ?>
                <table class="fl-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tahun</th>
                            <th>Bulan</th>
                            <th>Jatuh Tempo</th>
                            <th>Tanggal Pembayar</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $awaltempo = date("Y-07-d");
                        $bulanIndo = [
                            '01' => 'Januari',
                            '02' => 'Februari',
                            '03' => 'Maret',
                            '04' => 'April',
                            '05' => 'Mei',
                            '06' => 'Juni',
                            '07' => 'Juli',
                            '08' => 'Agustus',
                            '09' => 'September',
                            '10' => 'Oktober',
                            '11' => 'November',
                            '12' => 'Desember',
                        ];
                        $bulanEng = [
                            'Jan' => '01',
                            'Feb' => '02',
                            'Mar' => '03',
                            'Apr' => '04',
                            'May' => '05',
                            'Jun' => '06',
                            'Jul' => '07',
                            'Aug' => '08',
                            'Sep' => '09',
                            'Oct' => '10',
                            'Nov' => '11',
                            'Dec' => '12',
                        ];
                        for ($i = 0; $i <= 35; $i++) {
                            $jatuhtempo = date("Y-m-d", strtotime("+$i month", strtotime($awaltempo)));
                            $bulan = $bulanIndo[date('m', strtotime($jatuhtempo))];
                            $bulanvald = $bulanEng[date('M', strtotime($jatuhtempo))];
                        ?>
                            <tr>
                                <td><?= $i + 1 ?></td>
                                <?php
                                // global $tahunBayar;
                                $Dbayar = query("SELECT * from siswa INNER JOIN kelas USING(idkelas) INNER JOIN tarif on tarif.id = kelas.idtarif WHERE Nis='$nis'")[0];
                                // var_dump($bulanvald, $nis, $tahunBayar);
                                if ($i < 7) {
                                ?>
                                    <td><?= $tahunBayar = (int)$Dbayar['Angkatan']; ?></td>
                                <?php } elseif ($i > 6 && $i < 19) { ?>
                                    <td><?= $tahunBayar = (int)$Dbayar['Angkatan'] + 1; ?></td>
                                <?php } elseif ($i > 18 && $i < 31) { ?>
                                    <td><?= $tahunBayar = (int)$Dbayar['Angkatan'] + 2; ?></td>
                                <?php } elseif ($i > 30 && $i < 37) { ?>
                                    <td><?= $tahunBayar = (int)$Dbayar['Angkatan'] + 3; ?></td>
                                <?php } ?>
                                <td><?= $bulan ?></td>
                                <td>10-<?= $bulan ?></td>
                                <?php
                                $Vbulan = mysqli_query($konek, "SELECT * FROM pembayaran WHERE Month(Tgl) = '$bulanvald' AND Nis = '$nis' AND Year(Tgl)='$tahunBayar'");
                                $hasil = mysqli_fetch_assoc($Vbulan);
                                $nominal = mysqli_fetch_assoc(mysqli_query($konek, "SELECT nominal FROM siswa INNER JOIN kelas USING(idkelas) INNER JOIN tarif on kelas.idtarif=tarif.id WHERE nis='$nis'"));
                                $cek_bulan = mysqli_num_rows($Vbulan);
                                $jumlah  = number_format($hasil['Jumlah'], 0, ',', '.');
                                $fnominal = number_format($nominal['nominal'], 0, ',', '.');
                                // $nominal = $nominal['nominal'];

                                ?>
                                <td><?php
                                    $tgl = $hasil['Tgl_Bayar'];
                                    if (@$cek_bulan) {
                                        echo $tgl;
                                    } else {
                                        echo '-';
                                    }
                                    ?>
                                <td>
                                    <?php
                                    if (@$cek_bulan) {
                                        echo 'Rp. ', $jumlah;
                                    } else {
                                        echo 'Rp. ', $fnominal;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if (@$cek_bulan) {
                                        echo $hasil['keterangan'];
                                    } else {
                                        echo "Belum Lunas";
                                    }
                                    ?></td>
                                <td>
                                    <?php
                                    if (!$cek_bulan > 0) {
                                    ?>
                                        -
                                    <?php
                                    } else {
                                    ?>
                                        <img src="../assets/emoticon/svg/regular/bx-check-circle.svg" alt="">
                                    <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php }; ?>
                    </tbody>
                </table>
            <?php }; ?>
        </div>
    </div>
    <script src="p.js"></script>
</body>

</html>