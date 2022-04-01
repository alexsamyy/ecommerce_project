<?php
require_once "db.php";
?>

<?php



    $prenom = $_GET["prenom"];
    $nom = $_GET["nom"];
    $date_naissance = $_GET["date_naissance"];
    $mail = $_GET["mail"];
    $mdp =  $_GET["password"];
    $role= $_GET["role"];

     $sql = "insert into utilisateur " . 
     "values(NULL, '" . $role. "','" . $prenom . "','" . $nom . 
     "','" . $mail .  "','" . $date_naissance . "','" . $mdp . "')";
    
    mysqli_query($db, $sql);

    header('location: home.php');

     ?>

