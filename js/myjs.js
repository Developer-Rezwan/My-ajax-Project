jQuery(document).ready(function() {
    insert_data();
    check_data();
    //autocomplete();
    delete_data();
    show_pass();
    liveSearch();
    data_update();
    close();
});

/******************************************* Modal close function *************************/
function close() {
    $(document).on('click', '#close', function() {
        $('.modal-dialog').trigger('reset');
    })
}
/***************************************** end Modal function *********************/

/********************************************* This is insert function ******************************************/
function insert_data() {
    $(document).on('click', '#submit', function() {
        var username = $('#username').val();
        var email = $('#email').val();
        var password = $('#password').val();

        if (username == "" || email == "" || password == "") {
            $('#msg').html('<font class="alert-danger"> Please fill in the all field! <font>');
        } else {
            $.ajax({
                url: 'insert_data.php',
                method: 'post',
                data: { Username: username, Email: email, Password: password },
                success: function(data) {
                    $('#table').html(data);
                    $('#exampleModal').modal('hide');
                    $('form').trigger('reset');
                    $('#success').html("<center> Data successfully Inserted! <center>");
                    $('#success').addClass("alert alert-success");
                    setInterval(function(){
                      $('#success').slideUp('slow');
                    },3000);
                }
            });
        }
    });
}
/**************************end here **************************************************/
/************************** Check User Data **************************************************/
function check_data(){
$('#username').on('keyup',function(){ // 'blur' use kora jabe
	var username = $(this).val();
	var email = $(this).val();
	$.ajax({
		url : 'check_data.php',
		method:'POST',
		data:{Username:username,Email:email},
		dataType:'text',
		success:function(data){
           $('#msg').html(data);
		}
	});
});
}
/**************************end here **************************************************/
/************************** show password system ***************************

 function show_pass(){
   $('#eye').on('click',function(){
    var show = $('#password').attr('type');
    if(show == "password"){
        $('#password').attr('type','text');
        $('#show').removeClass('fa fa-eye');
        $('#show').addClass('fa fa-eye-slash');
    }else{
        $('#password').attr('type','password');
        $('#show').removeClass('fa fa-eye-slash');
        $('#show').addClass('fa fa-eye');
    }
   });
} 

***************************/ /** Artarnative work ***/
/************************** show password system ***************************/
function show_pass(){
    var count = 0;
    
   $("#eye").on('click',function(){
     var num = count++;

     if(num % 2 == 0){
        $('#password').attr('type','text');
        $('#show').removeClass('fa fa-eye');
        $('#show').addClass('fa fa-eye-slash');
     }else{
        $('#password').attr('type','password');
        $('#show').removeClass('fa fa-eye-slash');
        $('#show').addClass('fa fa-eye');
     }
     
   });
}
/**************************end here **************************************************/


/************************** Auto Complete Data from Database with ajax ***********************/
function autocomplete(){
   $("#search").on('input',function(){
     var value = $(this).val();
     $('#search-status').slideUp('fast');
     if(value.length > 0){
        $.ajax({
            url:'autocomplete.php',
            method : 'post',
            data:{Value:value},
            dataType : 'text',
            success :function(data){
              $('#search-status').html(data);
              $('#search-status').slideDown('slow');
            }
        });
            $(document).on('mouseover','li',function(){
            var data = $(this).text();
            $('#search').val(data);
          });
            $(document).on('click','li',function(){
            $('#search-status').slideUp('fast');
          });
      }
   });
}
/********************end here **************************************************/

/******************************Data deleted *********************************/

function delete_data() {
   $(document).on('click','#delete',function(){
      if(confirm("Are You sure!")){
      var id = $(this).data('myvalue');
      var element = this;
      $.ajax({
        url : 'delete.php',
        method : 'Post',
        data : {Id:id},
        success:function(data){
          if(data == 1){
            $(element).closest("tr").fadeOut('fast');
            var x = $('#deleted').html("<center>Data successfully Deleted!</center>");
            $(x).addClass("alert alert-danger");
            setInterval(function(){
              $(x).slideUp('slow');
            },3000);
          }
        }
      });
     }

   });
}

/*************** Live search in table ************************/
 function liveSearch(){
   $('#search').on('input',function(){
     var value = $(this).val();
     if(value !== ""){
      $.ajax({
       url : 'show-table.php',
       method : 'post',
       data : {Value : value},
       success : function(data){
         $('#table').html(data).fadeIn('slow');
       }
     });
     }else{    
      $('#table').show('fast').fadeIn('slow');
     }
   });
 }

/********** Data update *******************/
function data_update(){

  $('#edit').on('click',function(){
    var value = $(this).data('upvalue');
    var edit_data = this ;
    $.ajax({
      url:'data_update.php',
      method:'post',
      data:{Value:value},
      success:function(data){
        $('#form-id').html(data);
      }
    }); /** ajax end here **/
  });
  
  $('#save-changes').on('click',function(){
      var values = $(edit_data).data('upvalue');
      alert(values);
      return false;
      var username = $('#up-username').val();
      var email = $('#up-email').val();
      var password = $('#up-password').val();
      if (username != "" || email != "" || password != ""){
      $.ajax({
      url:'data_update.php',
      method:'post',
      data:{Username:username,Email:email,Password:password,Value:values},
        success:function(data){
          if(data === 1){
          $('#exampleModal').modal('hide');
          $('#success').html("<center> Data successfully Inserted! <center>");
          $('#success').addClass("alert alert-success");
          setInterval(function(){
            $('#success').slideUp('slow');
          },3000);
          }
      }
    }); /** Ajax end here **/
      }
  });
}
