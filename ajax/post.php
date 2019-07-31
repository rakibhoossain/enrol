<?php
include "../core/connect.php";
$sql = "SELECT f_name, l_name FROM student";



$result = $conn->query($sql);
if ($result->num_rows > 0) {

    // output title of each row
    $names = array();
    while($title = $result->fetch_field()) {

        $th=$title->name;
        if ($th=='id') continue;
        $names[]=array($th);
    }    

    // output data of each row
    $data = array();
    while($row = $result->fetch_assoc()) {
        $temp = array();
        foreach ($row as $key => $value) {
          $temp[] = $value;
      }
      $data[] = $temp;
  }

  echo '{
    "draw": 1,
    "recordsTotal": 57,
    "recordsFiltered": 57,
    "columns":';
    print json_encode($names);
    echo ',"data":';
    print json_encode($data);

    echo '}';
} else {
   
}
$conn->close();
?>