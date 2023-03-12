<?php
require '../../php/backend.php';
$id = $_GET['id'];
$tabel = $_GET['tabel'];
$primary =  $_GET['primary'];
$hapus = mysqli_query($konek, "DELETE FROM $tabel WHERE $primary = '$id'");
if ($hapus > 0) {

    if ($tabel == "siswa") {
        echo "<script>
            alert('data $tabel berhasil di hapus')
            document.location.href='../../../admin/siswa.php';
            </script>
            ";
    } else if ($tabel == "tarif") {
        echo "<script>
        alert('data $tabel berhasil di hapus')
        document.location.href='../../../admin/tarif.php';
        </script>
        ";
    } else if ($tabel == "kelas") {
        echo "<script>
        alert('data $tabel berhasil di hapus')
        document.location.href='../../../admin/kelas.php';
        </script>
        ";
    } else if ($tabel == "petugas") {
        echo "<script>
        alert('data $tabel berhasil di hapus')
        document.location.href='../../../admin/pegawai.php';
        </script>
        ";
    } else {
        echo "<script>
            alert('data $tabel gagal di hapus')
            document.location.href='../../../admin/';
            </script>
            ";
    }
}
