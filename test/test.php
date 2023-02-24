<?php
session_start();
if (!isset($_SESSION['admin'])) {
    echo "<script>alert('akses ilegal');window.location='../login.php'</script>";
    exit;
}
$nama = $_SESSION['nama'];
$query = ""
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../style/dashboardadmin.css">
    <title>Document</title>
</head>

<body>
    <nav class="navbar">
        <div class="sidebar">
            <div class="logo">
                <img src="../assets/img/ti.png">
            </div>
            <div class="isi">
                <ul>
                    <li>
                        <a href="">
                            <img src="../assets/emoticon/svg/regular/bx-home-alt.svg" style="width:15px; height:15px; margin-right:5px;">
                            <b>Home</b>
                        </a>
                    </li>
                    <li>
                        <a href=""><img src="../assets/emoticon/svg/regular/bx-group.svg" style="width:15px; height:15px; margin-right:5px;">
                            <b>Tabel Siswa</b>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="../assets/emoticon/svg/regular/bx-buildings.svg" style="width:15px; height:15px; margin-right:5px;">
                            <b>Tabel Petugas</b>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="../assets/emoticon/svg/regular/bx-table.svg" style="width:15px; height:15px; margin-right:5px;">
                            <b>Tabel SPP</b>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="../assets/emoticon/svg/solid/bxs-bank.svg" style="width:17px; height:17px; margin-right:5px;">
                            <b>Pembayaran SPP</b>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="../assets/emoticon/svg/regular/bx-history.svg" style="width:15px; height:15px; margin-right:5px;">
                            <b>History Transaksi</b>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="../assets/emoticon/svg/solid/bxs-report.svg" style="width:15px; height:15px; margin-right:5px;">
                            <b>Laporan</b>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="logout">
                <a href="../config/php/logout.php"><img src="../assets/emoticon/svg/regular/bx-log-out.svg" style="width:15px; height:15px; margin-right:5px;"><b>Logout</b></a>
            </div>
        </div>
    </nav>
    <div class="nav-profile">
        <ul>
            <li>

            </li>
            <li>
                <div class="profile">
                    <span style="float:left; margin-top:5px;">
                        <p>Hai,<b> <?= $nama ?></b></p>
                    </span>
                    <span>
                        <a href="#" id="profile-menu">
                            <img style="padding-left:20px; max-width: 50px; max-height: px; " class="prof" src="../assets/img/user.jpg">
                        </a>
                    </span>
                </div>
            </li>
        </ul>
    </div>

    <div class="table">
        <h2>Data Siswa</h2>
        <div class="table-wrapper">
            <table class="fl-table">
                <thead>
                    <tr>
                        <th>Header 1</th>
                        <th>Header 2</th>
                        <th>Header 3</th>
                        <th>Header 4</th>
                        <th>Header 5</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Content 1</td>
                        <td>Content 1</td>
                        <td>Content 1</td>
                        <td>Content 1</td>
                        <td>Content 1</td>
                    </tr>
                    <tr>
                        <td>Content 2</td>
                        <td>Content 2</td>
                        <td>Content 2</td>
                        <td>Content 2</td>
                        <td>Content 2</td>
                    </tr>
                    <tr>
                        <td>Content 3</td>
                        <td>Content 3</td>
                        <td>Content 3</td>
                        <td>Content 3</td>
                        <td>Content 3</td>
                    </tr>
                    <tr>
                        <td>Content 4</td>
                        <td>Content 4</td>
                        <td>Content 4</td>
                        <td>Content 4</td>
                        <td>Content 4</td>
                    </tr>
                    <tr>
                        <td>Content 5</td>
                        <td>Content 5</td>
                        <td>Content 5</td>
                        <td>Content 5</td>
                        <td>Content 5</td>
                    </tr>
                    <tr>
                        <td>Content 6</td>
                        <td>Content 6</td>
                        <td>Content 6</td>
                        <td>Content 6</td>
                        <td>Content 6</td>
                    </tr>
                    <tr>
                        <td>Content 7</td>
                        <td>Content 7</td>
                        <td>Content 7</td>
                        <td>Content 7</td>
                        <td>Content 7</td>
                    </tr>
                    <tr>
                        <td>Content 8</td>
                        <td>Content 8</td>
                        <td>Content 8</td>
                        <td>Content 8</td>
                        <td>Content 8</td>
                    </tr>
                    <tr>
                        <td>Content 9</td>
                        <td>Content 9</td>
                        <td>Content 9</td>
                        <td>Content 9</td>
                        <td>Content 9</td>
                    </tr>
                    <tr>
                        <td>Content 10</td>
                        <td>Content 10</td>
                        <td>Content 10</td>
                        <td>Content 10</td>
                        <td>Content 10</td>
                    </tr>
                <tbody>
            </table>
        </div>
    </div>

    <script src="p.js"></script>
</body>

</html>