<?php
$dbname = "cheapomail";
$dbhost = "localhost";
$dbuser = "webuser";
$dbpass = "password";
$connection =  mysql_connect($dbhost,$dbuser,$dbpass);
$database = mysql_select_db($dbname,$connection);
$id = $_GET["id"];
$q = "SELECT * FROM message WHERE id = '$id' ";
$rows = mysql_query($q);
$sender = 0;
$name = "";

while($row = mysql_fetch_array($rows)){
   $sender = $row["user_id"];
   $subject = $row["subject"];
   $body = $row["body"];
}
$query = "SELECT * FROM user WHERE id = '$sender' ";
$values = mysql_query($query);
while($value = mysql_fetch_array($values)){
  $name = $value["FirstName"] . " " . $value["LastName"];
}


echo"<h1>$subject</h1>
     <p>$name</p>
     <p>$body</p>";
     

exit;
?>