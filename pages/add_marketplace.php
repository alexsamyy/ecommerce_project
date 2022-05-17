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
<link rel="stylesheet" href="../style/add_marketplace.css" media="screen" type="text/css" />
</head>

<body>

    <div id="container">
        <!-- zone de connexion -->
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

                //VALUE TEXT IN SUBMIT BUTTON
                $btn_value = "Ajouter un smartphone";?>
    
                <?php
            }else{?>
                <form id="login" action="../fonctions/traitement_add_marketplace.php?admin=false" enctype="multipart/form-data" method="POST">
                    <h2>Vendre son appareil</h2>
                    <p>
                        <select hidden name="neuf" id="neuf">
                            <option value="null">Veuillez choisir une option</option>
                            <option value="1">Oui</option>
                            <option selected value="0">Non</option>
                        </select><br />
                    </p>
                    <?php
                $btn_value = "Vendre mon smartphone";
            }

            if ($row_user_info['EMAIL']  == "admin@fonemarket.fr") {

                //VALUE TEXT IN SUBMIT BUTTON
                $btn_value = "Ajouter un smartphone"
                ?>

                <form id="login" action="../fonctions/traitement_add_marketplace.php?admin=true" enctype="multipart/form-data" method="POST">
                    <h2>Ajouter un appareil</h2>
                    <p>
                        <label for="neuf"><b>Neuf</b></label><br />
                        <select name="neuf" id="neuf">
                            <option value="null">Veuillez choisir une option</option>
                            <option value="1">Oui</option>
                            <option value="0">Non</option>
                        </select><br />
                    </p>
            <?php
            }
        }
            ?>

            <p>
                <label for="nom"><b>Nom du produit :</b></label><br />
                <input type="text" placeholder="Ex: iPhone X" name="nom" required>
            </p>
            <p>
                <label for="prix"><b>Prix :</b></label><br />
                <input type="text" placeholder="Entrer un prix" name="prix" required>
            </p>
            <P>
                <label for="systeme_d_exploitation"><b>Système d'exploitation :</b></label><br />
                <input type="text" placeholder="Ex: iOS" name="systeme_d_exploitation" required>
            </P>
            <P>
                <label for="stockage"><b>Mémoire de stockage (Go) :</b></label><br />
                <input type="text" placeholder="Ex: 128" name="stockage" required>
            </P>
            <p>
                <label for="reseau"><b>Réseau :</b></label><br />
                <input type="text" placeholder="Ex: 5G" name="reseau" required>
            </p>
            <p>
                <label for="dual_sim"><b>Dual sim :</b></label><br />
                <select name="dual_sim" id="dual_sim">
                    <option value="null">Veuillez choisir une option</option>
                    <option value="1">Oui</option>
                    <option value="0">Non</option>
                </select><br />
            </p>
            <p>
                <label for="app_photo"><b>Résolution de la caméra (Mpx) :</b></label><br />
                <input type="text" placeholder="Ex: 5" name="app_photo" required>
            </p>
            <p>
                <label for="taille_ecran"><b>Taille de l'écran (en pouces) :</b></label><br />
                <input type="text" placeholder="Ex: 4,7" name="taille_ecran" required>
            </p>
            <p>
                <label for="description"><b>Description du smartphone :</b></label><br />
                <textarea id="description" type="text" placeholder="Ex: Smartphone en très bon état..." name="description" required></textarea><br>
            </p>
            <p>
                <label for="marque"><b>Marque :</b></label><br />
                <select name="marque" id="marque">
                    <option value="null">--choisir une option--</option>
                    <?php
                    $marque = "SELECT * FROM marque";
                    $result = mysqli_query($db, $marque);
                    while ($row = mysqli_fetch_array($result)) {
                        $id = $row["ID_MARQUE"];
                        $nom = $row["MARQUE"];
                        $ligne = "<option value='$id'>$nom</option>";
                        echo $ligne;
                    }
                    ?>
                </select>
            </p>
            <p>
                <label for="couleur"><b>Couleur :</b></label><br />
                <select name="couleur" id="couleur">
                    <option value="null">--choisir une option--</option>
                    <?php
                    $couleur = "SELECT * FROM couleur";
                    $result = mysqli_query($db, $couleur);
                    while ($row = mysqli_fetch_array($result)) {
                        $id = $row["ID_COULEUR"];
                        $nom = $row["COULEUR"];
                        $ligne = "<option value='$id'>$nom</option>";
                        echo $ligne;
                    }
                    ?>
                </select>
            </p>
            <p>


                <label for="photo"><b>Ajouter une image</b></b></label><br />
                <input type="file" name="name" />

                <input type="submit" id='submit' value="<?=$btn_value?>">
            </p>
                </form>
    </div>

    <?php
    include "../composants/footer.php"
    ?>