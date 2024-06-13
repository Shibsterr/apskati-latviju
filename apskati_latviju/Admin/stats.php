<?php
    // # 1.statistika (Jauni Pieteikumi)
    $jauni_pieteikumi_SQL = "SELECT COUNT(ID) FROM celojumi_pieteiksanas WHERE Pieteiksanas_datums BETWEEN NOW() - INTERVAL 1 DAY AND NOW()";

    $atlasa_jauni_pieteikumi = mysqli_query($savienojums, $jauni_pieteikumi_SQL);

    while($rezultats = mysqli_fetch_array($atlasa_jauni_pieteikumi)){
        $jauniPieteikumi = "{$rezultats['COUNT(ID)']}";
    }

    // # 2.statistika
    $parbauditi_pieteikumi_SQL = "SELECT COUNT(ID) FROM celojuma_celojums";

    $atlasa_parbauditi_pieteikumi = mysqli_query($savienojums, $parbauditi_pieteikumi_SQL);
    
    while($rezultats = mysqli_fetch_array($atlasa_parbauditi_pieteikumi)){
        $celojumaSkaits = "{$rezultats['COUNT(ID)']}";
    }

    // # 3.statistika
    $visi_pieteikumi_SQL = "SELECT COUNT(ID) FROM celojumi_pieteiksanas";

    $atlasa_visi_pieteikumi = mysqli_query($savienojums, $visi_pieteikumi_SQL);

    while($rezultats = mysqli_fetch_array($atlasa_visi_pieteikumi)){
        $pieteikumiKopa = "{$rezultats['COUNT(ID)']}";
    }

    // # 4.statistika
    $aktivie_pieteikumi_SQL = "SELECT COUNT(Lietotaja_ID) FROM celojuma_lietotaji";

    $atlasa_aktivos_pieteikumi = mysqli_query($savienojums, $aktivie_pieteikumi_SQL);
    
    while($rezultats = mysqli_fetch_array($atlasa_aktivos_pieteikumi)){
        $darbiniekaSkaits = "{$rezultats['COUNT(Lietotaja_ID)']}";
    }
?>