<!-- https://kristovskis.lv/3pt1/kudums/apskati_latviju/ -->
<?php
$page = 'sakums';
require "Assets/header.php";
?>



    <section id="sakums" class="insakums">
        <div class="content">
            <h2>LATVIJAS BRĪNIŠĶĪGĀKIE UN PLAŠĀKIE CEĻOJUMI IR ATRODAMI ŠEIT!</h2>
            <p>Sākot ar šo gadu, jebkuram ceļojumu entuziastam būs pieejams ceļojumu klāsts ar dažādiem atrakciju un jautrību pilniem veidiem, piesakieties pie dotajiem ceļojumiem. <br><b>mēs jūs gaidīsim drīzumā!</b></p>
        </div>
        <div class="image">
            <img src="Images/destination1.jpg" alt="">
        </div>
    </section>

<!-- ----------------------------------------- POPULĀRĀKIE CEĻOJUMI ----------------------------------------- -->
    <section id="celojumi">
        <h3 class="virsraksts">POPULĀRĀKIE!</h3>

        <?php
        if(isset($_SESSION['lietotajvards_GG69'])){        
                                echo "<button type='button' class='adding' id='pievienosana'><i class='fas fa-plus'><p> Pievienot ceļojumu</p></i></button>";
                            }
?>
    <div class="box-container">

            <?php
                require "Assets/db.php";
                $celojumaSQL = "SELECT * FROM celojuma_celojums WHERE Dzēsts != 1 GROUP BY ID ORDER BY Patik DESC LIMIT 3";   //filtrs pec like/dislike ratio
                $atlasaPopCelojumus = mysqli_query($savienojums, $celojumaSQL);


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
                                <p class='patik' data-id='{$Popcelojums['ID']}'>{$Popcelojums['Patik']} <i class='fas fa-thumbs-up like-btn'></i></p>
                                <p class='nepatik' data-id='{$Popcelojums['ID']}'>{$Popcelojums['Nepatik']} <i class='fas fa-thumbs-down dislike-btn'></i></p>
                            </div>
                            </div><div>";
                            if(isset($_SESSION['lietotajvards_GG69'])){        
                                echo "<button type='button' class='edit' id='editosana' onclick='rediget({$Popcelojums['ID']})'><i class='fas fa-edit'></i></button>";
                                echo "<button type='button' class='delete' id='deletosana' onclick='dzest({$Popcelojums['ID']})'><i class='fas fa-trash'></i></button>";
                            }
                        echo "</div></div>";
                    }
                }else{
                    echo "Nav neviena ceļojuma!";
                }

                
            ?>
            
            </div>

<!-- ----------------------------------------- VISI CEĻOJUMI ----------------------------------------- -->
<h3 class="virsraksts">VISI CEĻOJUMI!</h3>


<div class="sar">
    <label for="saraksts"><i class="fa-solid fa-filter" style="text-align: center;"></i></label>
<select name="filtrs" id="filtrs">
    <option value="Jaunakie" default>Jaunākie</option>
    <option value="Patik">Patīk</option>
    <option value="Nepatik">Nepatīk</option>
    <option value="Apskates">Apskates vietas</option>
    <option value="Atrakcijas">Atrakcijas</option>
    <option value="Atputas">Atpūtas</option>
    <option value="Naug">A-Z</option>
    <option value="Ndils">Z-A</option>
</select>

</div>


<div class="SLIDI">
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <div class="visi">
        <?php
        $i=0;
        $celojumaSQL = "SELECT * FROM celojuma_celojums WHERE Dzēsts != 1 GROUP BY ID DESC";
        $atlasaVisusCelojumus = mysqli_query($savienojums, $celojumaSQL);
        if(mysqli_num_rows($atlasaVisusCelojumus) > 0){
            while($celojums = mysqli_fetch_assoc($atlasaVisusCelojumus)){
               
                $i++;
              
                    echo "
                    <div class='box2 slide'>
                <h3>{$celojums['Nosaukums']}</h3>
                    <img src='{$celojums['Attels_URL']}'>
                        <p class=teksts>{$celojums['Apraksts']}</p>
                        <div class='ratings'>
                        <form method='post' action='pieteikums.php'>
                            <button type='submit' class='btn' name='pieteikties' value='{$celojums['Nosaukums']}'>
                            Pieteikties</button>
                        </form>
                        <div>
                        <p class='patik' onclick='patik()'>{$celojums['Patik']} <i class='fas fa-thumbs-up'></i></p>
                        <p class='nepatik' onclick='nepatik()'>{$celojums['Nepatik']} <i class='fas fa-thumbs-down'></i></p>
                        </div>
                        </div>
                        <div class='papildus'>";
                        
                        if(isset($_SESSION['lietotajvards_GG69'])){        
                            echo "<button type='button' class='edit' id='editosana' onclick='rediget({$Popcelojums['ID']})'><i class='fas fa-edit'></i></button>";
                        }
                            echo " <p class='lpp'><b>$i</b></p>";
                        if(isset($_SESSION['lietotajvards_GG69'])){    
                            echo "<button type='button' class='delete' id='deletosana' onclick='dzest({$Popcelojums['ID']})'><i class='fas fa-trash'></i></button>";
                        }
                    echo "</div></div>";


  
            }
            
        } else {
            echo "Nav neviena ceļojuma!";
        }
        ?>
    </div>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <div class='ppg'>
        <?php echo "<p class='sk'>1...$i</p>";?>
    </div>
    </section>
<!----------------------------------------------PAR MUMS----------------------------------------------->
<?php
require "Assets/footer.php";
?>

</body>