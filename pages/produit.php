<?php
    session_start();
    include "../composants/header.php";
    include "../composants/main.php";
    // connexion à la base de données
    require_once "../composants/db.php";
?>

<h1>SMARTPHONES</h1>

<!-- PHP RETRIEVE PRODUCTS IN DATABASE -->
<div class="grid">
<?php

$sql = "SELECT * FROM smartphone";
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
    <p class="prix"><?= $row["PRIX"];?> €</p>
    </div>
<?php
}
?>
</div> 

<!-- PHP RETRIEVE PRODUCTS IN DATABASE -->


<?php
    include "../composants/footer.php";
?>
