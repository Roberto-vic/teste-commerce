<?php require_once('../risorse/config.php'); ?>

<?php include(FRONT_END . DS . 'header.php'); ?>

    <!-- Page Content -->
    <div class="container my-5">

      <div class="row">

      <?php include(FRONT_END . DS . 'sidebar.php'); ?>

        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
        <?php ricerca(); ?>
          <!-- /.card -->

        </div>
        <!-- /.col-lg-9 -->
      </div>

    </div>
    <!-- /.container -->

    <!-- Footer -->

    <?php include(FRONT_END . DS . 'footer.php'); ?>


