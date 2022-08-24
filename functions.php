<?php
// funzione che ci restituisce le categorie del menu
function query($sql) 
{
 
    global $connection;
    return mysqli_query($connection, $sql);
}

// funzione che controlla se la query è andata a buon fine o no
function confirm($result)
{
    global $connection;
    if (!$result) {
        die("Query failed " . mysqli_error($connection));
    }
}

// funzione che restituisce un array con i dati della query
function fetch_array($result)
{
    //global $connection; 
    return mysqli_fetch_array($result);
}


function creaAvviso($msg){
  if(!empty($msg)){
    $_SESSION['messaggio'] = $msg;
  } else {
    $msg = "";
  }
}

function mostraAvviso(){
    if(isset($_SESSION['messaggio'])){
        echo $_SESSION['messaggio'];
        unset($_SESSION['messaggio']);
    }
}

// funzione che restituisce l'id dell'utente loggato
function idUltimo(){
  global $connection;
  return mysqli_insert_id($connection);
}

// funzione che restituisce il numero di righe della query di prodotti
function showProduct()
{
    global $connection;
    $cercaProd = query('SELECT * FROM prodotti ORDER BY RAND() LIMIT 0, 3');

    confirm($cercaProd);

    while ($row = fetch_array($cercaProd)) { // stringa di codice HTML che contiene i dati dei prodotti

        $products = <<<STRINGA_PRD

        <div class='col-lg-4 col-md-6 mb-4'>
          <div class='card h-100'>
            <a href="#"><img class="card-img-top" src="../risorse/img/{$row['immagine']}" alt=""></a>
            <div class ="card-body">
              <h4 class ="card-title">
                <a href="prodotto.php?id={$row['id_prodotto']}">{$row['nome_prodotto']}</a>
              </h4>
              <h5>€{$row['prezzo']}</h5>
              <p class ="card-text">{$row['descr_prodotto']}</p>
            </div>
            <div class="card-footer text-center">
              <a href="carrello.php?add={$row['id_prodotto']}" class="btn btn-outline-success btn-small btn-block">Aquista</a>
              <a href="prodotto.php?id={$row['id_prodotto']}" class="btn btn-outline-primary btn-small btn-block">Dettagli</a>
            </div>
          </div>
        </div>
        
        STRINGA_PRD;

        echo $products;
    }
}

function showCategory()
{
    $searchCategory = query("SELECT * FROM categorie ");

    confirm($searchCategory);
    
    
    while($row = fetch_array($searchCategory)){

        $categories = <<<STRINGA_CAT
      
       <a href='categorie.php?id={$row['id_cat']}' class='list-group-item'>{$row['nome_cat']}</a>

       STRINGA_CAT;

       echo $categories;
    }


}

function paginaCategoria(){

  $pdtCat = query("SELECT * FROM prodotti WHERE cat_prodotto=" . intval($_GET['id']) . "");
  confirm($pdtCat);

  while($row = fetch_array($pdtCat)){
    $pdtSinCat = <<<STRINGA_PDTSING
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card altezza">
            <img class="card-img-top" src='../risorse/img/{$row['immagine']}' alt="">
            <div class="card-body">
              <h4 class="card-title">{$row['nome_prodotto']}</h4>
              <p class="card-text">{$row['descr_prodotto']}</p>
            </div>
            <div class="card-footer">
              <a href="carrello.php?add={$row['id_prodotto']}" class="btn btn-success mr-3">Aquista</a><a href="prodotto.php?id={$row['id_prodotto']}" class="btn btn-primary">Dettagli</a>
            </div>
          </div>
        </div>


    STRINGA_PDTSING;
    echo $pdtSinCat;
  }
}




function catalogo(){
  $catalogoPdt = query("SELECT * FROM prodotti");
  confirm($catalogoPdt);
  while($row = fetch_array($catalogoPdt)){
    $pdtCatalogo = <<<STRINGA_CATALOGO
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card altezza">
            <img class="card-img-top" src='../risorse/img/{$row['immagine']}' alt="">
            <div class="card-body">
              <h4 class="card-title">{$row['nome_prodotto']}</h4>
              <p class="card-text">{$row['descr_prodotto']}</p>
            </div>
            <div class="card-footer">
              <a href="carrello.php?add={$row['id_prodotto']}" class="btn btn-success mr-3">Aquista</a><a href="prodotto.php?id={$row['id_prodotto']}" class="btn btn-primary">Dettagli</a>
            </div>
          </div>
        </div>
    STRINGA_CATALOGO;
    echo $pdtCatalogo;
  }
}


//Backend > 

