<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.bootstrap4.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/zebra_datepicker@latest/dist/css/bootstrap/zebra_datepicker.min.css">


<link rel="stylesheet" type="text/css" href="assets/css/admin.css">

<link rel="stylesheet" href="assets/css/style.css">



<?php
  $title = '';
  $page = isset($_GET['page'])?$_GET['page']:'home';
  switch($page){
    case 'home':
        $title = 'Home';
        break;
    case 'registration':
        $title = 'Registration';
        break;
    case 'dashboard':
        $title = 'Dashboard';
        break;
    case 'student':
        $title = 'Student';
        break;
    default:
        $title = 'Not ound';
  }
?>
  <title><?php echo $title;?> | Enrol</title>
  </head>
  <body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
  <div class="container">
    <a class="navbar-brand" href="index.php">
      <img src="assets/images/logo.png" alt="Logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
        </li>

        <?php
        if(session_id() == '' || !isset($_SESSION)) {
            session_start();
        }?>
<?php if(isset($_SESSION["username"])): ?>

        <li class="nav-item">
          <a class="nav-link" href="?page=registration">Registation</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?page=student">Student</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?page=dashboard">Dashboard</a>
        </li>
<?php endif; ?>

        <li class="nav-item">
        <?php
        if(isset($_SESSION["username"])){
          echo '<a class="nav-link" href="logout.php">Log out</a>';
        }else{
          echo '<a class="nav-link" href="login.php">Login</a>';
        }
        ?>
        </li>
      </ul>
    </div>
  </div>
</nav>