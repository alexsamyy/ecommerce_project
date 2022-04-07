<?php
    $db_username = 'root';
    $db_password = '';
    $db_name     = 'fonemarket';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');
    mysqli_query($db, "SET NAMES utf8");
        
?>