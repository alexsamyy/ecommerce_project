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
            
            <a href='principale.php?deconnexion=true'><span>Déconnexion</span></a>
            
            <!-- tester si l'utilisateur est connecté -->
            <?php
                if(isset($_GET['deconnexion']))
                { 
                   if($_GET['deconnexion']==true)
                   {  
                      session_unset();
                      header("location:../pages/login.php");
                   }
                }
                else if($_SESSION['iduser'] !== ""){
                    $user = $_SESSION['iduser'];
                    // afficher un message
                    echo "<br>Bonjour $user, vous êtes connectés";
                }
            ?>
            
        </div>
    </body>
</html>