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

        // $('#studentList').dataTable({'ajax': 'ajax/post.php'});


 var table = $('#studentList').DataTable( {
        ajax: 'ajax/post.php',
        // lengthChange: true,
        dom: 'Bfrtip',
        buttons: [
            'pageLength', 'print','copy', 'excel', 'pdf','colvis'
        ]
        // buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
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
       // AJAX request
       $.ajax({
        url: 'ajax/student.php',
        type: 'post',
        data: {userid: userid},
        success: function(response){ 
             // Add response in Modal body
            $('#studentModel .modal-body').html(response);

            subject_list($('#class').val(), $('#subject'));
            class_list($('#class').val(), $('#class'));
            city_list($('#city').val(), $('#city'));

            $('input.datepicker').Zebra_DatePicker({
              show_icon: false,
              format: 'd-m-Y'
            });

            $('#preloader').hide();
            // Display Modal
            $('#studentModel').modal('show'); 
            }
        });

  });


  $("#studentModel").delegate( "#submitButton", "click", function(e) {
    insertStudent(e);
  }); 

  $("#registation_page").delegate( "#submitButton", "click", function(e) {
    insertStudent(e);
  }); 


  function insertStudent(e){
// var file = $( '#image' ).get( 0 ).files[0],
    var file = $('#image')[0].files[0],
    formData = new FormData();

    console.log('File name'+ file);

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
  $("#studentModel").delegate( "#deletButton", "click", function() { 
     $('#preloader').show();
    var formData = new FormData();

    formData.append( 'header[table]', 'student' );
    formData.append( 'header[action]', 'delete' );
    formData.append( 'header[id]', $('#modelForm').attr("data") );

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


});