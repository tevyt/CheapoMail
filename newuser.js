function validatePassword(){
    var errorMessage = $("passwordError");
    var password = this.value;
    if(!/\d+/.test(password)){
       errorMessage.innerHTML = "Password must contain at least one digit";
                return false;
    }
    else{
        errorMessage.innerHTML = "";
    }
    
    if(!/[a-z]/.test(password)){
        errorMessage.innerHTML = "password must contain one lower case letter";
        
        return false;
    }
    else{
        errorMessage.innerHTML = "";
    }
    
    if(!/[A-Z]/.test(password)){
        errorMessage.innerHTML = "password must contain one upper case letter";
      
        return false;
    }
    else{
        errorMessage.innerHTML = "";
    }
    
    if(!/.{8,}/.test(password)){
        errorMessage.innerHTML = "password must contain must be at least 8 characters long";
        return false;
    }
    else{
        errorMessage.innerHTML = "";
    }
    return true;
    
}
window.onload = function () { 
   var passwordField = $("password");
   passwordField.onblur = validatePassword;
};

function validate(){
   var passwordField = $("password");
   passwordField.onblur = validatePassword;
   var valid = passwordField.onblur();
   if(valid){
       alert("New User added");
   }
   return valid;
}
