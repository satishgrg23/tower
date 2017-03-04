//Check if two password input field matach or not
$(document).ready(function() {
  $("#password1").keyup(validate);
});


function validate() {
  var password = $("#password").val();
  var password1 = $("#password1").val();

    if(password == password1) {
       $("#validate-status").text("Password matched");    
       document.getElementById("validate-status").style.color = "green";    
       return true;
    }
    else {
        $("#validate-status").text("Password do not match");
        document.getElementById("validate-status").style.color = "red";
        return false;  
    }
    
}

function validateMsg(){
  var password = $("#password").val();
  var password1 = $("#password1").val();

  if (password == password1) {
    return true;
  }else{
    alert("Passwords didn't match");
    return false;
  }

}