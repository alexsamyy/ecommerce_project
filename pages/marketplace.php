<header>
<?php
    session_start();
    include "../composants/header.php";
    include "../composants/main.php";
    // connexion à la base de données
    require_once "../composants/db.php";
?>
</header>

<div><h1 class="title_page">MARKETPLACE</h1></div>

<!-- PHP RETRIEVE PRODUCTS IN DATABASE -->
<div class="grid_product">
<?php

$sum = "SELECT count(*) as total, * FROM smartphone WHERE NEUF = false";
if ($sum == 0){
    ?><h3>Aucun produit en vente &#128532<h3><?php	
}
else{
$sql = "SELECT * FROM smartphone WHERE NEUF = false";
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
}
?>
</div> 
<!-- PHP RETRIEVE PRODUCTS IN DATABASE -->

<footer>
<?php
    include "../composants/footer.php";
?>
</footer>