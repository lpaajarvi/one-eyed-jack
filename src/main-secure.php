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




if (isset($_POST['play_round'])) {
    $_SESSION['bet']=$_POST['bet_select'];
    $_SESSION['wallet']=$_SESSION['wallet']-$_SESSION['bet'];

    


    
    //arvotaan
    for ($i = 0; $i < 3; $i++) {
        $taulu[$i]=rand(0,3);

    }

    //voitto
    if (($taulu[0] == $taulu[1]) && ($taulu[1] == $taulu[2])) {
        $voittosumma=$_SESSION['bet']*7;
        $_SESSION['wallet']=$_SESSION['wallet']+$voittosumma;
        $selitys='VOITTO! Panoksesi oli '.$_SESSION["bet"].', joten voitit '.$voittosumma.'!';
    } else {
        $selitys='Hävisit panoksesi '.$_SESSION["bet"].'.';
    }

    //laitetaan oikea kuva tulostusvalmiiksi
    for ($i = 0; $i < 3; $i++) {
        $cards[$i]='<img src="00'.$taulu[$i].'.jpg" />';
    }
    
// jos ei ole vielä pelattu yhtään peliä niin laitetaan silti jotkut kortit näkymiin
} else {
    for ($i = 0; $i < 3; $i++) {
        $cards[$i]='<img src="000.jpg" />';
    }
    $selitys="Rohkeasti vaan pelaamaan!";
}

?>
<title>Pelihalli: Yksikätinen Rosvo</title>

<link rel="stylesheet" href="tyyli.css" type="text/css">


<?php include('navbar.php');?>


<p>

<div id="pelialue" style="background-color: #fff5e6; padding:30px;" >
    <table><tr><td id="slot1"> <?php echo ($cards[0]); ?>
</td>
    <td id="slot2"> <?php echo $cards[1]; ?>
</td>
<td id="slot3"> <?php echo $cards[2]; ?>
</td></tr>
</table>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"
>





<br>

<label for="bet_select">Panos: </label><br>
    <select name="bet_select" size="5">
    <option <?php if ($_SESSION['bet'] == 100 ) echo 'selected' ; ?> value="100">100</option>
    <option <?php if ($_SESSION['bet'] == 200 ) echo 'selected' ; ?> value="200">200</option>
    <option <?php if ($_SESSION['bet'] == 300 ) echo 'selected' ; ?> value="300">300</option>
    <option <?php if ($_SESSION['bet'] == 400 ) echo 'selected' ; ?> value="400">400</option>
    <option <?php if ($_SESSION['bet'] == 500 ) echo 'selected' ; ?> value="500">500</option>

    </select>
<br>

<input type='submit' name='play_round' value='Pelaa kierros'>

</form>

<br>
<text> <?php echo $selitys; ?></text>

</div>