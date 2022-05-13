<header>
    <?php
    $title = "Panier";
    session_start();
    ob_start();
    include "../composants/header.php";
    // connexion à la base de données
    require_once "../composants/db.php";
?>

    <!-- FONCTION JAVASCRIPT POUR CODE PROMO => MET AUTOMATIQUEMENT EN MAJUSCULE LE TEXTE ENTRANT -->

    <script>
        function capletter() {
            var x = document.getElementById("discount_input");
            x.value = x.value.toUpperCase();
        }

        var modify_btn = document.getElementByClass("modify");
        modify_btn.addEventListener("click", function() {

        })
    </script>

    <!---------------------------------------------------------------------------------------------->

</header>

<body>

    <?php

if (isset($_SESSION['iduser']) == false){ // IF NOT ALREADY LOGGED IN, DISPLAY LOGIN PAGE
                
    header("Location: ../pages/login.php");
    die();

} // IF ALREADY LOGGED IN, DISPLAY CART
else{

$user = $_SESSION['iduser'];

//MYSQL SELECT USER INFORMATION
$sql = "SELECT * FROM utilisateur WHERE ID_UTILISATEUR = " . $user;
$result = mysqli_query($db, $sql);
$row_user_info = mysqli_fetch_array($result);

//MYSQL SELECT INFORMATION TABLE PANIER ONLY
$requete_user_cart = "SELECT * FROM panier WHERE ID_UTILISATEUR = $user";
$user_cart = mysqli_query($db, $requete_user_cart);
$row_cart = mysqli_fetch_array($user_cart);

}
?>


    <!-- GRID PANIER GLOBAL -->
    <div class="grid_container_panier">

        <!-------------------------------------------- BARRE DE PROGRESSION PANIER ------------------------------------->

        <div class="stepper-wrapper">
            <div class="stepper-item active">
                <div class="step-counter">1</div>
                <div class="step-name">Livraison</div>
            </div>
            <div class="stepper-item">
                <div class="step-counter">2</div>
                <div class="step-name">Paiement</div>
            </div>
            <div class="stepper-item">
                <div class="step-counter">3</div>
                <div class="step-name">Confirmation</div>
            </div>
        </div>

        <!---------------------------------------------------------------------------------------------------------------->

        <!-- INFORMATION ARTICLE DANS PANIER (PARTIE GAUCHE) -->

        <div class="panier_product_info">

            <!-- INFORMATIONS CLIENTS ET ADRESSE DE LIVRAISON (SI CONNECTE SINON DEMANDE DE CREATION DE COMPTE / CONNEXION) -->
            <div class="user_info">
                <!-- NOMBRE ARTICLE -->
                <div class="title_user_info">
                    <h4 class="coord">Coordonnées</h4>
                    <button class="modify">Modifier</button>
                </div>
                <!-- INFORMATIONS CLIENT -->
                <div class="perso_info_user">
                    <b><?= $row_user_info["PRENOM"];?></b><br>
                    <b><?= $row_user_info["NOM"];?></b><br>
                    <b><?= $row_user_info["EMAIL"];?></b><br>
                </div>
                <!-- ADRESSE DE LIVRAISON CLIENT -->
                <div class="delivery_info">
                    <b><?= $row_user_info["ADRESSE"];?></b><br><br>
                </div>
            </div>

            <!-- NOMBRE ARTICLE -->
            <div class="nb_prod">

                <?php $total = "SELECT SUM(QUANTITE) AS total_article FROM panier WHERE ID_UTILISATEUR = $user";
                $res = mysqli_query($db,$total);  
                $data_row = mysqli_fetch_array($res);
                $total_article = $data_row['total_article'];
                
                if ($total_article == NULL){ ?>
                    <h4>0 article</h4>
                <?php
                } else {
                    if ($total_article > 1) { ?>
                        <h4><?php echo $total_article ?> articles</h4>
                    <?php } else {?>
                        <h4>1 article</h4>
                    <?php }
                }
                ?>

            </div>

           <!-------------------------------------------------------->
               
            <div class="info_order">

            <?php

            $array_article = mysqli_fetch_all($user_cart, MYSQLI_ASSOC);
            var_dump($array_article);
            die();
            
            foreach($array_article as $articles){

            //MYSQL SELECT INFORMATION TABLE SMARTPHONE ONLY
            $id_this_product = $articles["ID_PRODUIT"];
            $quantite = $articles["QUANTITE"];
            $requete_info = "SELECT * FROM smartphone WHERE '$id_this_product' = ID";
            $info = mysqli_query($db,$requete_info);  
            $row = mysqli_fetch_array($info);
            
            
            //MYSQL SELECT COLOUR INFORMATION TABLE COULEUR ONLY
            $ID_COL = $row["ID_COULEUR"];
            $requete_couleur = "SELECT c.COULEUR FROM couleur c WHERE $ID_COL = c.ID_COULEUR";
            $couleur = mysqli_query($db,$requete_couleur);
            $row_couleur = mysqli_fetch_array($couleur);

            ?>

                <!-------------- PHOTO PRODUIT  -------------->
                <div class="img_prod_panier">
                    <img class="photo_prod" src="<?= $row["PHOTO"]; ?>">
                </div>

                <!-------------- INFORMATION (QUANTITE / NOM PRODUIT / PRIX) -------------->
                <div class="global_info">
                    <!-- NOM PRODUIT -->
                    <div class="prod_name">
                        <b><?=$row["NOM"];?></b><br>
                    </div>
                    <!-- PRIX PRODUIT -->
                    <div class="prod_prix">
                        <b><?= $row["PRIX"];?> €</b><br>
                    </div> 
                    <!-- DETAILS TECHNIQUES PRODUIT -->
                    <div class="prod_info_tech">
                    <b><?= $row_couleur["COULEUR"];?></b><br>
                    <b><?= $row["STOCKAGE"]; ?> Go</b><br>
                    </div>
                    <!-- QUANTITE -->
                    <div class="quantite">
                    <b>Quantité : </b><?= $quantite; ?>
                    </div>
                    <!-- BOUTON SUPPRIMER PRODUIT -->
                    <div class="delete_btn">
                    <a class="delete_article" href="#">Supprimer</a>
                    </div>
                </div>  
                <?php } ?>  
            </div>

            
        
        </div>

        <!-- INFORMATION PAIEMENT (PARTIE DROITE) -->
        <div class="grid_info_panier">

            <div class="info_paiement">
                <!-- NOMBRE ARTICLE -->
                <div class="order_detail">
                    <h4>Détails de la commande</h4>
                </div>
                <!-- NOM PRODUIT -->
                <div class="discount_box">
                    <form action="" method="post">
                        <input type="text" maxlength="10" id="discount_input" onkeyup="capletter()"
                            placeholder="CODE PROMO">
                    </form>
                </div>
                <!-- PRIX PRODUIT -->
                <div class="total_prod">

                    <?php
                    $total_cost_product = $quantite * $row[PRIX];
                    ?>

                    <h5>TOTAL PANIER : <?= $total_cost_product?>€</h5>
                </div>
                <!-- DETAILS TECHNIQUES PRODUIT -->
                <div class="delivery_fees">
                    <h5>ESTIMATION FRAIS DE LIVRAISON : 20 €</h5>
                </div>
                <hr>
                <!-- QUANTITE -->
                <div class="total_order">
                    <h5>MONTANT TOTAL : <?= $total_cost_product + 20?> €</5>
                </div>
                <!-- BOUTON PASSER COMMANDE -->
                <div class="proceed_btn">
                    <input onclick="window.location.href='../pages/payment_checkout.php';" class="btn_payer"
                        type="button" value="PASSER COMMANDE">
                </div>
            </div>
        </div>
    </div>

</body>


<footer>
    <?php
  include "../composants/footer.php";
?>
</footer>