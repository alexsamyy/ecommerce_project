<header>
    <?php
    session_start();
    include "../composants/header.php";
    include "../composants/main.php";
    // connexion à la base de données
    require_once "../composants/db.php";
?>
</header>

<!-- AFFICHE EN FONCTION DE LA MARQUE OU PRODUIT DEMANDE -->
<?php
// ASK FOR MARQUE ID 
$marque = $_GET['marque'];
$ID_MARQUE_request = "SELECT ID_MARQUE FROM marque WHERE '$marque' = MARQUE"; // GET ID MARQUE 
$req_res = mysqli_query($db, $ID_MARQUE_request); 
$row_id_marque = mysqli_fetch_array($req_res);
$ID_MARQUE = $row_id_marque['ID_MARQUE'];
$requete = "SELECT * FROM smartphone WHERE ID_MARQUE = $ID_MARQUE and NEUF = true";



$result = mysqli_query($db,$requete);

$row = mysqli_fetch_array($result);
if (empty($row)){ //IF NO PRODUCT, DISPLAY A MESSAGE
    ?>

<h2 style="text-align:center; margin-top:300px; margin-bottom:300px;">Aucun <?=$marque?> en vente pour le
    moment &#128532</h2>

<?php
}
else{
?>

<!------------------------------ HAUT DE LA PAGE ------------------------------------>
<div>
    <h1 class="title_page">SMARTPHONES</h1>
</div>


<!-------- TRIER EN PRIX CROISSANT OU DECROISSANT ------------>
<div class="sortBy">
    <span>
        <select style="color:black; margin-left:80%" name="sortby" id="trier">
            <option style="font-weight:bold;" onclick='sortBy()' value="null">Trier par</option>
            <option value="ASC" onclick='sortBy()'>Prix croissant</option>
            <option value="DESC"onclick='sortBy()'>Prix décroissant</option>
        </select>
    </span>
</div>
<!------------------------------ FIN HAUT DE LA PAGE ------------------------------------>

<!-- PHP RETRIEVE PRODUCTS IN DATABASE -->
<div class="grid">
    <!-- GRID PARENT -->
    <?php

$requete = "SELECT * FROM smartphone s WHERE s.ID_MARQUE = $ID_MARQUE and NEUF = true";
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
                    <a class="see_more"
                        href="http://localhost/FoneMarket/pages/page_produit.php?id=<?=$row["ID"];?>">Voir
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



<?php
    include "../composants/footer.php";
?>