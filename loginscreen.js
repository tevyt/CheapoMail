window.onload = function () {
    var username = $("username");
    var password = $("password");
    var login = $("loginButton");
    login.onclick = userlogin;
    
	function userlogin() {
    	 	
    		var userName = $('username').value;
		var password = $("password").value;
    		new Ajax.Request('loginscreen.php',{
        	method: 'post',
        	parameters: {username: userName , password: password  },
		onSuccess: loginUser,
		onFailure: failureFunction});
    		
	}

	function loginUser(response){
		if( response.status == 200){
			$('login').innerHTML = response.responseText;
        	}
		
	}

	function failureFunction(response){
		console.log(response.responseText); 
		$('error').innerHTML = response.responseText;
	}
};
