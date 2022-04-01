<?php
require_once "db.php";
?>

<?php

echo "sutfbzutfiqsufoqsiufypqisu";

    $prenom = $_GET["prenom"];
    $nom = $_GET["nom"];
    $date_naissance = $_GET["date_naissance"];
    $mail = $_GET["mail"];
    $mdp =  $_GET["mdb"];
    $role= $_GET["role"];


echo $role;
die();

     $sql = "insert into utilisateurs " . 
     "values(NULL, '" . $role. "','" . $prenom . "'," . $nom . 
     ",'" . $mail .  "','" . $date_naissance . "','" . $mdp . "')";

     mysqli_query($db, $sql);


     header("Location: /ecommerce_project/index.php"); 
     ?>