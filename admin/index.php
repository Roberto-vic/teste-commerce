<?php require_once ("../../risorse/config.php"); ?>
<?php include (BACK_END . DS . "header.php"); ?>

<?php
if(!isset($_SESSION['username'])){    
    header("Location: ../../myshop");}
?>

<div id="page-wrapper">

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                Pannello di amministrazione 
                </h1>
            <ol class="breadcrumb">
               <li class="active">
               <i class="material-icons">dashboard</i> Dashboard
               </li>
            </ol>
            </div>
        </div>
<?php 
    
    if($_SERVER['REQUEST_URI'] == "/www/pubblic/myshop/admin/" || $_SERVER['REQUEST_URI'] == "/www/pubblic/myshop/admin/index.php"){
        include (BACK_END . DS . "content_admin.php");
    }
    
    if(isset($_GET['ordini'])){
        include (BACK_END . DS . "ordini.php");
    }
    if(isset($_GET['prodotti_admin'])){
        include (BACK_END . DS . "prodotti_admin.php");
    }
    if(isset($_GET['aggiungi_pdt'])){
        include (BACK_END . DS . "aggiungi_pdt.php");
    }
    if(isset($_GET['aggiorna_pdt'])){
        include (BACK_END . DS . "aggiorna_pdt.php");
    }
    if(isset($_GET['cancella_pdt'])){
        include (BACK_END . DS . "cancella_pdt.php");
    }
    if(isset($_GET['cat_admin'])){
        include (BACK_END . DS . "cat_admin.php");
    }
    if(isset($_GET['report'])){
        include (BACK_END . DS . "report.php");
    }
    
?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
    </div>
    
    <!-- Footer -->
<?php include (BACK_END . DS . 'footer.php'); ?>