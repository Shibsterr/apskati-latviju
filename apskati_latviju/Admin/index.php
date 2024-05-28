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
                <div class="topslice">12</div>
                <div class="bottomslice" aria-hidden="true">12</div>
            </div>
        </span>
            <div class="statistika">
                <h3>Jauni pieteikumi</h3>
                <p>Pēdējo 24h laikā</p>
            </div>
        </div>

        <div class="info-box">
            <span><div class="wrappers">
                <div class="topslice">64</div>
                <div class="bottomslice" aria-hidden="true">64</div>
                </div>
                </span>
            <div class="statistika">
                <h3>Kopējais ceļojuma skaits</h3>
                <p>Kopumā</p>
            </div>
        </div>

        <div class="info-box">
            <span><div class="wrappers">
                <div class="topslice">8</div>
                <div class="bottomslice" aria-hidden="true">8</div>
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
                    <div class="topslice">5</div>
                    <div class="bottomslice" aria-hidden="true">5</div>
                </div>
            </span>
            <div class="statistika">
                <h3>Aktīvie specialitātes</h3>
                <p>Kurām var pieteikties</p>
            </div>
        </div>
</div>
        <div class="chart-container">
            <canvas id="pie"></canvas>
        </div>
        
            <script>
                var xValues = ["Patīk", "Nepatīk"];
                var yValues = [30, 49];     //skaits no datubāzes
                var barColors = [
                "#23a52e",
                "rgb(175, 41, 41)",
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
                    text: "Kopējā ceļojuma attiecība starp lietotāju atsauksmēm"
                    }
                }
                });
            </script>
        
    </div>
</section>




<?php
require "footer.php";
?>