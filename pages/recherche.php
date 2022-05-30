<head>
    <?php
    $title = "Produit";
    session_start();
    include "../composants/header.php";
    include "../composants/main.php";
    // connexion à la base de données
    require_once "../composants/db.php";
?>
    <?php
$search = $_GET['Rechercher'];

$requete = "SELECT * FROM smartphone WHERE SOUNDEX(NOM) = SOUNDEX('. $search .') OR 
            SOUNDEX(SYSTEME_D_EXPLOITATION) = SOUNDEX('. $search .')";
?>

<link rel="stylesheet" href="../style/produit.css" media="screen" type="text/css" />
</head>

<body>
    <!-- AFFICHE EN FONCTION DE LA MARQUE OU PRODUIT DEMANDE -->
    <?php
$req_res = mysqli_query($db, $requete); 
$row_id_marque = mysqli_fetch_array($req_res);

$result = mysqli_query($db,$requete);

$row = mysqli_fetch_array($result);
if (empty($row)){ //IF NO PRODUCT, DISPLAY A MESSAGE
    ?>

    <h3 style="text-align:center; margin-top:300px; margin-bottom:300px;">Aucun produit ne correspond à votre recherche &#128532</h3>

    <?php
}
else{
?>

    <!------------------------------ HAUT DE LA PAGE ------------------------------------>
    <div class="title_page">
        <h1 class="title_asked_page">Résultat de votre recherche</h1>
    </div>
    
    <!-- PHP RETRIEVE PRODUCTS IN DATABASE -->
    <div id="demo" class="grid">
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
</body>
<footer>
    <?php
    include "../composants/footer.php";
?>
</footer>