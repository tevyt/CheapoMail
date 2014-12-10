<?php
session_start();
    $dbhost = "localhost";
    $dbname = "cheapomail";
    $dbuser = "webuser";
    $dbpassword = "password";
    $connection = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpassword);
$Recipient = $_GET["recipient"];
$q1 = "SELECT id FROM user WHERE UserName='$Recipient'";
$rows = $connection->query($q1);
$rec_id = 0;
foreach($rows as $row){
    $rec_id = $row["id"];
}
$Subject = $_GET["subject"];
$Message = $_GET["message"];
$insert = "INSERT INTO message (body, subject, user_id, recipient_ids) VALUES (:Message,:Subject,:User,:Recipient)";
$q = $connection->prepare($insert);
$q->execute(array(':Message'=>$Message, ':Subject'=>$Subject, ':User'=>$_SESSION["id"], ':Recipient'=>$rec_id));
header("Location: homescreen.php");
exit;
?>