<?php session_start() ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        
        <?php
            if(isset($_SESSION['accessgranted'])){
        
                echo '<h1>Home</h1>';
                echo "Welcome ".$_SESSION['name'];
                echo '<br/><a href="logoutpage.php">Logout</a>';
            } else {
                
                header("Location: loginpage.php");
            }
            
        ?>
    </body>
</html>
