<head>
    <?php
    $title = "Panier";
    session_start();
    ob_start();
    include "../composants/header.php";
    // connexion à la base de données
    require_once "../composants/db.php";
    ?>

    <link rel="stylesheet" href="../style/livraison.css" media="screen" type="text/css" />
</head>

<body>

    <?php

    if (isset($_SESSION['iduser']) == false) { // IF NOT ALREADY LOGGED IN, DISPLAY LOGIN PAGE

        header("Location: ../pages/login.php");
        die();
    } // IF ALREADY LOGGED IN, DISPLAY PAGE
    else {

        $user = $_SESSION['iduser'];

        //MYSQL SELECT USER INFORMATION
        $sql = "SELECT * FROM utilisateur WHERE ID_UTILISATEUR = " . $user;
        $result = mysqli_query($db, $sql);
        $row_user_info = mysqli_fetch_array($result);

        //MYSQL SELECT INFORMATION TABLE PANIER ONLY
        $requete_user_cart = "SELECT * FROM panier WHERE ID_UTILISATEUR = $user";
        $user_cart = mysqli_query($db, $requete_user_cart);
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

        <div class="all_info">

            <!-- INFORMATIONS CLIENTS ET ADRESSE DE LIVRAISON -->
            <form id="delivery_info" action="../pages/payment_checkout.php" method="POST">
                <div class="livraison">
                    <div class="title_user_info">
                        <h4 class="coord">Adresse de livraison</h4>
                    </div>

                    <div class="relative">
                        <div id="one"><label>Prénom</label><br>
                            <input name="prenom_livraison" id="delivery_prenom" class="form_delivery_info_prenom" type="text" required="required">
                        </div>
                        <div id="two"><label>Nom</label><br>
                            <input name="nom_livraison" id="delivery_nom" class="form_delivery_info_nom" type="text" required="required"><br>
                        </div>
                    </div>
                    <label>Adresse e-mail</label><br>
                    <input name="mail_livraison" id="delivery_mail" class="form_delivery_info_mail" type="mail" required="required"><br>
                    <!-- ADRESSE DE LIVRAISON CLIENT -->
                    <div class="delivery_info">
                        <label>Adresse postale</label><br>
                        <input name="adresse_livraison" id="delivery_adress" class="form_delivery_info_adresse" type="text" required="required"><br>
                    </div>
                </div>

                <!-- INFORMATIONS CLIENTS -->
                <div class="facturation">
                    <div class="title_user_info">
                        <h4 class="coord">Adresse de facturation</h4>
                    </div>
                    <!-- INFORMATIONS CLIENT -->
                    <div class="perso_info_user">
                        <div class="relative">
                            <div id="one"><label>Prénom</label><br>
                                <input name="prenom_facturation" id="facturation_prenom" class="form_delivery_info_prenom" type="text" required="required">
                            </div>
                            <div id="two"><label>Nom</label><br>
                                <input name="nom_facturation" id="facturation_nom" class="form_delivery_info_nom" type="text" required="required"><br>
                            </div>
                        </div>
                        <label>Adresse e-mail</label><br>
                        <input name="mail_facturation" id="facturation_mail" class="form_delivery_info_mail" type="mail" required="required"><br>
                    </div>
                    <!-- ADRESSE DE FACTURATION  CLIENT -->
                    <div class="delivery_info">
                        <label>Adresse postale</label><br>
                        <input name="adresse_facturation" id="facturation_adress" class="form_delivery_info_adresse" type="text" required="required"><br>
                    </div>
                </div>
        </div>

        <?php
        $total_panier = 0; //VARIABLE CONTENANT LE COÛT TOTAL DU PANIER
        $total_cost_quantity = 0; //VARIABLE CONTENANT LE COÛT TOTAL D'UN ID PRODUIT EN FONCTION DE SA QUANTITE

        $array_article = mysqli_fetch_all($user_cart, MYSQLI_ASSOC);

        if (empty($array_article)) {
            header("Location: ../pages/panier.php");
            die();
        } else {

            foreach ($array_article as $articles) {

                //MYSQL SELECT INFORMATION TABLE SMARTPHONE ONLY
                $id_this_product = $articles["ID_PRODUIT"];
                $quantite = $articles["QUANTITE"];

                $requete_info = "SELECT * FROM smartphone WHERE '$id_this_product' = ID";
                $info = mysqli_query($db, $requete_info);
                $row = mysqli_fetch_array($info);

                $total_cost_quantity = $quantite * $row["PRIX"];;
                $total_panier += $total_cost_quantity;
        ?>

            <?php } ?>
            <!-- INFORMATION PAIEMENT (PARTIE DROITE) -->

            <div class="grid_info_panier">

                <div class="info_paiement">
                    <!-- NOMBRE ARTICLE -->
                    <div class="order_detail">
                        <h4>Détails de la commande</h4>
                    </div>
                    <!-- PRIX PRODUIT -->
                    <div class="total_prod">
                        <h5 id="total_cost_prod">TOTAL PANIER : <?= $total_panier ?>€</h5>
                    </div>
                    <!-- DETAILS TECHNIQUES PRODUIT -->
                    <div class="delivery_fees">
                        <h5>FRAIS DE LIVRAISON : 20 €</h5>
                    </div>
                    <hr>
                    <!-- QUANTITE -->
                    <div class="total_order">
                        <h5 id="total_cost_delivery">MONTANT TOTAL : <?= $total_panier + 20 ?> €</5>
                    </div>
                    <!-- BOUTON PASSER COMMANDE -->
                    <div class="proceed_btn">
                        <input class="btn_payer" type="submit" id='submit' value='SUIVANT'>
                    </div>
                </div>
            </div>
            </form>
        <?php } ?>

    </div>

</body>


<footer>
    <?php
    include "../composants/footer.php";
    ?>
</footer>