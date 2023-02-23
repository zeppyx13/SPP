<?php
session_start();
require './backend.php';
if (isset($_POST['login'])) {
    $id = $_POST['id'];
    $pw = $_POST['pw'];
    $qadmin = mysqli_query($konek, "SELECT * FROM petugas WHERE NIP='$id' AND Password='$pw' AND Jabatan ='admin'") or die(mysqli_error($konek));
    $qpetugas = mysqli_query($konek, "SELECT * FROM petugas WHERE NIP='$id' AND Password='$pw' AND Jabatan ='petugas'") or die(mysqli_error($konek));
    $qsiswa = mysqli_query($konek, "SELECT * FROM siswa WHERE NIS='$id' AND Password='$pw'") or die(mysqli_error($konek));

    if (mysqli_num_rows($qadmin) > 0) {
        $dta = mysqli_fetch_assoc($qadmin);
        $_SESSION['admin'] = true;
        $_SESSION['id_petugas'] = $dta['NIP'];
        $_SESSION['nama'] = $dta['Nama_Petugas'];
        $_SESSION['level'] = $dta['Jabatan'];
        echo "<script>window.location='../../admin/'</script>";
    } elseif (mysqli_num_rows($qpetugas) > 0) {
        $dta = mysqli_fetch_assoc($qpetugas);
        $_SESSION['id_petugas'] = $dta['NIP'];
        $_SESSION['nama'] = $dta['Nama_Petugas'];
        $_SESSION['level'] = $dta['Jabatan'];
        echo "<script>window.location='../../admin/'</script>";
    } elseif (mysqli_num_rows($qsiswa) > 0) {
        $dta = mysqli_fetch_assoc($qsiswa);
        $_SESSION['Nis'] = $dta['Nis'];
        $_SESSION['nama'] = $dta['Nama_Siswa'];
        echo "<script>window.location='../../siswa/'</script>";
    } else {
        echo "<script>alert('NIP/NIS atau Password salah');window.location='../../login.php'</script>";
    }
}
