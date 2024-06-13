<?php
    $page = 'piedavatie';
require "Assets/header.php";
?>

<section id="sakums" class="insakums">
        <div class="content">
            <h2>LATVIJAS BRĪNIŠĶĪGĀKIE UN PLAŠĀKIE CEĻOJUMI IR ATRODAMI ŠEIT!</h2>
            <p>Sākot ar šo gadu, jebkuram ceļojumu entuziastam būs pieejams ceļojumu klāsts ar dažādiem atrakciju un jautrību pilniem veidiem, piesakieties pie dotajiem ceļojumiem. <br><b>mēs jūs gaidīsim drīzumā!</b></p>
        </div>
        <div class="image">
            <img src="Images/VISI.jpg" alt="">
        </div>
    </section>



<section id="celojumi">
        <h3 class="virsraksts">PIEDĀVĀTIE CEĻOJUMI!</h3>

        <?php
        if(isset($_SESSION['lietotajvards_GG69'])){        
            echo "<button type='button' class='adding' id='pievienosana'><i class='fas fa-plus'><p> Pievienot ceļojumu</p></i></button>";
        }
?>

<div class="sar">
    <label for="filtrs"><i class="fa-solid fa-filter" style="text-align: center;"></i></label>
    <select name="filtrs" id="filtrs">
        <option value="Jaunakie">Jaunākie</option>
        <option value="Patik">Patīk</option>
        <option value="Nepatik">Nepatīk</option>
        <option value="Apskates">Apskates vietas</option>
        <option value="Atrakcijas">Atrakcijas</option>
        <option value="Atputas">Atpūtas</option>
        <option value="Naug">A-Z</option>
        <option value="Ndils">Z-A</option>
    </select>
</div>

<div class="box-container" id="filteredResults">
    <?php
    require "Assets/db.php";

    // Default SQL query without filtering
    $celojumaSQL = "SELECT * FROM celojuma_celojums WHERE Dzēsts != 1 ORDER BY ID ASC";

    $atlasaPopCelojumus = mysqli_query($savienojums, $celojumaSQL);

    if (mysqli_num_rows($atlasaPopCelojumus) > 0) {
        while ($Popcelojums = mysqli_fetch_assoc($atlasaPopCelojumus)) {
            echo "
            <div class='box'>
                <h3>{$Popcelojums['Nosaukums']}</h3>
                <img src='{$Popcelojums['Attels_URL']}'>
                <p class='teksts'>{$Popcelojums['Apraksts']}</p>
                <div class='ratings'>
                    <form method='post' action='pieteikums.php'>
                        <button type='submit' class='btn' name='pieteikties' value='{$Popcelojums['Nosaukums']}'>
                            Pieteikties
                        </button>
                    </form>
                    <div>
                        <p class='patik' data-id='{$Popcelojums['ID']}'><span class='count'>{$Popcelojums['Patik']}</span> <i class='fas fa-thumbs-up like-btn'></i></p>
                        <p class='nepatik' data-id='{$Popcelojums['ID']}'><span class='count'>{$Popcelojums['Nepatik']}</span> <i class='fas fa-thumbs-down dislike-btn'></i></p>
                    </div>
                </div>
                <div>";
            if (isset($_SESSION['lietotajvards_GG69'])) {
                echo "<button type='button' class='edit' id='editosana' onclick='rediget({$Popcelojums['ID']})'><i class='fas fa-edit'></i></button>";
                echo "<button type='button' class='delete' id='deletosana' onclick='dzest({$Popcelojums['ID']})'><i class='fas fa-trash'></i></button>";
            }
            echo "</div>
            </div>";
        }
    } else {
        echo "Nav neviena ceļojuma!";
    }
    ?>
</div>


</section>
<?php
require "Assets/footer.php";
?>

</body>