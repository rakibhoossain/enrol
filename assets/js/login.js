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
          $('#login #loginmessage').html('Login failed');
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
      		$('#signup #signupmessage').html('Please try again');
      	}
       }
    });

  });


  $('#signup').delegate( "#signupemail", "keyup", function(e) { 
    if( validEmail($(this).val() ,this) ) isExistLogin('user', 'email', $(this).val(), this);
  });
  $('#signup').delegate( "#signupusername", "keyup", function(e) { 
    if( validUsername($(this).val() ,this) ) isExistLogin('user', 'username', $(this).val(), this);
  });

  $('#forget').delegate( "#forget_req", "click", function(e) { 
    isExistuserEmail('user', 'email', $('#forgetemail').val() );
  });
  $('#forget').delegate( "#forgetemail", "keyup", function(e) { 
    validEmail($(this).val() ,this);
  });


  function isExistLogin(table, colm, data, el){
    if (data=='') {
      $(el).removeClass('is-valid').addClass('is-invalid');
      return 0;
    }
    var formData = new FormData();

    formData.append( 'header[table]', 'user' );
    formData.append( 'header[action]', 'isUserExist' );

    formData.append( 'data[colm]', colm );
    formData.append( 'data[val]', data );

    $.ajax({
      url        : 'ajax/validator.php',
      type       : 'POST',
      contentType: false,
      cache      : false,
      processData: false,
      data       : formData,
      success    : function ( data )
      {
        if (data == 'success') {
          $(el).removeClass('is-invalid').addClass('is-valid');
        }else{
         $(el).removeClass('is-valid').addClass('is-invalid');
        }
      }
    });
  }


  function isExistuserEmail(table, colm, data){
    if (data=='') {
      $('#forget #forgetMessage').html('Password not sent.');
      return 0;
    }
    var formData = new FormData();

    formData.append( 'header[table]', 'user' );
    formData.append( 'header[action]', 'isUserExist' );

    formData.append( 'data[colm]', colm );
    formData.append( 'data[val]', data );

    $.ajax({
      url        : 'ajax/validator.php',
      type       : 'POST',
      contentType: false,
      cache      : false,
      processData: false,
      data       : formData,
      success    : function ( data )
      {
        if (data == 'error') {
          $('#forget #forgetMessage').html('Password sent! Check your email!');
        }else{
         $('#forget #forgetMessage').html('Password not sent.');
        }
      }
    });
  }



  function validEmail(email, el) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if(emailReg.test( email )){
      $(el).removeClass('is-invalid').addClass('is-valid');
    }else{
      $(el).removeClass('is-valid').addClass('is-invalid');
    }
    return emailReg.test( email );
  }
  function validUsername(username, el) {
    var usernameReg = /^[a-zA-Z0-9_.-]+$/;
    if(usernameReg.test( username )){
      $(el).removeClass('is-invalid').addClass('is-valid');
    }else{
      $(el).removeClass('is-valid').addClass('is-invalid');
    }
    return usernameReg.test( username );
  }

});