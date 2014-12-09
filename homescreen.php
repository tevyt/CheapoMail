<?php
session_start();
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
            <div id="title"><span class="admin"><?php echo $_SESSION["first_name"]. " " .$_SESSION["last_name"]?></span></div>
            <div id="admin"><span class="admin"><a href="logout.php">Logout</a></span>
                <div id="compose">Compose</div>
            </div>
            <div id="inlay">inlay <!--This div's default is to be visible until either compose or an email are clicked-->
                <div class="email">1
                    <div class="info">a</div>
                    <div class="info">b</div>
                    <div class="info">c</div>
                </div>
            </div>
            <div id="email" class="hide">email</div> <!--When email is clicked class hide will be removed from this and added to inlay and compose box-->
            <div id="com" class="hide">New Message <!--When "Compose" is clicked the class hide will be removed from this and added to inlay and email-->
                <form id="composeform">
                    <input id="recipient" type="text" name="recipient" value="To: "/>
                    <textarea cols="65" rows="17"></textarea>
                    <input id="send" type="submit" value="Send">
                </form>
            </div>
        </div>
    </body>
</html>
