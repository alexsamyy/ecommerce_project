<?php
include("../composants/db.php");
?>

<?php

if (isset($_POST['upload'])) {

  $photo = $_FILES['file']['name'];
  $target_dir = "upload/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);
}
$photo = $GET["photo"];
$nom = $_GET["nom"];
$desc = $_GET["description"];
$prix = $_GET["prix"];
$systeme = $_GET["systeme_d_exploitation"];
$stockage =  $_GET["stockage"];
$reseau = $_GET["reseau"];
$double_sim = $_GET["double_sim"];
$app_photo = $_GET["app_photo"];
$taille_ecran = $_GET["taille_ecran"];

$sql = "insert into smartphone " .
  "values(NULL, '" . $photo . "','" . $desc . "','" . $prix .
  "','" . $nom .  "','" . $systeme . "','" . $stockage . "','" . $reseau  .
   "','" . $sim  . "','" . $app_photo  . "','" . $ecran . "')";

$sql = mysqli_query($db, $sql);

// Vérifie la connexion 
if (!$sql) { 
  die("Échec de la connexion : " . mysqli_connect_error()); 
}


header('location: ../pages/home.php');

?>