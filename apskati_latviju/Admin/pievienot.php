<?php
    $page = 'pievienot';
    require "header.php";
    require '../Assets/db.php';
?>

<section class="admin">
    <div class="row">
        <div class="info1 defaultborder">
            <div class="head-info head-color">Administrātoru pārvalde:
                <form method='POST' action='pievienosana.php'>
                    <button type='submit' name='pievienot' class='btn'><i class='fas fa-plus'></i></button>
                </form>
            </div>
            <table class="adminTable">
                <tr>
                    <th>ID</th>
                    <th>Vārds</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                <?php
                    $jaun_piet_SQL = "SELECT * FROM celojuma_lietotaji WHERE Lietotaja_ID != 1";
                    $atlasa_jaun_piet = mysqli_query($savienojums, $jaun_piet_SQL);

                    while($piet = mysqli_fetch_array($atlasa_jaun_piet)){
                        echo "
                        <tr> 
                            <td>{$piet['Lietotaja_ID']}</td>
                            <td>{$piet['Vards']}</td>
                            <td>{$piet['Status']}</td>
                            <td>
                            <div class='actionbtns'>
                            <form method='POST' action='rediget.php'>
                                <button type='submit' name='rediget' class='btn' value='{$piet['Lietotaja_ID']}'><i class='fas fa-edit'></i></button>
                            </form>
                            <button type='submit' name='delete' class='btn' value='{$piet['Lietotaja_ID']}'><i class='fas fa-trash'></i></button>
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