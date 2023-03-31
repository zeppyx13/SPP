<?php
session_start();
require '../../php/backend.php';
$NIP = $_GET['id'];
$petugas = query("SELECT * FROM petugas WHERE NIP = '$NIP'")[0];
if (isset($_POST['add'])) {
    if (EditPetugas($_POST) > 0) {
        echo "<script>
    alert('petugas Diubah')
    document.location.href='../../../admin/pegawai.php';
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
    <title>Form input || pegawai</title>
    <link rel="stylesheet" href="../../../style/insert.css">
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <div class="formbold-main-wrapper">
                <div class="formbold-form-wrapper">
                    <form action="" method="POST">
                        <div class="formbold-form-title">
                            <h2 class="judul">Data Pegawai</h2>
                        </div>
                        <div class="formbold-input-flex">
                            <div>
                                <label for="nip" class="formbold-form-label">
                                    NIP
                                </label>
                                <input value="<?= $petugas['NIP'] ?>" readonly placeholder="Nomor Induk Pegawai" type="number" name="nip" id="nip" class="formbold-form-input" autocomplete="off" required />
                            </div>
                            <div>
                                <label for="tlp" class="formbold-form-label"> No Telp : </label>
                                <input value="<?= $petugas['tlp'] ?>" placeholder="Nomer telphone" type="number" name="tlp" id="tlp" class="formbold-form-input" autocomplete="off" required />
                            </div>
                        </div>
                        <div class="formbold-input-flex">
                            <div class="formbold-mb-3">
                                <label for="password" class="formbold-form-label">
                                    Password :
                                </label>
                                <input value="<?= $petugas['Password'] ?>" placeholder="password" type="text" name="password" id="password" class="formbold-form-input" autocomplete="off" required />
                            </div>
                            <div>
                                <label for="jabatan" class="formbold-form-label"> Jabatan : </label>
                                <select class="formbold-form-input" name="jabatan" id="jabatan">
                                    <<?php if ($petugas['Jabatan'] == "admin") { ?> <option selected value="admin">Admin</option>
                                        <option value='petugas'>Petugas</option>
                                    <?php } else { ?>
                                        <option value="admin">Admin</option>
                                        <option selected value='petugas'>Petugas</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="formbold-mb-3">
                            <div>
                                <label for="Nama" class="formbold-form-label"> Nama : </label>
                                <input value="<?= $petugas['Nama_Petugas'] ?>" placeholder="Nama" type="text" name="nama" id="Nama" class="formbold-form-input" autocomplete="off" required />
                            </div>
                        </div>
                        <div class="formbold-mb-3">
                            <div>
                                <label for="alamat" class="formbold-form-label"> Alamat : </label>
                                <input value="<?= $petugas['Alamat'] ?>" placeholder="Alamat" type="text" name="alamat" id="alamat" class="formbold-form-input" autocomplete="off" required />
                            </div>
                        </div>
                        <button name="add" class="formbold-btn">Ubah</button>
                        <hr class="garis">
                        <a class="back" href="<?php
                                                if ($_SESSION['admin']) {
                                                    echo '../../../admin/pegawai.php';
                                                } elseif ($_SESSION['petugas']) {
                                                    echo '../../../petugas/pegawai.php';
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