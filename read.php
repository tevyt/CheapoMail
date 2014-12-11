<?php
$dbname = "cheapomail";
$dbhost = "localhost";
$dbuser = "webuser";
$dbpass = "password";
$connection =  mysql_connect($dbhost,$dbuser,$dbpass);
$database = mysql_select_db($dbname,$connection);
$id = $_GET["id"];
$q = "SELECT * FROM message_read WHERE message_id = '$id'";
$rows = mysql_query($q);
if((mysql_num_rows($rows) != 0)){
    echo $id;
}
?>