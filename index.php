<?php require_once('header.php'); ?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <header class="card-header">
          <!-- <a href="" class="float-right btn btn-outline-primary mt-1">Log in</a> -->
          <h4 class="card-title mt-2 text-center">Registation form</h4>
        </header>
        <article class="card-body" id="registation_page">

          <form method="post" enctype="multipart/form-data" id="modelForm" data="" act="insert">
            <div class="form-row">
              <div class="form-group col">
                <label for="class">Class</label>
                <select id="class" class="form-control">
                  <option value="">Class..</option>
                </select>
              </div>
              <div class="form-group col">
                <label for="subject">Subject</label>
                <select id="subject" class="form-control">
                  <option value="">Subject..</option>
                </select>
              </div>
              <div class="col form-group">
                <label>Roll/ID </label>   
                <input type="text" class="form-control" id="roll" placeholder="" value="">
              </div> <!-- form-group end.// -->
            </div> <!-- form-row end.// -->

             <div class="form-row">
              <div class="col form-group">
                <label for="name">Student name </label>   
                <input type="text" class="form-control" id="name" placeholder="" value="">
              </div> <!-- form-group end.// -->
              <div class="col form-group">
                <label for="birthDay">Date of Birth</label>   
                <input type="text" class="form-control datepicker hasDatepicker" id="birthDay" placeholder="01-12-1996" value="">
              </div> <!-- form-group end.// -->
              
              <div class="col form-group">
                <div class="col">
                <label for="">Gender</label></div>

                <div class="col">
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="Male" name="gender" class="custom-control-input" value="Male">
                  <label class="custom-control-label" for="Male">Male</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="Female" name="gender" class="custom-control-input" value="Female">
                  <label class="custom-control-label" for="Female">Female</label>
                </div></div>
              </div> <!-- form-group end.// -->
            </div> <!-- form-row end.// -->

            <div class="form-row">
              <div class="col form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" placeholder="" value="">
              </div> <!-- form-group end.// -->
              <div class="col form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="" value="">
              </div> <!-- form-group end.// -->
            </div>

            <div class="form-row">
              <div class="col-md-6 form-group">
                <label for="city">City</label>
                  <select id="city" class="form-control">
                    <option value="" selected >City</option>
                </select>
              </div> <!-- form-group end.// -->
              <div class="col form-group">
                <label for="address">Address</label>
                <textarea class="form-control" rows="2" id="address"></textarea>
              </div> <!-- form-group end.// -->
            </div>

            <div class="form-row">
              <div class="col form-group">
                <label for="image">Photo upload</label>
                <input type="file" class="form-control-file" id="image">
              </div>
              <div class="col">
                <div id='outputImage'></div>
              </div>
            </div>
            <div class="form-row">
              <div class='progress' id="progressDivId">
                <div class='progress-bar' id='progressBar'></div>
                <div class='percent' id='percent'>0%</div>
              </div>
            </div>

<!--             <div class="form-group">
              <button type="button" class="btn btn-primary btn-block" id="submitButton"> Register  </button>
            </div>  
            <small class="text-muted">By clicking the 'Sign Up' button, you confirm that you accept our <br> Terms of use and Privacy Policy.</small>   -->

            <button type="button" id="submitButton" class="btn btn-primary">Update</button>                                        
          </form>








        </article> <!-- card-body end .// -->
        <div class="border-top card-body text-center">Have an account? <a href="">Log In</a></div>
      </div> <!-- card.// -->
    </div> <!-- col.//-->

  </div> <!-- row.//-->

</div> 


<?php require_once('footer.php'); ?>