<?php

if( isset($_GET['admin']) && isset($_GET['name']) ) {
	$cls=$_GET['name'];

	require_once('core/connect.php');
	$sql = "SELECT * FROM subject WHERE sub_class = '".$cls."'";
	$result = $conn->query($sql);
?>


<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-12">

        <header class="card-header section-header">
          <h4 class="card-title mt-2 text-center">Course name: <?php echo $cls;?></h4>
        </header>
        
        <article>


<?php



if ($result->num_rows > 0) {
?>
<div class="table-responsive">
    <table class="table table-striped table-bordered" style="width:100%">
    	<thead>
    	    <tr>
    	        <th>Code</th>
    	        <th>Name</th>
    	    </tr>
    	</thead>
    	<tbody>
    <?php
    $sn = 1;
    while($row = $result->fetch_assoc()) {
		echo '<tr val="'.$row['id'].'">';
			echo "<td>".$row['sub_code']."</td>";
			echo "<td>".$row['sub_name']."</td>";
		echo '</tr>';
    }
    ?>
    	</tbody>
    </table>
</div>


<?php
} else {
   
}

$conn->close();
?>



        </article>

    </div>
  </div>
</div> 


<?php

}