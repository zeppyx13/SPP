<?php
session_start();
error_reporting(0);
require '../config/php/backend.php';
if (!isset($_SESSION['admin'])) {
    echo "<script>alert('akses ilegal');window.location='../login.php'</script>";
    exit;
}
$nama = $_SESSION['nama'];
$no = 1;
$query = "SELECT * FROM siswa WHERE Nis = ''";
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
                            <a href="./">
                                <img src="../assets/emoticon/svg/regular/bx-home-alt.svg" style="width:15px; height:15px; margin-right:5px;">
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
                                <svg xmlns="http://www.w3.org/2000/svg" fill="curentcolor" viewBox="0 0 24 24">
                                    <path d="M4 21h15.893c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2H4c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zm0-2v-5h4v5H4zM14 7v5h-4V7h4zM8 7v5H4V7h4zm2 12v-5h4v5h-4zm6 0v-5h3.894v5H16zm3.893-7H16V7h3.893v5z" />
                                </svg>
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
                            <a class="active" href="./pembayaran.php">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="curentcolor" viewBox="0 0 24 24">
                                    <path d="M2 8v4.001h1V18H2v3h16l3 .001V21h1v-3h-1v-5.999h1V8L12 2 2 8zm4 10v-5.999h2V18H6zm5 0v-5.999h2V18h-2zm7 0h-2v-5.999h2V18zM14 8a2 2 0 1 1-4.001-.001A2 2 0 0 1 14 8z" />
                                </svg>
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
                            <a href="./laporan.php">
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
            <div class="cari">
                <?php
                if (isset($_POST["cari"])) {
                    $keyword = $_POST['keyword'];
                    $query = "SELECT * FROM siswa WHERE Nis like '%$keyword%' or NISN like '%$keyword'  LIMIT 1";
                    $nis = $keyword;
                }
                ?>
                <form action="" method="POST">
                    <input list="list_nis" autocomplete="off" name="keyword" placeholder=" NIS/NISN" type="text">
                    <button name="cari" class="tombol-cari"><svg xmlns="http://www.w3.org/2000/svg" class="gbrcari" fill="white" viewBox="0 0 24 24">
                            <path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z" />
                        </svg>Search</button>
                    <datalist id="list_nis">
                        <?php
                        $hasil = mysqli_query($konek, "SELECT Nis FROM siswa");
                        while ($row = mysqli_fetch_assoc($hasil)) {
                        ?>
                            <option value="<?php echo $row['Nis']; ?>"></option>
                        <?php
                        }
                        ?>

                    </datalist>
                </form>
            </div>
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

    <div style="margin-top: 5%;" class="table">
        <div class="table-wrapper-siswa">
            <table class="fl-table-siswa">
                <?php
                $hasil = mysqli_query($konek, $query);
                $row = mysqli_fetch_assoc($hasil);
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
                        <td class="hasil"><?= $row['Kelas']; ?></td>
                    </tr>
                <tbody>
            </table>
        </div>
        <hr>
        <div class="table-wrapper">
            <table class="fl-table">
                <thead>
                    <tr>
                        <th>Tahun</th>
                        <th>Bulan</th>
                        <th>Tanggal Bayar</th>
                        <th>Jumlah</th>
                        <th>No telp</th>
                        <th>Nominal</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $qcari = "SELECT * FROM pembayaran WHERE Nis =''";
                    $data = query($qcari);
                    ?>
                    <?php $i = 1; ?>
                    <?php foreach ($data as $row) : ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?= $data[''] ?></td>
                            <td><?= $data[''] ?></td>
                            <td><?= $data[''] ?></td>
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