<?php
include "../core/connect.php";

$userRol = 0;
if (isset($_POST['uniqueRoll'])) {
  $userRol = $_POST['uniqueRoll'];
}else{
  exit();
}

$sql = "SELECT * FROM student WHERE roll='$userRol'";
$result = $conn->query($sql);
echo ($result->num_rows > 0)? 'error' : 'success';
$conn->close();
?>