<?php
        session_start();
        require "Assets/db.php";
        if (isset($_POST['autorizacija'])) {
            $_SESSION['lietotajvards_GG69'] = $_POST['lietotajvards'];
        }
?>

<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apskati Latviju</title>
    <link rel="stylesheet" href="Assets/Style.css">
    <link rel="shortcut icon" href="Images/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

<header id="header">
        <a href="./index.php" class="logo"><img src="Images/Logo.png" alt=""></img>Apskati Latviju</a>
        <div id="laba">
        <nav>
            <a href="index.php" class="<?php echo($page == 'sakums' ? 'current' : ''); ?>">Sākumlapa</a>
            <a href="aktualitates.php"class="<?php echo($page == 'aktualitates' ? 'current' : ''); ?>">Aktualitātes</a>
            <a href="jaunumi.php" class="<?php echo($page == 'jaunumi' ? 'current' : ''); ?>">Jaunākie ceļojumi</a>
            <a href="celojumi.php" class="<?php echo($page == 'piedavatie' ? 'current' : ''); ?>">Piedāvātie ceļojumi</a>
            <a href="parmums.php" class="<?php echo($page == 'par' ? 'current' : ''); ?>">Par mums</a>
            <?php
            if(isset($_SESSION['lietotajvards_GG69'])){        
                // echo "<a href='iestatijumi.php'>Iestatījumi</a>";
                echo "<a href='Admin/index.php'>Admin panelis</a>";
            }
            ?>
        </nav>
        <div id="menubar" class="fas fa-bars"></div>


    <body id='body'>
    <label class="switch">
  <input type="checkbox">
  <span class="slider" onclick="Krasas();"></span>
</label>
<?php 
if (!isset($_POST['autorizacija'])) {
    
?>

<button class="open-button" onclick="openForm()"><i class="fas fa-sign-in" id="login"></i></button>

<!-- The form -->
<div class="form-popup" id="myForm">
  <form method="POST" class="form-container" id="loginBG">

  <button type="button" class="cancel" id="Atcelt" onclick="closeForm()"><i class="fas fa-x" id="X"></i></button>

    <h1>Pieslēgties</h1>

    <label for="lietotajvards"><b>Lietotājvārds</b></label>
    <input type="text" placeholder="Ievadiet lietotajvardu" name="lietotajvards" required>

    <label for="parole"><b>Parole</b></label>
    <input type="password" placeholder="Ievadiet paroli" name="parole" required>

    <button type="submit" class="btn" name="autorizacija">Gatavs</button>
  
  </form>
</div>

    <?php
        }
    ?>

    </div>
    <div class="editpop" style="display: none;">
    <form action="POST" class="form-container" id="editBG">
          <input type="hidden" id="objectId">
              <div>
                  <label for="objectName">Name:</label>
                  <input type="text" id="objectName" name="name">
              </div>
              <div>
                  <label for="objectDescription">Description:</label>
                  <textarea id="objectDescription" name="description"></textarea>
              </div>
              <button type="submit">Save</button>
              <button type="button" id="closePopup" onclick="paslept()">Cancel</button>
    </form>
  </div>


</header>