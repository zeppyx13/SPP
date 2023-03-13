<?php
session_start();
require '../../php/backend.php';
$years = range(2006, date('Y') + 17);
$id = $_GET['id'];
$tarif = query("SELECT * FROM tarif WHERE id=$id")[0];
if (isset($_POST['add'])) {
    if (EditTarif($_POST) > 0) {
        echo "<script>
    alert('Tarif Diubah')
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
    <title>Form update || Tarif</title>
    <link rel="stylesheet" href="../../../style/insert.css">
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <div class="formbold-main-wrapper">
                <div class="formbold-form-wrapper">
                    <form action="" method="POST">
                        <input type="text" hidden name="id" value="<?= $tarif['id']; ?>">
                        <div class="formbold-form-title">
                            <h2 class="judul">Data Tarif</h2>
                        </div>
                        <div class="formbold-input-flex">
                            <div>
                                <label for="Angkatan" class="formbold-form-label">
                                    Angkatan :
                                </label>
                                <select required class="formbold-form-input" id="Angkatan" name="Angkatan">
                                    <option value="bkn">-Pilih Angkatan-</option>
                                    <option value="<?= $tarif['Angkatan']; ?>" selected><?= $tarif['Angkatan']; ?></option>
                                    <?php foreach ($years as $year) : ?>
                                        <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div>
                                <label for="kelas" class="formbold-form-label">Tipe :</label>
                                <?php
                                if ($tarif['tipe'] == 'Reguler') {
                                ?>
                                    <select required class="formbold-form-input" name="kelas" id="kelas">
                                        <option value="bkn">-Pilih Tipe-</option>
                                        <option selected value="Reguler">Reguler</option>
                                        <option value="Laptop">Laptop</option>
                                    </select>
                                <?php } elseif ($tarif['tipe'] == 'Laptop') { ?>
                                    <select required class="formbold-form-input" name="kelas" id="kelas">
                                        <option value="bkn">-Pilih Tipe-</option>
                                        <option value="Reguler">Reguler</option>
                                        <option selected value="Laptop">Laptop</option>
                                    </select>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="formbold-mb-3">
                            <div>
                                <label for="Nominal" class="formbold-form-label"> Nominal : </label>
                                <input value="<?= $tarif['Nominal']; ?>" placeholder="Rp. " type="Number" name="Nominal" id="Nominal" class="formbold-form-input" autocomplete="off" required />
                            </div>
                        </div>
                        <button name="add" class="formbold-btn">Ubah</button>
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