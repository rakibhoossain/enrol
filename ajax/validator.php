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