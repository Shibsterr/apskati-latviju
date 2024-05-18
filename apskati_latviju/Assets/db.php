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

    // Ielogošanas sistēma
    if(isset($_POST['autorizacija'])){
        if (!session_id()) 
        session_start();

        $username = mysqli_real_escape_string($savienojums, $_POST['lietotajvards']);
        $password = mysqli_real_escape_string($savienojums, $_POST['parole']);

        $sql_teikums = "SELECT * FROM celojuma_lietotaji WHERE Vards = '$username' LIMIT 1";
        $result = mysqli_query($savienojums, $sql_teikums);

        if(mysqli_num_rows($result) == 1) {
            while($user = mysqli_fetch_array($result)) {
                if(password_verify($password, $user['Parole'])) {
                    $_SESSION['lietotajvards_GG69'] = $user['Lietotajvards'];
                    header("Refresh: 0");
                } else {
                    // echo "Nepareizs lietotājvārds vai parole!";
                }
            }
        } else {
            // echo "Nepareizs lietotājvārds vai parole!";
        }
    }
?>