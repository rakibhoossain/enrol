<?php require_once('admin/auth.php'); ?>
<?php require_once('header.php'); ?>



<?php
    if ((!isset($_GET['page']))) require_once('registation.php');
     if(isset($_GET['page'])) {
      $page=$_GET['page'];
       if ($page == 'dashboard'){
        require_once('admin/dashboard.php');
      }
      if ($page == 'student'){
        require_once('student.php');
      }
      // if ($page == '6'){
      //   session_unset(); 
      //   session_destroy();
      //   header('Location: index.php');
      // }

    }
  ?>

<?php require_once('footer.php'); ?>