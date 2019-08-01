<?php
include "core/connect.php";


if(!isset($_POST['header']['action'])) return;

if ($_POST['header']['action'] == 'update' && $_POST['header']['table'] == 'student') {

    $stmt = $conn->prepare("UPDATE student SET roll = ?,name = ?,class = ?,subject = ?,gender = ?,birth_date = ?,city = ?,address = ?,phone = ?,email = ? WHERE id=?");

    $stmt->bind_param("isssssssssi", $_POST['data']['roll'], $_POST['data']['name'], $_POST['data']['class'], $_POST['data']['subject'], $_POST['data']['gender'], $_POST['data']['birth_date'], $_POST['data']['city'], $_POST['data']['address'],$_POST['data']['phone'], $_POST['data']['email'], $_POST['header']['id']);

    $stmt->execute(); 
    $stmt->close();
}



if ($_POST['header']['action'] == 'delete' && $_POST['header']['table'] == 'student') {
  $id = $_POST['header']['id'];

  $sql="DELETE FROM student WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}


if ($_POST['header']['action'] == 'insert' && $_POST['header']['table'] == 'student') {



$stmt = $conn->prepare("INSERT INTO student (roll,name,class,subject,gender,birth_date,city,address,phone,email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("isssssssss", $_POST['data']['roll'], $_POST['data']['name'], $_POST['data']['class'], $_POST['data']['subject'], $_POST['data']['gender'], $_POST['data']['birth_date'], $_POST['data']['city'], $_POST['data']['address'], $_POST['data']['phone'], $_POST['data']['email']);

    $stmt->execute();

    printf("%d Row inserted.\n", $stmt->affected_rows);

    echo "New records created successfully";

    $stmt->close();
    $conn->close();




  $id = $_POST['header']['id'];

  $sql="DELETE FROM student WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}












// $fields = array();
// $values = implode (', ', $_POST['data']);
// $parm = $_POST['header']['parm'];
// $table = $_POST['header']['table'];


// foreach ($_POST['data'] as $key => $value) $fields[] = $key;


// $columns = implode (' = ?, ', $fields) . ' = ?';



// $sql = "UPDATE $table SET $columns WHERE id=?";
// $stmt = $conn->prepare($sql);

// // $st = "$parm, $values, $id";
// $stmt->bind_param("$parm, $values, $id"); 




// $array = $_POST['data'];
// $set = array();
// $data = array();

// foreach ($_POST['data'] as $key => $value){

//     $data[':'.$key] = $value;
//     $set[] = $key . ' = :' . $key;
// }
// $sql = "UPDATE $table SET ".implode($set, ',')." WHERE id=:id";

// var_dump($sql);
// //$data is now Array(':id'=>'3', ':name'=>'NAME', ':age'=>'12');
// //$sql is now  "UPDATE table SET name=:name, age=:age WHERE id=:id";

// $stmt = $conn->prepare($sql);
// $stmt = $stmt->execute($stmt, $data);
// $stmt->close();

// $stmt = $conn->prepare();

// $fields = array();
// $values = array();

// $id = 0;
// $action = '';
// $parm = '';
// $table = '';
// $cols = array();

// if (array_key_exists("id",$_POST)) $id = $_POST['id'];
// if (array_key_exists("action",$_POST)) $action = $_POST['action'];
// if (array_key_exists("parm",$_POST)) $parm = $_POST['parm'];
// if (array_key_exists("table",$_POST)) $table = $_POST['table'];


// foreach ($_POST as $key => $value) {
// 	if ($key == 'file' || $key == 'id' || $key == 'parm' || $key == 'action' || || $key == 'table') continue;

// 	$fields[] = $key;
// 	$values[] = $value;


// $cols[] = "$key = '$value'";

// }

// var_dump($cols);


// $columns = implode (' = ?, ', $fields) . ' = ?';


// $data = implode (', ', $values);

//     $stmt = $conn->prepare("UPDATE student SET ".$columns." WHERE id=?");

//     $stmt->bind_param("isssssssisisi", $data, $id);

    //$stmt->execute(); 
    // $stmt->close();
// header("Location: ?page=2&id=".$id."&action=view&success=1");



/*$array = array("array", "with", "about", "2000", "values");
$query = "INSERT INTO table (link) VALUES (?)";
$stmt = $mysqli->prepare($query);
$stmt ->bind_param("s", $one);

$mysqli->query("START TRANSACTION");
foreach ($array as $one) {
    $stmt->execute();
}
$stmt->close();
$mysqli->query("COMMIT");*/

// date_default_timezone_set( 'Asia/Tashkent' );
// user_error( print_r( $_FILES, true ) );
// $uploads_dir = 'uploads/';
// $target_path = $uploads_dir . basename( $_FILES[ 'file' ][ 'name' ] );
// if ( move_uploaded_file( $_FILES[ 'file' ][ 'tmp_name' ], $target_path ) )
// {
//     echo 'File uploaded: ' . $target_path;

//     echo $_POST[ 'name' ];
// }
// else
// {
//     echo 'Error in uploading file ' . $target_path;
// }