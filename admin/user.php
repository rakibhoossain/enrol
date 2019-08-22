<?php
include "../core/connect.php";
$name = $username = $designation = $phone = $email = $active = '';

$sql = "SELECT * FROM user";

$result = $conn->query($sql);
if ($result->num_rows > 0) {

?>
<table id="admin_user" class="table table-striped table-bordered" style="width:100%">
	<thead>
	    <tr>
	        <th>Name</th>
	        <th>Designation</th>
	        <th>Phone</th>
	        <th>Email</th>
	        <th>Username</th>
	        <th>Active</th>
	        
	    </tr>
	</thead>
	<tbody>
<?php

  while($row = $result->fetch_assoc()) {

    $name = $row['name'];
    $username = $row['username'];
    $designation = $row['designation'];
    $phone = $row['phone'];
    $email = $row['email'];
    $active = $row['active'];

?>

        <tr>
            <td><?php echo $name;?></td>
            <td><?php echo $designation;?></td>
            <td><?php echo $phone;?></td>
            <td><?php echo $email;?></td>
            <td><?php echo $username;?></td>
            <td><?php echo $active;?></td>
        </tr>
        


<?php
  }
?>
	</tbody>
</table>
<?php
} else {
   
}

$conn->close();
?>