function prodottiAdmin(){
    $mostraPdt = query("SELECT * FROM prodotti");
    confirm($mostraPdt);

    while($row = fetch_array($mostraPdt)){
        $recuperaCat = titoloCat($row['cat_prodotto']);

        $pdtAdmin = <<<STRINGA_ADMIN
        <tr>
            <td>{$row['id_prodotto']}</td>
            <td>{$row['nome_prodotto']}</td>
            <td><img src="../../risorse/img/{$row['immagine']}" alt="" style="width: 20%;"></td>
            <td>{$recuperaCat}</td>
            <td>€ {$row['prezzo']}</td>
            <td>{$row['quantita_pdt']} Pz.</td>
            <td>
              <a href="index.php?aggiorna_pdt&id={$row['id_prodotto']}" class="btn btn-primary mb-2" role="button">Modifica</a>
            </td>
            <td>
              <a href="../../risorse/templates/backend/cancella_pdt.php?id={$row['id_prodotto']}" class="btn btn-danger" role="button">Elimina</a>
            </td>
        </tr>
        STRINGA_ADMIN;
        echo $pdtAdmin;
    }

}

function titoloCat($categoriaPdt){
  $titoloCat = query("SELECT * FROM categorie WHERE id_cat = '{$categoriaPdt}'");
  confirm($titoloCat);
  while($row = fetch_array($titoloCat)){
    return $row['nome_cat'];
  }
}

function addProductAdmin(){
  if(isset($_POST['aggiungi'])){

    $nomePdt = $_POST['nome_pdt'];
    $descrPdt = $_POST['dettagli'];
    $infoPdt = $_POST['desc_breve'];
    $prezzoPdt = $_POST['prezzo'];
    $categoriaPdt = $_POST['categoria_pdt'];
    $quantitaPdt = $_POST['quantita_pdt'];
    $immaginePdt = $_FILES['immagine']['name'];
    $immagineTmp = $_FILES['immagine']['tmp_name'];

    move_uploaded_file($immagineTmp, IMG_UPLOADS . DS . $immaginePdt);

    $nuovoPdt = query("INSERT INTO prodotti (nome_prodotto, descr_prodotto, info_dettagliate, prezzo, cat_prodotto, quantita_pdt, immagine) VALUES ('{$nomePdt}', '{$descrPdt}', '{$infoPdt}', '{$prezzoPdt}', '{$categoriaPdt}', '{$quantitaPdt}', '{$immaginePdt}')");
    confirm($nuovoPdt);    
    creaAvviso("Prodotto aggiunto con successo", "success");
    //header("Location: index.php?prodotti_admin");
    //exit();
  }
}

function mostraCatAdmin(){
  $mostraCat = query("SELECT *  FROM categorie");
  confirm($mostraCat);

  while($row = fetch_array($mostraCat)){
    $catAdmin = <<<STRINGA_ADMIN
    <option value="{$row['id_cat']}">{$row['nome_cat']}</option> 
    STRINGA_ADMIN;
    echo $catAdmin;
  }
}

function aggiornaProdotto(){

if(isset($_POST['aggiorna'])){

    $nomePdt = $_POST['nome_pdt'];
    $descrPdt = $_POST['dettagli'];
    $infoPdt = $_POST['desc_breve'];
    $prezzoPdt = $_POST['prezzo'];
    $categoriaPdt = $_POST['categoria_pdt'];
    $quantitaPdt = $_POST['quantita_pdt'];
    $immaginePdt = $_FILES['immagine']['name'];
    $immagineTmp = $_FILES['immagine']['tmp_name'];

    if(empty($immaginePdt)){
      $cercaImg = query("SELECT immagine FROM prodotti WHERE id_prodotto = '{$_GET['id']}'");
      confirm($cercaImg);
      while($img = fetch_array($cercaImg)){
        $immaginePdt = $img['immagine'];
      }
    }
    move_uploaded_file($immagineTmp, IMG_UPLOADS . DS . $immaginePdt);

    $update = query("UPDATE prodotti SET nome_prodotto = '{$nomePdt}', descr_prodotto = '{$descrPdt}', info_dettagliate = '{$infoPdt}', prezzo = '{$prezzoPdt}', cat_prodotto = '{$categoriaPdt}', quantita_pdt = '{$quantitaPdt}', immagine = '{$immaginePdt}' WHERE id_prodotto = {$_GET['id']}");
    confirm($update);
    creaAvviso("Prodotto aggiornato con successo", "success");
    //header("Location: index.php?prodotti_admin");
    //exit ();
}
}

function categorie_admin(){
  $newCategory = query("SELECT * FROM categorie");
  confirm($newCategory);

  while($row = fetch_array($newCategory)){
    $catId = $row['id_cat'];
    $catName = $row['nome_cat'];

    $catAdmin = <<<STRINGA_ADMIN
      <tr>
        <td>{$catId}</td>
        <td>{$catName} <br>       
        <td><a class="btn btn-danger" href="../../risorse/templates/backend/delete_cat.php?id={$row['id_cat']}" role="button">Cancella</a> </td>
      </tr>
    STRINGA_ADMIN;

    echo $catAdmin;
  }

}

