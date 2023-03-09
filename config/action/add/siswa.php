<?php
session_start();
require '../../php/backend.php';
$nisiswa = query("SELECT Nis from siswa")
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Siswa</title>
  <link rel="stylesheet" href="../../../style/insert.css">
</head>

<body>
  <div class="container">
    <div class="wrapper">
      <div class="formbold-main-wrapper">
        <div class="formbold-form-wrapper">
          <form action="" method="POST">
            <div class="formbold-form-title">
              <h2 class="judul">Data Siswa</h2>
            </div>
            <div class="formbold-input-flex">
              <div>
                <label for="NISN" class="formbold-form-label">
                  NISN
                </label>
                <input type="text" name="nisn" id="NISN" class="formbold-form-input" autocomplete="off" required />
              </div>
              <div>
                <label for="NIS" class="formbold-form-label"> Nis </label>
                <input value="5311" type="number" name="nis" id="NIS" class="formbold-form-input" autocomplete="off" required disabled />
              </div>
            </div>
            <div class="formbold-input-flex">
              <div>
                <label for="kelas" class="formbold-form-label"> Kelas : </label>
                <select class="formbold-form-input" name="kelas" id="kelas">
                  <option value="bkn">-Pilih Kelas-</option>
                  <option value="">11</option>
                  <option value="">11</option>
                  <option value="">11</option>
                </select>
              </div>
              <div>
                <label for="angkatan" class="formbold-form-label"> Angkatan : </label>
                <select class="formbold-form-input" name="angkatan" id="angkatan">
                  <option value="bkn">-Pilih Angkatan-</option>
                  <option value="">11</option>
                  <option value="">11</option>
                  <option value="">11</option>
                </select>
              </div>
            </div>
            <div class="formbold-input-flex">
              <div>
                <label for="tlp" class="formbold-form-label"> No telp : </label>
                <input type="text" name="tlp" id="tlp" class="formbold-form-input" autocomplete="off" required />
              </div>
              <div>
                <label for="password" class="formbold-form-label"> Password : </label>
                <input type="password" name="password" id="password" class="formbold-form-input" autocomplete="off" required />
              </div>
            </div>

            <div class="formbold-mb-3">
              <label for="nama" class="formbold-form-label">
                Nama siswa :
              </label>
              <input type="text" name="nama" id="nama" class="formbold-form-input" autocomplete="off" required />
            </div>
            <div class="formbold-mb-3">
              <div>
                <label for="alamat" class="formbold-form-label"> Alamat : </label>
                <input type="text" name="alamat" id="alamat" class="formbold-form-input" autocomplete="off" required />
              </div>
            </div>
            <button class="formbold-btn">Tambahkan</button>
            <hr class="garis">
            <a class="back" href="<?php
                                  if ($_SESSION['admin']) {
                                    echo '../../../admin/siswa.php';
                                  } elseif ($_SESSION['petugas']) {
                                    echo '../../../petugas/siswa.php';
                                  } else {
                                    echo '../../php/logout.php';
                                  };
                                  ?>">
              <p>
                <<< </p>
            </a>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>