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


<!-- importer le fichier de style -->
<link rel="stylesheet" href="../style/login.css" media="screen" type="text/css" />
</head>

<body>

    <div id="container_user">

        <?php
        if (isset($_SESSION['iduser']) == true) {
        ?>
            <!-- GRID PRINCIPAL PARTIE COMPTE USER -->
            <div class="grid_container_user">
                <!-- GRID INFORMATIONS PERSONNELLES USER -->
                <div class="info_acc_user">
                    <?php
                    $user = $_SESSION['iduser'];

                    $sql = "SELECT * FROM utilisateur WHERE ID_UTILISATEUR = " . $user;
                    $result = mysqli_query($db, $sql);
                    $row = mysqli_fetch_array($result);


                    echo "Prénom : " . $row['PRENOM'];
                    echo "<br/>";
                    echo "Nom : " . $row['NOM'];
                    echo "<br/>";
                    echo "Role : " . $row['ROLE'];
                    echo "<br/>";
                    echo "Adresse mail : " . $row['EMAIL'];
                    echo "<br/>";
                    echo "Date de naissance : " . $row['DATE_BIRTH'];
                    ?>
                </div><br><br>
                <div class="user_acc_commande">
                    <input onclick="window.location.href='../pages/orders.php';" class="check_order" type="button" value="Vos commandes">
                </div><br><br>


                <div class="info_acc_paiement">
                    <input onclick="window.location.href='../pages/paiement.php';" class="banking_info" type="button" value="Vos moyens de paiement">
                </div><br><br>

                <div class="user_add_marketplace">
                    <input onclick="window.location.href='../pages/add_marketplace.php';" class="" type="button" value="Vendre un article">
                </div><br><br>

                <div>
                    <form class="logout" action="../fonctions/deconnexion.php">
                        <button>Déconnexion</button>
                    </form>
                </div>

            <?php
        } // IF NOT ALREADY LOGGED IN, REDIRECTS TO HOME PAGE
        else {

            header("Location: login.php");
            die();
        }

            ?>




            </div>
            <?php  ?>

            <?php
            include "../composants/footer.php"
            ?>

            </html>