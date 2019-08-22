<?php require_once('header.php'); ?>
<?php require_once('sidebar.php'); ?>

<!-- Page content holder -->
<div class="page-content p-5" id="content">

  <!-- Toggle button -->
  <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>

<!-- Content start -->




<?php
    if ((!isset($_GET['page']))) require_once('welcome.php');
     if(isset($_GET['page'])) {
      $page=$_GET['page'];
       if ($page == '1'){
        require_once('user.php');
      }
      if ($page == '2'){
        include 'student.php';
      }
      // if ($page == '3'){
      //   include 'pages/result.php';
      // }

      // if ($page == '30'){
      //   include 'admin/marks_entry.php';
      // }
      // if ($page == '31'){
      //   include 'admin/marks_view.php';
      // }
      // if ($page == '4'){
      //   include 'pages/login.php';
      // }
      // if ($page == '5'){
      //   include 'admin/insert.php';
      // }
      // if ($page == '6'){
      //   session_unset(); 
      //   session_destroy();
      //   header('Location: index.php');
      // }

    }
  ?>

<!-- Content end -->



</div>
<!-- Page content holder end -->
<?php require_once('footer.php'); ?>