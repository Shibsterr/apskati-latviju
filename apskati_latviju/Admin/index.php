<?php
    $page = 'sakums';
    require "header.php";
    require '../Assets/db.php';
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<section id="stati">
<div class="kopsavilkums">
    <?php
        require "stats.php";  
    ?>
        <!-- jauna datubāze ar pieteikuma datiem (cikos un kad bija pieteiceis)-->
        <div>
        <div class="info-box">      
            <span><div class="wrappers">
                <div class="topslice"><?php echo $jauniPieteikumi;?></div>
                <div class="bottomslice" aria-hidden="true"><?php echo $jauniPieteikumi;?></div>
            </div>
        </span>
            <div class="statistika">
                <h3>Jauni pieteikumi</h3>
                <p>Pēdējo 24h laikā</p>
            </div>
        </div>

        <div class="info-box">
            <span><div class="wrappers">
                <div class="topslice"><?php echo $celojumaSkaits;?></div>
                <div class="bottomslice" aria-hidden="true"><?php echo $celojumaSkaits;?></div>
                </div>
                </span>
            <div class="statistika">
                <h3>Kopējais ceļojuma skaits</h3>
                <p>Kopumā</p>
            </div>
        </div>

        <div class="info-box">
            <span><div class="wrappers">
                <div class="topslice"><?php echo $pieteikumiKopa;?></div>
                <div class="bottomslice" aria-hidden="true"><?php echo $pieteikumiKopa;?></div>
            </div>
        </span>
            <div class="statistika">
                <h3>Pieteikummi kopā</h3>
                <p>Kopš uzņēmšanas sākuma</p>
            </div>
        </div>

        <div class="info-box">
            <span>
                <div class="wrappers">
                    <div class="topslice"><?php echo $darbiniekaSkaits;?></div>
                    <div class="bottomslice" aria-hidden="true"><?php echo $darbiniekaSkaits;?></div>
                </div>
            </span>
            <div class="statistika">
                <h3>Darbinieku skaits</h3>
                <p>Kur ir reģistrēti</p>
            </div>
        </div>
</div>
        <div class="chart-container">
            <canvas id="pie"></canvas>
        </div>
            <?php
                $piep_spec_SQL = "SELECT Patik, Nepatik FROM celojuma_celojums";
                $atlasa_piep_spec = mysqli_query($savienojums, $piep_spec_SQL);
                $likes = 0;
                $dislikes = 0;
                while ($spec = mysqli_fetch_array($atlasa_piep_spec)) {
                    $likes += $spec['Patik'];
                    $dislikes += $spec['Nepatik'];
                }
                $ratio = round(($likes / ($likes + $dislikes)) * 100, 2);
                $data = array(
                    'labels' => array('Likes', 'Dislikes'),
                    'values' => array($likes, $dislikes)
                );
                $json_data = json_encode($data);
                echo "<script>var data = JSON.parse('{$json_data}');</script>";
            ?>
        <script>
            var xValues = data.labels;
            var yValues = data.values;
            var barColors = [
                "#23a52e",
                "rgb(175, 41, 41)"
            ];
            new Chart("pie", {
                type: "pie",
                data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: "Like/Dislike Ratio: <?php echo $ratio; ?>%"
                    }
                }
            });
        </script>
        
    </div>
</section>




<?php
require "footer.php";
?>