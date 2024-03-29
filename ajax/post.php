<?php
include "../core/connect.php";
$sql = "SELECT * FROM student";

$result = $conn->query($sql);
if ($result->num_rows > 0) {

    // output title of each row
    $names = array();
    while($title = $result->fetch_field()) {

        $th=$title->name;
        if ($th=='id') continue;
        if ($th=='email') continue;
        $names[]=array($th);  
    }    

    // output data of each row
    $data = array();
    while($row = $result->fetch_assoc()) {
        $temp = array();
        foreach ($row as $key => $value) {
            if ($key=='id') continue;
            if ($key=='email') continue;
            if ($key=='roll') $value = '<span class="student_id" val="'.$row["id"].'">'.$row["roll"].'</span>';

            if ($key=='image' && $row["image"]) $value = '<img src="database/uploads/'.$row["image"].'" class="img-responsive" alt="'.$row["name"].'" width="70" height="50">';
          $temp[] = $value;
      }
      $data[] = $temp;
  }
  
  echo '{
    "columns":';
    print json_encode($names);
    echo ',"data":';
    print json_encode($data);

    echo '}';
} else {
   
}
$conn->close();
?>