<header>
<?php
    $title = "Favoris";
    session_start();
    include "../composants/header.php";
    include "../composants/main.php";
    // connexion à la base de données
    require_once "../composants/db.php";
?>
</header>

<body>

<?php
if (isset($_SESSION['iduser']) == true) {
    $user = $_SESSION['iduser'];

$requete_ID_smartphone = "SELECT f.ID_SMARTPHONE FROM favoris f WHERE f.ID_UTILISATEUR =" . $user;
$ID_smartphone = mysqli_query($db, $requete_ID_smartphone);
$requete_info_smartphone = "SELECT * FROM smartphone WHERE ID =" . $ID_smartphone;
$result = mysqli_query($db, $requete_info_smartphone);

while ($row = mysqli_fetch_array($result)){
    ?>
  <!-- GRID ENFANT -->
  <div class="grid_in">
    <br>
    <div>
      <!-- IMAGE -->
      <a href="http://localhost/FoneMarket/pages/page_produit.php?id=<?=$row["ID"];?>">
        <div class="img_place">
          <img class="img" src="<?= $row["PHOTO"]; ?>">
        </div>
      </a>
      <br>
      <br>
      <!-- INFORMATION PRODUIT -->
      <div class="info_product">
        <h4 class="nom"><?=$row["NOM"];?></h4>
        <p class="description"><?= substr($row["DESCRIPTION"], 0, 110);
        if (strlen($row["DESCRIPTION"]) > 110){?>
          <span>...</span>
          <a class="see_more" href="http://localhost/FoneMarket/pages/page_produit.php?id=<?=$row["ID"];?>">Voir
            plus</a>
          <?php
        } 
        ?>
        </p>

        <h6 class="prix"><?= $row["PRIX"];?> €</h6>
      </div>

    </div>
  </div>
  <?php
}
?>
</div>
?>

</body>

<footer>
<?php
    include "../composants/footer.php";
?>
</footer>