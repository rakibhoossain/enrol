<?php 
	if (isset($_POST['get_subject'])) {
		$cls=$_POST['get_subject'];

	require_once('../core/connect.php');

	$sql = "SELECT * FROM subject WHERE sub_class = '".$cls."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
   		while($row = $result->fetch_assoc()) {
?>
		<option value="<?php echo $row['sub_name'] ;?>"> <?php echo $row['sub_name'] ;?></option>
<?php
       }
  	}		
} 

?>



<?php
if (isset($_POST['get_class'])) {
	$cls=$_POST['get_class'];

	require_once('../core/connect.php');

	$sql = "SELECT DISTINCT sub_class FROM subject";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
   		while($row = $result->fetch_assoc()) {
?>
		<option value="<?php echo $row['sub_class'] ;?>"> <?php echo $row['sub_class'] ;?></option>
<?php
       }
  	}
 }