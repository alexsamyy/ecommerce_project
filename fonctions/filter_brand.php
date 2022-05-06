<?php
    session_start();
    // connexion à la base de données
    require_once "../composants/db.php";
    include "../composants/main.php";
?>

<?php

// ------------ ASK FOR MARQUE ID -----------
$marque = $_GET['marque'];

$ID_MARQUE_request = "SELECT ID_MARQUE FROM marque WHERE MARQUE = '$marque'"; // GET ID MARQUE 

$req_res = mysqli_query($db, $ID_MARQUE_request); 

$row_id_marque = mysqli_fetch_array($req_res);

$ID_MARQUE = $row_id_marque['ID_MARQUE'];
// ------------------------------------------
?>

<?php
//-------- PHP RETRIEVE PRODUCTS IN DATABASE --------

$requeteSorted = "SELECT * FROM smartphone WHERE ID_MARQUE = $ID_MARQUE and NEUF = true";
$result = mysqli_query($db,$requeteSorted);

if ($result == false){
    $requeteSorted = "SELECT * FROM smartphone WHERE NEUF = true";;
    $result = mysqli_query($db,$requeteSorted);
}

echo $requeteSorted;
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
<?php } ?>
</div>

<!-- PHP RETRIEVE PRODUCTS IN DATABASE -->