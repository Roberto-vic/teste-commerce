<?php require_once ("../../config.php"); ?>

<?php

if(isset($_GET['id'])){
        
    $deleteReport = query("DELETE FROM rapporti WHERE id_rapporto = $_GET[id]");
    confirm($deleteReport);

        creaAvviso("Report eliminato con successo!", "success");
        header("Location: ../../../myshop/admin/index.php?report");
    } else {
        header("Location: ../../../myshop/admin/index.php?report");
    }
?>