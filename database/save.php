<?php
include "../core/connect.php";


if(!isset($_POST['header']['action'])) return;


/*================================
===== Update Student
==================================
*/
if ($_POST['header']['action'] == 'update' && $_POST['header']['table'] == 'student') {
  $id = $_POST['header']['id'];

/* Getting image */
$photo = get_image($id,$conn);

if (isset($_FILES['file']['name'])) {
  delete_image($id, $conn); //delete old file
  $photo = upload_image($_POST['data']['roll'], $_FILES['file']['name'], $_FILES['file']['tmp_name']);
}
  $stmt = $conn->prepare("UPDATE student SET roll = ?,name = ?,class = ?,subject = ?,gender = ?,birth_date = ?,city = ?,address = ?,phone = ?,email = ?,image = ? WHERE id=?");

  $stmt->bind_param("issssssssssi", $_POST['data']['roll'], $_POST['data']['name'], $_POST['data']['class'], $_POST['data']['subject'], $_POST['data']['gender'], $_POST['data']['birth_date'], $_POST['data']['city'], $_POST['data']['address'],$_POST['data']['phone'], $_POST['data']['email'], $photo, $id);

  $stmt->execute(); 
  $stmt->close();
}

/*================================
===== Delete Student
==================================
*/
if ($_POST['header']['action'] == 'delete' && $_POST['header']['table'] == 'student') {
  $id = $_POST['header']['id'];


  $sql="DELETE FROM student WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {

        delete_image($id, $conn); //delete old file

        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

/*================================
===== Insert Student
==================================
*/

if ($_POST['header']['action'] == 'insert' && $_POST['header']['table'] == 'student') {

/* Getting file name */
$photo = 0;
if (isset($_FILES['file']['name'])) {
  $photo = upload_image($_POST['data']['roll'], $_FILES['file']['name'], $_FILES['file']['tmp_name']);
}

$stmt = $conn->prepare("INSERT INTO student (roll,name,class,subject,gender,birth_date,city,address,phone,email,image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("issssssssss", $_POST['data']['roll'], $_POST['data']['name'], $_POST['data']['class'], $_POST['data']['subject'], $_POST['data']['gender'], $_POST['data']['birth_date'], $_POST['data']['city'], $_POST['data']['address'], $_POST['data']['phone'], $_POST['data']['email'], $photo);

    $stmt->execute();

    printf("%d Row inserted.\n", $stmt->affected_rows);

    echo "New records created successfully";

    $stmt->close();
    $conn->close();
}



/*================================
===== Insert user
==================================
*/

if ($_POST['header']['action'] == 'signup' && $_POST['header']['table'] == 'user') {
  
  $password = md5($_POST['data']['password']);

  $stmt = $conn->prepare("INSERT INTO user (name, email, username, password, designation, phone, active) VALUES (?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("sssssss", $_POST['data']['name'], $_POST['data']['email'], $_POST['data']['username'], $password, $_POST['data']['designation'], $_POST['data']['phone'], $_POST['data']['active']);

    $stmt->execute();

    echo ($stmt->affected_rows == 1)? 'success' : 'error';
  
    $stmt->close();
    $conn->close();
}
















/*================================
===== Getting image
==================================
*/
function get_image($id,$conn){

  $sql = "SELECT image FROM student WHERE id='$id'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

      if ($row['image']) {
        $img= $row['image'];

        if (file_exists('uploads/'.$img) ) {
          return $img;
        }else{
          return 0;
        }
      }
    }
  } else {
     return 0;
  }
}


/*================================
===== Delete image
==================================
*/
function delete_image($id,$conn){

  $sql = "SELECT image FROM student WHERE id='$id'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

      if ($row['image']) {
        $img= 'uploads/'.$row['image'];


       if (file_exists($img) && unlink($img) ) {
          echo 'Delete file';
        }else{
          echo "file not delete";
        }
      }
    }
  } else {
     return 0;
  }

}

/*================================
===== Upload image
==================================
*/
function upload_image($id, $filename, $tmp_loc){
  if ($filename) {

      //filename
    $photo = $id.$filename;

    /* Location */
    $location = "uploads/".$photo;
    if (file_exists($location)) return $photo;

    $uploadOk = 1;
    $imageFileType = pathinfo($location,PATHINFO_EXTENSION);

    /* Valid Extensions */
    $valid_extensions = array("jpg","jpeg","png");
    /* Check file extension */
    if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
     $uploadOk = 0;
    }

    if($uploadOk == 0){
      return 0;
    }else{
      /* Upload file */
      if(move_uploaded_file($tmp_loc, $location)){
        return $photo;
      }else{
        return 0;
      }
    }
  }
}