<?php
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'everlasting';
    mysql_connect($server, $username, $password) or
        die(mysql_error());
    
    mysql_select_db($database)  or
        die(mysql_error());

    
    
?>