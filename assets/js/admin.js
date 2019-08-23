$( document ).ready( function( $ ) {

$(function() {
  // Sidebar toggle behavior
  $('#sidebarCollapse').on('click', function() {
    $('#sidebar, #content').toggleClass('active');
  });
});


  $(document).on("click", '#userList tbody tr', function(event) { 
    const userid = $(this).attr("val");

    console.log( 'id  :' + userid);

       // AJAX request
       $.ajax({
        url: 'ajax/user.php',
        type: 'post',
        data: {userid: userid},
        success: function(response){ 
             // Add response in Modal body
            $('#userModel .modal-body').html(response);

            // subject_list($('#class').val(), $('#subject'));
            // class_list($('#class').val(), $('#class'));
            // city_list($('#city').val(), $('#city'));

            // $('input.datepicker').Zebra_DatePicker({
            //   show_icon: false,
            //   format: 'd-m-Y'
            // });

            // Display Modal
            $('#userModel').modal('show'); 
            }
        });

  });


//userUpdate
  $('#userModel').delegate( "#submitButton", "click", function() { 

    var formData = new FormData();
    formData.append( 'header[table]', 'user' );
    formData.append( 'header[action]', 'update' );
    formData.append( 'header[id]', $('#userUpdate').attr("val") );
    formData.append( 'data[name]', $('#userUpdate #signupname').val() );
    formData.append( 'data[email]', $('#userUpdate #signupemail').val() );
    formData.append( 'data[phone]', $('#userUpdate #signupphone').val() );
    formData.append( 'data[designation]', $('#userUpdate #signupdesignation').find(":selected").val() );
    formData.append( 'data[username]', $('#userUpdate #signupusername').val() );
    formData.append( 'data[password]', $('#userUpdate #signuppassword').val() );
    formData.append( 'data[active]', '0' );

    $.ajax({
      url        : 'database/save.php',
      type       : 'POST',
      contentType: false,
      cache      : false,
      processData: false,
      data       : formData,
      success    : function ( data )
      {
        if (data == 'success') {
          window.location.reload();
        }else{
          console.log('Please try again' + data);
        }

       }
    });

  });

   $("#userModel").delegate( "#deletButton", "click", function() { 
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
        if (data == 'success') {
          window.location.reload();
        }else{
          console.log('Please try again' + data);
        }
      }
    } );

  }); 

});