<?php
include "../core/connect.php";
$roll = $name = $gender = $b_date = $city = $address = $phone = $email= '';
$userid = 0;

$subject = 'Choose...';
$class = 'Choose...';

$img= 'assets/images/thumb.jpg';


if (isset($_POST['userid'])) {
  $userid = $_POST['userid'];
}else{
  exit();
}

$sql = "SELECT * FROM student WHERE id='$userid'";



$result = $conn->query($sql);
if ($result->num_rows > 0) {



  while($row = $result->fetch_assoc()) {
    $roll = $row['roll'];
    $name = $row['name'];

    $class = $row['class'];
    $subject = $row['subject'];
    $gender = $row['gender'];
    $b_date = $row['birth_date'];
    $city = $row['city'];
    $address = $row['address'];
    $phone = $row['phone'];
    $email= $row['email'];

    if ($row['image']) $img= 'database/uploads/'.$row['image'];
  }

} else {
   
}

$conn->close();
?>

<form method="post" enctype="multipart/form-data" id="modelForm" data="<?php echo $userid; ?>" act="update">
  <div class="form-row">
    <div class="form-group col">
      <label for="class">Class</label>
      <select id="class" class="form-control">
        <option selected value="<?php echo $class; ?>"><?php echo $class; ?></option>
      </select>
    </div>
    <div class="form-group col">
      <label for="subject">Subject</label>
      <select id="subject" class="form-control">
        <option selected value="<?php echo $subject; ?>"><?php echo $subject; ?></option>
      </select>
    </div>
    <div class="col form-group">
      <label>Roll/ID </label>   
      <input type="text" class="form-control" id="roll" placeholder="" value="<?php echo $roll; ?>">
    </div> <!-- form-group end.// -->
  </div> <!-- form-row end.// -->

   <div class="form-row">
    <div class="col form-group">
      <label for="name">Student name </label>   
      <input type="text" class="form-control" id="name" placeholder="" value="<?php echo $name; ?>">
    </div> <!-- form-group end.// -->
    <div class="col form-group">
      <label for="birthDay">Date of Birth</label>   
      <input type="text" class="form-control datepicker hasDatepicker" id="birthDay" placeholder="" value="<?php echo $b_date; ?>">
    </div> <!-- form-group end.// -->
    
    <div class="col form-group">
      <div class="col">
      <label for="">Gender</label></div>

      <div class="col">
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="Male" name="gender" class="custom-control-input" <?php if($gender=='Male') echo 'checked';?>  value="Male">
        <label class="custom-control-label" for="Male">Male</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="Female" name="gender" class="custom-control-input" <?php if($gender=='Female') echo 'checked';?>  value="Female">
        <label class="custom-control-label" for="Female">Female</label>
      </div></div>
    </div> <!-- form-group end.// -->
  </div> <!-- form-row end.// -->

  <div class="form-row">
    <div class="col form-group">
      <label for="phone">Phone</label>
      <input type="text" class="form-control" id="phone" placeholder="" value="<?php echo $phone; ?>">
    </div> <!-- form-group end.// -->
    <div class="col form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" placeholder="" value="<?php echo $email; ?>">
    </div> <!-- form-group end.// -->
  </div>

  <div class="form-row">
    <div class="col-md-6 form-group">
      <label for="city">City</label>
        <select id="city" class="form-control">
          <option value="<?php echo $city; ?>" selected ><?php echo $city; ?></option>
      </select>
    </div> <!-- form-group end.// -->
    <div class="col form-group">
      <label for="address">Address</label>
      <textarea class="form-control" rows="2" id="address"><?php echo $address; ?></textarea>
    </div> <!-- form-group end.// -->
  </div>

  <div class="form-row">
    <div class="col form-group">
      <label for="image"><img src="<?php echo $img; ?>" class="rounded float-left" alt="student photo" id="img_holder" width="200" height="200"></label>
      <input type="file" class="form-control-file" id="image" accept=".png, .jpg, .jpeg">
    </div>
  </div>
                                       
</form>