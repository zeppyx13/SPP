<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();
setcookie('Name', '', time() - 9999999);
setcookie('key', '', time() - 9999999);
header("Location:../../login.php");
exit;
