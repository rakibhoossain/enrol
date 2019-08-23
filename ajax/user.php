<?php
include "../core/connect.php";
$name = $username = $designation = $phone = $email = $active = $password = '';


if (isset($_POST['userid'])) {
  $userid = $_POST['userid'];
}else{
  exit();
}

$sql = "SELECT * FROM user WHERE id='$userid'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
    
    $id = $row['id'];
    $name = $row['name'];
    $username = $row['username'];
    $designation = $row['designation'];
    $phone = $row['phone'];
    $email = $row['email'];
    $active = $row['active'];
    $password = $row['password'];

  }
} else {
   
}
$conn->close();
?>

<?php 
    if(session_id() == '' || !isset($_SESSION)) {
      session_start();
    }
    $disabled = 'disabled';
    $adminCanEdit = 'disabled';
  	if ($_SESSION['username'] == $username || $_SESSION['designation'] == 'admin' ) {
  		$disabled = '';
  	}
	if ($_SESSION['designation'] == 'admin' ) {
  		$adminCanEdit = '';
  	}
?>
<form id="userUpdate" val="<?php echo $id;?>">
	<div class="input-group mb-2">
		<div class="input-group-append">
			<span class="input-group-text"><i class="fas fa-user-circle"></i></span>
		</div>
		<input type="text" name="name" id="signupname" class="form-control input_pass" value="<?php echo $name; ?>" placeholder="Your name">
	</div>

	<div class="input-group mb-2">
		<div class="input-group-append">
			<span class="input-group-text"><i class="fas fa-envelope"></i></span>
		</div>
		<input type="email" name="email" id="signupemail" class="form-control input_pass" value="<?php echo $email; ?>" placeholder="abc@def.com">
	</div>

	<div class="input-group mb-2">
		<div class="input-group-append">
			<span class="input-group-text"><i class="fas fa-phone"></i></span>
		</div>
		<input type="text" name="phone" id="signupphone" class="form-control input_pass" value="<?php echo $phone; ?>" placeholder="8801111111111">
	</div>

	<div class="input-group mb-2">
		<div class="input-group-append">
			<span class="input-group-text"><i class="fas fa-user-plus"></i></span>
		</div>
		<select name="designation" id="signupdesignation" <?php echo $adminCanEdit;?>>
		  <option value="admin" <?php echo ($designation == 'admin')? 'selected' : ''; ?>>Administration</option>
		  <option value="member"<?php echo ($designation == 'member')? 'selected' : ''; ?>>General member</option>
		</select>
	</div>
	<div class="input-group mb-2">
		<div class="input-group-append">
			<span class="input-group-text"><i class="fas fa-user"></i></span>
		</div>
		<input type="text" <?php echo $disabled;?> name="username" id="signupusername" class="form-control input_user" value="<?php echo $username; ?>" placeholder="username">
	</div>
	<div class="input-group mb-3">
		<div class="input-group-append">
			<span class="input-group-text"><i class="fas fa-key"></i></span>
		</div>
		<input type="password" <?php echo $disabled;?> name="password" id="signuppassword" class="form-control input_pass" value="<?php echo $password; ?>" placeholder="password">
	</div>

	<div class="form-group">
		<div class="custom-control" id="signupmessage"></div>
	</div>

	<div class="d-flex justify-content-center mt-3">
		<!-- Material indeterminate -->
	<div class="form-check">
	  <input type="checkbox" value='1' class="form-check-input" id="activeUser" <?php echo ($active == 1)? 'checked ' : ''; echo $adminCanEdit; ?>>
	  <label class="form-check-label" for="activeUser">Active account</label>
	</div>

	</div>

</form>