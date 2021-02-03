<title>Yksikatinen rosvo</title>




<?php




for ($i = 0; $i < 3; $i++) {
    $taulu[$i]=rand(0,4);
 }

 for ($i = 0; $i < 3; $i++) {
     /*
     There's probably some way this loop could be done in a single line instead of 4, but this should suffice for now
     */

     
    if ($taulu[$i]==0) echo '<img src="001.jpg">';
    else if ($taulu[$i]==1) echo '<img src="002.jpg">';
    else if ($taulu[$i]==2) echo '<img src="003.jpg">';
    else echo '<img src="004.jpg">';
    
    
    /*

    for ($i = 0; $i < 3; $i++) {

    }
    */
 }



?>