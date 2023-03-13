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
  $tlp = $data['tlp'];
  $pw = $data['password'];
  $nama = $data['nama'];
  $alamat = $data['alamat'];
  if ($kelas == 'bkn') {
    echo "<script>
      alert('Pilih Kelas')
      document.location.href='../add/siswa.php';
      </script>";
    exit;
    die;
  }
  $query = "INSERT INTO siswa VALUES('$nisn','$nama','$kelas','$tlp','$nis','$pw','$alamat')";
  mysqli_query($konek, $query);
  return mysqli_affected_rows($konek);
}
function AddTarif($data)
{
  global $konek;
  $Angkatan = $data['Angkatan'];
  $Nominal = $data['Nominal'];
  $kelas = $data['kelas'];
  if ($Angkatan == 'bkn') {
    echo "<script>
      alert('Pilih Angkatan')
      document.location.href='../add/tarif.php';
      </script>";
    exit;
    die;
  }
  if ($kelas == 'bkn') {
    echo "<script>
      alert('Pilih Tipe Kelas')
      document.location.href='../add/tarif.php';
      </script>";
    exit;
    die;
  }
  $query = "INSERT INTO tarif VALUES('','$Angkatan', '$kelas', '$Nominal')";
  mysqli_query($konek, $query);
  return mysqli_affected_rows($konek);
}
function AddKelas($data)
{
  global $konek;
  $tipe = $data['tipe'];
  $jurusan = $data['jurusan'];
  $kelas = $data['kelas'];
  if ($kelas == 'bkn') {
    echo "<script>
      alert('Pilih Kelas')
      document.location.href='../add/kelas.php';
      </script>";
    exit;
    die;
  }
  if ($tipe == 'bkn') {
    echo "<script>
      alert('Pilih Angkatan & tipe')
      document.location.href='../add/kelas.php';
      </script>";
    exit;
    die;
  }
  $query = "INSERT INTO kelas VALUES('','$tipe', '$kelas', '$jurusan')";
  mysqli_query($konek, $query);
  return mysqli_affected_rows($konek);
}
function AddPegawai($data)
{
  global $konek;
  $nip = $data['nip'];
  $tlp = $data['tlp'];
  $jabatan = $data['jabatan'];
  $nama = $data['nama'];
  $pw = $data['password'];
  $alamat = $data['alamat'];
  if ($jabatan == 'bkn') {
    echo "<script>
      alert('Pilih jabatan')
      document.location.href='../add/pegawai.php';
      </script>";
    exit;
    die;
  }
  $query = "INSERT INTO petugas VALUES('$nama','$pw', '$nip', '$jabatan','$tlp','$alamat')";
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
function EditTarif($data)
{
  global $konek;
  $id = $data['id'];
  $Angkatan = $data['Angkatan'];
  $Nominal = $data['Nominal'];
  $kelas = $data['kelas'];
  if ($Angkatan == 'bkn') {
    echo "<script>
      alert('Pilih Angkatan')
      document.location.href='../update/tarif.php?id=$id';
      </script>";
    exit;
    die;
  }
  if ($kelas == 'bkn') {
    echo "<script>
      alert('Pilih Tipe Kelas')
      document.location.href='../update/tarif.php?id=$id';
      </script>";
    exit;
    die;
  }
  $query = "UPDATE tarif SET Angkatan ='$Angkatan', tipe='$kelas',Nominal='$Nominal' WHERE id = '$id'";
  mysqli_query($konek, $query);
  return mysqli_affected_rows($konek);
}
function Editkelas($data)
{
  global $konek;
  $id = $data['id'];
  $tipe = $data['tipe'];
  $jurusan = $data['jurusan'];
  $kelas = $data['kelas'];
  if ($kelas == 'bkn') {
    echo "<script>
      alert('Pilih Kelas')
      document.location.href='../update/kelas.php?id=$id';
      </script>";
    exit;
    die;
  }
  if ($tipe == 'bkn') {
    echo "<script>
      alert('Pilih Angkatan & tipe')
      document.location.href='../update/kelas.php?id=$id';
      </script>";
    exit;
    die;
  }
  $query = "UPDATE kelas SET idtarif='$tipe', kelas='$kelas', jurusan='$jurusan' WHERE idkelas ='$id'";
  mysqli_query($konek, $query);
  return mysqli_affected_rows($konek);
}
