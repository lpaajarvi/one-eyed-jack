<link rel="stylesheet" href="tyyli.css" type="text/css">

<?php
// logout.php
session_start();

if (isset($_SESSION['app1_islogged'])) {
    unset($_SESSION['app1_islogged']);
}

header("Location: http://" . $_SERVER['HTTP_HOST']
                           . dirname($_SERVER['PHP_SELF']) . '/'
                           . "main.php");
?>