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
        $names[]=array($th);
        
    }    
    $names[]=array('Action');

    // output data of each row
    $data = array();
    while($row = $result->fetch_assoc()) {
        $temp = array();
        foreach ($row as $key => $value) {
            if ($key=='id') continue;
          $temp[] = $value;
          
      }
      $temp[] = '<div id="showModal" val="'.$row["id"].'"><i class="fa fa-lg fa-eye" aria-hidden="true"></i></div>';
      // $temp[] = '<a href="?view=1" id="showModal" val="'.$row["id"].'"><i class="fa fa-lg fa-eye" aria-hidden="true"></i></a>';
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