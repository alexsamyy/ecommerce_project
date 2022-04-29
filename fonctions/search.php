<header>
  <?php
    session_start();
    // connexion à la base de données
    require_once "../composants/db.php";
?>

  <?php

$search = $_GET['Rechercher'];

$sql = "SELECT * FROM smartphone WHERE NOM like'" . $search . "%'";
$result = mysqli_query($mysqli, $sql);


while ($row = mysqli_fetch_array($result)){
    $id = $row["ID"];
?>

  <div class="fidget">

    <a href="http://localhost/FoneMarket/pages/page_produit.php?id=<?=$row["ID"];?>" ">
      <h1>Produit : <?php echo $row['NOM']; ?></h1>
    </a>

    <?php echo $row['Quantite']; ?> <br />
    <?php echo $row['Prix']; ?> <br />
    <?php echo $row['Provenance']; ?> <br />
    <?php echo $row['Conservation']; ?> <br />
    <?php echo $row['Description']; ?> <br />
    <?php
}
?>
  </div>

<?php
  $recher = $_POST['mot'];

  $sql = "SELECT * FROM smartphone WHERE Nom LIKE'" . $recher . "%'";
  $result = mysqli_query($mysqli, $sql);


  while ($row = mysqli_fetch_array($result)){
  $img = $row["PHOTO"];
  $nom = $row["NOM"];
  $price = $row['PRIX']
  ?>
  <a href="http://localhost/FoneMarket/pages/page_produit.php?id=<?=$row["ID"];?>">
    <?php echo "<img style='height: 50px; width: 50px ' src='$img'/>"; ?>
    <?php echo $nom ?>
    <?php echo $price ?>
  </a>

  <br>

  <?php
}
?>
</header>