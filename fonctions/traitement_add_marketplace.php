<head>
    <?php
    ob_start();
    session_start();
    // connexion à la base de données
    require_once "../composants/db.php";
    ?>
</head>

<?php

$file = $_FILES["name"];
$newFileName = null;
// On récupère toutes les infos du fichier ($_FILES["name..."]) qu'on a mis dans $file
$fileName = $file['name'];
$fileTmpName = $file['tmp_name'];
$fileSize = $file['size'];
$fileError = $file['error'];
$fileType = $file['type'];
// On récupère l'extension du fichier
$fileExt = explode('.', $fileName);
// On met l'extension en miniscule au cas où elle ne le serait pas.
// "end" permet de récupérer la dernière chaîne d'un tableau
$fileActualExt = strtolower(end($fileExt));
// Ici on vérifie différentes données notamment la taille, s'il y a une erreur, ou bien si l'extension n'est pas autorisée
$allowed = array('jpg', 'jpeg', 'png');
if (in_array($fileActualExt, $allowed) == false) {
  echo "L'extension du fichier n'est pas autorisée !";
  header("Refresh:5; url=http://localhost/pages/add_marketplace.php", true, 303);
}

if ($fileSize > 1000000) {
  echo "Votre fichier est trop volumineux !";
  header("Refresh:5; url=http://localhost/pages/add_marketplace.php", true, 303);
}

// On le déplace à cet endroit
$destinationname = "../media/produit/" . $fileName;
move_uploaded_file($fileTmpName, $destinationname);


if ($_GET["admin"] == 'false'){
  $neuf = $_POST["neuf"];
}else{
  $neuf = $_POST["neuf"];
}  

$nom = $_POST["nom"];
$desc = $_POST["description"];
$prix = $_POST["prix"];
$systeme = $_POST["systeme_d_exploitation"];
$stockage =  $_POST["stockage"];
$reseau = $_POST["reseau"];
$nombre_sim = $_POST['dual_sim'];
$app_photo = $_POST["app_photo"];
$taille_ecran = $_POST["taille_ecran"];
$marque = $_POST["marque"];
$couleur = $_POST["couleur"];



$sql = "insert into smartphone values(NULL, $neuf, '$destinationname', '$desc', $prix, '$nom', '$systeme', $stockage , '$reseau',"
. "$nombre_sim, $app_photo, $taille_ecran, $marque, $couleur)" ;

echo $sql;

$sql = mysqli_query($db, $sql);

if ($_GET["admin"] == true){
  header('Location: http://localhost/FoneMarket/pages/admin_product.php');
}else{
  header('Location: http://localhost/FoneMarket/pages/home.php');
} 

?>