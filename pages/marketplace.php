<header>
<?php
    $title = "Marketplace";
    session_start();
    include "../composants/header.php";
    include "../composants/main.php";
    // connexion à la base de données
    require_once "../composants/db.php";
?>
</header>

<div class="title_page">
  <h1 class="title">Marketplace</h1>
</div>

<?php
$sql = "SELECT * FROM smartphone WHERE NEUF = false";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result);
if ($row == 0){
    ?><h2 style="text-align:center;">Aucun produit en vente &#128532<h2><?php	
}
else{
    ?>

<!-- PHP RETRIEVE PRODUCTS IN DATABASE -->
<div class="grid">
  <!-- GRID PARENT -->
  <?php
$requete = "SELECT * FROM smartphone WHERE NEUF = false";
$result = mysqli_query($db,$requete);
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
}}
?>
</div>

<!-- PHP RETRIEVE PRODUCTS IN DATABASE -->

<footer>
<?php
    include "../composants/footer.php";
?>
</footer>