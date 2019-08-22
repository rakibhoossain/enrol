<?php
include "../core/connect.php";
$name = $username = $designation = $phone = $email = $active = '';

$roll = $name = $gender = $birth_date = $city = $address = $phone = $email= '';
$subject = 'Choose...';
$class = 'Choose...';
$image = '';
$sql = "SELECT * FROM student";

$result = $conn->query($sql);
if ($result->num_rows > 0) {

?>


<table id="admin_student_list" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Roll</th>
            <th>Name</th>
            <th>Class</th>
            <th>Subject</th>
            <th>Gender</th>
            <th>Birth_date</th>
            <th>City</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Image</th>
        </tr>
    </thead>
    <tbody>
<?php while($row = $result->fetch_assoc()){

    $roll = $row['roll'];
    $name = $row['name'];
    $class = $row['class'];
    $subject = $row['subject'];
    $gender = $row['gender'];
    $birth_date = $row['birth_date'];
    $city = $row['city'];
    $address = $row['address'];
    $phone = $row['phone'];
    $email = $row['email'];
    $image = $row['image'];
?>
    <tr>
        <td><?php echo $roll;?></td>
        <td><?php echo $name;?></td>
        <td><?php echo $class;?></td>
        <td><?php echo $subject;?></td>
        <td><?php echo $gender;?></td>
        <td><?php echo $birth_date;?></td>
        <td><?php echo $city;?></td>
        <td><?php echo $address;?></td>
        <td><?php echo $phone;?></td>
        <td><?php echo $email;?></td>
        <td><?php echo $image;?></td>
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