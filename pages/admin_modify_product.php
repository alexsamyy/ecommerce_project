<header>
    <?php
    $title = "Ajouter un article";
    ob_start();
    session_start();
    include "../composants/header.php";
    include "../composants/main.php";
    // connexion à la base de données
    require_once "../composants/db.php";
    ?>
</header>


<!-- importer le fichier de style -->
<link rel="stylesheet" href="../style/admin_modify_prod.css" media="screen" type="text/css" />
</head>

<body>

    <?php

    //MYSQL SELECT INFORMATION TABLE SMARTPHONE ONLY
    $id_this_product = $_GET["id"];

    $requete_info = "SELECT * FROM smartphone WHERE '$id_this_product' = ID";
    $info = mysqli_query($db, $requete_info);
    $row = mysqli_fetch_array($info);

    //MYSQL SELECT COLOUR INFORMATION TABLE COULEUR ONLY
    $ID_COL = $row["ID_COULEUR"];
    $requete_couleur = "SELECT c.COULEUR FROM couleur c WHERE $ID_COL = c.ID_COULEUR";
    $couleur = mysqli_query($db, $requete_couleur);
    $row_couleur = mysqli_fetch_array($couleur);

    // ASK FOR MARQUE ID 
    $id_marque = $row["ID_MARQUE"];

    $ID_MARQUE_request = "SELECT MARQUE FROM marque WHERE ID_MARQUE = $id_marque";
    $req_res = mysqli_query($db, $ID_MARQUE_request);
    $row_marque = mysqli_fetch_array($req_res);

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

        if ($row_user_info['EMAIL']  != "admin@fonemarket.fr") {

            header("Location: ../pages/home.php");
            die();
        }

    ?>

            <div id="container">
                <!-- zone de connexion -->

                <form id="login" action="../fonctions/admin_prod.php?id=<?= $id_this_product ?>" enctype="multipart/form-data" method="POST">
                    <h2>Modifier un article</h2>
                    <p>
                        <label for="nom"><b>Nom du produit :</b></label><br />
                        <input type="text" placeholder="Ex: iPhone X" name="nom" value="<?= $row["NOM"] ?>" required>
                    </p>
                    <p>
                        <label for="prix"><b>Prix :</b></label><br />
                        <input type="text" placeholder="Entrer un prix" name="prix" value="<?= $row["PRIX"] ?>" required>
                    </p>
                    <P>
                        <label for="systeme_d_exploitation"><b>Système d'exploitation :</b></label><br />
                        <input type="text" placeholder="Ex: iOS" name="systeme_d_exploitation" value="<?= $row["SYSTEME_D_EXPLOITATION"] ?>" required>
                    </P>
                    <P>
                        <label for="stockage"><b>Mémoire de stockage (Go) :</b></label><br />
                        <input type="text" placeholder="Ex: 128" name="stockage" value="<?= $row["STOCKAGE"] ?>" required>
                    </P>
                    <p>
                        <label for="reseau"><b>Réseau :</b></label><br />
                        <input type="text" placeholder="Ex: 5G" name="reseau" value="<?= $row["RESEAU"] ?>" required>
                    </p>
                    <p>
                        <label for="dual_sim"><b>Dual sim :</b></label><br />
                        <select name="dual_sim" id="dual_sim" required>
                            <option value="">Veuillez choisir une option</option>
                            <?php
                            if ($row["DOUBLE_SIM"] == 1) { ?>
                                <option selected value="1">Oui</option>
                                <option value="0">Non</option>
                            <?php } else { ?>
                                <option value="1">Oui</option>
                                <option selected value="0">Non</option>
                            <?php } ?>
                        </select><br />
                    </p>
                    <p>
                        <label for="app_photo"><b>Résolution de la caméra (Mpx) :</b></label><br />
                        <input type="text" placeholder="Ex: 5" name="app_photo" value="<?= $row["APP_PHOTO"] ?>" required>
                    </p>
                    <p>
                        <label for="taille_ecran"><b>Taille de l'écran (en pouces) :</b></label><br />
                        <input type="text" placeholder="Ex: 4,7" name="taille_ecran" value="<?= $row["TAILLE_ECRAN"] ?>" required>
                    </p>
                    <p>
                        <label for="description"><b>Description du smartphone :</b></label><br />
                        <textarea id="description" placeholder="Ex: Smartphone en très bon état..." name="description" required><?= $row["DESCRIPTION"] ?></textarea><br>
                    </p>
                    <p>
                        <label for="marque"><b>Marque :</b></label><br />
                        <select name="marque" id="marque" required>
                            <option value="">--choisir une option--</option>
                            <?php
                            $marque = "SELECT * FROM marque";
                            $result = mysqli_query($db, $marque);
                            while ($row_brand = mysqli_fetch_array($result)) {
                                $id_brand = $row_brand["ID_MARQUE"];
                                $nom = $row_brand["MARQUE"];
                                $ligne = "<option value='$id_brand'>$nom</option>";
                                if ($row_marque["MARQUE"] == $nom) {
                                    $ligne = "<option selected value='$id_brand'>$nom</option>";
                                }
                                echo $ligne;
                            }
                            ?>
                        </select>
                    </p>
                    <p>
                        <label for="couleur"><b>Couleur :</b></label><br />
                        <select name="couleur" id="couleur" required>
                            <option value="">--choisir une option--</option>
                            <?php
                            $couleur = "SELECT * FROM couleur";
                            $result = mysqli_query($db, $couleur);
                            while ($row_coul = mysqli_fetch_array($result)) {
                                $id_coul = $row_coul["ID_COULEUR"];
                                $coul = $row_coul["COULEUR"];
                                $ligne = "<option value='$id_coul'>$coul</option>";
                                if ($row_couleur["COULEUR"] == $coul) {
                                    $ligne = "<option selected value='$id_coul'>$coul</option>";
                                }
                                echo $ligne;
                            }
                            ?>
                        </select>
                    </p>
                    <p>
                        <input type="submit" id='submit' value='Modifier'>
                    </p>
                </form>
            </div>
    <?php } ?>

    <?php
    include "../composants/footer.php"
    ?>