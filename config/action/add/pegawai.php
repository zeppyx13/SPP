<?php
session_start();
require '../../php/backend.php';
if (isset($_POST['add'])) {
    if (AddPegawai($_POST) > 0) {
        echo "<script>
    alert('petugas Ditambahkan')
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
                                <input placeholder="Nomor Induk Pegawai" type="number" name="nip" id="nip" class="formbold-form-input" autocomplete="off" required />
                            </div>
                            <div>
                                <label for="tlp" class="formbold-form-label"> No Telp : </label>
                                <input placeholder="Nomer telphone" type="number" name="tlp" id="tlp" class="formbold-form-input" autocomplete="off" required />
                            </div>
                            <div>
                                <label for="jabatan" class="formbold-form-label"> Jabatan : </label>
                                <select class="formbold-form-input" name="jabatan" id="jabatan">
                                    <option value="bkn">-Pilih Jabatan-</option>
                                    <option value="admin">Admin</option>
                                    <option value="petugas">Petugasn</option>
                                </select>
                            </div>
                        </div>
                        <div class="formbold-mb-3">
                            <div>
                                <label for="Nama" class="formbold-form-label"> Nama : </label>
                                <input placeholder="Nama" type="text" name="nama" id="Nama" class="formbold-form-input" autocomplete="off" required />
                            </div>
                        </div>
                        <div class="formbold-mb-3">
                            <label for="password" class="formbold-form-label">
                                Password :
                            </label>
                            <input placeholder="password" type="password" name="password" id="password" class="formbold-form-input" autocomplete="off" required />
                        </div>
                        <div class="formbold-mb-3">
                            <div>
                                <label for="alamat" class="formbold-form-label"> Alamat : </label>
                                <input placeholder="Alamat" type="text" name="alamat" id="alamat" class="formbold-form-input" autocomplete="off" required />
                            </div>
                        </div>
                        <button name="add" class="formbold-btn">Tambahkan</button>
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