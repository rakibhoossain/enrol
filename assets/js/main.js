$( document ).ready( function( $ ) {
"use strict";

  if ($("#studentList thead").length) { 
    $.ajax({
      "url": 'ajax/post.php',
      "success": function(json) {
        var tableHeaders;
        $.each(json.columns, function(i, val){
          tableHeaders += "<th>" + val + "</th>";
        });
        $("#studentList thead").html('<tr>' + tableHeaders + '</tr>');
        var table = $('#studentList').DataTable( {
          ajax: 'ajax/post.php',
          dom: 'Bfrtip',
          buttons: [
              'pageLength', 'print','copy', 'excel', 'pdf','colvis'
          ]
        } );
        $('tbody>tr>td').has( 'img' ).css('padding','0!important');
        table.buttons().container().appendTo( '.col-md-6:eq(0)' );
      },
      "dataType": "json"
    });
  }

  if ($("#registation_page").length) { 
    subject_list($('#class').val(), $('#subject'));
    class_list($('#class').val(), $('#class'));
    city_list($('#city').val(), $('#city'));
    $('input.datepicker').Zebra_DatePicker({
      show_icon: false,
      format: 'd-m-Y'
    });
  }

  $(document).on("click", '#studentList tbody tr', function(event) { 
    const userid = $(this).children("td").find('.student_id').attr("val");
    $('#preloader').show();
    $.ajax({
      url: 'ajax/student.php',
      type: 'post',
      data: {userid: userid},
      success: function(response){ 
        $('#studentModel .modal-body').html(response);
        city_list($('#city').val(), $('#city'));
        $('input.datepicker').Zebra_DatePicker({
          show_icon: false,
          format: 'd-m-Y'
        });

        $('#preloader').hide();
        $('#studentModel').modal('show'); 
      }
    });
  });


  //student insert
  $("#registation_page, #studentModel").delegate( "#submitButton", "click", function(e) {
    if( validateModelForm() && $('#modelForm').attr('valid') == 'true' ) insertStudent(e);
  }); 


  function insertStudent(e){
    var file = $('#image')[0].files[0],
    formData = new FormData();

    formData.append( 'header[table]', 'student' );
    formData.append( 'header[action]', $('#modelForm').attr("act") );
    formData.append( 'header[id]', $('#modelForm').attr("data") );

    formData.append( 'data[name]', $('#name').val() );
    formData.append( 'data[subject]', $('#subject').val() );
    formData.append( 'data[class]', $('#class').val() );
    formData.append( 'data[roll]', $('#roll').val() );
    formData.append( 'data[birth_date]', $('#birthDay').val() );
    formData.append( 'data[gender]', $("input[name='gender']:checked").val() );
    formData.append( 'data[phone]', $('#phone').val() );
    formData.append( 'data[email]', $('#email').val() );
    formData.append( 'data[city]', $('#city').val() );
    formData.append( 'data[address]', $('#address').val() );

    formData.append( 'file', file );
    $('#preloader').show();

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
          alert("Operation success");
          window.location.reload();
        }else{
          alert("Operation failed! Try again!");
        }
      }
    } ); 
  }

// Delete student
  $("#studentModel, #studentModel").delegate( "#deletButton", "click", function() { 
    var formData = new FormData();

    formData.append( 'header[table]', 'student' );
    formData.append( 'header[action]', 'delete' );
    formData.append( 'header[id]', $('#modelForm').attr("data") );


    if(confirm("Are you sure you want to delete this?")){
      $('#preloader').show();
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
            alert("Operation failed! Try again!");
          }
        }
      } );
    }

  });


  // image preview
  $(document).delegate( "#image", "change", function() {

      var imgPath = $(this)[0].value;
      var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

      if (extn == "png" || extn == "jpg" || extn == "jpeg") {
          if (typeof (FileReader) != "undefined") {

              var image_holder = $("#img_holder");
              var reader = new FileReader();
              reader.onload = function (e) {
                image_holder.attr('src', e.target.result);
              }
              reader.readAsDataURL($(this)[0].files[0]);
          } else {
              alert("This browser does not support FileReader.");
          }
      } else {
          alert("Pls select only images");
      }
  });


    $( document ).delegate( "#class", "click", function() {
      subject_list($('#class').val(), $('#subject'));

    });

    function class_list(val,el)
    {
     $.ajax({
       type: 'post',
       url: 'inc/subject.php',
       data: {
        get_class:val
      },
      success: function (response) {
        el.html(response);
      }
    });
   }


   function subject_list(val,el)
   {
    $.ajax({
      type: 'post',
      url: 'inc/subject.php',
      data: {
      get_subject:val
      },
      success: function (response) {
        el.html(response);
      }
    });
   }


  function city_list(val,el)
  {
      $.ajax({
       type: 'post',
       url: 'inc/city.php',
       data: {
        get_city:val
      },
       success: function (response) {
        el.html(response);
       }
      });
  }



  // model form validate
  function validateModelForm(){

  var ok = true;
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

  if (roll == '') { ok = changeInputColor('#modelForm #roll', false, ok) ;}
 
  ok = (birthDay)? changeInputColor('#modelForm #birthDay', true, ok) : changeInputColor('#modelForm #birthDay', false, ok);
  ok = (gender)? changeInputColor("#modelForm input[name='gender']", true, ok) : changeInputColor("#modelForm input[name='gender']", false, ok);
  ok = (phone)? changeInputColor('#modelForm #phone', true, ok) : changeInputColor('#modelForm #phone', false, ok);

  //optional
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
  function validateEmail(email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test( email );
  }

  $("#modelForm, #studentModel").delegate( "#phone", "keyup", function() {
    this.value = this.value.replace(/[^0-9]/g, '');
  });

  // unique roll student
  $("#modelForm, #studentModel").delegate( "#roll", "keyup", function() { 
    this.value = this.value.replace(/[^0-9]/g, '');
    var strol = this.value;
    $('#preloader').show();
    if (strol) {
      $.ajax({
       type: 'post',
       url: 'ajax/validator.php',
       data: {
        uniqueRoll:strol
      },
      async: true,
       success: function (response) {
        $('#preloader').hide();
        if (response == 'success') {
          $('#modelForm').attr('valid', 'true');
          $('#modelForm #roll').removeClass('is-invalid').addClass('is-valid');
        }else{
          $('#modelForm').attr('valid', 'false');
          $('#modelForm #roll').removeClass('is-valid').addClass('is-invalid');
        }
       }
      });
    }
  });



});