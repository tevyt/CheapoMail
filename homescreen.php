<?php
session_start();
$dbname = "cheapomail";
$dbhost = "localhost";
$dbuser = "webuser";
$dbpass = "password";
$connection =  mysql_connect($dbhost,$dbuser,$dbpass);
$id = $_SESSION["id"];
$q = "SELECT * FROM message WHERE recipient_ids = '$id' ORDER BY id DESC LIMIT 10";




$database = mysql_select_db($dbname,$connection);
$rows = mysql_query($q);


?>
<html>
    <head>
        <title>Inbox ...</title>
        <link rel="stylesheet" type="text/css" href="homescreen.css"/>
	<script src = "homescreen.js" type="text/javascript"></script>
	<script src = "prototype.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="main"> <span id="cheap">CheapoMail</span>
            <div id="title"><span class="admin"><?php echo $_SESSION["first_name"]. " " .$_SESSION["last_name"]?></span></div><br>
            <div id="admin">
                <div class="tab" class="admin"><a href="logout.php">Logout</a></div>
                <div class = "tab" id="compose">Compose</div>
                <div class="tab" id="inbox">Inbox</div>
            </div>
            <br>
            <div id="inlay"> <!--This div's default is to be visible until either compose or an email are clicked-->
                <div class="email" class = "hide">
           <?php
                while($row = mysql_fetch_array($rows)){
                    $user = $row['user_id'];
                    $senderQuery = "SELECT * FROM user WHERE id = '$user'";
                    $values = mysql_query($senderQuery);
                    $sender = "";
                    while($value = mysql_fetch_array($values)){
                      $sender = $value["FirstName"]." ".$value["LastName"];


                    }
             ?>
                    <div class = "info">
                        <div class="mail" id = "sent"><?php echo $sender?></div>
                        <div class="mail" id = "sub"><?php echo $row["subject"]?></div>
                        <button class="mail1" id="<?php echo $row['id']?>" >Read</button>
                    </div> 
            <?php
                }
            ?>
                   
            </div>
            </div>
            <div id="email" class="hide">
            </div> <!--When email is clicked class hide will be removed from this and added to inlay and compose box-->
            <div id="com" class="hide">New Message <!--When "Compose" is clicked the class hide will be removed from this and added to inlay and email-->
                <form id="composeform" method="get" action="compose.php">
                    <label>To: </label><input id="recipient" type="text" name="recipient"/> <br>
                    <label>Subject: </label><input id="subject" type="text" name="subject"/>
                    <textarea cols="60" rows="14" name = "message"></textarea>
                    <input id="send" type="submit" value="Send">
                </form>
            </div>
        </div>
    </body>
</html>
