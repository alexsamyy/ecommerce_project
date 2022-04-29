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

        <div class="payment_checkout_info">

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

            <!-- PAIEMENT -->
            <div class="paiement_title">
                <h4>Paiement</h4>
            </div>

            <div class="info_pay_order">

                <!--------------INFORMATIONS BANCAIRES ET ADRESSE DE LIVRAISON (PARTIE GAUCHE)-------------->
                <div class="paiement_info">

                    <!-- NUMEROS DE CARTE -->
                    <div class="nb_card">
                        <label>Numéro de carte</label><br>
                        <input class="card_nb" type="number" pattern="[0-9\s]{13,19}" maxlength="19"
                            placeholder="xxxx xxxx xxxx xxxx">
                    </div>

                    <!-- DATE D'EXPIRATION ET CODE CVV DE LA CARTE -->
                    <div class="expiration_cvv">
                        <label>Date d'expiration</label><br>
                        <div class="exp-wrapper">
                            <input class="exp" id="month" maxlength="2" pattern="[0-9]*" inputmode="numerical"
                                placeholder="MM" type="text" data-pattern-validate>
                            <input class="exp" id="year" maxlength="2" pattern="[0-9]*" inputmode="numerical"
                                placeholder="YY" type="text" data-pattern-validate>
                        </div>
                        <!-- CODE CVV -->
                        <div class="cvv">
                            <label>CVV</label><br>
                            <input autocomplete="off" class="exp" id="cvv" maxlength="3" pattern="[0-9]*"
                                inputmode="numerical" placeholder="CVV" type="text" data-pattern-validate>
                        </div>
                    </div>

                    <!-- NOM TITULAIRE CARTE -->
                    <div class="titulaire">
                        <label>Titulaire de la carte</label><br>
                        <input class="nom_titulaire" type="text">
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