function addCategory(){

  if(isset($_POST['aggiungi_cat'])){

    $nomeCat = $_POST['cat_nome'];

    if(empty($nomeCat) || $nomeCat == ""){
      creaAvviso("Inserisci un nome per la categoria", "danger");
    } else {

    $nuovaCat = query("INSERT INTO categorie (nome_cat) VALUES ('{$nomeCat}')");
    confirm($nuovaCat);    
    creaAvviso("Categoria aggiunta con successo", "success");

    }
  }
}

function ordini(){
  $mostraOrdini = query("SELECT * FROM ordini");
  confirm($mostraOrdini);

  while($row = fetch_array($mostraOrdini)){
    $orderId = $row['id_ordine'];
    $orderNum = $row['num_ordine'];
    $totOrdine = $row['importo_ordine'];
    $stOrdine = $row['status_ordine'];
    $valOrdine = $row['cur_ordine'];

    $reportOrdini = <<<STRINGA_ORDINI
      <tr>
        <td scope="row">{$orderId}</td>
        <td>{$orderNum}</td>
        <td>{$totOrdine}</td>
        <td>{$stOrdine}</td>
        <td>{$valOrdine}</td>
        <td>
          <a class="btn btn-danger" href="../../risorse/templates/backend/delete_order.php?id={$row['id_ordine']}" role="button">Cancella</a>
        </td>
      </tr>
    STRINGA_ORDINI;

    echo $reportOrdini;
  }

}

function mostraRapporto(){
  $mostraReport = query("SELECT * FROM rapporti");
  confirm($mostraReport);

  while($row = fetch_array($mostraReport)){
    $reportId = $row['id_rapporto'];
    $reportPdt = $row['id_prodotto'];
    $idOrdine = $row['id_ordine'];
    $reportArt = $row['nome_prodotto'];
    $reportTotArt = $row['prezzo'];
    $reportQntArt = $row['quantita_pdt'];

    $showReport = <<<STRINGA_RAPPORTI
        <tr>
            <td>{$reportId}</td>
            <td>{$reportPdt}</td>
            <td>{$idOrdine}</td>
            <td>{$reportArt}</td>
            <td>€ {$reportTotArt}</td>
            <td>{$reportQntArt}</td>
            <td>
            <a class="btn btn-danger" href="../../risorse/templates/back/report.php?id={$row['id_rapporto']}" role="button">Cancella</a>
            </td>
        </tr>
    STRINGA_RAPPORTI;

    echo $showReport;
  }

}

function ricerca(){
  if(isset($_POST['invia_ricerca'])){
    $search = $_POST['ricerca'];
    //echo $search;
    $ricerca = query("SELECT * FROM prodotti WHERE nome_prodotto LIKE '%$search%'"); //LIKE si usa per cercare una stringa all'interno di una stringa
  
    confirm($ricerca);
    
  }
  $risultatoRicerca = mysqli_num_rows($ricerca);

  if($risultatoRicerca == 0){
    echo "Nessun risultato";
  } else {
    while($row = fetch_array($ricerca)){
      $mostraRicerca = <<<STRINGA_RICERCA
      <div class="card mt-4">
            <img class="card-img-top img-fluid" src='../risorse/img/{$row['immagine']}' alt="">
            <div class="card-body">
              <h3 class="card-title text-center mb-5">{$row['nome_prodotto']}</h3>
              <h4 class="mb-5">{$row['prezzo']} €</h4>
              <h5>Info</h5>
              <p class="card-text">{$row['descr_prodotto']}</p>
              <buttom type="buttom" class="btn bg-success btn-small btn-block">Acquista</buttom>
            </div>
          </div>
          
          <hr>
          <div class="card card-outline-secondary my-4">
            <div class="card-header">
              Descrizione dettagliata
            </div>
            <div class="card-body">
              <p>{$row['info_dettagliate']}</p>
            </div>
          </div>

      STRINGA_RICERCA;

      echo $mostraRicerca;

    }
  }
}

function login(){
  if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $login = query("SELECT * FROM utenti WHERE username = '{$username}' AND password = '{$password}'");
    confirm($login);

    if(mysqli_num_rows($login) == 0){
      creaAvviso("Username o password errati", "danger");
      header("Location:login.php");
      exit();
    } else {
      $_SESSION['username'] = $username;
      header("Location: admin");
      exit();
    }
  }
}


function pageCategory(){
  $sezioneCat = query("SELECT * FROM categorie WHERE id_cat =" . intval($_GET['id']) . " LIMIT 1 ");
  confirm($sezioneCat);
  while($row = fetch_array($sezioneCat)){

    $nomeCategory = $row['nome_cat'];
    $didascaliaCat = $row['didascalia'];

    $sezioneCatSing = <<<STRINGA_CATSING
        <header class="jumbotron my-4">
        <p>Benvenuto nella </p>
        <h2 class="display-4">Categoria {$row['nome_cat']}... </h2>
        <p class="lead">{$row['didascalia']}</p>
        <a href="negozio.php" class="btn btn-primary btn-lg">Catalogo</a>
      </header>
    STRINGA_CATSING;
    echo $sezioneCatSing;
  }
}