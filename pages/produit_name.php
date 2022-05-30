<head>
    <?php
    $title = "Produit";
    session_start();
    include "../composants/header.php";
    include "../composants/main.php";
    // connexion à la base de données
    require_once "../composants/db.php";
?>
</head>
<link rel="stylesheet" href="../style/produit.css" media="screen" type="text/css" />
<body>
    
    <!---------------------- AFFICHE EN FONCTION DU NOM DE PRODUIT DEMANDE ------------------->

    <?php

$name = $_GET['name'];
$requete = "SELECT * FROM smartphone WHERE NOM = '$name' and NEUF = true";
$result = mysqli_query($db,$requete);
$row = mysqli_fetch_array($result);
?>

<!------------------------------ HAUT DE LA PAGE ------------------------------------>
    <div class="title_page">
        <h1 class="title_asked_page"><?=$name?></h1>
    </div>
<!------------------------------ FIN HAUT DE LA PAGE ------------------------------------>

<?php
//----------------------- PRODUIT NON PRESENT DANS LA DATABASE --------------------
if (empty($row)){?>
    <h3 style="text-align:center; margin-top:100px; margin-bottom:100px;">Aucun <?=$name?> en vente pour le
        moment &#128532</h3>
    <h2 style="margin-top:40px; text-align:center">Nous vous proposons d'autres smartphones...</h2>

    <!--------------------------------- AFFICHE D'AUTRES PRODUITS --------------------------------->

    <div class="grid">
        <!-- GRID PARENT -->
        <?php

$sql = "SELECT * FROM smartphone WHERE NOM <> '$name' and NEUF = 1 order by rand() limit 3";
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
                        <a class="see_more"
                            href="/FoneMarket/pages/page_produit.php?id=<?=$row["ID"];?>">Voir
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
    <!--------------------------------------------------- FIN AFFICHE D'AUTRES PRODUITS -------------------------------->


    <?php
}else{?>


    <!----------------------- PRODUIT PRESENT DANS LA DATABASE => AFFICHAGE PRODUIT ------------------------------------>

    <!-- PHP RETRIEVE PRODUCTS IN DATABASE -->
    <div class="grid">

        <!-- GRID PARENT -->
        <?php

$result = mysqli_query($db,$requete);
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
                        <a class="see_more"
                            href="/FoneMarket/pages/page_produit.php?id=<?=$row["ID"];?>">Voir
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

    <!-------------------------------------- FIN AFFICHAGE PRODUIT ------------------------------------>

</body>

<footer>
    <?php
    include "../composants/footer.php";
?>
</footer>