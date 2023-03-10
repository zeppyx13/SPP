<?php
$konek = mysqli_connect('localhost', 'root', '', 'test');

function query($query)
{
  global $konek;
  $result = mysqli_query($konek, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}
// insert
function AddSiswa($data)
{
  global $konek;
  $nisn = $data['nisn'];
  $nis = $data['nis'];
  $kelas = $data['kelas'];
  $angkatan = $data['angkatan'];
  $tlp = $data['tlp'];
  $pw = $data['password'];
  $nama = $data['nama'];
  $alamat = $data['alamat'];
  if ($angkatan == 'bkn') {
    echo "<script>
      alert('Pilih Angkatan')
      document.location.href='../add/siswa.php';
      </script>";
    exit;
    die;
  }
  if ($kelas == 'bkn') {
    echo "<script>
      alert('Pilih Kelas')
      document.location.href='../add/siswa.php';
      </script>";
    exit;
    die;
  }
  $query = "INSERT INTO siswa VALUES('$nisn','$nama','$kelas','$tlp','$nis','$pw','$alamat','$angkatan')";
  mysqli_query($konek, $query);
  return mysqli_affected_rows($konek);
}
function AddTarif($data)
{
  global $konek;
  $nisn = $data['nisn'];
  $nis = $data['nis'];
  $kelas = $data['kelas'];
  $angkatan = $data['angkatan'];
  $tlp = $data['tlp'];
  $pw = $data['password'];
  $nama = $data['nama'];
  $alamat = $data['alamat'];
  if ($angkatan == 'bkn') {
    echo "<script>
      alert('Pilih Angkatan')
      document.location.href='../add/siswa.php';
      </script>";
    exit;
    die;
  }
  if ($kelas == 'bkn') {
    echo "<script>
      alert('Pilih Kelas')
      document.location.href='../add/siswa.php';
      </script>";
    exit;
    die;
  }
  $query = "INSERT INTO siswa VALUES('$nisn','$nama','$kelas','$tlp','$nis','$pw','$alamat','$angkatan')";
  mysqli_query($konek, $query);
  return mysqli_affected_rows($konek);
}
// Update
function UpdateSiswa($data)
{
  global $konek;
  $nisn = $data['nisn'];
  $nis = $data['nis'];
  $kelas = $data['kelas'];
  $angkatan = $data['angkatan'];
  $tlp = $data['tlp'];
  $pw = $data['password'];
  $nama = $data['nama'];
  $alamat = $data['alamat'];
  if ($angkatan == 'bkn') {
    echo "<script>
      alert('Pilih Angkatan')
      document.location.href='../add/siswa.php';
      </script>";
    exit;
    die;
  }
  if ($kelas == 'bkn') {
    echo "<script>
      alert('Pilih Kelas')
      document.location.href='../add/siswa.php';
      </script>";
    exit;
    die;
  }
  $query = "UPDATE siswa SET";
  mysqli_query($konek, $query);
  return mysqli_affected_rows($konek);
}
