$( document ).ready( function( $ ) {
"use strict";

	$('#submitButton').click(function() {

		console.log('valid:  '+validateModelForm());

	});

// model form validate
function validateModelForm(){

var ok = true;

var file = $('#image')[0].files[0];      
	if (file) {
	var ext = file.name.substring(file.name.lastIndexOf('.') + 1);
	if($.inArray(ext, ['png','jpg','jpeg'])== -1 && file.size>512) {
		// ok = false;
	    alert('invalid valid extension!' + file.size);
	}
	else{
		// ok = (ok)? true: false;
		alert('valid valid extension!');
	}
}
            

	var name = $('#modelForm #name').val();
	var subject = $('#modelForm #subject').val();
	var sclass = $('#modelForm #class').val();
	var roll = $('#modelForm #roll').val();
	var birthDay = $('#modelForm #birthDay').val();
	var gender = $("#modelForm input[name='gender']:checked").val();
	var phone = $('#modelForm #phone').val();
	var email = $('#modelForm #email').val();
	var city = $('#modelForm #city').val();
	var address = $('#modelForm #address').val();

	ok = (name)? changeInputColor('#modelForm #name', true, ok) : changeInputColor('#modelForm #name', false, ok);
	ok = (subject)? changeInputColor('#modelForm #subject', true, ok) : changeInputColor('#modelForm #subject', false, ok);
	ok = (sclass)? changeInputColor('#modelForm #class', true, ok) : changeInputColor('#modelForm #class', false, ok);
	ok = (roll)? changeInputColor('#modelForm #roll', true, ok) : changeInputColor('#modelForm #roll', false, ok);
	ok = (birthDay)? changeInputColor('#modelForm #birthDay', true, ok) : changeInputColor('#modelForm #birthDay', false, ok);
	ok = (gender)? changeInputColor("#modelForm input[name='gender']", true, ok) : changeInputColor("#modelForm input[name='gender']", false, ok);
	ok = (phone)? changeInputColor('#modelForm #phone', true, ok) : changeInputColor('#modelForm #phone', false, ok);

if (email){ok = (email && validateEmail(email))? changeInputColor('#modelForm #email', true, ok) : changeInputColor('#modelForm #email', false, ok);} 
else{$('#modelForm #email').removeClass('is-invalid').removeClass('is-valid'); ok = (ok)? true: false;}
	
	ok = (city)? changeInputColor('#modelForm #city', true, ok) : changeInputColor('#modelForm #city', false, ok);
	ok = (address)? changeInputColor('#modelForm #address', true, ok) : changeInputColor('#modelForm #address', false, ok);

	return ok;
}
//model form color change
function changeInputColor(selector, valid ,ok){
	if (valid) {$(selector).removeClass('is-invalid').addClass('is-valid'); return (ok)? true: false;}
	else{ $(selector).removeClass('is-valid').addClass('is-invalid'); return false;}
}
//email validator
function validateEmail($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  return emailReg.test( $email );
}




});

