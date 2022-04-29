<header>
    <?php
    $title = "Mon compte";
    ob_start();
    session_start();
    include "../composants/header.php";
    include "../composants/main.php";
    // connexion à la base de données
    require_once "../composants/db.php";
    ?>
</header>
<!-- Body -->

<body>

    <!-- IF YES, DISPLAY LOG OUT PAGE -->
    <?php
    if (isset($_SESSION['iduser']) == true) {
    ?>
        <!-- GRID PRINCIPAL PARTIE COMPTE USER -->
        <div class="grid_container_user">
            <!-- GRID INFORMATIONS PERSONNELLES USER -->
            <div class="info_acc_user">
                
            </div>
            <div class="info_acc_paiement">
                <input onclick="window.location.href='../pages/paiement.php';" class="" type="button" value="paiement">
            </div>
            <div class="user_acc_commande">
                <input onclick="window.location.href='../pages/payment_checkout.php';" class="btn_payer" type="button" value="PASSER COMMANDE">
            </div>
            <div class="user_add_marketplace">
                <input onclick="window.location.href='../pages/add_marketplace.php';" class="" type="button" value="Ajouter un article">
            </div>
        </div>
        <form class="logout" action="../fonctions/deconnexion.php">
            <button>Déconnexion</button>
        </form>

    <?php
    } // IF NOT ALREADY LOGGED IN, REDIRECTS TO HOME PAGE
    else {

        header("Location: login.php");
        die();
    }

    ?>


</body>

</html>
<!-- Body -->
<footer>
    <?php
    include "../composants/footer.php";
    ?>
</footer>