<link rel="stylesheet" href="tyyli.css" type="text/css">
<?php




// Kirjautumattomat pääsevät kirjautumaan
if (!isset($_SESSION['app1_islogged']) || $_SESSION['app1_islogged'] !== true) {
   echo "[Et ole kirjautunut] ";
   echo "[ <a href='login.php'>Kirjaudu</a> ]";
} else { // ja kirjautuneet uloskirjautumaan
   echo "<b>[Kirjautunut:</b> <span style='background: yellow; padding: 2px;'>{$_SESSION['uid']}</span> <b>]</b> ";
   echo " <b>[ Saldo:</b> <span style='background: #c1f0c1; padding: 2px;'>{$_SESSION['wallet']}</span> <b>]</b> ";
   
   /*
   $lomake = <<< lomak

   <form action="{$_SERVER['PHP_SELF']}" method="post">
   
   </form>

   lomak;*/
   
   //echo $lomake;
          
   echo "[<a href='wallet-secure.php'>Talleta</a>] ";
   echo "[<a href='main-secure.php'>Pelihalli</a>] ";
   echo "[<a href='logout.php'>Kirjaudu ulos</a>]";
}

?>
