<?php
session_start();
if (!isset($_SESSION['admin'])) {
    echo "<script>alert('akses ilegal');window.location='../login.php'</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/dashboardadmin.css">
</head>

<body>
    <div class="area"></div>
    <nav class="main-menu">
        <ul>
            <li>
                <a href="https://jbfarrow.com">
                    <i class="fa fa-home fa-2x"></i>
                    <span class="nav-text">
                        Community Dashboard
                    </span>
                </a>

            </li>
            <li class="has-subnav">
                <a href="#">
                    <i class="fa fa-globe fa-2x"></i>
                    <span class="nav-text">
                        Global Surveyors
                    </span>
                </a>

            </li>
            <li class="has-subnav">
                <a href="#">
                    <i class="fa fa-comments fa-2x"></i>
                    <span class="nav-text">
                        Group Hub Forums
                    </span>
                </a>

            </li>
            <li class="has-subnav">
                <a href="#">
                    <i class="fa fa-camera-retro fa-2x"></i>
                    <span class="nav-text">
                        Survey Photos
                    </span>
                </a>

            </li>
            <li>
                <a href="#">
                    <i class="fa fa-film fa-2x"></i>
                    <span class="nav-text">
                        Surveying Tutorials
                    </span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-book fa-2x"></i>
                    <span class="nav-text">
                        Surveying Jobs
                    </span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-cogs fa-2x"></i>
                    <span class="nav-text">
                        Tools & Resources
                    </span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-map-marker fa-2x"></i>
                    <span class="nav-text">
                        Member Map
                    </span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-info fa-2x"></i>
                    <span class="nav-text">
                        Documentation
                    </span>
                </a>
            </li>
        </ul>

        <ul class="logout">
            <li>
                <a href="../config/php/logout.php">
                    <i class="fa fa-power-off fa-2x"></i>
                    <span class="nav-text">
                        Logout
                    </span>
                </a>
            </li>
        </ul>
    </nav>
</body>

</html>