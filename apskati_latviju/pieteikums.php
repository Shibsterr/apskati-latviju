<?php
require "Assets/header.php";
?>

<section id="sakums" class="virsrksts">
    <?php         
        $name = $_POST['pieteikties'];

        $saraksts="SELECT * FROM celojuma_celojums WHERE Nosaukums = '$name' LIMIT 1"; 
        $sql_query=mysqli_query($savienojums,$saraksts);

        if(mysqli_num_rows($sql_query)>0){
            while($dotieatteli=mysqli_fetch_assoc($sql_query)){
                echo "<div class='celapraksts'>";
                echo "<h1><span>{$_POST['pieteikties']}</span></h1>";
                echo "<p'>{$dotieatteli['Apraksts']}</p>";
                echo "</div>";
                echo "<div class=celattels><img class=celattels margin='2rem' style='border-radius: 30%;' src='{$dotieatteli['Attels_URL']}'></img></div>";
        }
       }else{
        echo "Nav pieejams attēls";
       }
        
    ?>
    </section>

<section id="celojumi" class="pieteikties">
<div class="celosana">
<?php
   
    /*
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        if(isset($_POST['iesniegt'])){
        
            function validateFields($vajadzigi){
                foreach ($vajadzigi as $vajag){
                    if (empty($_POST[$vajag])){
                        return false;
                    
                    }
                }
                return true;
            }
            
            if(validateFields($vajadzigi)){
            $vards_ievade = mysqli_real_escape_string($savienojums, $_POST['vards']);
            $uzvards_ievade = mysqli_real_escape_string($savienojums, $_POST['uzvards']);
            $dzim_dati_ievade = mysqli_real_escape_string($savienojums, $_POST['dzimDati']);
            $talrunis_ievade = mysqli_real_escape_string($savienojums, $_POST['talrunis']);
            $epasts_ievade = mysqli_real_escape_string($savienojums, $_POST['epasts']);
            $adrese_ievade = mysqli_real_escape_string($savienojums, $_POST['adrese']);
            $spec1_ievade = mysqli_real_escape_string($savienojums, $_POST['spec1']);
            $spec2_ievade = mysqli_real_escape_string($savienojums, $_POST['spec2']);
            $izglitiba_ievade = mysqli_real_escape_string($savienojums, $_POST['izglitiba']);
            $vid_vert_ievade = mysqli_real_escape_string($savienojums, $_POST['vidVertejums']);
            $komentars_ievade = mysqli_real_escape_string($savienojums, $_POST['komentars']);

            $pieteiksanas_SQL = "INSERT INTO php2_uznemsana_audzekni (Vards, Uzvards, Dzim_Dati, Talrunis, Epasts, Adrese, Spec1, Spec2, Izglitiba, VidVertejums, Komentars) VALUES ('$vards_ievade', '$uzvards_ievade', '$dzim_dati_ievade', '$talrunis_ievade', '$epasts_ievade', '$adrese_ievade', '$spec1_ievade', '$spec2_ievade', '$izglitiba_ievade', '$vid_vert_ievade', '$komentars_ievade')";

           
            $vajadzigi=['vards','uzvards','dzimDati','talrunis','epasts','adrese','spec1','spec2','izglitiba','vidVertejums'];

           

                $talrunis_sql="SELECT Talrunis FROM php2_uznemsana_audzekni WHERE Talrunis = ".$_POST['talrunis'];
                $TalrunisMax=mysqli_query($savienojums,$talrunis_sql);

                echo mysqli_num_rows($TalrunisMax);

                if(mysqli_num_rows($TalrunisMax)>3){
                    echo "<div class='notif red'>Jusu talrunis jau ir izmantots 3 reizes!</div>";
                    header("Refresh: 2; url=./");
                        exit();
                } 
                


            if(mysqli_query($savienojums, $pieteiksanas_SQL)){
                echo "<div class='notif green'>Pieteikšanās notikusi veiksmīgi! Ar drīzāko tikšanos </div>";
            }else{
                echo "<div class='notif red'>Pieteikšanās kļūda! Mēģiniet vēlreiz</div>";
            }
        }else{
            echo "<div class='notif red'> Visi lauki ir jāizpilda!</div>";
            header("Refresh: 2; url=./");
        }
            header("location: index.php");
            exit;
        }else{

*/
    ?>
