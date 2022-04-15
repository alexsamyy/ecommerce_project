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

<div class="grid-container">
  <div class="photo_product">PHOTO</div>





  <div class="info_product">information</div>
</div>



<!-- PHP RETRIEVE PRODUCTS IN DATABASE -->
<div class="grid"> <!-- GRID PARENT -->
<?php

$sql = "SELECT * FROM smartphone order by rand() limit 3";
$result = mysqli_query($db,$sql);
while ($row = mysqli_fetch_array($result)){
    ?>
    <!-- GRID ENFANT -->
    <div class="grid_in"> 
      <br>
    <div>

      <!-- IMAGE -->
      <div class="img_place" onclick='location.href = "http://localhost/FoneMarket/pages/page_produit.php/<?=$row["ID"];?>"'>
      <img class="img" src="<?= $row["PHOTO"]; ?>">
      </div>  
      <br>
      <br>
      <!-- INFORMATION PRODUIT -->
      <div class="info_product">
        <h4 class="nom"><?=$row["NOM"];?></h4> 
        <p class="description"><?= substr($row["DESCRIPTION"], 0, 100);
        if (strlen($row["DESCRIPTION"]) > 100){?>
          <span>...</span>
          <a class="see_more" onclick='location.href = "http://localhost/FoneMarket/pages/page_produit.php/<?=$row["ID"];?>"'>Voir plus</a>
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

<!-- PHP RETRIEVE PRODUCTS IN DATABASE -->

</body>

<?php
    include "../composants/footer.php";
?>  