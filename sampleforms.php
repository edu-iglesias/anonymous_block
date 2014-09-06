<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        Enter some string: <input type="text" name="msg" />
        <input type="submit" name="submit" value="send">
        
        </form>
        
        <a href="<?php echo $_SERVER['PHP_SELF']."?msg=Happy" ?>">
        click me
        </a>
        <?php
            echo "<br/>POST<br/>";
            echo "<pre>";
            print_r($_POST);
            echo "</pre>";
            
            echo "GET<br/>";
            echo "<pre>";
            print_r($_GET);
            echo "</pre>";
            
            echo "REQUEST<br/>";
            echo "<pre>";
            print_r($_REQUEST);
            echo "</pre>";
        
            if(isset($_POST['submit'])){
                echo $_POST['msg'];
                
            }
        
//            echo "<pre>";
//            print_r($_SERVER);
//            echo "</pre>";
        ?>
    </body>
</html>
