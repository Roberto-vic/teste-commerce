<?php require_once("../risorse/config.php"); ?>


<?php include(FRONT_END . DS . 'header.php'); ?>

<!-- Page Content -->
<div class="container my-5">

  <div class="row">

    <!-- Sidebar -->

    <?php include(FRONT_END . DS . 'sidebar.php'); ?>


    <!-- /.col-lg-3 -->

    <div class="col-lg-9">

      <!-- Carousel -->

      <?php include(FRONT_END . DS . 'carousel.php'); ?>

      <div class="row">

        <?php showProduct(); ?>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.col-lg-9 -->
  </div>
  <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->

<?php include(FRONT_END . DS . 'footer.php'); ?>