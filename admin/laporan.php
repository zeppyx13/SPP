<?php
session_start();
error_reporting(0);
require '../config/php/backend.php';
if (!isset($_SESSION['admin'])) {
    echo "<script>alert('akses ilegal');window.location='../login.php'</script>";
    exit;
}
$nama = $_SESSION['nama'];
$jurusan = query("SELECT DISTINCT jurusan FROM kelas");
$mintahun = query('SELECT Year(Tgl) FROM pembayaran ORDER BY Tgl ASC')[0];
$maxtahun = query('SELECT Year(Tgl) FROM pembayaran ORDER BY Tgl DESC')[0];
$years = range($mintahun["Year(Tgl)"], $maxtahun["Year(Tgl)"]);
// 
$query = "SELECT * FROM tb_pembayaran inner join tb_siswa using(nis) inner join tb_kelas using(idkelas) inner join tb_pegawai using(idpegawai) order by idpembayaran DESC";
// 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/asidenav.css">
    <link rel="stylesheet" href="../style/print.css">
    <title>Dashboard || Laporan</title>
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
                            <a href="./pembayaran.php">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="curentcolor" viewBox="0 0 24 24">
                                    <path d="M2 8v4.001h1V18H2v3h16l3 .001V21h1v-3h-1v-5.999h1V8L12 2 2 8zm4 10v-5.999h2V18H6zm5 0v-5.999h2V18h-2zm7 0h-2v-5.999h2V18zM14 8a2 2 0 1 1-4.001-.001A2 2 0 0 1 14 8z" />
                                </svg>
                                <b>Pembayaran SPP</b>
                            </a>
                        </li>
                        <li>
                            <a href="./history.php">
                                <svg xmlns="http://www.w3.org/2000/svg" color="curentcolor" viewBox="0 0 24 24">
                                    <path d="M12 8v5h5v-2h-3V8z" />
                                    <path d="M21.292 8.497a8.957 8.957 0 0 0-1.928-2.862 9.004 9.004 0 0 0-4.55-2.452 9.09 9.09 0 0 0-3.626 0 8.965 8.965 0 0 0-4.552 2.453 9.048 9.048 0 0 0-1.928 2.86A8.963 8.963 0 0 0 4 12l.001.025H2L5 16l3-3.975H6.001L6 12a6.957 6.957 0 0 1 1.195-3.913 7.066 7.066 0 0 1 1.891-1.892 7.034 7.034 0 0 1 2.503-1.054 7.003 7.003 0 0 1 8.269 5.445 7.117 7.117 0 0 1 0 2.824 6.936 6.936 0 0 1-1.054 2.503c-.25.371-.537.72-.854 1.036a7.058 7.058 0 0 1-2.225 1.501 6.98 6.98 0 0 1-1.313.408 7.117 7.117 0 0 1-2.823 0 6.957 6.957 0 0 1-2.501-1.053 7.066 7.066 0 0 1-1.037-.855l-1.414 1.414A8.985 8.985 0 0 0 13 21a9.05 9.05 0 0 0 3.503-.707 9.009 9.009 0 0 0 3.959-3.26A8.968 8.968 0 0 0 22 12a8.928 8.928 0 0 0-.708-3.503z" />
                                </svg>
                                <b>History Transaksi</b>
                            </a>
                        </li>
                        <li>
                            <a class="active" href="./laporan.php">
                                <svg xmlns="http://www.w3.org/2000/svg" color="curentcolor" viewBox="0 0 24 24">
                                    <path d="m20 8-6-6H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8zM9 19H7v-9h2v9zm4 0h-2v-6h2v6zm4 0h-2v-3h2v3zM14 9h-1V4l5 5h-4z" />
                                </svg>
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

    <div class="table">
        <h2>Laporan Pembayaran</h2>
        <div class="table-wrapper">
            <table class="fl-table">
                <div class="form-cari">
                    <form action="" name="formcri" method="POST">
                        <select id="bulan" name="bulan" class="select-bulan">
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
                            <?php foreach ($years as $year) : ?>
                                <option value="<?= $year; ?>"><?= $year; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <select name="jurusan" class="select-tahun">
                            <?php foreach ($jurusan as $jurusan) : ?>
                                <option value="<?= $jurusan['jurusan']; ?>"><?= $jurusan['jurusan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit" name="cari" class="tombol-cari">
                            <svg xmlns="http://www.w3.org/2000/svg" width='15px' height='15px' fill="white" viewBox="0 0 24 24">
                                <path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z" />
                            </svg>
                            Cari
                        </button>
                    </form>
                    <button onclick="PRINT()" class="btn-print">
                        <p>PRINT</p>
                    </button>
                </div>
                <?php
                $jurusan = $_POST['jurusan'];
                $bulan = $_POST['bulan'];
                $siswa = "SELECT * FROM siswa inner join kelas using (idkelas) INNER JOIN tarif on kelas.idtarif = tarif.id WHERE jurusan='$jurusan'";
                ?>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama Pegawai</th>
                        <th>Kelas</th>
                        <th>Nama Siswa</th>
                        <th>Bulan</th>
                        <th>Tahun Bayar</th>
                        <th>keterangan</th>
                        <th>Tanggal Bayar</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $no = 1;
                        $hasil = mysqli_query($konek, $siswa);
                        while ($row = mysqli_fetch_assoc($hasil)) {
                            $Nis = $row['Nis'];
                            $tahunvald = $_POST['tahun'];
                            $bulanvald = $_POST['bulan'];
                            $jurusanvald = $_POST['jurusan'];
                            $queryvald = mysqli_query($konek, "SELECT 
                            YEAR(Tgl_Bayar) AS tahun,
                            siswa.*,
                            petugas.*,
                            kelas.*,
                            pembayaran.* 
                            FROM pembayaran 
                            inner join siswa using(Nis) 
                            inner join petugas using(Nip) 
                            inner join kelas using(idkelas) 
                            WHERE Nis='$Nis' AND 
                            MONTH(Tgl) = '$bulanvald' AND 
                            YEAR(Tgl) = '$tahunvald' AND 
                            jurusan = '$jurusanvald' 
                            ORDER BY No DESC");
                            $data = mysqli_fetch_assoc($queryvald);
                            $keterangan = $data['keterangan'];
                            $Nama_Siswa = $data['Nama_Siswa'];
                            $Nama_Petugas = $data['Nama_Petugas'];
                        ?>
                            <td><?= $no++ ?></td>
                            <td><?= $row['Nis']; ?></td>
                            <td>
                                <?php
                                if ($Nama_Petugas > 0) {
                                    echo "$Nama_Petugas";
                                } else {
                                    echo "-";
                                }
                                ?>
                            </td>
                            <td><?= $row['jurusan']; ?></td>
                            <td><?= $row['Nama_Siswa']; ?></td>
                            <td><?= $bulanvald ?></td>
                            <td>
                                <?php if (@$data) {
                                    $tahun = $data['tahun'];
                                    echo $data['tahun'];
                                } else {
                                    echo "-";
                                } ?>
                                <?php
                                if ($keterangan) {
                                    echo "<td><strong>$keterangan</strong></td>";
                                } else {
                                    echo "<td><strong>Belum Lunas</strong></td>";
                                } ?>
                            </td>
                            <td>
                                <?php if (@$data) {
                                    echo $data['Tgl_Bayar'];
                                } else {
                                    echo "-";
                                } ?>
                            </td>
                            <td>
                                <?php if (@$data) {
                                    echo "Rp. ", number_format($data['Jumlah'], 0, ',', '.');
                                } else {
                                    echo "Rp. -", number_format($row['Nominal'], 0, ',', '.');
                                } ?>
                            </td>
                            <?php
                            $total_ang += $data['Jumlah'];
                            $total_min += $row['Nominal'];
                            $total_all = $total_min - $total_ang;
                            ?>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="9" style="text-align: right; padding:5px 40px 5px 0px; font-size:10px;">
                        <h3><b>TOTAL BAYAR :</b></h3>
                    </td>
                    <td>Rp.<?= number_format($total_ang, 0, ',', '.') ?></td>
                </tr>
                <tr>
                    <td colspan="9" style="text-align: right; padding:5px 40px 5px 0px; font-size:10px;">
                        <h3><b>TOTAL KURANG :</b></h3>
                    </td>
                    <td>Rp.<?= number_format($total_all, 0, ',', '.') ?></td>
                </tr>
                <tbody>
            </table>
        </div>
    </div>

    <script>
        function PRINT() {
            window.print();
        }
    </script>
</body>

</html>