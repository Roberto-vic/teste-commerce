<?php require_once ("../../config.php"); ?>

<?php
    if(isset($_GET['id'])){
        
        $deletePdt = query("DELETE FROM prodotti WHERE id_prodotto = $_GET[id]");
        confirm($deletePdt);

        creaAvviso("Prodotto eliminato con successo!", "success");
        header("Location: ../../../myshop/admin/index.php?prodotti_admin");
    } else {
        header("Location: ../../../myshop/admin/index.php?prodotti_admin");
    }
?>