<head>
    <?php
    $title = "Panier";
    session_start();
    ob_start();
    include "../composants/header.php";
    // connexion à la base de données
    require_once "../composants/db.php";
    ?>

    <link rel="stylesheet" href="../style/panier.css" media="screen" type="text/css" />

</head>

<body>

    <?php

    if (isset($_SESSION['iduser']) == false) { // IF NOT ALREADY LOGGED IN, DISPLAY LOGIN PAGE

        header("Location: ../pages/login.php");
        die();
    } // IF ALREADY LOGGED IN, DISPLAY CART
    else {

        $user = $_SESSION['iduser'];

        //MYSQL SELECT USER INFORMATION
        $sql = "SELECT * FROM utilisateur WHERE ID_UTILISATEUR = " . $user;
        $result = mysqli_query($db, $sql);
        $row_user_info = mysqli_fetch_array($result);

        //MYSQL SELECT INFORMATION TABLE PANIER ONLY
        $requete_user_cart = "SELECT * FROM panier WHERE ID_UTILISATEUR = $user";
        $user_cart = mysqli_query($db, $requete_user_cart);

    ?>

        <div class="cart-content">

            <div class="panier">

                <div class="titre-panier">
                    <h3>Panier</h3>
                </div>

                <!-------------------------------------------------------->

                <div class="article_panier">

                    <?php

                    $total_panier = 0; //VARIABLE CONTENANT LE COÛT TOTAL DU PANIER
                    $total_cost_quantity = 0; //VARIABLE CONTENANT LE COÛT TOTAL D'UN ID PRODUIT EN FONCTION DE SA QUANTITE

                    $array_article = mysqli_fetch_all($user_cart, MYSQLI_ASSOC);

                    if (empty($array_article)) { ?>
                        <h2 style="text-align:center; margin-top:10%">Votre panier est vide</h2>
                        <?php
                    } else {

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

                            <div class="item">

                                <a href="http://localhost/FoneMarket/pages/page_produit.php?id=<?= $row["ID"]; ?>">
                                    <div class="image">
                                        <img class="photo_prod" src="<?= $row["PHOTO"]; ?>">
                                    </div>
                                </a>

                                <div class="description">
                                    <span><?= $row["NOM"]; ?></span>
                                    <span><?= $row_couleur["COULEUR"]; ?></span>
                                    <span><?= $row["STOCKAGE"]; ?> Go</span>
                                </div>

                                <div class="quantity">
                                    <span>Quantité : </b><?= $quantite; ?></span>
                                </div>

                                <div class="total-price"><span><?= $row["PRIX"]; ?> €</span></div>

                                <div class="delete-btn">
                                    <span><a href="../fonctions/delete_cart.php?id=<?= $articles["ID_PRODUIT"] ?>" class="delete">Supprimer</a></span>
                                </div>

                            </div>

                    <?php }
                    } ?>
                </div>
            </div>

            <div class="cost">

                <!-- NOMBRE ARTICLE -->
                <div class="nb_prod">

                    <?php $total = "SELECT SUM(QUANTITE) AS total_article FROM panier WHERE ID_UTILISATEUR = $user";
                    $res = mysqli_query($db, $total);
                    $data_row = mysqli_fetch_array($res);
                    $total_article = $data_row['total_article'];

                    if ($total_article == NULL) { ?>
                        <h4>0 article</h4>
                        <?php
                    } else {
                        if ($total_article > 1) { ?>
                            <h4><?php echo $total_article ?> articles</h4>
                        <?php } else { ?>
                            <h4 id="nb_article">1 article</h4>
                    <?php }
                    }
                    ?>
                </div>

                <div class="total_cost">

                <?php } ?>

                <h5>TOTAL : <?= $total_panier ?>€</h5>
                </div>

                <!-- BOUTON PASSER COMMANDE -->
                <div class="proceed_btn">
                    <input onclick="window.location.href='../pages/livraison.php';" id="btn_payer" type="button" value="PASSER COMMANDE">
                </div>

            </div>

        </div>

        <script>
            window.onload = function() {
                var total = '<?= $total_article ?>';
                var btnPay = document.getElementById("btn_payer");
                console.log(total);
                if (total == 0) {
                    btnPay.style.display = 'none';
                }
            }
        </script>

</body>


<footer>
    <?php
    include "../composants/footer.php";
    ?>
</footer>