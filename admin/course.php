<?php
if( isset($_GET['admin']) && isset($_GET['name']) ) {
	$cls=$_GET['name'];
	require_once('core/connect.php');
	$sql = "SELECT * FROM subject WHERE sub_class = '".$cls."'";
	$result = $conn->query($sql);

  if ($result->num_rows > 0) {
  ?>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-12">
          <header class="card-header section-header">
            <h4 class="card-title mt-2 text-center">Course name: <?php echo $cls;?></h4>
            <h4 class="text-center">
              <button  class="btn btn-primary" id="add_subject" val="<?php echo $cls;?>"><i class="fas fa-plus"></i> Add subject</button>
                            <?php 
                if(session_id() == '' || !isset($_SESSION)) {
                  session_start();
                }
                if ($_SESSION['designation'] == 'admin' ) {
                  echo '<button  class="btn btn-danger" id="delete_course" val="<?php echo $cls;?>"><i class="fas fa-trash"></i> Delete course</button>';
                }
              ?>    
            </h4>
          </header>
          <article>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="courseList" style="width:100%">
                	<thead>
                	    <tr>
                	        <th>Code</th>
                	        <th>Name</th>
                	    </tr>
                	</thead>
                	<tbody>
                    <?php
                    while($row = $result->fetch_assoc()) {
                		echo '<tr val="'.$row['id'].'">';
                			echo "<td>".$row['sub_code']."</td>";
                			echo "<td>".$row['sub_name']."</td>";
                		echo '</tr>';
                    }
                    ?>
                	</tbody>
                </table>
            </div>
          </article>
      </div>
    </div>
  </div> 
  <?php
  }
  $conn->close();
}

if ( isset($_POST['courseListByID']) ) {
  $courseListByID= $_POST['courseListByID'];
  require_once('../core/connect.php');

  $sql = "SELECT * FROM subject WHERE id = '".$courseListByID."'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    ?>
    <form method="post" class="form-inline" id="courseModelForm" val="<?php echo $courseListByID; ?>">
        <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="subject_code">Code</label>
                <input type="text" class="form-control" id="subject_code" placeholder="Subject code" value="<?php echo $row['sub_code']; ?>">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="subject_name">Name</label>
                <input type="text" class="form-control" id="subject_name" placeholder="Subject name" value="<?php echo $row['sub_name']; ?>">
              </div>
            </div>
        </div>
    </form>
    <?php
    }
  }
}


// City edit
if ( isset($_POST['cityListByID']) ) {
  $cityListByID= $_POST['cityListByID'];
  require_once('../core/connect.php');

  $sql = "SELECT * FROM city WHERE id = '".$cityListByID."'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    ?>
    <form method="post" id="cityModelForm" val="<?php echo $cityListByID; ?>">
        <div class="row">
            <div class="col">
              <div class="form-group">
                <input type="text" class="form-control" id="city_name" placeholder="City name" value="<?php echo $row['name']; ?>">
              </div>
            </div>
        </div>
    </form>
    <?php
    }
  }
}


if ( isset($_POST['subjectGetByCnme']) ) {
  $course = $_POST['subjectGetByCnme'];
?>
  <form method="post" class="form-inline" id="addSubjectModelForm" val="<?php echo $course; ?>">
      <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="subject_code">Code</label>
              <input type="text" class="form-control" id="add_subject_code" placeholder="Subject code" value="">
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="subject_name">Name</label>
              <input type="text" class="form-control" id="add_subject_name" placeholder="Subject name" value="">
            </div>
          </div>
      </div>
  </form>
<?php
}


/*====================
====== City table
======================
*/
//City insert
if ( isset($_POST['header']['action']) && $_POST['header']['action'] == 'insert' && $_POST['header']['table'] == 'city') {
  if ( isset($_POST['data']['name']) && !empty($_POST['data']['name']) ) {
    require_once('../core/connect.php');
    $stmt = $conn->prepare("INSERT INTO city (name) VALUES (?)");
    $stmt->bind_param("s", $_POST['data']['name']);
    $stmt->execute();
    echo ($stmt->affected_rows == 1)? 'success' : 'error';
    $stmt->close();
  }else{
    echo 'error';
  }
}

