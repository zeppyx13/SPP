<?php
session_start();
require '../../php/backend.php';
$years = range(2006, strftime("%Y", time()));
if (isset($_POST['add'])) {
    if (AddTarif($_POST) > 0) {
        echo "<script>
      alert('Tarif Ditambahkan')
      document.location.href='../../../admin/tarif.php';
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
    <title>Form input || Tarif</title>
    <link rel="stylesheet" href="../../../style/insert.css">
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <div class="formbold-main-wrapper">
                <div class="formbold-form-wrapper">
                    <form action="" method="POST">
                        <div class="formbold-form-title">
                            <h2 class="judul">Data Tarif</h2>
                        </div>
                        <div class="formbold-input-flex">
                            <div>
                                <label for="Angkatan" class="formbold-form-label">
                                    Angkatan
                                </label>
                                <select required class="formbold-form-input" id="Angkatan" name="Angkatan">
                                    <option value="bkn">-Pilih Angkatan-</option>
                                    <?php foreach ($years as $year) : ?>
                                        <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div>
                                <label for="kelas" class="formbold-form-label">Kelass </label>
                                <select required class="formbold-form-input" name="kelas" id="kelas">
                                    <option value="bkn">-Pilih Tipe-</option>
                                    <option value="bkn">Reguler</option>
                                    <option value="bkn">Laptop</option>
                                </select>
                            </div>
                        </div>
                        <div class="formbold-mb-3">
                            <div>
                                <label for="Nominal" class="formbold-form-label"> Nominal : </label>
                                <input placeholder="Rp. " type="Number" name="Nominal" id="Nominal" class="formbold-form-input" autocomplete="off" required />
                            </div>
                        </div>
                        <button name="add" class="formbold-btn">Tambahkan</button>
                        <hr class="garis">
                        <a class="back" href="../../../admin/tarif.php">
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