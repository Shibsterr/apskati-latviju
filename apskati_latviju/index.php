<!-- https://kristovskis.lv/3pt1/kudums/apskati_latviju/ -->
<?php
        require "Assets/db.php";
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
    <script src="Assets/Script.js" defer></script>
</head>
<body>

<header id="header">
        <a href="#" class="logo"><img src="Images/Logo.png" alt=""></img>Apskati Latviju</a>
        <div id="laba">
        <nav>
            <a href="#">Sākumlapa</a>
            <a href="#celojumi">Piedāvātie ceļojumi</a>
            <a href="#parmums">Par mums</a>
            <!-- <?php
            // if($_SESSION['lietotajvards_GG69']){
            //     echo "<a href='iestatijumi'>Iestatījumi</a>";
            //     echo "<a href='admin-panelis'>Admin panelis</a>";
            // }
            ?> -->
        </nav>
        <div id="menubar" class="fas fa-bars"></div>


    <body id='body'>
    <label class="switch">
  <input type="checkbox">
  <span class="slider" onclick="Krasas();"></span>
</label>
</body>



<button class="open-button" onclick="openForm()"><i class="fas fa-sign-in" id="login"></i></button>

<!-- The form -->
<div class="form-popup" id="myForm">
  <form method="POST" class="form-container" id="loginBG">

  <button type="button" class="cancel" id="Atcelt" onclick="closeForm()"><i class="fas fa-x" id="X"></i></button>

    <h1>Reģistrēties</h1>

    <label for="lietotajvards"><b>Lietotājvārds</b></label>
    <input type="text" placeholder="Ievadiet lietotajvardu" name="lietotajvards" required>

    <label for="parole"><b>Parole</b></label>
    <input type="password" placeholder="Ievadiet paroli" name="parole" required>

    <button type="submit" class="btn" name="autorizacija">Pieslēgties</button>

    
  </form>
</div>

    
    </div>
</header>

    <section id="sakums">
        <div class="content">
            <h2>LATVIJAS BRĪNIŠĶĪGĀKIE UN PLAŠĀKIE CEĻOJUMI IR ATRODAMI ŠEIT!</h2>
            <p>Sākot ar šo gadu, jebkuram ceļojumu entuziastam būs pieejams ceļojumu klāsts ar dažādiem atrakciju un jautrību pilniem veidiem, piesakieties pie dotajiem ceļojumiem. <br><b>mēs jūs gaidīsim drīzumā!</b></p>
        </div>
        <div class="image">
            <img src="Images/destination1.jpg" alt="">
        </div>
    </section>


    <section id="celojumi">
        <h3 class="virsraksts">POPULĀRĀKIE!</h3>
    <div class="box-container">
    

    
            <?php
                require "Assets/db.php";
                $celojumaSQL = "SELECT * FROM celojuma_celojums GROUP BY ID ORDER BY Patik DESC LIMIT 6";   //filtrs pec like/dislike ratio
                $atlasaPopCelojumus = mysqli_query($savienojums, $celojumaSQL);


/*https://codepen.io/vilcu/pen/ZQwdGQ*/


                if(mysqli_num_rows($atlasaPopCelojumus) > 0){
                   
                    while($Popcelojums = mysqli_fetch_assoc($atlasaPopCelojumus)){
                        echo "
                        <div class='box'> 
                        <h3>{$Popcelojums['Nosaukums']}</h3>
                            <img src='{$Popcelojums['Attels_URL']}'>
                            <p class='teksts'>{$Popcelojums['Apraksts']}</p>
                            <div class='ratings'>
                            <form method='post' action='pieteikums.php'>
                                <button type='submit' class='btn' name='pieteikties' value='{$Popcelojums['Nosaukums']}'>
                                Pieteikties</button>
                            </form>
                            <div>
                            <p class='patik'>{$Popcelojums['Patik']} <i class='fas fa-thumbs-up'></i></p>
                            <p class='nepatik'>{$Popcelojums['Nepatik']} <i class='fas fa-thumbs-down'></i></p>
                            </div>
                            </div>
                        </div>";
                    }
                }else{
                    echo "Nav neviena ceļojuma!";
                }
            ?>
            
            </div>
    </section>


    <section id="parmums">
        <div class="Par">
            <div class="icon">  
            <h3>Tālrunis <i class="fas fa-phone"></i></h3>
            <p>+371 27 832 221</p>
            <p>+371 28 001 924</p>
            </div>

            <div class="icon">  
            <h3>E-pasts <i class="fas fa-envelope"></i></h3>
            <p>kudumsendijs@gmail.com</p>
            <p>ulfsssiksna@gmail.com</p>
            </div>

            <div class="icon">  
            <h3>Adrese <i class="fas fa-home"></i></h3>
            <p>Latvija, Liepaja, Lauku iela 33</p>
            <p></p>
            </div>
            </div>
            <footer> Apskati Latviju &copy; 2024 </footer>
    </section>

    
</body>