//City update
if (isset($_POST['header']['action']) && $_POST['header']['action'] == 'update' && $_POST['header']['table'] == 'city') {
  if ( isset($_POST['header']['id']) && isset($_POST['data']['name']) && !empty($_POST['header']['id']) && !empty($_POST['data']['name'])) {
    require_once('../core/connect.php');
    $id = $_POST['header']['id'];
    $name = $_POST['data']['name'];
    $stmt = $conn->prepare("UPDATE city SET name = ? WHERE id=?");
    $stmt->bind_param("si", $name, $id);
    $stmt->execute(); 
    echo ($stmt->affected_rows == 1)? 'success' : 'error';
    $stmt->close();
  }else{
    echo 'error';
  }
}

//City delete
if (isset($_POST['header']['action']) && $_POST['header']['action'] == 'delete' && $_POST['header']['table'] == 'city') {
    require_once('../core/connect.php');
  $id = $_POST['header']['id'];

  $sql="DELETE FROM city WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo 'success';
    } else {
        echo 'error';
    }
}


/*====================
====== Subject table
======================
*/

// insert subject
if ( isset($_POST['header']['action']) && $_POST['header']['action'] == 'insert' && $_POST['header']['table'] == 'subject') {
 if ( !empty($_POST['data']['code']) && !empty($_POST['data']['name']) && !empty($_POST['data']['course']) ) {
    require_once('../core/connect.php');
    $stmt = $conn->prepare("INSERT INTO subject (sub_code, sub_name, sub_class) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $_POST['data']['code'], $_POST['data']['name'], $_POST['data']['course']);
    $stmt->execute();
    echo ($stmt->affected_rows == 1)? 'success' : 'error';
    $stmt->close();
  }else {
    echo 'error';
  }
}

//subject update
if (isset($_POST['header']['action']) && $_POST['header']['action'] == 'update' && $_POST['header']['table'] == 'subject') {
  if ( !empty($_POST['header']['id']) && !empty($_POST['data']['name']) && !empty($_POST['data']['code']) ){
    require_once('../core/connect.php');
    $id = $_POST['header']['id'];
    $name = $_POST['data']['name'];
    $code = $_POST['data']['code'];

    $stmt = $conn->prepare("UPDATE subject SET sub_code = ?, sub_name = ? WHERE id=?");
    $stmt->bind_param("ssi", $code, $name, $id);
    $stmt->execute(); 
    echo ($stmt->affected_rows == 1)? 'success' : 'error';
    $stmt->close();
  }else {
    echo 'error';
  }
}

//subject delete
if (isset($_POST['header']['action']) && $_POST['header']['action'] == 'delete' && $_POST['header']['table'] == 'subject') {
    require_once('../core/connect.php');
  $id = $_POST['header']['id'];

  $sql="DELETE FROM subject WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo 'success';
    } else {
        echo 'error';
    }
}

//add course
if ( isset($_POST['header']['action']) && $_POST['header']['action'] == 'addCourse' && $_POST['header']['table'] == 'subject') {

  if ( isset($_POST['data']['name']) && !empty($_POST['data']['name']) ){
    require_once('../core/connect.php');
    $a = 1;
    $stmt = $conn->prepare("INSERT INTO subject (sub_code, sub_name, sub_class) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $a, $a, $_POST['data']['name']);
    $stmt->execute();
    echo ($stmt->affected_rows == 1)? 'success' : 'error';
    $stmt->close();
  }else {
    echo 'error';
  }
}

//delete course
if ( isset($_POST['delCourseGetByCnme']) ) {
  require_once('../core/connect.php');
  $course = $_POST['delCourseGetByCnme'];
  $sql="DELETE FROM subject WHERE sub_class='$course'";
    if ($conn->query($sql) === TRUE) {
        echo 'success';
    } else {
        echo 'error';
    }
}

//is exit
if ( isset($_POST['header']['action']) && isset($_POST['header']['table']) && $_POST['header']['action'] == 'isExist') {
  $table = $_POST['header']['table'];
  $colm = $_POST['data']['colm'];
  $val = $_POST['data']['val'];

  require_once('../core/connect.php');

  $sql = "SELECT * FROM $table WHERE $colm='$val'";
  $result = $conn->query($sql);
  echo ($result->num_rows > 0)? 'error' : 'success';
}
