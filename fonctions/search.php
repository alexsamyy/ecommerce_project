<header>
  <?php
    session_start();
    // connexion à la base de données
    require_once "../composants/db.php";
?>

  <?php

$search = $_GET['Rechercher'];

print_r($_GET);

$sql = "SELECT * FROM smartphone WHERE SOUNDEX(NOM) = SOUNDEX(' . $search .')";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);

header('location: ../pages/produit_name.php?name='. $search);
?>
