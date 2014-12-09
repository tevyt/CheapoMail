<?php
$dbhost = "localhost";
$dbname = "cheapomail";
$dbuser = "webuser";
$dbpassword = "password";
$connection = mysql_connect($dbhost,$dbuser,$dbpassword);
$database = mysql_select_db($dbname,$connection);
if ($database) {
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (strlen($username)!=0 && strlen($password)!=0) {
        echo "User Not Found"
        $getuser = mysql_query("SELECT * FROM user WHERE UserName LIKE '%$username%' AND Password LIKE '%$password%';");
        if ($getuser){
            while($row = mysql_fetch_array($getuser)) {
                $_SESSION['login_user']=$username;
                header("Location: homescreen.html");
            }
        }
    }
    else {
        echo "Username or password not entered";
    }
}
else {
    echo "Database error";
}
?>