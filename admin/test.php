<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <nav class="navbar">
        <div class="sidebar">
            <div class="logo">
                <img src="../assets/img/ti.png">
            </div>

            <!-- isi sidebar -->
            <div class="isi">
                <ul>
                    <li><a href=""><img src="../assets/emoticon/svg/regular/bx-home-alt.svg" style="width:15px; height:15px; margin-right:5px;"><b>Halaman Utama</b></a></li>
                    <li><a href=""><img src="../assets/emoticon/svg/regular/bx-group.svg" style="width:15px; height:15px; margin-right:5px;"><b>Tabel Siswa</b></a></li>
                    <li><a href=""><img src="../assets/emoticon/svg/regular/bx-buildings.svg" style="width:15px; height:15px; margin-right:5px;"><b>Tabel Petugas</b></a></li>
                    <li><a href=""><img src="../assets/emoticon/svg/regular/bx-table.svg" style="width:15px; height:15px; margin-right:5px;"><b>Tabel SPP</b></a></li>
                    <li><a href=""><img src="../assets/emoticon/svg/solid/bxs-bank.svg" style="width:17px; height:17px; margin-right:5px;"><b>Pembayaran SPP</b></a></li>
                    <li><a href=""><img src="../assets/emoticon/svg/regular/bx-history.svg" style="width:15px; height:15px; margin-right:5px;"><b>History Transaksi</b></a></li>
                    <li><a href=""><img src="../assets/emoticon/svg/solid/bxs-report.svg" style="width:15px; height:15px; margin-right:5px;"><b>Laporan</b></a></li>
                </ul>
            </div>
            <div class="logout">
                <a href="../config/php/logout.php"><img src="../assets/emoticon/svg/regular/bx-log-out.svg" style="width:15px; height:15px; margin-right:5px;"><b>Logout</b></a>
            </div>
        </div>
    </nav>
    <!-- navbar -->
    <div class="nav-profile">

        <div class="hamburger-menu">
            <a href="#" id="hamburger-menu"><img src="../image/menu.png" width="40px" height="40px"></a>
            <div class="out">
                <p><a href="../login/logout.php"><img src="../assets/emoticon/png/bxs-log-out.png" width="40px" height="40px"></a>KELUAR</p>
            </div>
        </div>
        <div class="profile">
            <span style="float:left; margin-top:5px;">
                <p>Nama</p>
            </span>
            <span>
                <a href="#" id="profile-menu">
                    <img style="padding-left:20px; max-width: 50px; max-height: 35px; " src="../assets/img/user.jpg">
                </a>
            </span>
        </div>
    </div>
    <script src="p.js"></script>
    <!-- tutup navbar -->
</body>

</html>