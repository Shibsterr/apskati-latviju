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
        session_start();

        $username = mysqli_real_escape_string($savienojums, $_POST['lietotajvards']);
        $password = mysqli_real_escape_string($savienojums, $_POST['parole']);

        $sql_teikums = "SELECT * FROM celojuma_lietotaji WHERE Vards = '$username'";
        $result = mysqli_query($savienojums, $sql_teikums);

        if(mysqli_num_rows($result) == 1) {

            while($user = mysqli_fetch_array($result)) {

                if(password_verify($password, $user['Parole'])) {

                    $_SESSION['lietotajvards_GG69'] = $user['Lietotajvards'];
                    header("Location: Admin/index.php");

                } else {
                    echo "Nepareizs lietotājvārds vai parole! parole";
                }
            }
        } else {
            echo "Nepareizs lietotājvārds vai parole! vispar";
        }
    }


if(isset($_POST['choice']) && isset($_POST['postId'])){
    $postId = $_POST['postId'];
    $choice = $_POST['choice'];
    
    // Check if the user has already liked/disliked this post
    if (isset($_SESSION['liked_posts'][$postId])) {
        // If the user has already liked/disliked this post, update the cache
        if ($choice === 'like') {
            $_SESSION['liked_posts'][$postId] = 'like';
        } elseif ($choice === 'dislike') {
            $_SESSION['liked_posts'][$postId] = 'dislike';
        }
    } else {
        // If the user has not liked/disliked this post before, add it to the cache
        $_SESSION['liked_posts'][$postId] = $choice;
    }
    
    // Update the database
    if ($choice === 'like') {
        $savienojums->query("UPDATE celojuma_celojums SET Patik = Patik + 1 WHERE ID = $postId");
    } elseif ($choice === 'dislike') {
        $savienojums->query("UPDATE celojuma_celojums SET Nepatik = Nepatik + 1 WHERE ID = $postId");
    }
    
    $result = $savienojums->query("SELECT Patik, Nepatik FROM celojuma_celojums WHERE ID = $postId");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $likes = $row['Patik'];
        $dislikes = $row['Nepatik'];
        echo "$likes;$dislikes";
    } else {
        echo "Error: Post not found";
    }
    
    $savienojums->close();
}

    //datu dzēšana
    if(isset($_POST['delete'])){
        $id = $_POST["delete"];
        $sql_teikums = "DELETE FROM celojuma_lietotaji WHERE Lietotaja_ID = $id";
       
        mysqli_query($savienojums,$sql_teikums);   
        
        echo "<div class='notifs'>Lietotājs veiskmīgi izdzēst!</div>";
        header("Location: ../Admin/index.php");
        exit();
    }


?>