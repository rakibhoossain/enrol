<?php require_once('header.php'); ?>
<?php
    if ((!isset($_GET['page']))) require_once('registration.php');
     if(isset($_GET['page'])) {
      $page=$_GET['page'];
      switch($page){
        case 'student':
            require_once('student.php');
            break;
        case 'dashboard':
            require_once('admin/dashboard.php');
            break;
        default:
            require_once('404.php');;
      }
    }
  ?>

<?php require_once('footer.php'); ?>