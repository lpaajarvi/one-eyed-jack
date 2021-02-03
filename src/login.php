<?php
// login.php
session_start();

$users = array(
    'lauri' => 'laurinsalasana',
    'pekka' => 'pekansalasana',
    'mikko' => 'mikonsalasana'
);



$uid = isset($_POST['uid']) ? strtolower($_POST['uid']) : 'WAS_NOT_GIVEN';
$passwd = isset($_POST['passwd']) ? $_POST['passwd'] : 'WAS_NOT_GIVEN';

$errmsg='';


if ($uid != 'WAS_NOT_GIVEN' && $passwd != 'WAS_NOT_GIVEN') {
    
    //first we go through if there is that kind of username in $users, to prevent error line showing where it tries to find key that doesn't exist
    foreach ($users as $user => $pw) {

        if ($user === $uid) {
            if ($users[$uid] === $passwd) {
                $_SESSION['app1_islogged'] = true;
                $_SESSION['wallet'] = 500;
                $_SESSION['bet'] = 100;
                $_SESSION['uid'] = $_POST['uid']; // Tässä mukavuussyistä, voidaan tulostella yms.
                 header("Location: http://" . $_SERVER['HTTP_HOST']
                                            . dirname($_SERVER['PHP_SELF']) . '/'
                                            . "main-secure.php");

                exit;
            } else {
                
                $errmsg = '<span style="background: yellow;">Tunnus/Salasana väärin!';
            }

        }

    }

    // we could tell here that username was wrong, but iirc it's not good practice for security reasons. (not that it'd matter in hard-coded passwords like these but still)
    $errmsg = '<span style="background: yellow;">Tunnus/Salasana väärin!';

    
}

/*
$errmsg = '';
if (isset($_POST['uid']) AND isset($_POST['passwd'])) {
    // Kovakoodatut tunnus ja salasana
    if ($_POST['uid'] === 'lauri' AND $_POST['passwd'] === 'laurinsala') {
        // Kirjautuminen ok, merkintä sessiotauluun
        $_SESSION['app1_islogged'] = true;
        $_SESSION['uid'] = $_POST['uid']; // Tässä mukavuussyistä, voidaan tulostella yms.
         header("Location: http://" . $_SERVER['HTTP_HOST']
                                    . dirname($_SERVER['PHP_SELF']) . '/'
                                    . "main-secure.php");
        exit;
    } else {
        $errmsg = '<span style="background: yellow;">Tunnus/Salasana väärin!';
    }
}*/


?>

<title>Kirjautusmislomake</title>
<link rel="stylesheet" href="tyyli.css" type="text/css">

<?php
if ($errmsg != '') echo $errmsg;
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"
style=color:#000;background-color:#eee>
Tunnus:<br><input type="text" name="uid" size="30"><br>
Salasana:<br><input type="password" name="passwd" size="30"><br>
<input type='submit' name='action' value='Kirjaudu'>
<br>
</form>