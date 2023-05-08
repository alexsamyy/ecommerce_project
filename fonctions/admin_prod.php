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

var_dump($_POST);
$neuf = $_POST["neuf"];
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

$sql = "UPDATE `smartphone` SET `NEUF`= $neuf,
`DESCRIPTION`= '". trim(addslashes($desc))."',`PRIX`= $prix,`NOM`='".
trim(addslashes($nom)) ."',`SYSTEME_D_EXPLOITATION`='". preg_replace('/[^A-Za-z0-9\-]/', '',addslashes($systeme)) ."',
`STOCKAGE`= $stockage,`RESEAU`='". preg_replace('/[^A-Za-z0-9\-]/', '',addslashes($reseau)) ."',`DOUBLE_SIM`= $nombre_sim,`APP_PHOTO`= $app_photo,
`TAILLE_ECRAN`= $taille_ecran,`ID_MARQUE`= $marque,`ID_COULEUR`= $couleur WHERE ID = ". preg_replace('/[^A-Za-z0-9\-]/', '', addslashes($id_this_product));

echo $sql;

$sql = mysqli_query($db, $sql);

header('Location: /FoneMarket/pages/admin_product.php');
?>