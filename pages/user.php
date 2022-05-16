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
<link rel="stylesheet" href="../style/user.css" media="screen" type="text/css" />
</head>

<body>
    <!-- IF YES, REDIRECT TO HOME PAGE -->
    <?php
    if (isset($_SESSION['iduser']) == false) {

        header("Location: login.php");
        die();
    } // IF NOT ALREADY LOGGED IN, DISPLAY LOGIN PAGE
    else {
    ?>

        <div id="container">
            <!-- zone de connexion -->

            <div id="login">
                <h2>Mon compte</h2>

                <div class="info_acc_user">
                    <?php
                    $user = $_SESSION['iduser'];

                    $sql = "SELECT * FROM utilisateur WHERE ID_UTILISATEUR = " . $user;
                    $result = mysqli_query($db, $sql);
                    $row = mysqli_fetch_array($result);

                    ?>
                    <b>Prénom : </b><?= $row['PRENOM'] ?><br>
                    <b>Nom : </b><?= $row['NOM'] ?><br>
                    <b>Adresse e-mail : </b><?= $row['EMAIL'] ?><br>
                    <b>Date de naissance : </b><?= $row['DATE_BIRTH'] ?><br>
                </div>

                <button onclick="window.location.href='../pages/gest_commande.php';" class="user_add_marketplace">Mes commandes</button>

                <button onclick="window.location.href='../pages/add_marketplace.php';" class="user_acc_commande">Ajouter un article</button>

                <button onclick="window.location.href='../pages/nouveau_mdp.php';" class="modify_pwd">Modifier mon mot de passe</button>

                <button onclick="window.location.href='../fonctions/deconnexion.php';" class="logout">Déconnexion</button>
                
            </div>
        </div>
    <?php } ?>
</body>


<footer>
    <?php
    include "../composants/footer.php"
    ?>
</footer>