<!-- php -->

<form method="post" id="pieci">
<h1>Pieteikšanās</h1>
<div class="inputs">
    <div>
    <div>
    <label for="">Vārds</label><input type="text" name="vards" class="box" required>
    </div>
    <div>
    <label for="">Uzvārds</label><input type="text" name="dzimDati" class="box" required>
    </div>
    <div>
    <label for="">Tālrunis</label><input type="tel" name="talrunis" class="box" required>
    </div>
    <div>
    <label for="">E-pasts</label><input type="email" name="epasts" class="box" required>
    </div>
    </div>
    <div>
    <div>
    <label for="">Personu skaits</label><input type="number" name="skaits" class="box" required min="1" max="30" oninput="validity.valid||(value='');">
    </div>
    <div>
    <label for="meeting-time">Izvēlētais Laiks</label>
    <input type="datetime-local" id="meeting-time" name="meeting-time" class="datumslaiks"/>
</div>

<script>
    function padToTwoDigits(num) {
        return num.toString().padStart(2, '0');
    }

    function setDateTimeInput() {
        const now = new Date();
        
        const currentDate = now.toISOString().split('T')[0];
        const currentTime = '00:00';
        const currentDateTime = `${currentDate}T${currentTime}`;

        const minDateTime = new Date(now.getTime() + 60 * 60 * 1000);
        const minDate = minDateTime.toISOString().split('T')[0];
        const minTime = `${padToTwoDigits(minDateTime.getHours())}:${padToTwoDigits(minDateTime.getMinutes())}`;
        const minDateTimeString = `${minDate}T${minTime}`;

        const maxDateTime = new Date(now.getTime());
        maxDateTime.setMonth(maxDateTime.getMonth() + 1);
        const maxDate = maxDateTime.toISOString().split('T')[0];
        const maxTime = `${padToTwoDigits(maxDateTime.getHours())}:${padToTwoDigits(maxDateTime.getMinutes())}`;
        const maxDateTimeString = `${maxDate}T${maxTime}`;

        const meetingTimeInput = document.getElementById('meeting-time');
        meetingTimeInput.value = currentDateTime;
        meetingTimeInput.min = minDateTimeString;
        meetingTimeInput.max = maxDateTimeString;
    }

    setDateTimeInput();
</script>
    <div>
    <label for="">Komentārs</label><textarea class="kom" type="text" name="koments" class="box komentars"></textarea>
    </div>
        </div>
    
</div>
<button type="submit" name="iesniegt" class="btn" class="iesniegsanasPoga">Pieteikties</button>
</form>



<?php 
/*
        } 
    }else{
    echo "<div class='notif red'>Kļūda!</div>";
    header("Refresh: 3; url= ./");
 }
 */
?>
    </div>
</section>



<?php
require "Assets/footer.php";
?>


<script>
var BGcolors = ["rgb(50,50,50)", "white"];
var BGcolorIndex = localStorage.getItem('BGcolorIndex') !== null ? parseInt(localStorage.getItem('BGcolorIndex')) : 0;

function applyColors(index) {
    var pieci = document.getElementById("pieci");

    if (index === 0) {
        pieci.style.backgroundImage = "linear-gradient(to bottom, var(--main-color) -30%, rgb(50,50,50) 50%, var(--main-color) 130%)";
    } else {
        pieci.style.backgroundImage = "linear-gradient(to bottom, var(--bg) -10%, #fff 50%, var(--bg) 110%)";
    }

    pieci.style.backgroundColor = BGcolors[index];

    
    applyColors(BGcolorIndex);
}

function Krasas() {
    BGcolorIndex = (BGcolorIndex + 1) % BGcolors.length;
    applyColors(BGcolorIndex);
    localStorage.setItem('BGcolorIndex', BGcolorIndex);
}

        </script>
    </body>
    </html>