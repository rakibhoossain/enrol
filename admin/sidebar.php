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
      <a href="?page=dashboard" class="nav-link text-dark font-italic">
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


  <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Course</p>
  <ul class="nav flex-column bg-white mb-0">
  <?php
    $sql = "SELECT DISTINCT sub_class FROM subject";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
    ?>
      <li class="nav-item">
        <a href="?page=dashboard&admin=course&name=<?php echo $row['sub_class'] ;?>" class="nav-link text-dark font-italic">
          <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
          <?php echo $row['sub_class'] ;?> <span class="badge badge-secondary"><?php echo get_course_count($row['sub_class'], $conn); ?></span>
        </a>
      </li>
    <?php
         }
      }
  ?>
     <li class="nav-item">
        <a href="#" class="nav-link text-dark font-italic">
          <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>ADD course
        </a>
      </li>
  </ul>

  <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Others</p>
  <ul class="nav flex-column bg-white mb-0">
      <li class="nav-item">
        <a href="?page=dashboard&admin=city" class="nav-link text-dark font-italic">
          <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
          City <span class="badge badge-secondary"><?php echo get_count('city', $conn); ?></span>
        </a>
      </li>
  </ul>


  
</div>
<!-- End vertical navbar -->






<!-- Modal -->
<div class="modal fade" id="userModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="userModelTitle">Student Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="submitButton" class="btn btn-primary">Update</button>

  <?php 
      if(session_id() == '' || !isset($_SESSION)) {
        session_start();
      }
      $adminOrMember = false;
      $admin = false;
      if ($_SESSION['username'] == $username || $_SESSION['designation'] == 'admin' ) {
        $adminOrMember = true;
      }
    if ($_SESSION['designation'] == 'admin' ) {
        $admin = true;
      }

    if($admin) echo '<button type="button" id="deletButton" class="btn btn-danger">Delete</button>';

  ?>
      </div>
    </div>
  </div>
</div>




<!-- Modal -->
<div class="modal fade" id="addCityModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="addCityModelTitle">Add City</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="cityModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="cityModelTitle">City</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="submitButton" class="btn btn-primary">Update</button>

  <?php 
      if(session_id() == '' || !isset($_SESSION)) {
        session_start();
      }
      $adminOrMember = false;
      $admin = false;
      if ($_SESSION['username'] == $username || $_SESSION['designation'] == 'admin' ) {
        $adminOrMember = true;
      }
    if ($_SESSION['designation'] == 'admin' ) {
        $admin = true;
      }

    if($admin) echo '<button type="button" id="deletButton" class="btn btn-danger">Delete</button>';

  ?>
      </div>
    </div>
  </div>
</div>






<!-- Modal -->
<div class="modal fade" id="addSubjectModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="addSubjectModelTitle">Add Subject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="subjectModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="subjectModelTitle">Subject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="submitButton" class="btn btn-primary">Update</button>

  <?php 
      if(session_id() == '' || !isset($_SESSION)) {
        session_start();
      }
      $adminOrMember = false;
      $admin = false;
      if ($_SESSION['username'] == $username || $_SESSION['designation'] == 'admin' ) {
        $adminOrMember = true;
      }
    if ($_SESSION['designation'] == 'admin' ) {
        $admin = true;
      }

    if($admin) echo '<button type="button" id="deletButton" class="btn btn-danger">Delete</button>';

  ?>
      </div>
    </div>
  </div>
</div>



 


<!-- Get user -->
<?php
function get_count($table='user', $conn){
  
  $sql = "SELECT * FROM ".$table;
  $result = $conn->query($sql);
  return  ($result->num_rows > 0)? (int) $result->num_rows : 0;
}

function get_course_count($name, $conn){
  $sql = "SELECT * FROM subject WHERE sub_class = '".$name."'";
  $result = $conn->query($sql);
  return  ($result->num_rows > 0)? (int) $result->num_rows : 0;
}