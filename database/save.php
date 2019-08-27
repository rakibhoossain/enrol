<?php
include "../core/connect.php";


if(!isset($_POST['header']['action'])) return;



/*================================
===== Insert Student
==================================
*/

if ($_POST['header']['action'] == 'insert' && $_POST['header']['table'] == 'student') {
  if ( !empty($_POST['data']['roll']) && !empty($_POST['data']['name']) && !empty($_POST['data']['class']) && !empty($_POST['data']['subject']) && !empty($_POST['data']['gender']) && !empty($_POST['data']['birth_date']) && !empty($_POST['data']['city']) && !empty($_POST['data']['address']) && !empty($_POST['data']['phone']) ) {

    $roll = $_POST['data']['roll'];
    $name = $_POST['data']['name'];
    $class = $_POST['data']['class'];
    $subject = $_POST['data']['subject'];
    $gender = $_POST['data']['gender'];
    $birth_date = $_POST['data']['birth_date'];
    $city = $_POST['data']['city'];
    $address = $_POST['data']['address'];
    $phone = $_POST['data']['phone'];
    $email = $_POST['data']['email'];

    /* Getting file name */
    $photo = 0;
    if (isset($_FILES['file']['name'])) {
      $photo = upload_image($_POST['data']['roll'], $_FILES['file']['name'], $_FILES['file']['tmp_name']);
    }
    $stmt = $conn->prepare("INSERT INTO student (roll, name, class, subject, gender, birth_date, city, address, phone, email, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssssssss", $roll, $name, $class, $subject, $gender, $birth_date, $city, $address, $phone, $email, $photo);
    $stmt->execute();
    echo ($stmt->affected_rows == 1)? 'success' : 'error';
    $stmt->close();
  }else{
    echo 'error';
  }
}

/*================================
===== Update Student
==================================
*/
if ($_POST['header']['action'] == 'update' && $_POST['header']['table'] == 'student') {
  $id = $_POST['header']['id'];

  if ( !empty($_POST['data']['roll']) && !empty($_POST['data']['name']) && !empty($_POST['data']['class']) && !empty($_POST['data']['subject']) && !empty($_POST['data']['gender']) && !empty($_POST['data']['birth_date']) && !empty($_POST['data']['city']) && !empty($_POST['data']['address']) && !empty($_POST['data']['phone']) ) {

    $roll = $_POST['data']['roll'];
    $name = $_POST['data']['name'];
    $class = $_POST['data']['class'];
    $subject = $_POST['data']['subject'];
    $gender = $_POST['data']['gender'];
    $birth_date = $_POST['data']['birth_date'];
    $city = $_POST['data']['city'];
    $address = $_POST['data']['address'];
    $phone = $_POST['data']['phone'];
    $email = $_POST['data']['email'];

    /* Getting image */
    $photo = get_image($id,$conn);

    if (isset($_FILES['file']['name'])) {
      delete_image($id, $conn); //delete old file
      $photo = upload_image($_POST['data']['roll'], $_FILES['file']['name'], $_FILES['file']['tmp_name']);
    }
    $stmt = $conn->prepare("UPDATE student SET roll = ?,name = ?,class = ?,subject = ?,gender = ?,birth_date = ?,city = ?,address = ?,phone = ?,email = ?,image = ? WHERE id=?");
    $stmt->bind_param("issssssssssi", $roll, $name, $class, $subject, $gender, $birth_date, $city, $address, $phone, $email, $photo, $id);
    $stmt->execute(); 
    echo ($stmt->affected_rows == 1)? 'success' : 'error';
    $stmt->close();
  }else{
    echo 'error';
  }
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
        echo 'success';
    }else {
        echo 'error';
    }
}





/*================================
===== Insert user
==================================
*/
if ($_POST['header']['action'] == 'signup' && $_POST['header']['table'] == 'user') {
  if ( !empty($_POST['data']['name']) && !empty($_POST['data']['email']) && !empty($_POST['data']['username']) && !empty($_POST['data']['designation']) && !empty($_POST['data']['phone']) && !empty($_POST['data']['password']) ){

    $name = $_POST['data']['name'];
    $email = $_POST['data']['email'];
    $username = $_POST['data']['username'];

    $password = md5($_POST['data']['password']);

    $designation = $_POST['data']['designation'];
    $phone = $_POST['data']['phone'];
    $active = 0;

    $stmt = $conn->prepare("INSERT INTO user (name, email, username, password, designation, phone, active) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $name, $email, $username, $password, $designation, $phone, $active);
    $stmt->execute();
    echo ($stmt->affected_rows == 1)? 'success' : 'error';
    $stmt->close();
  }else {
        echo 'error';
    }
}

/*================================
===== Update user
==================================
*/
if ($_POST['header']['action'] == 'update' && $_POST['header']['table'] == 'user') {
  $id = $_POST['header']['id'];
 



  if ( !empty($_POST['data']['name']) && !empty($_POST['data']['email']) && !empty($_POST['data']['username']) && !empty($_POST['data']['designation']) && !empty($_POST['data']['phone']) ){
    $name = $_POST['data']['name'];
    $email = $_POST['data']['email'];
    $username = $_POST['data']['username'];
    
    $designation = $_POST['data']['designation'];
    $phone = $_POST['data']['phone'];
    $active = ($_POST['data']['active'] == 1)? '1' : '0';


    if ( isset($_POST['data']['password']) ) {
      $password = md5($_POST['data']['password']);
      $stmt = $conn->prepare("UPDATE user SET name = ?,email = ?,username = ?,password = ?,designation = ?,phone = ?,active = ? WHERE id=?");
      $stmt->bind_param("sssssssi", $name, $email, $username, $password, $designation, $phone,  $active, $id);
    }  

    if ( !isset($_POST['data']['password']) ){
      $stmt = $conn->prepare("UPDATE user SET name = ?,email = ?,username = ?,designation = ?,phone = ?,active = ? WHERE id=?");
      $stmt->bind_param("ssssssi", $name, $email, $username, $designation, $phone,  $active, $id);
    }

    $stmt->execute();
    if ($stmt->affected_rows == 1) {
      if(session_id() == '' || !isset($_SESSION)) {
        session_start();
      }
      if ($_SESSION['id'] == $id) {
        $_SESSION['name'] = ($_SESSION['name'] != $name )? $name : $_SESSION['name'];
        $_SESSION["designation"] = ($_SESSION['designation'] != $designation )? $designation : $_SESSION['designation'];
      }
      echo 'success';
    }else{
      echo 'error';
    }
    $stmt->close();   
  }else{
    echo 'error';
  }
}

/*================================
===== Delete user
==================================
*/
if ($_POST['header']['action'] == 'delete' && $_POST['header']['table'] == 'user') {
  $id = $_POST['header']['id'];

    $sql="DELETE FROM user WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo 'success';
      if(session_id() == '' || !isset($_SESSION)) {
        session_start();
      }
      if ($_SESSION['id'] == $id) {
        session_destroy();
      }
    } else {
        echo 'error';
    }
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
          // echo 'Delete file';
        }else{
          // echo "file not delete";
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