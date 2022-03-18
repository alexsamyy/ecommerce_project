<?php
session_start();
$message ="";
if (isset($_SESSION['iduser']) == true) {
    $user = $_SESSION['iduser'];
    $message=  "<h1> iduser =" . $user . "</h1>";
    // afficher un message
    $message.=  "Bonjour, vous êtes connecté";
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
    <body style='background:#fff;'>
    <h1>page d'accueil</h1>
        <div id="content">
            <!-- tester si l'utilisateur est connecté -->
        <?= $message; ?>
            <a href="verification_login.php?logout=true">deconnexion</a>            
        </div>
    </body>
</html>