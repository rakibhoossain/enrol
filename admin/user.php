<?php
include "core/connect.php";
$name = $username = $designation = $phone = $email = $active = '';

$sql = "SELECT * FROM user";

$result = $conn->query($sql);
if ($result->num_rows > 0) {

?>
<table id="userList" class="table table-striped table-bordered" style="width:100%">
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
    
    $id = $row['id'];
    $name = $row['name'];
    $username = $row['username'];
    $designation = $row['designation'];
    $phone = $row['phone'];
    $email = $row['email'];
    $active = $row['active'];

?>

        <tr val="<?php echo $id; ?>">
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

<!-- Modal -->
<div class="modal fade" id="userModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="userModelTitle">Student Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="submitButton" class="btn btn-primary">Update</button>
        <button type="button" id="deletButton" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>
 