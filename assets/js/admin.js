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
  
});