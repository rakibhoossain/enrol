<?php
include "../core/connect.php";
if(!isset($_POST['header']['action'])) return;

/*================================
===== Insert user
==================================
*/

if ($_POST['header']['action'] == 'login' && $_POST['header']['table'] == 'user') {

  $username = $_POST['data']['username'];
  $password = md5($_POST['data']['password']);

  $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";

  $result = $conn->query($sql);
  if ($result->num_rows == 1) {
  	echo 'success';

    if(session_id() == '' || !isset($_SESSION)) {
      session_start();
    }
  	$_SESSION['username'] = $username;

    while($row = $result->fetch_assoc()) {
      $_SESSION['name'] = $row['name'];
      $_SESSION['designation'] = $row['designation'];
    }
  }else {
     echo 'error';
  }
  $conn->close();
}