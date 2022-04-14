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

            //GET INPUT VALUES
            $marque = $_POST['marque'];
            $min_prix = $_POST['min_price'];
            $max_prix = $_POST['max_price'];
            $systeme = $_POST['syst'];
            $stockage = $_POST['stock'];
            $reseau = $_POST['res'];
            $dual_sim = $_POST['slot_sim'];

            $requete = "SELECT count(*) as total FROM smartphone WHERE SYSTEME_D_EXPLOITATION = '" . $systeme . "'";

            $sum = mysqli_query($db,$requete);  
            $row = mysqli_fetch_array($sum)
        ?>
        <h3><?= $row["total"];?> produits trouvés</h3>
    </div>
    <div class="filtres">
    <form method="post">
        <fieldset>
        <span style="font-weight:bold">Filtres :</span>

        <!-- CHOIX DE LA MARQUE -->
        <select style="color:black" name="marque" id="marque-select">
        <option value="">Marque</option>
        <option value="apple">Apple</option>
        <option value="samsung">Samsung</option>
        <option value="xiaomi">Xiaomi</option>
        <option value="huawei">Huawei</option>
        <option value="google">Google</option>
        <option value="oneplus">OnePlus</option>
        <option value="oppo">Oppo</option>
        </select>

        <!-- MINIMUM PRIX / MAXIMUM PRIX -->
        <input name="min_price" style="width:70px" type="number" placeholder="€ min">
        <input name="max_price" style="width:70px" type="number" placeholder="€ max">

        <!-- CHOIX SYSTEME EXPLOITATION -->  
        <select style="color:black" name="syst" id="syst-select">
        <option value="">Système d'exploitation</option>
        <option value="iOS">iOS</option>
        <option value="Android">Android</option>
        </select>

        <!-- CHOIX STOCKAGE -->
        <select style="color:black" name="stock" id="stock-select">
        <option value="">Stockage</option>
        <option value="32">32 Go</option>
        <option value="64">64 Go</option>
        <option value="128">128 Go</option>
        <option value="256">256 Go</option>
        </select>

        <!-- CHOIX RESEAU -->
        <select style="color:black" name="res" id="res-select">
        <option value="">Réseaux</option>
        <option value="4G">4G</option>
        <option value="4G+">4G+</option>
        <option value="5G">5G</option>
        </select>

        <!-- CHOIX DOUBLE SIM OU NON -->
        <select style="color:black" name="slot_sim" id="sim-select">
        <option value="">Dual sim</option>
        <option value="oui">oui</option>
        <option value="non">non</option>
        </select>

        <span>
        <button type="submit">Rechercher</button>
</span>
        </fieldset>
    </form>
</div>

    <!-- TITRE DE LA PAGE -->


    <!-- Triage en fonction du prix -->
    </div>
    </form>

<!-- NAV BAR SIDE FILTERS -->

<!-- PHP RETRIEVE PRODUCTS IN DATABASE -->
<div class="grid"> <!-- GRID PARENT -->
<?php

$sql = "SELECT * FROM smartphone WHERE NEUF = true";
$result = mysqli_query($db,$sql);
while ($row = mysqli_fetch_array($result)){
    ?>
    <!-- GRID ENFANT -->
    <div class="grid_in"> 
      <br>
    <div> 

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



<?php
    include "../composants/footer.php";
?>
