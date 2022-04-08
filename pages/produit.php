<?php
    session_start();
    include "../composants/header.php";
    include "../composants/main.php";
    // connexion à la base de données
    require_once "../composants/db.php";
?>

<div><h1 class="title_page">SMARTPHONES</h1></div>

<!-- NAV BAR SIDE FILTERS -->
<div class="grid_navbar">
    <!-- Affichage total produits trouvés -->
    <div class="total_display"> 
        <?php
            $requete = "SELECT count(*) as total FROM smartphone";
            $sum = mysqli_query($db,$requete);  
            $row = mysqli_fetch_array($sum)
        ?>
        <h3><?= $row["total"];?> produits trouvés</h3>
    </div>

    <!-- TITRE DE LA PAGE -->


    <!-- Triage en fonction du prix -->
    </div>
    </form>

<!-- NAV BAR SIDE FILTERS -->

<!-- PHP RETRIEVE PRODUCTS IN DATABASE -->
<div class="grid_product">
<?php

$sql = "SELECT * FROM smartphone WHERE NEUF = true";
$result = mysqli_query($db,$sql);
while ($row = mysqli_fetch_array($result)){
    ?>
    <div class="grid_in">
    <a href="/"><img class="img" src="<?= $row["PHOTO"]; ?>"></a>
    <br>
    <a class="nom"><h4><?=$row["NOM"];?></h4></a>
    <br>  
    <p class="description"><?= $row["DESCRIPTION"]; ?></p>
    <br> 
    <h3 class="prix"><?= $row["PRIX"];?> €</h3>
    </div>
<?php
}
?>
</div> 
<!-- PHP RETRIEVE PRODUCTS IN DATABASE -->



<?php
    include "../composants/footer.php";
?>
