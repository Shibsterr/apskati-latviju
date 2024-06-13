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
                    <th>Apraksts</th>
                    <th>Datums</th>
                </tr>
                <?php
                    $jaun_piet_SQL = "SELECT * FROM celojuma_vesture";
                    $atlasa_jaun_piet = mysqli_query($savienojums, $jaun_piet_SQL);

                    while($piet = mysqli_fetch_array($atlasa_jaun_piet)){
                        echo "
                        <tr> 
                            <td>{$piet['ID']}</td>
                            <td>{$piet['Vārds']}</td>
                            <td><div class='vesture'><p>{$piet['Apraksts']}</p></div></td>
                            <td>{$piet['Datums']}</td>
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