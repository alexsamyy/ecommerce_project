<header>
<?php
    session_start();
    include "../composants/header.php";
    // connexion à la base de données
    require_once "../composants/db.php";
?>
</header>

<body>

<div id="carouselExampleIndicators" class="carousel slide" data-mdb-ride="carousel" style="margin-top:200px">
  <div class="carousel-indicators">
    <button
      type="button"
      data-mdb-target="#carouselExampleIndicators"
      data-mdb-slide-to="0"
      class="active"
      aria-current="true"
      aria-label="Slide 1"
    ></button>
    <button
      type="button"
      data-mdb-target="#carouselExampleIndicators"
      data-mdb-slide-to="1"
      aria-label="Slide 2"
    ></button>
    <button
      type="button"
      data-mdb-target="#carouselExampleIndicators"
      data-mdb-slide-to="2"
      aria-label="Slide 3"
    ></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../media/banniere.jpg" class="d-block w-100" alt="Wild Landscape"/>
    </div>
    <div class="carousel-item">
      <img src="../media/banniere.jpg" class="d-block w-100" alt="Camera"/>
    </div>
    <div class="carousel-item">
      <img src="../media/banniere.jpg" class="d-block w-100" alt="Exotic Fruits"/>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<h2 style="margin-top:40px; text-align:center">Peut-être votre prochain smartphone... &#128521</h2>

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
    <div class="divide_by_two"> <!-- AFFICHAGE INTERIEUR GRID ENFANT -->

      <!-- IMAGE -->
      <div class="img_place" onclick='location.href = "http://localhost/FoneMarket/pages/produit.php/<?=$row["ID"];?>"'>
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
          <a class="see_more" onclick='location.href = "http://localhost/FoneMarket/pages/produit.php/<?=$row["ID"];?>"'>Voir plus</a>
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