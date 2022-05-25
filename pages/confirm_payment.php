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
    <link rel="stylesheet" href="../style/payment_checkout.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="../style/confirm_payment.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="../style/panier.css" media="screen" type="text/css" />
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

<form id="delivery_info" action="../pages/verif_payment.php" method="POST">
    <!-- GRID PANIER GLOBAL -->
    <div class="grid_container_panier">

        <!-------------------------------------------- BARRE DE PROGRESSION PANIER ------------------------------------->

        <div class="stepper-wrapper">
            <div class="stepper-item completed">
                <div class="step-counter">1</div>
                <div class="step-name">Livraison</div>
            </div>
            <div class="stepper-item completed">
                <div class="step-counter">2</div>
                <div class="step-name">Paiement</div>
            </div>
            <div class="stepper-item active">
                <div class="step-counter">3</div>
                <div class="step-name">Confirmation</div>
            </div>
        </div>

        <!---------------------------------------------------------------------------------------------------------------->

        <!-- INFORMATION ARTICLE DANS PANIER (PARTIE GAUCHE) -->

            <div class="all_info">

                <!-- INFORMATIONS CLIENTS ET ADRESSE DE LIVRAISON -->
                <div class="livraison">
                    <div class="title_user_info">
                        <h4 class="coord">Adresse de livraison</h4>
                    </div>

                    <div class="relative">
                        <div id="one"><label>Prénom</label><br>
                            <input name="prenom_livraison" id="delivery_prenom" class="form_delivery_info_prenom disabled_true" readonly="readonly" value="<?php echo $_POST["prenom_livraison"]; ?>">
                        </div>
                        <div id="two"><label>Nom</label><br>
                            <input name="nom_livraison" id="delivery_nom" class="form_delivery_info_nom disabled_true" readonly="readonly" value="<?php echo $_POST["nom_livraison"]; ?>">
                        </div>
                    </div>
                    <label>Adresse e-mail</label><br>
                    <input name="mail_livraison" id="delivery_mail" class="form_delivery_info_mail disabled_true" readonly="readonly" value="<?php echo $_POST["mail_livraison"]; ?>">
                    <!-- ADRESSE DE LIVRAISON CLIENT -->
                    <div class="delivery_info">
                        <label>Adresse postale</label><br>
                        <input name="adresse_livraison" id="delivery_adress" class="form_delivery_info_adresse disabled_true" readonly="readonly" value="<?php echo $_POST["adresse_livraison"]; ?>">
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
                                <input name="prenom_facturation" id="facturation_prenom" class="form_delivery_info_prenom disabled_true" readonly="readonly" value="<?php echo $_POST["prenom_facturation"]; ?>">
                            </div>
                            <div id="two"><label>Nom</label><br>
                                <input name="nom_facturation" id="facturation_nom" class="form_delivery_info_nom disabled_true" readonly="readonly" value="<?php echo $_POST["nom_facturation"]; ?>">
                            </div>
                        </div>
                        <label>Adresse e-mail</label><br>
                        <input name="mail_facturation" id="facturation_mail" class="form_delivery_info_mail disabled_true" readonly="readonly" value="<?php echo $_POST["mail_facturation"]; ?>">
                    </div>
                    <!-- ADRESSE DE FACTURATION  CLIENT -->
                    <div class="delivery_info">
                        <label>Adresse postale</label><br>
                        <input name="adresse_facturation" id="facturation_adress" class="form_delivery_info_adresse disabled_true" readonly="readonly" value="<?php echo $_POST["adresse_facturation"]; ?>">
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
            ?>

                <!-- INFORMATION PAIEMENT (PARTIE DROITE) -->
                <div class="grid_info_panier paiement">

                    <div class="info_paiement">
                        <div class="title_user_info">
                            <h4 class="coord">Commande</h4>
                        </div>
                        <!-- INFORMATIONS CLIENT -->
                        <div class="perso_info_user">


                            <div class="dropdown_item">
                                <?php
                                foreach ($array_article as $articles) {

                                    //MYSQL SELECT INFORMATION TABLE SMARTPHONE ONLY
                                    $id_this_product = $articles["ID_PRODUIT"];
                                    $quantite = $articles["QUANTITE"];

                                    $requete_info = "SELECT * FROM smartphone WHERE '$id_this_product' = ID";
                                    $info = mysqli_query($db, $requete_info);
                                    $row = mysqli_fetch_array($info);

                                    //MYSQL SELECT COLOUR INFORMATION TABLE COULEUR ONLY
                                    $ID_COL = $row["ID_COULEUR"];
                                    $requete_couleur = "SELECT c.COULEUR FROM couleur c WHERE $ID_COL = c.ID_COULEUR";
                                    $couleur = mysqli_query($db, $requete_couleur);
                                    $row_couleur = mysqli_fetch_array($couleur);

                                    $total_cost_quantity = $quantite * $row["PRIX"];;
                                    $total_panier += $total_cost_quantity;
                                ?>


                                    <!----------------------------------------------------------------------->

                                    <div class="item">

                                        <div class="description">
                                            <span><b><?= $row["NOM"]; ?></b></span>
                                            <span><b><?= $row_couleur["COULEUR"]; ?></b></span>
                                            <span><?= $row["STOCKAGE"]; ?> Go</span>
                                        </div>

                                        <div class="quantity">
                                            <span><b>Quantité : </b><?= $quantite; ?></span>
                                        </div>

                                        <div class="total-price"><span><b><?= $row["PRIX"]; ?> €</b></span></div>

                                    </div>

                                    <!----------------------------------------------------------------------->

                                <?php } ?>
                            </div>

                            <div class="cost_info">
                                <b><label>Montant total du panier :</label></b><span id="total_cost_prod"><input readonly="readonly" id="total_panier" name="total_panier" value="<?= $total_panier . ' €' ?>"></span><br>
                                <b><label>Frais de livraison :</label></b><span> 20 €</span><br>
                                <?php $total_panier_livraison = $total_panier + 20; ?>
                                <b><label>Montant total à payer :</label></b><span id="total_cost_delivery"><input readonly="readonly" id="total" name="total" value="<?= $total_panier_livraison. ' €' ?>"></span><br>
                            </div>

                        </div>
                        <!-- DISCOUNT BOX -->
                        <div class="discount_box">
                            <input name="discount" type="text" maxlength="10" id="discount_input" onkeyup="capletter_checkDiscount()" placeholder="CODE PROMO">
                            <div id="msgDiscount"></div>
                        </div>
                    </div>
                    <hr>
                    <!-- BOUTON PASSER COMMANDE -->
                    <div class="proceed_btn">
                        <input class="btn_payer" type="submit" id='submit' value='PAYER'>
                    </div>
                </div>
    </div>
<?php } ?>

</div>
</form>

<!-- FONCTION JAVASCRIPT POUR CODE PROMO => MET AUTOMATIQUEMENT EN MAJUSCULE LE TEXTE ENTRANT ET APPLIQUE LA PROMOTION -->

<script>
    function capletter_checkDiscount() {
        var discount_input = document.getElementById("discount_input");
        total_cost = document.getElementById("total_cost_prod").innerHTML;
        discount_input.value = discount_input.value.toUpperCase();
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var parts = xmlhttp.responseText.split('|');
                document.getElementById("msgDiscount").innerHTML= parts[0];
                document.getElementById("total_panier").value = parts[1];
                document.getElementById("total").value = parts[2];
            }
        }
        var req = "../fonctions/applyDiscount.php?discount=" + discount_input.value + "&total=<?php echo $total_panier ?>";
        xmlhttp.open("POST", req, true);
        xmlhttp.send();
    }
</script>

<!---------------------------------------------------------------------------------------------->

</body>


<footer>
    <?php
    include "../composants/footer.php";
    ?>
</footer>