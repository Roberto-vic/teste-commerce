<div class="col-lg-3">
<form method="post" action="ricerca.php">
<div class="input-group">
<input type="text" class="form-control" placeholder="cerca" name="ricerca" pattern="[A-Za-z0-9\s]+">
<span class="input-group-btn">
  <button class="btn btn-primary" type="submit" name="invia_ricerca"><i class="material-icons">search</i></button>
</span>
</div>
  </form>
   

    <h1 class="my-4">Categorie</h1>
    <div class="list-group">

    <?php showCategory(); ?>

        <!-- <a href="#" class="list-group-item">Categoria 1</a>
        <a href="#" class="list-group-item">Categoria 2</a>
        <a href="#" class="list-group-item">Categoria 3</a> -->
    </div>

</div>