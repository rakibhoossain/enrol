<?php require_once('admin/auth.php'); ?>
<div class="col-md-12">
  <header class="card-header section-header">
    <h4 class="card-title mt-2 text-center">Registation form</h4>
  </header>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-3">
      <div class="banner">
        <img src="assets/images/banner.png" class="mx-auto d-block img-circle">
      </div>
    </div>
    <div class="col-md-9">
        <article id="registation_page">
          <form method="post" enctype="multipart/form-data" id="modelForm" data="" act="insert" valid="true">
            <div class="form-row">
              <div class="form-group col">
                <label for="class">Class</label>
                <select id="class" class="form-control">
                  <option>--Class--</option>
                </select>
              </div>
              <div class="form-group col">
                <label for="subject">Subject</label>
                <select id="subject" class="form-control">
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
                </select>
              </div> <!-- form-group end.// -->
              <div class="col form-group">
                <label for="address">Address</label>
                <textarea class="form-control" rows="2" id="address"></textarea>
              </div> <!-- form-group end.// -->
            </div>

            <div class="form-row">
              <div class="col form-group">
                <label for="image"><img src="assets/images/thumb.png" class="rounded float-left" alt="student photo" id="img_holder" width="200" height="200"></label>
                <input type="file" class="form-control-file" id="image" accept=".png, .jpg, .jpeg">
              </div>
            </div>
            <div class="form-row">
              <div class="col form-group text-center">
                <button type="button" id="submitButton" class="btn btn-primary"><i class="fas fa-user-circle"></i> Registration</button>
              </div>
            </div>                                        
          </form>
        </article>
    </div> <!-- col.//-->
  </div> <!-- row.//-->
</div> 