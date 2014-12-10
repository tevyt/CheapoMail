window.onload = function(){
    var arr = $$(".mail1");
    for (var i = 0; i<arr.length; i++){
        arr[i].onclick = function(){
            $("inlay").style.display = "none";
            $("email").className = "";
            new Ajax.Request('emails.php',{
        	method: 'get',
        	parameters: {id: this.id },
		    onSuccess: displayMessage,
		    onFailure: failureFunction});
        };
    }
    var inbox = $("inbox");
    inbox.onclick = function(){
        $("email").style.display = "none";
        $("inlay").style.display = "block";
        inbox.className = "tab1";
    }
    
    function displayMessage(response){
        $("email").innerHTML = response.responseText;
    }
    
    function failureFunction(response){
        alert("server error");
    }

	composeButton = $("compose");
	composeButton.onclick = function(){
        $("inlay").style.display = "none";
        $("com").className = "";
	};
   
        
	
};
