<head>
    <?php
    ob_start();
    session_start();
    // connexion à la base de données
    require_once "../composants/db.php";
    ?>
</head>

<?php
$id_this_product = $_GET["id"];

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

$sql = "UPDATE `smartphone` SET
`DESCRIPTION`= '".$desc."',`PRIX`= $prix,`NOM`='".$nom."',`SYSTEME_D_EXPLOITATION`='".$systeme."',
`STOCKAGE`= $stockage,`RESEAU`='".$reseau."',`DOUBLE_SIM`= $nombre_sim,`APP_PHOTO`= $app_photo,
`TAILLE_ECRAN`= $taille_ecran,`ID_MARQUE`= $marque,`ID_COULEUR`= $couleur WHERE ID = $id_this_product" ;

echo $sql;

$sql = mysqli_query($db, $sql);

header('Location: http://localhost/FoneMarket/pages/admin_product.php');
?>