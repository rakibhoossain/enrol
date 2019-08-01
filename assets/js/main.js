$( document ).ready( function( $ ) {

  if ($("#studentList thead").length) { 

    $.ajax({
      "url": 'ajax/post.php',
      "success": function(json) {
        var tableHeaders;
        $.each(json.columns, function(i, val){
          tableHeaders += "<th>" + val + "</th>";
        });

        $("#studentList thead").html('<tr>' + tableHeaders + '</tr>');

        $('#studentList').dataTable(json);
      },
      "dataType": "json"
    });

  }

  if ($("#registation_page").length) { 
    subject_list($('#class').val(), $('#subject'));
    class_list($('#class').val(), $('#class'));
    city_list($('#city').val(), $('#city'));
  }

$('#birthDay').datetimepicker({
        format: 'yyyy-mm-dd',
        fontAwesome: true,
        wheelViewModeNavigation: true
      })

  $(document).on("click", '#showModal', function(event) { 
    const userid = $(this).attr("val");

       // AJAX request
       $.ajax({
        url: 'ajax/form.php',
        type: 'post',
        data: {userid: userid},
        success: function(response){ 
             // Add response in Modal body
            $('.modal-body').html(response);

            subject_list($('#class').val(), $('#subject'));
            class_list($('#class').val(), $('#class'));
            city_list($('#city').val(), $('#city'));

            // Display Modal
            $('#studentModel').modal('show'); 
            }
        });

  });


  $(document).delegate( "#submitButton", "click", function() {

    var file = $( '#image' ).get( 0 ).files[0],
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

    formData.append( 'file[name]', file );


    $.ajax( {
      url        : 'save.php',
      type       : 'POST',
      contentType: false,
      cache      : false,
      processData: false,
      data       : formData,
      xhr        : function ()
      {
        var jqXHR = null;
        if ( window.ActiveXObject )
        {
          jqXHR = new window.ActiveXObject( "Microsoft.XMLHTTP" );
        }
        else
        {
          jqXHR = new window.XMLHttpRequest();
        }
                    //Upload progress
                    jqXHR.upload.addEventListener( "progress", function ( evt )
                    {
                      if ( evt.lengthComputable )
                      {
                        var percentComplete = Math.round( (evt.loaded * 100) / evt.total );
                            //Do something with upload progress
                            console.log( 'Uploaded percent', percentComplete );
                          }
                        }, false );
                    //Download progress
                    jqXHR.addEventListener( "progress", function ( evt )
                    {
                      if ( evt.lengthComputable )
                      {
                        var percentComplete = Math.round( (evt.loaded * 100) / evt.total );
                            //Do something with download progress
                            console.log( 'Downloaded percent', percentComplete );
                          }
                        }, false );
                    return jqXHR;
                  },
                  success    : function ( data )
                  {
                    //Do something success-ish
                    console.log( 'Completed.' );
                    console.log( data );
                  }
                } );
window.location.reload();
  });    


  $("#studentModel").delegate( "#deletButton", "click", function() { 


    var formData = new FormData();

    formData.append( 'header[table]', 'student' );
    formData.append( 'header[action]', 'delete' );
    formData.append( 'header[id]', $('#modelForm').attr("data") );

    $.ajax( {
      url        : 'save.php',
      type       : 'POST',
      contentType: false,
      cache      : false,
      processData: false,
      data       : formData,
      success    : function ( data )
      {
                    //Do something success-ish
                    console.log( 'Completed.' );
                    console.log( data );

window.location.reload();

                  }
                } );

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
      // document.getElementById("stc").innerHTML=response; 
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