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
    
        <?php
        if(isset($_POST['submit'])){
            $pattern = '/^(abc)+$/';
            $subject = $_POST['msg'];
            if(preg_match($pattern, $subject)){
                echo "TRUE";
            } else {
                echo "FALSE";
                
            }
                
        }
        ?>
    </body>
</html>
