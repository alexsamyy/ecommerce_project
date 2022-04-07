<?php
include("../composants/db.php");
?>

<?php

if(isset($_POST['upload'])){
 
  $photo = $_FILES['file']['name'];
  $target_dir = "upload/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);
}

    $nom = $_GET["nom"];
    $desc = $_GET["description"];
    $prix = $_GET["prix"];
    $systeme = $_GET["systform"];
    $stockage =  $_GET["stockageform"];
    $reseau = $_GET["resform"];
    $sim = $_GET["simform"];
    $app_photo = $_GET["app_photo"];
    $ecran = $_GET["taille_ecran"];

     $sql = "insert into smartphone " . 
     "values(NULL, '" . $photo . "','" . $desc . "','" . $prix . 
     "','" . $nom .  "','" . $systeme . "','" . $stockage . "','" . $reseau  . "','" . $sim  . "','" . $app_photo  . "','" . $ecran . "')";
    
    mysqli_query($db, $sql);

    header('location: ../pages/home.php');

    ?>