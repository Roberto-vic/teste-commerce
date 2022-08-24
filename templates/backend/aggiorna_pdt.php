<?php
if(isset($_GET['id'])){

    $updatePdt = query("SELECT * FROM prodotti WHERE id_prodotto = {$_GET['id']}");
    //confirm($updatePdt);

    while($row = fetch_array($updatePdt)){
        $nomePdt = $row['nome_prodotto'];
        $descrPdt = $row['descr_prodotto'];
        $prezzoPdt = $row['prezzo'];
        $immaginePdt = $row['immagine'];
        $catPdt = $row['cat_prodotto'];
        $quantitaPdt = $row['quantita_pdt'];
        $infoPdt = $row['info_dettagliate'];
    }
aggiornaProdotto();

}
?>


<div class="container">
    <div>
    <h3 class="page-header">Modifica un nuovo prodotto</h3>
    </div>

<form action="" method="post" enctype="multipart/form-data">
<div class="row">
<div class="col-md-8">
<div class="form-group">
    <label for="nome">Nome </label>
        <input type="text" name="nome_pdt" class="form-control" value='<?php echo $nomePdt; ?>'>  
    </div>
    <div class="form-group">
           <label for="dettagli">Info</label>
      <textarea name="dettagli" value='' cols="30" rows="3" class="form-control" id="editor1"><?php echo $infoPdt; ?></textarea>
      <script> CKEDITOR.replace( 'editor1' ); </script>
    </div>
    
    <div class="form-group">
        <label for="info">Descrizione</label>
   <textarea name="desc_breve" value='' cols="30" rows="8" class="form-control" type="text" id="editor2"><?php echo $descrPdt; ?></textarea>
   <script> CKEDITOR.replace( 'editor2' ); </script>
 </div>
</div><!--fine col-8-->

<div class="col-md-4">

<div class="form-group">
        <label for="prezzo">Prezzo</label>
        <input type="number" value='<?php echo $prezzoPdt; ?>'  name="prezzo" class="form-control"  step=".01" min="0">
    </div>
    <div class="form-group">
         <label for="categoria" value=''>Categorie</label>
        <select name="categoria_pdt"  class="form-control">
          <option value="<?php echo $catPdt; ?>"><?php echo titoloCat($catPdt); ?></option> 
          <?php mostraCatAdmin(); ?>
        </select>
</div>

    <div class="form-group">
        <label for="quantita">Quantità</label>
      <input type="number" name="quantita_pdt" class="form-control" min="0" value='<?php echo $quantitaPdt; ?>'>
  </div>

    <div class="form-group">
        <label for="immagine">Immagine</label>
        <input type="file" name="immagine">
        <p></p>
        <img src="../../risorse/img/<?php echo $immaginePdt; ?>" alt="" style="width: 50%;">  
    </div>  
    
    <div class="form-group">
     <input type="submit" name="aggiorna" class="btn btn-success btn-lg" value="Aggiorna">
    </div>

</div><!--fine col-4-->
</div>
</form>

</div>