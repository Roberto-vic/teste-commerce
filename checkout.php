<?php require_once '../risorse/config.php'; ?>
<?php require_once('carrello.php'); ?>
<?php include(FRONT_END . DS . 'header.php'); ?>

<div class="container mt-5">
    <h1 class="text-center mb-4">Il tuo ordine</h1>
 <h4 class="bg-danger text-center text-white"><?php mostraAvviso(); ?></h4>
    <div class="row">
    <div class="col-12">
        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_cart">
            <input type="hidden" name="business" value="sb-idnrj19962284@business.example.com">
            <INPUT TYPE="hidden" NAME="currency_code" value="EUR">
            <INPUT TYPE="hidden" name="charset" value="utf-8">
            <input type="hidden" name="upload" value="1">
            <table class="table table-striped mb-5">
                <thead>
                    <tr>
                        <th>Prodotto</th>
                        <th>Prezzo</th>
                        <th>Quantità</th>
                        <th>Totale</th>
                        <th>Modifica</th>
                    </tr>
                </thead>
                <tbody>
                    <?php cart(); ?>
                    <!-- <tr>
                        <td>Apple</td>
                        <td>€ 45</td>
                        <td>34</td>
                        <td>1234</td>
                        <td>
                            <a href="carrello.php?add=44" class="btn btn-success" role="button">Aggiungi</a>
                            <a href="carrello.php?remove=44" class="btn btn-warning ml-3" role="button">Rimuovi</a>                            
                            <a href="carrello.php?delete=44" class="btn btn-danger ml-3" role="button">Elimina</a>                            
                        </td>
                    </tr> -->
                </tbody>
            </table>
            <input type="hidden" name="hosted_button_id" value="Y858J6QWHKBQ6">
            <input type="image" src="https://www.paypalobjects.com/it_IT/IT/i/btn/btn_buynowCC_LG.gif" border="0" name="upload" alt="PayPal è il metodo rapido e sicuro per pagare e farsi pagare online.">
            <img alt="" border="0" src="https://www.paypalobjects.com/de_DE/i/scr/pixel.gif" width="1" height="1">

        </form>
    </div>    
    </div>
    <div class="row mt-5">
        <div class="col-5">
            <h5>Riepilogo ordine</h5>
            <table class="table table-bordered" cellspacing="0">
                <tr class="cart-subtotal">
                    <th>Articoli</th>
                    <td>N° <?php echo isset($_SESSION['totPdtCart'])?$_SESSION['totPdtCart']:$_SESSION['totPdtCart']="-"; ?></td>
                </tr>
                <tr class="shipping">
                    <th>Spedizione</th>
                    <td>Gratuita</td>
                </tr>
                <tr class="order-total">
                    <th>Totale ordine</th>
                    <td>€ <?php echo isset($_SESSION['tot_cart'])?$_SESSION['tot_cart']:$_SESSION['tot_cart']="-"; ?></td>
                </tr>
            </table>
        </div>
        
    </div>
</div>

<?php include(FRONT_END . DS . 'footer.php'); ?>