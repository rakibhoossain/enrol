<?php
if( !isset($_GET['admin']) ) return ;
if( isset($_GET['admin']) ) {

	require_once('core/connect.php');
	$sql = "SELECT * FROM city";
	$result = $conn->query($sql);
?>


<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-12">

        <header class="card-header section-header">
          <h4 class="card-title mt-2 text-center">City</h4>
        </header>
        
        <article>


<?php



if ($result->num_rows > 0) {
?>
<div class="table-responsive">
    <table class="table table-striped table-bordered" style="width:100%">
    	<thead>
    	    <tr>
    	        <th>Name</th>
    	    </tr>
    	</thead>
    	<tbody>
    <?php
    while($row = $result->fetch_assoc()) {
		echo '<tr val="'.$row['id'].'">';
			echo "<td>".$row['name']."</td>";
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