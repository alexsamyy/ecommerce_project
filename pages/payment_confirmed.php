<head>
    <?php
    $title = "Paiement confirmé !";
    ob_start();
    session_start();
    // connexion à la base de données
    require_once "../composants/db.php";
    include "../composants/main.php";
    ?>
    <meta http-equiv="refresh" content="6;url=../pages/home.php">
    <link rel="stylesheet" href="../style/payment_process.css" media="screen" type="text/css" />
</head>

<body>

    <?php
    if (isset($_SESSION['iduser']) == false) {
        header("Location: ../pages/login.php");
        die();
    } else {
        //MYSQL SELECT INFORMATION TABLE PANIER ONLY
        $user = $_SESSION['iduser'];
        $requete_user_cart = "SELECT * FROM panier WHERE ID_UTILISATEUR = $user";
        $user_cart = mysqli_query($db, $requete_user_cart);
        $array_article = mysqli_fetch_all($user_cart, MYSQLI_ASSOC);

        if (empty($array_article)) {
            header("Location: ../pages/panier.php");
            die();
        } else {
    ?>

            <div class="center">
                <h3 class="thanks_txt">
                    <?php

                    $user = $_SESSION['iduser'];
                    $delete = "DELETE FROM panier WHERE ID_UTILISATEUR = " . $user;
                    $result = mysqli_query($db, $delete);

                    $sql = "SELECT * FROM utilisateur WHERE ID_UTILISATEUR = " . $user;
                    $result = mysqli_query($db, $sql);
                    $row = mysqli_fetch_array($result);

                    $prenom = $row['PRENOM'];

                    echo ($prenom . " !"); ?><br>
                    Votre commande a bien été prise en compte !<br>
                    Merci d'avoir commandé chez FoneMarket !<br>
                    Vous allez recevoir un email de confirmation.<br>
                    (Vous allez être rediriger vers la boutique dans 6 secondes.
                    <a style="color:black" href="../pages/home.php"><br>Cliquez-ici</a> pour être rediriger.)
                </h3>
            </div>
    <?php }
    } ?>

</body>