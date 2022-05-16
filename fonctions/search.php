<header>
  <?php
    session_start();
    // connexion à la base de données
    require_once "../composants/db.php";
?>

  <?php

$search = $_GET['Rechercher'];

$sql = "SELECT * FROM smartphone WHERE SOUNDEX(NOM) = SOUNDEX(' . $search .')";
$result = mysqli_query($db, $sql);
while ($row = mysqli_fetch_array($result)){
  $id = $row["ID"];
  $photo = $row["PHOTO"];
  $nom = $row["NOM"];
  $prix = $row["PRIX"];
}
?>

<a href="http://localhost/FoneMarket/pages/page_produit.php?id=<?=$row["ID"];?>"><img class="img" src="<?= $row["PHOTO"]; ?>">
<?php echo $nom ?>
<?php echo $prix ?></a>

