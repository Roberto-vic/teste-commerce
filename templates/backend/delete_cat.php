<?php require_once ("../../config.php"); ?>

<?php

if(isset($_GET['id'])){
        
    $deleteCat = query("DELETE FROM categorie WHERE id_cat = $_GET[id]");
    confirm($deleteCat);

        creaAvviso("Categoria eliminato con successo!", "success");
        header("Location: ../../../myshop/admin/index.php?cat_admin");
    } else {
        header("Location: ../../../myshop/admin/index.php?cat_admin");
    }
?>