if($('#accountnum').length > 0){

  $("#accountnum" ).focusout(function(){
      if(!$("#accountnum" ).val()) {
            $("#accountnum").val("Account Number");
      }
  });

  $("#accountnum" ).focus(function() {
    if($("#accountnum").val() == "Account Number"){
      $("#accountnum").val("");
    }
  });
}

if($('#password').length > 0){
  $( "#password" ).focusout(function() {
    if(!$("#password" ).val()) {
          $("#password").val("password");
    }
  });
  $( "#password" ).focus(function() {
    if($("#password").val() == "password"){
      $("#password").val("");
    }
  });
}