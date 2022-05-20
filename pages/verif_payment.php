<head>
    <?php
    $title = "Vérification du paiement";
    ob_start();
    session_start();
    // connexion à la base de données
    require_once "../composants/db.php";
    include "../composants/main.php";
    ?>
    <meta http-equiv="refresh" content="3.5;url=../pages/payment_confirmed.php">
    <link rel="stylesheet" href="../style/payment_process.css" media="screen" type="text/css" />
</head>

<body>

    <?php

    if (isset($_SESSION['iduser']) == false) { // IF NOT ALREADY LOGGED IN, DISPLAY LOGIN PAGE

        header("Location: ../pages/login.php");
        die();
    } // IF ALREADY LOGGED IN, DISPLAY PAGE
    else {

        //MYSQL SELECT INFORMATION TABLE PANIER ONLY
        $user = $_SESSION['iduser'];
        $requete_user_cart = "SELECT * FROM panier WHERE ID_UTILISATEUR = $user";
        $user_cart = mysqli_query($db, $requete_user_cart);
        $array_article = mysqli_fetch_all($user_cart, MYSQLI_ASSOC);

        if (empty($array_article)) {
            header("Location: ../pages/panier.php");
            die();
        } else {

            //------------------- INSERT INTO DETAIL_COMMANDE ------------------------

            //MYSQL SELECT USER INFORMATION
        $sql = "SELECT * FROM utilisateur WHERE ID_UTILISATEUR = " . $user;
        $result = mysqli_query($db, $sql);
        $row_user_info = mysqli_fetch_array($result);

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

            // DEFINE ID_COMMANDE
            $check_id_commande =
            "SELECT * FROM detail_commande";
            $check_request = mysqli_query($db, $check_id_commande);
            $row_check_id_commande = mysqli_fetch_array($check_request);

            if ($row_check_id_commande == false){
                $id_commande = 1;
            }else{
                
            }

            $add_detail_commande =
            "insert into detail_commande values(NULL, 1, $quantite, $id_this_product)" ;
            // echo $add_detail_commande;

            mysqli_query($db, $add_detail_commande);
        }

            //------------------- INSERT INTO COMMANDE ------------------------
            $sql = "SELECT * FROM utilisateur WHERE ID_UTILISATEUR = " . $user;
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_array($result);

            $row = $row['PRENOM'];

            $rand_nb_4_digits = rand(1000,9999);

            // ------------- NUMERO DE COMMANDE --------------
            $order_nb = '#' . strval($rand_nb_4_digits) . substr($row, 0, 1);

            //-------------- DATE DE LA COMMANDE --------------
            date_default_timezone_set('Europe/Paris');
            $date_time = date('d-m-y h:i:s');
            $date_order = explode(' ', $date_time);
            
            // ------------ EXPEDITEUR ------------------
            $expediteur = "FoneMarket";

            $add_commande =
            "insert into commande values(1, '$order_nb', $user, '$date_order[0]', '$expediteur')" ;
            // echo $add_commande;

            mysqli_query($db, $add_commande);
            //-------------------------------------------------------------------


            

    ?>


        <div class="center">
            <div class="processing">
                <div class="gif_part">
                    <img class="gif_panda" src="../media/pandaRolling.gif">
                </div>
                <br>
                <div class="text_confirm">
                    <h3 class="text_confirm_process">Confirmation de votre commande...</h3>
                </div>
            </div>
        </div>
    <?php }} ?>
</body>