<header>
  <?php
  session_start();
  // connexion à la base de données
  require_once "../composants/db.php";
  ?>

  <?php

  $search = $_GET['Rechercher'];

  $sql = "SELECT * FROM smartphone WHERE NOM LIKE '%$search%'";
  $result = mysqli_query($db, $sql);

  while ($row = mysqli_fetch_array($result)) {
    $photo = $row["PHOTO"];
    $nom = $row["NOM"];
    $stockage = $row["STOCKAGE"];
    $prix = $row["PRIX"];
  ?>

    <a href="/FoneMarket/pages/page_produit.php?id=<?= $row["ID"] ?>">
      <?php echo "<img style='height: 100px; width: 100px;' src='$photo'/>" ?>
      <?php echo "<span style='color:black'>$nom | </span>"?>
      <?php echo "<span style='color:black'>$stockage Go | </span>"?>
      <?php echo "<span style='color:black'>$prix €</span>"?>
    </a>
    <br><br>
  <?php
  }
  ?>