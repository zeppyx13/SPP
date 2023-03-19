<?php
session_start();
require '../../php/backend.php';
$nis = $_GET['nis'];
$bulan = $_GET['bulan'];
$sisen = $_SESSION['level'];
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
$nip = $_SESSION['id_petugas'];
$petugas = query("SELECT * FROM petugas WHERE NIP = '$nip'")[0];
$bulanid = $bulanIndo[$bulan];
$tahun = $_GET['tahun'];
$tglbyr = date('Y-m-d');
$siswa = query("SELECT * FROM siswa inner join kelas USING(idkelas) inner join tarif on kelas.idtarif = tarif.id where Nis = '$nis' ")[0];
$nominal = "Rp. " . number_format($siswa['Nominal'], 0, ',', '.');
$namaSiswa = $siswa['Nama_Siswa'];
if (isset($_POST['add'])) {
    if (Addpembayaran($_POST) > 0) {
        if ($_SESSION['admin']) {
            echo "<script>
      alert('Pembayaran atas nama siswa $namaSiswa Berhasil');
      document.location.href='../../../admin/pembayaran.php';
      </script>";
        } elseif ($_SESSION['petugas']) {
            echo "<script>
      alert('Pembayaran atas nama siswa $namaSiswa Berhasil');
      document.location.href='../../../petugas/pembayaran.php';
      </script>";
        };
    } else {
        echo mysqli_error($konek);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form input || Pembayaran</title>
    <link rel="stylesheet" href="../../../style/insert.css">
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <div class="formbold-main-wrapper">
                <div class="formbold-form-wrapper">
                    <form action="" method="POST">
                        <input type="hidden" value="<?= $tahun, '-', $bulan, '-', date('d') ?>" name="tgl">
                        <input name="id" type="hidden" value="<?= $nis, $bulan, $tahun, date('d') ?>">
                        <input type="hidden" name="nip" value="<?= $petugas['NIP'] ?>">
                        <input type="hidden" name="namapetugas" value="<?= $petugas['Nama_Petugas'] ?>">
                        <input type="hidden" name="Nominal" value="<?= $siswa['Nominal'] ?>">
                        <div class="formbold-form-title">
                            <h2 class="judul">Data Pembayaran</h2>
                        </div>
                        <div class="formbold-input-flex">
                            <div>
                                <label for="nama" class="formbold-form-label">
                                    Nama Siswa :
                                </label>
                                <input readonly value="<?= $siswa['Nama_Siswa'] ?>" type="text" name="nama" id="nama" class="formbold-form-input" autocomplete="off" required />
                            </div>
                            <div>
                                <label for="NIS" class="formbold-form-label"> Nis :</label>
                                <input value="<?= $siswa['Nis'] ?>" type="number" name="nis" id="NIS" class="formbold-form-input" autocomplete="off" required readonly />
                            </div>
                        </div>
                        <div class="formbold-input-flex">
                            <div>
                                <label for="tglbyr" class="formbold-form-label"> Tanggal Pembayaran : </label>
                                <input readonly value="<?= $tglbyr ?>" type="date" name="tglbyr" id="tglbyr" class="formbold-form-input" autocomplete="off" required />
                            </div>
                            <div>
                                <label for="Angkatan" class="formbold-form-label"> Angkatan : </label>
                                <input readonly value="<?= $siswa['Angkatan'] ?>" type="text" name="Angkatan" id="Angkatan" class="formbold-form-input" autocomplete="off" required />
                            </div>
                        </div>
                        <div class="formbold-input-flex">
                            <div>
                                <label for="tahun" class="formbold-form-label"> Tahun Yang Dibayar : </label>
                                <input readonly value="<?= $tahun ?>" type="text" id="tahun" class="formbold-form-input" autocomplete="off" required />
                            </div>
                            <div>
                                <label for="bulan" class="formbold-form-label"> Bulan Yang Dibayar : </label>
                                <input readonly type="text" value="<?= $bulanid ?>" id="bulan" class="formbold-form-input" autocomplete="off" required />
                            </div>
                        </div>
                        <div class="formbold-mb-3">
                            <div>
                                <label for="Nominal" class="formbold-form-label"> Nominal : </label>
                                <input readonly value="<?= $nominal ?>" type="text" id="Nominal" class="formbold-form-input" autocomplete="off" required />
                            </div>
                        </div>
                        <button onclick="return confirm('Yakin melakukan pembayaran siswa : <?= $siswa['Nama_Siswa'] ?> ?')" name="add" class="formbold-btn">Bayar</button>
                        <hr class="garis">
                        <?php if ($sisen == "admin") { ?>
                            <a class="back" href="../../../admin/pembayaran.php">
                                <p>
                                    <<< </p>
                            </a>
                        <?php } elseif ($sisen == "petugas") { ?>
                            <a class="back" href="../../../petugas/pembayaran.php">
                                <p>
                                    <<< </p>
                            </a>
                        <?php } else { ?>
                            <a class="back" href="../../../config/php/logout.php">
                                <p>
                                    <<< </p>
                            </a>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>