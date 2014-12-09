<?php
session_start();
$dbhost = "localhost";
$dbname = "cheapomail";
$dbuser = "webuser";
$dbpassword = "password";
$connection =  mysql_connect($dbhost,$dbuser,$dbpassword);
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "SELECT * FROM User WHERE UserName = '$username' AND Password = '$password'";
$database = mysql_select_db($dbname,$connection);
session_start();
$rows = mysql_query($sql);
if(mysql_num_rows($rows) == 0){
	echo "<p>Invalid username or password</p>";
}
else{
	while($row = mysql_fetch_array($rows)){
		$_SESSION["id"] = $row["id"];
		$_SESSION["first_name"] = $row["FirstName"];
		$_SESSION["last_name"] = $row["LastName"];
		$_SESSION["username"]= $row["UserName"];
		$_SESSION["password"] = $row["Password"];
		header("Location: homescreen.php");
	}
}



?>




