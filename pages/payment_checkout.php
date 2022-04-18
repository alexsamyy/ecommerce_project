<header>
    <?php
    $title = "Paiement";
    ob_start();
    session_start();
    include "../composants/header.php";
    // connexion à la base de données
    require_once "../composants/db.php";
?>
</header>

<body>

    <?php
    if (isset($_SESSION['iduser']) == true){
        $user = $_SESSION['iduser'];

        $sql = "SELECT * FROM utilisateur WHERE ID_UTILISATEUR = " . $user;
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result);
    ?>

    <!-- GRID GLOBAL -->
    <div class="grid_container_panier">

        <!-------------------------------------------- BARRE DE PROGRESSION PANIER ------------------------------------->

        <div class="stepper-wrapper">
            <div class="stepper-item completed">
                <a style="color:black" href="../pages/panier.php">
                    <div class="step-counter">1</div>
                </a>
                <div class="step-name">Livraison</div>
            </div>
            <div class="stepper-item active">
                <div class="step-counter">2</div>
                <div class="step-name">Paiement</div>
            </div>
            <div class="stepper-item">
                <div class="step-counter">3</div>
                <div class="step-name">Confirmation</div>
            </div>
        </div>

        <!---------------------------------------------------------------------------------------------------------------->

        <!-- INFORMATION PAIEMENT -->

        <div class="panier_product_info">

            <!-- INFORMATIONS CLIENTS ET ADRESSE DE LIVRAISON (SI CONNECTE SINON DEMANDE DE CREATION DE COMPTE / CONNEXION) -->
            <div class="user_info">
                <!-- NOMBRE ARTICLE -->
                <div class="title_user_info">
                    <h4 class="coord">Coordonnées</h4>
                    <a class="modify" href="#">Modifier</a>
                </div>
                <!-- INFORMATIONS CLIENT -->
                <div class="perso_info_user">
                    <b>Prenom</b><br>
                    <b>NOMDEFAMILLE</b><br>
                    <b>a.sam-yin-yang@insta.fr</b><br>
                </div>
                <!-- ADRESSE DE LIVRAISON CLIENT -->
                <div class="delivery_info">
                    <b>7, rue Linné</b><br>
                    <b>Paris, 75005</b><br>
                </div>
            </div>

            <!-- NOMBRE ARTICLE -->
            <div class="nb_prod">
                <h4>1 article</h4>
            </div>
            <div class="info_order">

                <!-------------- IMAGE ARTICLE -------------->
                <div class="img_prod_panier">
                    <img class="photo_prod" src="../media/produit/iPhone13_minuit.jpg">
                </div>

                <!-------------- INFO COMMANDE -------------->
                <div class="global_info">
                    <!-- NOM PRODUIT -->
                    <div class="prod_name">
                        <b>iPhone 13</b><br>
                    </div>
                    <!-- PRIX PRODUIT -->
                    <div class="prod_prix">
                        <b>1209 €</b><br>
                    </div>
                    <!-- DETAILS TECHNIQUES PRODUIT -->
                    <div class="prod_info_tech">
                        <b>Minuit</b><br>
                        <b>512 Go</b><br>
                    </div>
                    <!-- QUANTITE -->
                    <div class="quantite">
                        <b>Quantité :</b> 1
                    </div>
                    <!-- BOUTON SUPPRIMER PRODUIT -->
                    <div class="delete_btn">
                        <a class="delete_article" href="#">Supprimer</a>
                    </div>
                </div>

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
                        <input type="text" placeholder="CODE PROMO">
                    </form>
                </div>
                <!-- PRIX PRODUIT -->
                <div class="total_prod">
                    <h5>TOTAL PANIER :</h5>
                </div>
                <!-- DETAILS TECHNIQUES PRODUIT -->
                <div class="delivery_fees">
                    <h5>ESTIMATION FRAIS DE LIVRAISON :</h5>
                </div>
                <hr>
                <!-- QUANTITE -->
                <div class="total_order">
                    <h5>MONTANT TOTAL :</5>
                </div>
                <!-- BOUTON SUPPRIMER PRODUIT -->
                <div class="proceed_btn">
                    <input onclick="window.location.href='../pages/confirm_payment.php';" class="btn_payer"
                        type="button" value="CONFIRMATION">
                </div>
            </div>


        </div>

    </div>

    <?php }
    else{
        header("Location: ../pages/login.php");
    }?>

</body>


<footer>
    <?php
  include "../composants/footer.php";
?>
</footer>