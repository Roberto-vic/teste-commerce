<?php require_once '../risorse/config.php'; ?>
<?php require_once 'carrello.php'; ?>


<?php include(FRONT_END . DS . 'header.php'); ?>


<div class="container my-5 text-center">
    <h4 class="display-3 mb-5">Grazie del tuo acquisto</h4>

    <p class="display-4 mb-5">Siamo lieti di averti avuto come cliente.</p>

    <p class="display-4 mb-5">Ti inviamo una mail con le informazioni del tuo ordine.</p>

    <p class="display-4 mb-5">Grazie dallo Staff di MyShop.</p>

<?php 

transition();

/* if(isset($_GET['tx'])){



    $prezzo = $_GET['amt'];
    $transazione = $_GET['tx'];
    $valuta = $_GET['cc'];
    $stato = $_GET['st'];

    $invioOrdine = query("INSERT INTO ordini (importo_ordine, num_ordine, cur_ordine, status_ordine) VALUES ('{$prezzo}', '{$transazione}', '{$valuta}', '{$stato}')");
    confirm($invioOrdine);

    session_destroy();
} else {
    header("Location: ../index.php");
}
 */
?>


</div>

<!-- Footer -->

<?php include(FRONT_END . DS . 'footer.php'); ?>