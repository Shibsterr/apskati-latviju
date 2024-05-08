<?php
    $serveris = "localhost";
    $lietotajvards = "grobina1_kudums";
    $parole = "HTUU!mbSt";
    $db_nosaukums = "grobina1_kudums";

    $savienojums = mysqli_connect($serveris,$lietotajvards,$parole,$db_nosaukums);

    // if(!$savienojums){
    //     die("Pieslēgties datu bāzej neizdevās! ".mysqli_connect_error());
    // }else{
    //     echo "Savienojums veiksmīgi izveidots";
    // }


?>