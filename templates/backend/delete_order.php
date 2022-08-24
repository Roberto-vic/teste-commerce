<?php require_once ("../../config.php"); ?>

<?php

if(isset($_GET['id'])){
        
    $deleteOrder = query("DELETE FROM ordini WHERE id_ordine = $_GET[id]");
    confirm($deleteOrder);

        creaAvviso("Ordine eliminato con successo!", "success");
        header("Location: ../../../myshop/admin/index.php?ordini");
    } else {
        header("Location: ../../../myshop/admin/index.php?ordini");
    }
?>