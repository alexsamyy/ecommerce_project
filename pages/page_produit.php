<head>
  <?php
    $title = "Produit";
    session_start();
    include "../composants/header.php";
    include "../composants/main.php"; 
    // connexion à la base de données
    require_once "../composants/db.php";
?>

<link rel="stylesheet" href="../style/produit.css" media="screen" type="text/css" />
<link rel="stylesheet" href="../style/page_produit.css" media="screen" type="text/css"/>

</head>

<body>

  <?php $id_this_product = $_GET['id']; ?>

  <script>
    function addCart() {
      // alert("Produit ajouté !");
      window.location.href = "../fonctions/addCart.php?id=<?=$id_this_product?>";
    }
  </script>


  <!-- PHP RETRIEVE PRODUCTS IN DATABASE -->
  <?php

//MYSQL SELECT INFORMATION TABLE SMARTPHONE ONLY
$requete_info =  "SELECT * FROM smartphone WHERE '$id_this_product' = ID";
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

      <div class="interaction_user">
        <div>
          <input type="button" class="add_to_cart" onclick="addCart()" value="Ajouter au panier">
        </div>
      </div>

      <div class="spec_part">
        <h3 class="title_info">Détails techniques</h3>
        <div>
          <b>Marque : </b><?= $row_marque["MARQUE"]?>
          <br>
          <b>Stockage : </b><?= $row["STOCKAGE"]?> Go
          <br>
          <b>Couleur : </b><?= $row_couleur["COULEUR"]?>
          <br>
          <b>Système : </b><?= $row["SYSTEME_D_EXPLOITATION"]?>
          <br>
          <b>Réseau : </b><?= $row["RESEAU"]?>
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

  <h2 style="margin-top:40px; text-align:center">Pas convaincu ? Voici d'autres smartphones...</h2>

  <!-- AFFICHE D'AUTRES PRODUITS -->

  <?php
  if (empty($row)){?>
  <h2 style="margin-top:40px; text-align:center">Nous vous proposons d'autres smartphones...</h2>
  <?php
  }?>



  <div class="grid">
    <!-- GRID PARENT -->
    <?php

$sql = "SELECT * FROM smartphone WHERE (ID != $id_this_product and NEUF = 1) order by rand() limit 3";
$result = mysqli_query($db,$sql);
while ($row = mysqli_fetch_array($result)){
    ?>
    <!-- GRID ENFANT -->
    <div class="grid_in">
      <br>
      <div>
        <!-- IMAGE -->
        <a href="/FoneMarket/pages/page_produit.php?id=<?=$row["ID"];?>">
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
            <a class="see_more" href="/FoneMarket/pages/page_produit.php?id=<?=$row["ID"];?>">Voir
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


    <!-- PHP RETRIEVE PRODUCTS IN DATABASE -->
  </div>
  <!-- FIN AFFICHE D'AUTRES PRODUITS -->

</body>


<footer>
  <?php
  include "../composants/footer.php";
?>
</footer>