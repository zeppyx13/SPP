<?php
session_start();
require '../../php/backend.php';
$years = range(2006, 2100);
$id = $_GET['id'];
$qtarif = query("SELECT * FROM tarif ORDER BY Angkatan ASC");
$kelas = query("SELECT * FROM kelas WHERE idkelas ='$id'")[0];
$idtarif = $kelas['idtarif'];
$seltarif = query("SELECT * FROM tarif WHERE id='$idtarif'")[0];
if (isset($_POST['add'])) {
    if (EditKelas($_POST) > 0) {
        echo "<script>
      alert('Kelas Diubah')
      document.location.href='../../../admin/kelas.php';
      </script>";
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
    <title>Form update || Kelas</title>
    <link rel="stylesheet" href="../../../style/insert.css">
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <div class="formbold-main-wrapper">
                <div class="formbold-form-wrapper">
                    <form action="" method="POST">
                        <input type="text" hidden name="id" value="<?= $kelas['idkelas'] ?>">
                        <div class="formbold-form-title">
                            <h2 class="judul">Data Kelas</h2>
                        </div>
                        <div class="formbold-input-flex">
                            <div>
                                <label for="kelas" class="formbold-form-label">
                                    Kelas :
                                </label>
                                <?php
                                if ($kelas['kelas'] == '10') {
                                ?>
                                    <select required class="formbold-form-input" name="kelas" id="kelas">
                                        <option value="bkn">-Pilih Kelas-</option>
                                        <option selected value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                <?php } elseif ($kelas['kelas'] == '11') { ?>
                                    <select required class="formbold-form-input" name="kelas" id="kelas">
                                        <option value="bkn">-Pilih Kelas-</option>
                                        <option value="10">10</option>
                                        <option selected value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                <?php } elseif ($kelas['kelas'] == '12') { ?>
                                    <select required class="formbold-form-input" name="kelas" id="kelas">
                                        <option value="bkn">-Pilih Kelas-</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option selected value="12">12</option>
                                    </select>
                                <?php } else { ?>
                                    <select required class="formbold-form-input" name="kelas" id="kelas">
                                        <option value="bkn">-Pilih Kelas-</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                <?php } ?>
                            </div>
                            <div>
                                <label for="tipe" class="formbold-form-label">Angkatan & Tipe Kelas : </label>
                                <select required class="formbold-form-input" name="tipe" id="tipe">
                                    <option value="bkn">-Pilih Tipe-</option>
                                    <option selected value="<?= $kelas['idtarif'] ?>"><?= $seltarif['Angkatan'] ?>|| <?= $seltarif['tipe']; ?></option>
                                    <?php foreach ($qtarif as $row) : ?>
                                        <option value="<?= $row['id']; ?>"><?= $row['Angkatan']; ?> || <?= $row['tipe']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="formbold-mb-3">
                            <div>
                                <label for="Jurusan" class="formbold-form-label"> Jurusan : </label>
                                <input value="<?= $kelas['jurusan'] ?>" placeholder="jurursan" type="text" name="jurusan" id="Jurusan" class="formbold-form-input" autocomplete="off" required />
                            </div>
                        </div>
                        <button name="add" class="formbold-btn">Ubah</button>
                        <hr class="garis">
                        <a class="back" href="../../../admin/kelas.php">
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