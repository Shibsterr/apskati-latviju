<?php
    session_start();
    if(!isset($_SESSION['lietotajvards_GG69'])){
        header("location:../index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="lv">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apskati Latviju</title>
    <link rel="stylesheet" href="../Assets/Style.css">
    <link rel="shortcut icon" href="../Images/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="../Assets/Script.js" defer></script>
</head>
<body>

<header id="header">
        <a href="#" class="logo"><img src="../Images/Logo.png" alt=""></img>Apskati Latviju</a>
        <div id="laba">
            <nav>
                <a href="./" class="<?php echo($page == 'sakums' ? 'current' : ''); ?>"><i class="fas fa-home"></i> Sākumlapa</a>
                <a href="logs.php" class="<?php echo($page == 'logs' ? 'current' : ''); ?>"><i class="fas fa-tasks"></i> Vēsture</a>
                <a href="pievienot.php" class="<?php echo($page == 'pievienot' ? 'current' : ''); ?>"><i class="fas fa-plus"></i> Pievienot administrātorus</a>
                <a href="../" target="_blank"><i class="fas fa-sign-out-alt"></i> Uz galveno vietni</a>
            </nav>
        </div>
    <nav>
        <a href="logout.php"><b><?php echo $_SESSION['lietotajvards_GG69'];?> <i class="fas fa-power-off"></i></a>
    </nav>

    </header>