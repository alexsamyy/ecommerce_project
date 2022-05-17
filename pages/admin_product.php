<head>
    <?php
    $title = "Gérer les articles";
    session_start();
    ob_start();
    include "../composants/header.php";
    // connexion à la base de données
    require_once "../composants/db.php";
    ?>

    <link rel="stylesheet" href="../style/admin_product.css" media="screen" type="text/css" />

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

        if ($row_user_info['EMAIL']  == "admin@fonemarket.fr") {

            //MYSQL SELECT SMARTPHONE TABLE
            $requete_all_prod = "SELECT * FROM smartphone";
            $all_prod = mysqli_query($db, $requete_all_prod);
    ?>

            <div class="all_prod_content">

                <!-------------------------------------------------------->

                <?php

                $array_article = mysqli_fetch_all($all_prod, MYSQLI_ASSOC);

                foreach ($array_article as $articles) {

                    //MYSQL SELECT INFORMATION TABLE SMARTPHONE ONLY
                    $id_this_product = $articles["ID"];

                    $requete_info = "SELECT * FROM smartphone WHERE '$id_this_product' = ID";
                    $info = mysqli_query($db, $requete_info);
                    $row = mysqli_fetch_array($info);

                    //MYSQL SELECT COLOUR INFORMATION TABLE COULEUR ONLY
                    $ID_COL = $row["ID_COULEUR"];
                    $requete_couleur = "SELECT c.COULEUR FROM couleur c WHERE $ID_COL = c.ID_COULEUR";
                    $couleur = mysqli_query($db, $requete_couleur);
                    $row_couleur = mysqli_fetch_array($couleur);

                    // ASK FOR MARQUE ID 
                    $id_marque = $articles["ID_MARQUE"];

                    $ID_MARQUE_request = "SELECT MARQUE FROM marque WHERE ID_MARQUE = $id_marque";
                    $req_res = mysqli_query($db, $ID_MARQUE_request);
                    $row_marque = mysqli_fetch_array($req_res);

                ?>



                    <div class="item">

                        <a href="http://localhost/FoneMarket/pages/page_produit.php?id=<?= $articles["ID"]; ?>">
                            <div class="image">
                                <img class="photo_prod" src="<?= $articles["PHOTO"]; ?>">
                            </div>
                        </a>

                        <div class="info_tech">
                            <span name="nom"><b>Nom : </b><?= $articles["NOM"]; ?></span>
                            <span name="marque"><b>Marque : </b><?= $row_marque["MARQUE"]; ?></span>
                            <span name="couleur"><b>Couleur : </b><?= $row_couleur["COULEUR"]; ?></span>
                            <span name="syst"><b>Système : </b><?= $articles["SYSTEME_D_EXPLOITATION"]; ?></span>
                            <span name="reseau"><b>Réseau : </b><?= $articles["RESEAU"]; ?></span>
                            <?php
                            $DualOrNot = "";
                            if ($articles["DOUBLE_SIM"] == 0) {
                                $DualOrNot = "NON";
                            } else {
                                $DualOrNot = "OUI";
                            }
                            ?>
                            <span name="dual_sim"><b>Dual sim : </b><?= $DualOrNot; ?></span>
                            <span name="app_photo"><b>Appareil photo : </b><?= $articles["APP_PHOTO"]; ?> Mpx</span>
                            <span name="ecran"><b>Ecran : </b><?= $articles["TAILLE_ECRAN"]; ?> Pouces</span>
                            <span name="stock"><b>Stockage : </b><?= $articles["STOCKAGE"]; ?> Go</span>
                            <span name="prix"><b>Prix : </b><?= $articles["PRIX"]; ?> €</span>
                            <?php
                            $NewOrNot = "";
                            if ($articles["NEUF"] == 0) {
                                $NewOrNot = "OCCASION";
                            } else {
                                $NewOrNot = "NEUF";
                            }
                            ?>
                            <span name="neuf"><?= $NewOrNot ?></span>
                        </div>

                        <div class="description">
                            <span name="description"><?= $articles["DESCRIPTION"]; ?></span>
                        </div>

                        <div class="delete_btn">
                            <span><a href="../pages/admin_modify_product.php?id=<?= $articles["ID"]; ?>" class="delete">Modifier</a></span>

                            <span><a href="../fonctions/admin_delete.php?id=<?= $articles["ID"] ?>" class="delete">Supprimer</a></span>
                        </div>
                    </div>
                <?php } ?>
            </div>
    <?php
        } else {
            header("Location: ../pages/home.php");
            die();
        }
    } ?>

</body>

<footer>
    <?php
    include "../composants/footer.php";
    ?>
</footer>