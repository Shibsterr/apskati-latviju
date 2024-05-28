<?php
    $page = 'logs';
    require "header.php";
    require '../Assets/db.php';
?>



<section class="admin">
    <div class="row">
        <div class="info1 defaultborder">
            <div class="head-info head-color">Izmaiņu vēsture:
            </div>
            <table class="adminTable">
                <tr>
                    <th>ID</th>
                    <th>Vārds</th>
                    <th>Status</th>
                    <th>Izmaiņa</th>
                </tr>
                <?php
                    $jaun_piet_SQL = "SELECT * FROM celojuma_lietotaji";
                    $atlasa_jaun_piet = mysqli_query($savienojums, $jaun_piet_SQL);

                    while($piet = mysqli_fetch_array($atlasa_jaun_piet)){
                        echo "
                        <tr> 
                            <td>{$piet['Lietotaja_ID']}</td>
                            <td>{$piet['Vards']}</td>
                            <td>{$piet['Status']}</td>
                            <td>
                            <div class='vesture'>
                            <p>Šeit tiks vadita vesture</p>
                            </div>
                        </td>
                        </tr>
                        ";
                    }
                ?>
            </table>
        </div>
    </div>


</section>


<?php
require "footer.php";
?>