<?php
require_once "db.php";
?>

<?php
session_start();

include "header.php";


$message ="";
if (isset($_SESSION['iduser']) == true) {   
    $sql = "SELECT 'PRENOM' FROM 'utilisateur' WHERE ID_UTILISATEUR = 'iduser'";
    $result = mysqli_query($db,$sql);
    // afficher un message
    echo($message. "Bonjour," . $result . "<br>" . "Vous êtes bien connecté !");
}
?>
<html>
    <head>
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
</html>

<?php
    include "footer.php";
    ?>