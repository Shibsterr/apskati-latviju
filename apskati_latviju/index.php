<!-- https://kristovskis.lv/3pt1/kudums/apskati_latviju/ -->
<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apskati Latviju</title>
    <link rel="stylesheet" href="Assets/Style.css">
    <link rel="shortcut icon" href="Images/Latvijalogo.webp" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="Assets/Script.js" defer></script>
</head>
<body>

<header id="header">
        <a href="#" class="logo">Apskati Latviju</a>
        <div id="laba">
        <nav>
            <a href="#">Sākumlapa</a>
            <a href="#celojumi">Piedāvātie ceļojumi</a>
            <a href="#parmums">Par mums</a>
            <!-- <a href="iestatijumi">Iestatījumi</a>
            <a href="admin-panelis">Admin-panelis</a> -->
        </nav>
        <div id="menubar" class="fas fa-bars"></div>


    <body id='body'>
        <label class="switch">
        <input type="checkbox">
        <span class="slider" onclick="Krasas();"></span>
        </label>
    </body>

    <i class="fas fa-sign-in" id="login"></i>
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
    <div class="box-container">
            <?php
            //Motormuzejs- https://www.liveriga.com/lv/apmekle/ko-redzet/muzeji-un-galerijas/tehnikas-muzeji/rigas-motormuzejs
            //Pokaiņu mežš- https://www.mammadaba.lv/galamerki/pokainu-mezs
            //Rundāles pils- Rundāles pils ansamblis ir izcilākais baroka un rokoko arhitektūras un mākslas piemineklis Latvijā. Pils celta kā Kurzemes hercoga Ernsta Johana Bīrona vasaras rezidence pēc arhitekta Frančesko Rastrelli projekta divos periodos - no 1736. līdz 1740. gadam un no 1764. līdz 1768. gadam. Lielākā daļa interjeru ir radīti no 1765. līdz 1768. gadam, kad pilī strādāja tēlnieks Johans Mihaels Grafs un gleznotāji Frančesko Martīni un Karlo Cuki.
            //dzintars- “Lielā dzintara” ēka ierakstījusies Liepājas panorāmā kā varens, daudzšķautņains dārgakmens, kas simbolizē mūzikas radīšanas mirkļa skaistumu un vienreizīgumu. Konstrukcijas īpatnības padara būvi unikālu no arhitektoniskā un inženiertehniskā viedokļa – tajā nav taisnu leņķu. Projektējot ēku, izmantots olas čaumalas princips – tas nozīmē, ka pati būves forma garantē konstrukciju stiprību. Kaut arī olas čaumala ir ļoti plāna, forma nodrošina tās izturību un ļauj pretoties ievērojamam spiedienam. Visā ēkā nav divu vienādu logu, lai gan tās fasādi veido stikla konstrukcijas. Ģeometriskā dažādība apzīmē “Lielajā dzintarā” mītošo mūzikas un mākslas daudzveidību. Celtne saules un dzintara oranžajos toņos dzirkstī dienu un nakti. Gaismas simbols gan tiešā, gan pārnestā nozīmē.
            //purva taka- https://www.latvia.travel/lv/purvi-kurus-verts-apmekletem
    
                require "Assets/db.php";
                $celojumaSQL = "SELECT * FROM celojuma_celojums LIMIT 6";   //filtrs pec like/dislike ratio
                $atlasaPopCelojumus = mysqli_query($savienojums, $celojumaSQL);

                if(mysqli_num_rows($atlasaPopCelojumus) > 0){
                    while($Popcelojums = mysqli_fetch_assoc($atlasaPopCelojumus)){
                        echo "
                        <div class='box'> 
                        <h3>{$Popcelojums['Nosaukums']}</h3>
                            <img src='{$Popcelojums['Attels_URL']}'>
                            <p>{$Popcelojums['Apraksts']}</p>
                            <form method='post' action='pieteikums.php'>
                                <button type='submit' class='btn' name='pieteikties' value='{$Popcelojums['Nosaukums']}'>
                                Pieteikties</button>
                            </form>
                        </div>";
                    }
                }else{
                    echo "Nav neviena ceļojuma!";
                }
            ?>
        </div>
    </section>


    <section id="parmums">
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
    </section>

    <footer> Apskati Latviju &copy; 2024 </footer>
</body>