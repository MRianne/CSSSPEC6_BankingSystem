if($('#accountnum').length > 0){

  $("#accountnum" ).focusout(function(){
      if(!$("#accountnum" ).val()) {
            $("#accountnum").val("account number");
      }
  });

  $("#accountnum" ).focus(function() {
    if($("#accountnum").val() == "account number"){
      $("#accountnum").val("");
    }
  });
}

if($('#pass').length > 0){
  $( "#pass" ).focusout(function() {
    if(!$("#pass" ).val()) {
          $("#pass").val("password");
    }
  });
  $( "#pass" ).focus(function() {
    if($("#pass").val() == "password"){
      $("#pass").val("");
    }
  });
}