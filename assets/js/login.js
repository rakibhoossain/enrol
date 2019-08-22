$( document ).ready( function( $ ) {


/*================================
=========== User form control
==================================
*/
	$(document).delegate( "#login_btn", "click", function(e) {
		e.preventDefault();
		$('#login').show();
		$('#signup').hide();
		$('#forget').hide();
	 });

	$(document).delegate( "#forget_btn", "click", function(e) {
		e.preventDefault();
		$('#login').hide();
		$('#signup').hide();
		$('#forget').show();
	 });

	$(document).delegate( "#singup_btn", "click", function(e) {
	 	e.preventDefault();
		$('#login').hide();
		$('#signup').show();
		$('#forget').hide();
	 });


// validation


//Login
  $(document).delegate( "#login_req", "click", function() { 


    var formData = new FormData();

    formData.append( 'header[table]', 'user' );
    formData.append( 'header[action]', 'login' );

    formData.append( 'data[username]', $('#login #loginusername').val() );
    formData.append( 'data[password]', $('#login #loginpassword').val() );
    formData.append( 'data[remember]', ($('#login #remember').is(":checked"))? 'on' : 'off' );

    $.ajax( {
      url        : 'ajax/login.php',
      type       : 'POST',
      contentType: false,
      cache      : false,
      processData: false,
      data       : formData,
      success    : function ( data )
      {

        //Do something success-ish
        if (data == 'success') {
        	window.location.reload();
        }else{
        	console.log('Login failed');
      	}
       }
    });
  });


//Sign up
  $(document).delegate( "#signup_req", "click", function() { 

    var formData = new FormData();
    formData.append( 'header[table]', 'user' );
    formData.append( 'header[action]', 'signup' );
    formData.append( 'data[name]', $('#signup #signupname').val() );
    formData.append( 'data[email]', $('#signup #signupemail').val() );
    formData.append( 'data[phone]', $('#signup #signupphone').val() );
	formData.append( 'data[designation]', $('#signup #signupdesignation').find(":selected").val() );
    formData.append( 'data[username]', $('#signup #signupusername').val() );
    formData.append( 'data[password]', $('#signup #signuppassword').val() );
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
			$('#login').show();
			$('#signup').hide();
			$('#forget').hide();

	    	$('#login #loginusername').val($('#signup #signupusername').val());
	    	$('#login #loginpassword').val($('#signup #signuppassword').val());
      	}else{
      		$('#signup #signupmessage').html('Please try again' + data);
      	}
       }
    });

  });


  $(document).delegate( "#forget_req", "click", function() { 


    var formData = new FormData();

    formData.append( 'header[table]', 'user' );
    formData.append( 'header[action]', 'forget' );
    formData.append( 'data[email]', $('#forget #forgetemail').val() );

//     $.ajax( {
//       url        : 'database/save.php',
//       type       : 'POST',
//       contentType: false,
//       cache      : false,
//       processData: false,
//       data       : formData,
//       success    : function ( data )
//       {
//                     //Do something success-ish
//                     console.log( 'Completed.' );
//                     console.log( data );

// window.location.reload();

//                   }
//                 } );

  });






});