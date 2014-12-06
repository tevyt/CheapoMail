window.onload = function () {
    var username = $("username");
    var password = $("password");
    var login = $("login");
    login.onclick = userlogin;
    
function userlogin() {
    if (username.value.length!==0 && password.value.length!==0) {
    var f = document.forms.loginform;
    f.submit();
    }
    else {
        alert("incomplete form");
    }
}
};