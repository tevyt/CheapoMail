<?php
    $dbhost = "localhost";
    $dbname = "cheapomail";
    $dbuser = "webuser";
    $dbpassword = "password";
    $connection = new PDO("mysql:host=$dbhost;dbname=$dbname" ,$dbuser,$dbpassword);
$firstName = $_POST["firstname"];
$lastName = $_POST["lastname"];
$password = $_POST["password"];
$username = $_POST["username"];
$insertQuery = "INSERT INTO User (FirstName , LastName, 
Password , Username) VALUES (:FirstName,:LastName,:Password,:Username)";
$query = $connection->prepare($insertQuery);
$query->execute(array(':FirstName'=>$firstName, ':LastName'=>$lastName, ':Password'=>$password,':Username'=>$username));
header("Location: index.html");
exit;
?>

 
