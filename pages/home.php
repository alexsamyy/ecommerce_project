<head>
  <?php
  $title = "FoneMarket";
  session_start();
  include "../composants/header.php";
  // connexion à la base de données
  require_once "../composants/db.php";
  ?>
  <link rel="stylesheet" href="../style/produit.css" media="screen" type="text/css" />
  <link rel="stylesheet" href="../style/home.css" media="screen" type="text/css" />
</head>

<body>

  <div id="carouselExampleIndicators" class="slide_home carousel slide" data-mdb-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide-to="3" aria-label="Slide 4"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <a href="sell.php"><img src="../media/sellYoursBefore.jpg" class="d-block w-100" alt="Vendez votre appareil avant d'en adopter un nouveau" /></a>
      </div>
      <div class="carousel-item">
        <a href="marketplace.php"><img src="../media/iPhone11lessWaste.jpg" class="d-block w-100" alt="less waste, buy refurbished" /></a>
      </div>
      <div class="carousel-item">
        <a href="marketplace.php"><img src="../media/samsungLessWaste.jpg" class="d-block w-100" alt="less waste, buy refurbished" /></a>
      </div>
      <div class="carousel-item">
        <img src="../media/welcome_discount.png" class="d-block w-100" alt="code -10% : WELCOME" />
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
  <div class="grid">
    <!-- GRID PARENT -->
    <?php

    $sql = "SELECT * FROM smartphone order by rand() limit 3";
    $result = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_array($result)) {
    ?>
      <!-- GRID ENFANT -->
      <div class="grid_in">
        <br>
        <div>
          <!-- IMAGE -->
          <a href="http://localhost/FoneMarket/pages/page_produit.php?id=<?= $row["ID"]; ?>">
            <div class="img_place">
              <img class="img" src="<?= $row["PHOTO"]; ?>">
            </div>
          </a>
          <br>
          <br>
          <!-- INFORMATION PRODUIT -->
          <div class="info_product">
            <h4 class="nom"><?= $row["NOM"]; ?></h4>
            <p class="description"><?= substr($row["DESCRIPTION"], 0, 110);
                                    if (strlen($row["DESCRIPTION"]) > 110) { ?>
                <span>...</span>
                <a class="see_more" href="http://localhost/FoneMarket/pages/page_produit.php?id=<?= $row["ID"]; ?>">Voir
                  plus</a>
              <?php
                                    }
              ?>
            </p>

            <h6 class="prix"><?= $row["PRIX"]; ?> €</h6>
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