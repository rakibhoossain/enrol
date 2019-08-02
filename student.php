<?php require_once('header.php'); ?>


<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <header class="card-header">
          <!-- <a href="" class="float-right btn btn-outline-primary mt-1">Log in</a> -->
          <h4 class="card-title mt-2 text-center">Registation form</h4>
        </header>
        <article class="card-body">
        	<div class="table-responsive">
        		<table class="table table-hover table-striped table-bordered" id="studentList">
        			<thead>
        				<tr>
        					<th scope="col">#</th>
        					<th scope="col">First</th>



        				</tr>
        			</thead>
        		</table>
        	</div>

        </article> <!-- card-body end .// -->
        <div class="border-top card-body text-center">Have an account? <a href="">Log In</a></div>
      </div> <!-- card.// -->
    </div> <!-- col.//-->

  </div> <!-- row.//-->

</div> 










<!-- Modal -->
<div class="modal fade" id="studentModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
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


<?php require_once('footer.php'); ?>