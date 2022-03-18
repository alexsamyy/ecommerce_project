<?php
require_once "db.php";
?>

<?php
    $nom = $_GET["nom"];
    $pwd = $_GET["pwd"];
    $taille = $_GET["taille"];
    $prenom = $_GET["prenom"];
    $nf =  $_GET["nf"];
    $adresse =  $_GET["adresse"];
    $CP =  $_GET["CP"];
    $ville =  $_GET["ville"];
    $sexe =  $_GET["sexe"];


    $sql = "insert into utilisateurs " . 
     "values(NULL, '" . $nom . "','" . $pwd . "'," . $taille . 
     ",'" . $prenom .  "','" . $nf . "','" . $adresse . "','" . $CP . "','" 
     . $ville . "','" . $sexe . "')";

     mysqli_query($mysqli, $sql);


     header("Location: /ariane/index.htm");

     ?>