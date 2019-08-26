<?php
if (isset($_POST['get_city'])) {
	$city=$_POST['get_city'];

	require_once('../core/connect.php');

	$sql = "SELECT name FROM city";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			?>
			<option <?php if($city==$row['name']) echo 'selected'; ?> value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
			<?php
		}
	}
	$conn->close();
}