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

<form method="post">
<h1>Pieteikšanās</h1>
<div class="inputs">
    <label for="">Vārds</label><input type="text" name="vards" class="box" required>
    <label for="">Uzvārds</label><input type="text" name="dzimDati" class="box" required>
    <label for="">Tālrunis</label><input type="tel" name="talrunis" class="box" required>
    <label for="">Personu skaits</label><input type="number" name="skaits" class="box" required>
    <label for="">E-pasts</label><input type="email" name="epasts" class="box" required>
    <label for="">Izvēlētais Laiks</label>
<select name="Laiks" class="laiks">
    <?php echo  "<option value=''>Diena: Laiks:</option>" ?>
</select>

    <!-- <select name="spec2" class="box" required> -->


    <?php /* $saraksts="SELECT Nosaukums FROM php2_uznemsana";

        $sql_query=mysqli_query($savienojums,$saraksts);

        if(mysqli_num_rows($sql_query)>0){
            while($specialasNodalas=mysqli_fetch_assoc($sql_query)){

                if ($_POST['pieteikties']!==$specialasNodalas['Nosaukums']) {
                echo "<option>{$specialasNodalas['Nosaukums']}</option>";
                }
        }
       }else{
        echo "Nav pieejamas specialitātes";
       }
       
       */
    ?>
    <!-- </select> -->
    <button type="submit" name="iesniegt" class="btn">Pieteikties</button>
</div>
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
    </body>
    </html>