<?php
require_once "db.php";
session_start();
?>



<?php

$message = "";
if (isset($_SESSION['iduser']) == true) {
    $user = $_SESSION['iduser'];
    $sql = "SELECT * FROM utilisateur WHERE ID_UTILISATEUR = " . $user;
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);

    $row["nom"];


    // afficher un message
    echo ($message . "Bonjour," . $row . "<br>" . "Vous êtes bien connecté !");
}
?>
<html>

<head>
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="" media="screen" type="text/css" />
</head>

</html>


