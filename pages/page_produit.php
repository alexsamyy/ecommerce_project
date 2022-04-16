<header>
  <?php
    session_start();
    include "../composants/header.php";
    // connexion à la base de données
    require_once "../composants/db.php";
?>
  <title>PRODUIT</title>
</header>

<body>

  <!-- PHP RETRIEVE PRODUCTS IN DATABASE -->
  <?php

$id_this_product = $_GET['id'];

//MYSQL SELECT INFORMATION TABLE SMARTPHONE ONLY
$requete_info =  "SELECT * FROM smartphone WHERE $id_this_product = ID";
$info = mysqli_query($db,$requete_info);  
$row = mysqli_fetch_array($info);

//MYSQL SELECT COLOUR INFORMATION TABLE COULEUR ONLY
$ID_COL = $row["ID_COULEUR"];
$requete_couleur = "SELECT c.COULEUR FROM couleur c WHERE $ID_COL = c.ID_COULEUR";
$couleur = mysqli_query($db,$requete_couleur);
$row_couleur = mysqli_fetch_array($couleur);

//MYSQL SELECT MARQUE INFORMATION TABLE MARQUE ONLY
$ID_MARQUE = $row["ID_MARQUE"];
$requete_marque = "SELECT m.MARQUE FROM marque m WHERE $ID_MARQUE = m.ID_MARQUE";
$marque = mysqli_query($db,$requete_marque);
$row_marque = mysqli_fetch_array($marque);

if ($id_this_product == 0){
  header("Location: home.php");
  die();
}else{
?>

  <div class="grid-container_product">
    <!-- IMAGE -->
    <div class="photo_product">
      <img class="img_product" src="<?= $row["PHOTO"]; ?>">
    </div>

    <!-- INFORMATION PRODUIT -->
    <div class="grid_info_prod">

      <div class="nom_part">
        <h2 class="nom"><?=$row["NOM"];?></h2>
      </div>

      <div class="prix_part">
        <h3 class="prix"><?= $row["PRIX"];?> €</h3>
      </div>

      <input class="add_to_cart" type="button" value="Ajouter au panier">

      <div class="spec_part">
        <h3 class="title_info">Détails techniques</h3>
        <div>
          Marque : <?= $row_marque["MARQUE"]?>
          <br>
          Stockage : <?= $row["STOCKAGE"]?> Go
          <br>
          Couleur : <?= $row_couleur["COULEUR"]?>
          <br>
          Système : <?= $row["SYSTEME_D_EXPLOITATION"]?>
          <br>
          Réseau : <?= $row["RESEAU"]?>
          <br>
        </div>
      </div>

      <div class="desc_part">
        <h3 class="title_info">Description</h3>
        <p class="description_prod"><?= $row["DESCRIPTION"]?></p>
      </div>

    </div>
  </div>
  </div>

  <!-- AFFICHE D'AUTRES PRODUITS -->

  <h2 style="margin-top:40px; text-align:center">Pas convaincu ? Voici d'autres smartphones...</h2>

  <div class="grid">
    <!-- GRID PARENT -->
    <?php

$sql = "SELECT * FROM smartphone WHERE ID <> $id_this_product order by rand() limit 3";
$result = mysqli_query($db,$sql);
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
          <p class="description"><?= substr($row["DESCRIPTION"], 0, 130);
        if (strlen($row["DESCRIPTION"]) > 130){?>
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

    <?php } ?>

    <!-- PHP RETRIEVE PRODUCTS IN DATABASE -->
  </div>
  <!-- AFFICHE D'AUTRES PRODUITS -->

</body>


<footer>
  <?php
  include "../composants/footer.php";
?>
</footer>