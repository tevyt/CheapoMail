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
        <title>Inbox <?php echo $_SESSION["username"]?></title>
        <link rel="stylesheet" type="text/css" href="homescreen.css"/>
        <script src = "homescreen.js" type="text/javascript"></script>
	    <script src = "prototype.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="main">
            <img src="logo.gif">
            <br>
            <div id="title"><span class="admin"><?php echo $_SESSION["first_name"]. " " .$_SESSION["last_name"]?></span>
                <div class="logout">
                    <a href="logout.php">Logout</a>
                </div>
            </div>
            <br>
            <div id="admin">
                <div class="tab1" id="inbox">Inbox</div>
                <div class = "tab" id="compose">Compose</div>
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
                        $message = $row["id"];
                        $q2 = "SELECT *FROM message_read WHERE message_id = '$message'";
                        $readMessages = mysql_query($q2);
                       
                    if(mysql_num_rows($readMessages) == 0){
                        ?>
                        <div class = "info">
                            <button class="mail1" id="<?php echo $row['id']?>" > </button>
                            <div class="mail" class="unread" id = "sent" style="font-weight:bold"><?php echo $sender?></div>
                            <div class="mail" class="unread" id = "sub" style="font-weight:bold"><?php echo $row["subject"]?></div>
                        </div> 
                    <?php
                    }
                    else{
                        ?>
                        <div class = "info">
                            <button class="mail1" id="<?php echo $row['id']?>" > </button>
                            <div class="mail" class="read" id = "sent" style="font-weight:normal"><?php echo $sender?></div>
                            <div class="mail" class="read" id = "sub" style="font-weight:normal"><?php echo $row["subject"]?></div>
                        </div> 
                        <?php
                        
                    }
          
                }
            ?>     
                </div>
            </div>
            <div id="email" class="hide"></div> <!--When email is clicked class hide will be removed from this and added to inlay and compose box-->
            <div id="com" class="hide">New Message <!--When "Compose" is clicked the class hide will be removed from this and added to inlay and email-->
                <form id="composeform" method="get" action="compose.php">
                <label>To: </label>
                <select name="recipient" id="recipient">
                <?php
                    $members = "SELECT UserName, id FROM user";
                    $memberarray = mysql_query($members);
                    while ($member= mysql_fetch_array($memberarray)){
                        $recipient= $member["UserName"];
                        echo "<option value=\"$recipient\">
                        $recipient
                        </option>";
                    }
                ?>
                </select>
                <br>
                <label id="subject">Subject: </label><input id="subjectbox" type="text" name="subject"/>
                <textarea cols="60" rows="14" name = "message"></textarea>
                <input id="send" type="submit" value="Send">
                </form>
            </div>
        </div>
    </body>
</html>