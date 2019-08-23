<?php
if(session_id() == '' || !isset($_SESSION)) {
    session_start();
}
$sessionUserID = isset($_SESSION['id'])? $_SESSION['id'] : '';
?>

<!-- Vertical navbar -->
<div class="vertical-nav bg-white" id="sidebar">
  <div class="py-4 px-3 mb-4 bg-light">
    <div class="media d-flex align-items-center" id="userCart" val="<?php echo $sessionUserID;?>">
    <span class="mr-3 rounded-circle img-thumbnail shadow-sm"><i class="fas fa-user-circle"></i></span>
    <!-- <img src="https://res.cloudinary.com/mhmd/image/upload/v1556074849/avatar-1_tcnd60.png" alt="..." width="65" class="mr-3 rounded-circle img-thumbnail shadow-sm"> -->
      <div class="media-body">
        <h4 class="m-0"><?php echo (isset($_SESSION["name"]))? $_SESSION["name"] : ''; ?></h4>
        <p class="font-weight-light text-muted mb-0"><?php echo (isset($_SESSION["designation"]))? $_SESSION["designation"] : ''; ?></p>
      </div>
    </div>
  </div>
<?php require_once('core/connect.php');?>
  <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Dashboard</p>

  <ul class="nav flex-column bg-white mb-0">
    <li class="nav-item">
      <a href="?page=dashboard" class="nav-link text-dark font-italic bg-light">
        <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
        Home
      </a>
    </li>
    <li class="nav-item">
      <a href="?page=dashboard&admin=user" class="nav-link text-dark font-italic">
        <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
        User <span class="badge badge-secondary"><?php echo get_count('user', $conn); ?></span>
      </a>
    </li>
    <li class="nav-item">
      <a href="?page=dashboard&admin=student" class="nav-link text-dark font-italic">
        <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
          Student <span class="badge badge-secondary"><?php echo get_count('student', $conn); ?></span>
        </a>
    </li>
  </ul>
  
</div>
<!-- End vertical navbar -->

<!-- Get user -->
<?php
function get_count($table='user', $conn){
  
  $sql = "SELECT * FROM ".$table;
  $result = $conn->query($sql);
  return (int) $result->num_rows;
  // $conn->close();
}