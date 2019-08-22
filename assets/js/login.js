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

});