<?php 
	if (isset($_POST['get_subject'])) {
		$cls=$_POST['get_subject'];

switch ($cls) { case 'Eleven': ?>
	
	<!-- Code for Eleven -->
	<option value="Science">Science</option>
	<option  value="Arts">Arts</option>
	<option  value="Commerce">Commerce</option>

<?php break; case 'Twelve': ?>
	
	<!-- Code for Twelve -->
	<option value="Science">Science</option>
	<option  value="Arts">Arts</option>
	<option  value="Commerce">Commerce</option>


	<!-- Code for Hons -->
<?php break; case 'Hons.': require '../core/connect.php';
	$sql = "SELECT sub_name FROM subject";
    $result = $conn->query($sql);
       if ($result->num_rows > 0) {
   		 while($row = $result->fetch_assoc()) {
?>

<option value="<?php echo $row['sub_name'] ;?>"> <?php echo $row['sub_name'] ;?></option>

<?php
       }
  }

?>


<?php break; case 'Hons. Prof.': ?>

	<!-- Code for Hons. prof. -->
	<option value="BSc in CSE">BSc in CSE</option>
	<option  value="ECE">ECE</option>
	<option  value="BBA">BBA</option>

<?php break; case 'Degree Pass': ?>

	<!-- Code for Degree pass -->
	<option value="BSc">BSc</option>
	<option  value="BBS">BBS</option>
	<option  value="BCOM">BCOM</option>
				
			
<?php break; default: ?>

	<!-- Code for Default pass -->
	<option value="Science">Science</option>
	<option  value="Arts">Arts</option>
	<option  value="Commerce">Commerce</option>

<?php break; }} ?>



<?php
if (isset($_POST['get_class'])) {
	$cls=$_POST['get_class'];
?>

<option value=" ">-Class-</option>
<option <?php if($cls=='Eleven') echo 'selected' ?> value="Eleven">Eleven</option>
<option <?php if($cls=='Twelve') echo 'selected' ?> value="Twelve">Twelve</option>
<option <?php if($cls=='Hons.') echo 'selected' ?> value="Hons.">Hons.</option>
<option <?php if($cls=='Hons. Prof.') echo 'selected' ?> value="Hons. Prof.">Hons. Prof.</option>
<option <?php if($cls=='Degree Pass') echo 'selected' ?> value="Degree Pass">Degree Pass</option>
<option <?php if($cls=='BM') echo 'selected' ?> value="BM">BM</option>
<?php }