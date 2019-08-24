<!-- <?php //require_once('../header.php'); ?> -->
<?php require_once('sidebar.php'); ?>

<!-- Page content holder -->
<div class="page-content p-5" id="content">

  <!-- Toggle button -->
  <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>

<!-- Content start -->




<?php
    if ((!isset($_GET['admin']))) require_once('user.php');
     if(isset($_GET['admin'])) {
      $page=$_GET['admin'];
      if ($page == 'student'){
        include 'student.php';
      }
    }
  ?>

<!-- Content end -->



</div>
<!-- Page content holder end -->
<?php //require_once('../footer.php'); ?>