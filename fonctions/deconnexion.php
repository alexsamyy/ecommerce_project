<?php
     session_start();
?>
<html>
    <head>
        <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="../style/style.css" media="screen" type="text/css" />
    </head>
    <body style='background:#fff;'>
        <div id="content">
            
            <!-- tester si l'utilisateur est connecté -->
            <?php

        
            session_destroy();
            unset($_SESSION['user']);
            header('location:../pages/login.php');
        
        
      ?>
            
        </div>
    </body>
</html>