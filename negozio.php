<?php require_once('../risorse/config.php'); ?>

<?php include(FRONT_END . DS . 'header.php'); ?>

<div class="container my-5">

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
        <h1 class="display-3">Benvenuto nel nostro negozio</h1>
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa,
            ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique
            quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
        <a href="#" class="btn btn-primary btn-lg">Contattaci</a>
    </header>

    <h4 class="display-4">Catalogo</h4>
    <div class="row text-center">
    <?php catalogo(); ?>
<!--
    
    <div class="row text-center">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card altezza">
                <img class="card-img-top" src="http://placehold.it/500x325" alt="">
                    <div class="card-body">
                        <h4 class="card-title">Categoria...</h4>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Sapiente esse necessitatibus neque.</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-success mr-3">Aquista</a>
                        <a href="#" class="btn btn-primary">Dettagli</a>
                    </div>
                </div>
            </div>--> 
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php include(FRONT_END . DS . 'footer.php') ?>
