<?php
// main-secure.php
session_start();

// Jos käyttäjä ei ole kirjautunut, ohjataan kirjautumissisvulle:
if (!isset($_SESSION['app1_islogged']) || $_SESSION['app1_islogged'] !== true) {
header("Location: http://" . $_SERVER['HTTP_HOST']
                           . dirname($_SERVER['PHP_SELF']) . '/'
                           . "login.php");

exit;
}


if (isset($_POST['talletus'])) {

    

    $money=$_POST['money'];
    $_SESSION['wallet']=$_SESSION['wallet']+$money;

    header("Location: main-secure.php");
    exit();
}

?>
<title>
Pelihalli: Massia tilille

</title>

<link rel="stylesheet" href="tyyli.css" type="text/css">

<?php include('navbar.php');?>

<p>


<form style="background-color: #e6f9ff; padding: 50px;" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
Niin että paljonko laitetaan: (100-10 000) <input type="number" name="money" size="5" min=100 max=10000></input>
<input type="submit" value="talleta" name="talletus">
</form>
</p>


