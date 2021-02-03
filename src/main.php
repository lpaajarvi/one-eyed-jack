<?php
// main.php
session_start();

if (isset($_SESSION['app1_islogged'])) {
    if ($_SESSION['app1_islogged'] == true) {
        header("Location: main-secure.php");
        exit();
    }
}
 


?>
<title>Sovelluksen pääsivu</title>

<link rel="stylesheet" href="tyyli.css" type="text/css">


<?php include('navbar.php');?>


<p>Kirjaudu sisään pelataksesi pelihallissa Yksikätistä rosvoa</p>