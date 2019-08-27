<?php
if (isset($_POST['uniqueRoll'])) {
	require_once('../core/connect.php');
	$userRol = $_POST['uniqueRoll'];
	$sql = "SELECT * FROM student WHERE roll='$userRol'";
	$result = $conn->query($sql);
	echo ($result->num_rows > 0)? 'error' : 'success';
}

//is exit
if ( isset($_POST['header']['action']) && isset($_POST['header']['table']) && $_POST['header']['action'] == 'isUserExist') {
  $table = $_POST['header']['table'];
  $colm = $_POST['data']['colm'];
  $val = $_POST['data']['val'];

  require_once('../core/connect.php');

  $sql = "SELECT * FROM $table WHERE $colm='$val'";
  $result = $conn->query($sql);
  echo ($result->num_rows > 0)? 'error' : 'success';
}

//user exit
if ( isset($_POST['header']['action']) && isset($_POST['header']['table']) && $_POST['header']['action'] == 'isUserEmailExist') {
  $table = $_POST['header']['table'];
  $colm = $_POST['data']['colm'];
  $val = $_POST['data']['val'];

  require_once('../core/connect.php');

  $sql = "SELECT * FROM $table WHERE $colm='$val'";
  $result = $conn->query($sql);
	if ($result->num_rows > 0) {

	  while($row = $result->fetch_assoc()) {
	    
	    $id = $row['id'];
	    $name = $row['name'];
	    $username = $row['username'];
	    $designation = $row['designation'];
	    $phone = $row['phone'];
	    $email = $row['email'];
	    $active = $row['active'];
	    $password = $row['password'];
	  }


$to_email = $email;
$subject = 'Enrol: Login details';
$message = "<b>Username: </b>".$username." <b>Password: </b>".$password;
$headers = 'From: noreply@enrol.com';
// mail($to_email,$subject,$message,$headers);






	echo 'success';
	}else{
		echo 'error';
	}
}

