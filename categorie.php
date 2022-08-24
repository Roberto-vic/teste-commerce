<?php require_once('../risorse/config.php'); ?>

<?php include(FRONT_END . DS . 'header.php'); ?>

<?php      
  //$catSingle = query("SELECT * FROM categorie WHERE id_cat = '{$_GET['id']}'");
  //confirm ($catSingle);

  //while($row = fetch_array($catSingle)):
    
?>


    <!-- Page Content -->
    <div class="container my-5 text-center">
      
 <?php pageCategory(); ?>
      <!-- Jumbotron Header -->
<!--        <header class="jumbotron my-4">
        <h1 class="display-3">Categoria <?php echo $row['nome_cat']; ?></h1>
        <p class="lead"><?php echo $row['didascalia']; ?></p>
        <a href="negozio.php" class="btn btn-primary btn-lg">Catalogo</a>
      </header> -->
<?php //endwhile ?>
      <!-- Page Features -->
      <div class="row text-center">

      <?php paginaCategoria(); ?>

<!--    <div class="col-lg-3 col-md-6 mb-4">
          <div class="card altezza">
            <img class="card-img-top" src="http://placehold.it/500x325" alt="">
            <div class="card-body">
              <h4 class="card-title">Categoria...</h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-success mr-3">Aquista</a><a href="#" class="btn btn-primary">Dettagli</a>
            </div>
          </div>
        </div> -->

      </div>
    </div>

<?php include(FRONT_END . DS . 'footer.php'); ?>