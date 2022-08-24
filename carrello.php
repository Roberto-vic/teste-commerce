<?php require_once '../risorse/config.php'; ?>

<?php 

if(isset($_GET['add'])){

$controllaQuantita = query("SELECT * FROM prodotti WHERE id_prodotto= {$_GET['add']}");
confirm($controllaQuantita);

while($row = fetch_array($controllaQuantita)){
if($row['quantita_pdt'] != $_SESSION['prodotto_' . $_GET['add']] ){

$_SESSION['prodotto_' . $_GET['add']] +=1;
header('Location:checkout.php');
   exit();
} else {
    creaAvviso("Spiacenti, non abbiamo più " .  $row['nome_prodotto'] . " disponibili");
    header('Location:checkout.php');
    exit();
}
}
}

if(isset($_GET['remove'])){
    $_SESSION['prodotto_' . $_GET['remove']] -=1;
    header('Location: checkout.php');
    unset($_SESSION['tot_cart']);
    unset($_SESSION['totPdtCart']);
    exit();
}


if(isset($_GET['delete'])){
    $_SESSION['prodotto_' . $_GET['delete']] = 0;
    header('Location: checkout.php');
    unset($_SESSION['tot_cart']);
    unset($_SESSION['totPdtCart']);
    exit();
}

function cart(){
    $totCart = 0;
    $totPdtCart = 0;

    //Variabili paypal

    $item_name = 1;
    $item_number = 1;
    $amount = 1;
    $quantity = 1;

    foreach($_SESSION as $name => $value){
        if($value > 0){
            if(substr($name, 0, 9) == 'prodotto_'){
                $lungStr = strlen($name) - 9;
                $id = substr($name, 9, $lungStr);

    $pdtCart = query("SELECT * FROM prodotti WHERE id_prodotto = {$id}");
    confirm($pdtCart);

    while($row = fetch_array($pdtCart)){
        $prezzoArt = $row['prezzo'] * $value;
        $totPdtCart += $value;
        $productCart = <<<STRING_CART
            <tr>
                <td>{$row['nome_prodotto']}</td>
                <td>€ {$row['prezzo']}</td>
                <td>$value</td>
                <td>€ $prezzoArt</td>
                <td>
                <a href="carrello.php?add={$row['id_prodotto']}" class="btn btn-success" role="button">Aggiungi</a>
                <a href="carrello.php?remove={$row['id_prodotto']}" class="btn btn-warning ml-3" role="button">Rimuovi</a>                            
                <a href="carrello.php?delete={$row['id_prodotto']}" class="btn btn-danger ml-3" role="button">Elimina</a>                            
                </td>
            </tr>
            <input type="hidden" name="item_name_{$item_name}" value="{$row['nome_prodotto']}"> 
            <input type="hidden" name="item_number_{$item_number}" value="{$row['id_prodotto']}"> 
            <input type="hidden" name="amount_{$amount}" value="{$row['prezzo']}">
            <input type="hidden" name="quantity_{$quantity}" value="{$value}">
        STRING_CART;

        echo $productCart;
        $item_name++;
        $item_number++;
        $amount++;
        $quantity++;
    }
    $_SESSION['tot_cart'] = $totCart += $prezzoArt;
    $_SESSION['totPdtCart'] = $totPdtCart;
    }
    }
}
}

function transition() {
    if (isset($_GET['tx'])) {

        $prezzo = $_GET['amt'];
        $transazione = $_GET['tx'];
        $valuta = $_GET['cc'];
        $stato = $_GET['st'];
        $totArt = 0;

        foreach($_SESSION as $name => $value) {
            if ($value > 0) {
                if (substr($name, 0, 9) == 'prodotto_') {
                    $lungStr = strlen($name) - 9;
                    $id = substr($name, 9, $lungStr);

                    $invioOrdine = query(
                        "INSERT INTO ordini (importo_ordine, num_ordine, cur_ordine, status_ordine) VALUES ('{$prezzo}', '{$transazione}', '{$valuta}', '{$stato}')");

                    $lastId = idUltimo();
                    confirm($invioOrdine);

                    $pdtCart = query("SELECT * FROM prodotti WHERE id_prodotto = {$id}");
                    confirm($pdtCart);

                    while ($row = fetch_array($pdtCart)) {
                        $importo = $row['prezzo'];
                        $nomePdt = $row['nome_prodotto'];
                        $prezzoArt = $row['prezzo'] * $value;
                        $totArt += $value;

                        $invioRapporto = query("INSERT INTO rapporti (id_prodotto, id_ordine, nome_prodotto, quantita_pdt, prezzo) VALUES ('{$lastId}', '{$id}', '{$nomePdt}', '{$value}', '{$importo}')");
                        //confirm($insertDettagli);
                    }
                }
            }
        }
        session_destroy();
    } else {
        header('Location: index.php');
    }
}


?>