$( document ).ready( function( $ ) {

  $(function() {
    // Sidebar toggle behavior
    $('#sidebarCollapse').on('click', function() {
      $('#sidebar, #content').toggleClass('active');
    });
  });


  if ($("#userList thead").length) { 
    $('#userList').DataTable();
  }

//userShow
  $(document).delegate( "#userList tbody tr", "click", function(e) { 
    const userid = $(this).attr("val");
    userShow(userid);
  });
  $(document).delegate( "#userCart", "click", function(e) { 
    const userid = $(this).attr("val");
    userShow(userid);
  });

//userUpdate
  $('#userModel').delegate( "#submitButton", "click", function(e) { 
    updateUser(e);
  });

  //userDelete
  $("#userModel").delegate( "#deletButton", "click", function(e) { 
      deleteStudent(e);
  }); 



  /*============================
  =========== Show user
  ==============================
  */
  function userShow(userid){
     $('#preloader').show();
  // AJAX request
   $.ajax({
    url: 'ajax/user.php',
    type: 'post',
    data: {userid: userid},
    success: function(response){ 
       $('#preloader').hide();
         // Add response in Modal body
        $('#userModel .modal-body').html(response);
        // Display Modal
        $('#userModel').modal('show'); 
        }
    });
  }

  /*============================
  =========== Delete user
  ==============================
  */
  function deleteStudent(e){

      var formData = new FormData();

      formData.append( 'header[table]', 'user' );
      formData.append( 'header[action]', 'delete' );
      formData.append( 'header[id]', $('#userUpdate').attr("val") );

      $.ajax( {
        url        : 'database/save.php',
        type       : 'POST',
        contentType: false,
        cache      : false,
        processData: false,
        data       : formData,
        success    : function ( data )
        {
          $('#preloader').hide();
          if (data == 'success') {
            window.location.reload();
          }else{
            console.log('Please try again' + data);
          }
        }
      } );
  }

  /*============================
  =========== Update user
  ==============================
  */
  function updateUser(e){
     $('#preloader').show();

      var formData = new FormData();
      var password = $('#userUpdate #signuppassword').val();

      formData.append( 'header[table]', 'user' );
      formData.append( 'header[action]', 'update' );
      formData.append( 'header[id]', $('#userUpdate').attr("val") );
      formData.append( 'data[name]', $('#userUpdate #signupname').val() );
      formData.append( 'data[email]', $('#userUpdate #signupemail').val() );
      formData.append( 'data[phone]', $('#userUpdate #signupphone').val() );
      formData.append( 'data[designation]', $('#userUpdate #signupdesignation').find(":selected").val() );
      formData.append( 'data[username]', $('#userUpdate #signupusername').val() );

  if (password) {formData.append( 'data[password]', password );}

      formData.append( 'data[active]', $('#userUpdate #activeUser:checked').val() );

      $.ajax({
        url        : 'database/save.php',
        type       : 'POST',
        contentType: false,
        cache      : false,
        processData: false,
        data       : formData,
        success    : function ( data )
        {
           $('#preloader').hide();
          if (data == 'success') {
            window.location.reload();
          }else{
            console.log('Please try again' + data);
          }

         }
      });
  }

  /*============================
  =========== Course Model
  ==============================
  */
  $(document).delegate( "#courseList tbody tr", "click", function(e) {
    const courseID = $(this).attr("val");

    console.log(courseID);
    showSubject(courseID, e);

  });


  $(document).delegate( "#cityList tbody tr", "click", function(e) {
    const cityID = $(this).attr("val");

    console.log(cityID);
    showCity(cityID, e);

  });


//ADD items
  $(document).delegate( "#add_city", "click", function(e) {
    e.preventDefault();
    $('#addCityModel').modal('show');
  }); 
  
  $('#addCityModel').delegate( "#saveButton", "click", function(e) {
    insertCity(e);
  });

  $(document).delegate( "#add_course", "click", function(e) {
    e.preventDefault();
    $('#addCourseModel').modal('show');
  }); 

  $(document).delegate( "#add_subject", "click", function(e) {
    e.preventDefault();

    $('#preloader').show();
    $.ajax({
      url: 'admin/course.php',
      type: 'post',
      data: {subjectGetByCnme: $('#add_subject').attr('val')},
      success: function(response){ 
        $('#preloader').hide();
        $('#addSubjectModel .modal-body').html(response);
        $('#addSubjectModel').modal('show'); 
      }
    });

  }); 

//insert subject
  $('#addSubjectModel').delegate( "#saveButton", "click", function(e) {
    insertSubject(e);
  });

//update
  $('#cityModel').delegate( "#submitButton", "click", function(e) { 
    updateCity('update', e);
  });  
  $('#cityModel').delegate( "#deletButton", "click", function(e) { 
    updateCity('delete', e);
  });  

  $('#subjectModel').delegate( "#submitButton", "click", function(e) { 
    updateSubject('update', e);
  });
  $('#subjectModel').delegate( "#deletButton", "click", function(e) { 
    updateSubject('delete', e)
  });


  /*============================
  =========== City Model
  ==============================
  */


function showSubject(id, e){
  $('#preloader').show();
  $.ajax({
    url: 'admin/course.php',
    type: 'post',
    data: {courseListByID: id},
    success: function(response){ 
      $('#preloader').hide();
      $('#subjectModel .modal-body').html(response);
      $('#subjectModel').modal('show'); 
    }
  });
}

function showCity(id, e){
  $('#preloader').show();
  $.ajax({
    url: 'admin/course.php',
    type: 'post',
    data: {cityListByID: id},
    success: function(response){ 
      $('#preloader').hide();
      $('#cityModel .modal-body').html(response);
      $('#cityModel').modal('show'); 
    }
  });
}

  function insertCity(e){
     $('#preloader').show();

      var formData = new FormData();

      formData.append( 'header[table]', 'city' );
      formData.append( 'header[action]', 'insert' );

      formData.append( 'data[name]', $('#addCityModel #add_city_name').val() );

      $.ajax({
        url        : 'admin/course.php',
        type       : 'POST',
        contentType: false,
        cache      : false,
        processData: false,
        data       : formData,
        success    : function ( data )
        {
           $('#preloader').hide();
          if (data == 'success') {
            window.location.reload();
          }else{
            console.log('Please try again' + data);
          }

         }
      });
  }


  function insertSubject(e){
     $('#preloader').show();

      var formData = new FormData();

      formData.append( 'header[table]', 'subject' );
      formData.append( 'header[action]', 'insert' );

      formData.append( 'data[name]', $('#addSubjectModelForm #add_subject_name').val() );
      formData.append( 'data[code]', $('#addSubjectModelForm #add_subject_code').val() );
      formData.append( 'data[course]', $('#addSubjectModelForm').attr('val') );

      $.ajax({
        url        : 'admin/course.php',
        type       : 'POST',
        contentType: false,
        cache      : false,
        processData: false,
        data       : formData,
        success    : function ( data )
        {
           $('#preloader').hide();
          if (data == 'success') {
            window.location.reload();
          }else{
            console.log('Please try again' + data);
          }

         }
      });
  }



  function updateCity(action, e){
     $('#preloader').show();

      var formData = new FormData();

      formData.append( 'header[table]', 'city' );
      formData.append( 'header[action]', action );
      formData.append( 'header[id]', $('#cityModelForm').attr("val") );

      formData.append( 'data[name]', $('#cityModelForm #city_name').val() );

      $.ajax({
        url        : 'admin/course.php',
        type       : 'POST',
        contentType: false,
        cache      : false,
        processData: false,
        data       : formData,
        success    : function ( data )
        {
           $('#preloader').hide();
          if (data == 'success') {
            window.location.reload();
          }else{
            console.log('Please try again' + data);
          }

         }
      });
  }

  function updateSubject(action, e){
     $('#preloader').show();

      var formData = new FormData();

      formData.append( 'header[table]', 'subject' );
      formData.append( 'header[action]', action );
      formData.append( 'header[id]', $('#courseModelForm').attr("val") );

      formData.append( 'data[name]', $('#courseModelForm #subject_name').val() );
      formData.append( 'data[code]', $('#courseModelForm #subject_code').val() );

      $.ajax({
        url        : 'admin/course.php',
        type       : 'POST',
        contentType: false,
        cache      : false,
        processData: false,
        data       : formData,
        success    : function ( data )
        {
           $('#preloader').hide();
          if (data == 'success') {
            window.location.reload();
          }else{
            console.log('Please try again' + data);
          }

         }
      });
  }


  
});