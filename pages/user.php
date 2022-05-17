<head>
    <?php
    $title = "Mon compte";
    ob_start();
    session_start();
    include "../composants/header.php";
    include "../composants/main.php";
    // connexion à la base de données
    require_once "../composants/db.php";
    ?>

    <script type="text/javascript">
        function display_c() {
            var refresh = 1000; // Refresh rate in milli seconds
            mytime = setTimeout('display_ct()', refresh)
        }

        function display_ct() {
            var x = new Date()
            var x1= x.getDate() + "/" +  (x.getMonth() + 1) + "/" + x.getFullYear();
            x1 = x1 + " - " + x.getHours() + ":" + x.getMinutes() + ":" + x.getSeconds();
            document.getElementById('ct').innerHTML = x1;
            display_c();
        }
    </script>

</head>


<!-- importer le fichier de style -->
<link rel="stylesheet" href="../style/login.css" media="screen" type="text/css" />
<link rel="stylesheet" href="../style/user.css" media="screen" type="text/css" />
</head>

<body onload=display_ct();>
    <!-- IF YES, REDIRECT TO HOME PAGE -->
    <?php
    if (isset($_SESSION['iduser']) == false) {

        header("Location: login.php");
        die();
    } // IF NOT ALREADY LOGGED IN, DISPLAY LOGIN PAGE
    else {
        // ---------------- ADMIN ACCESS -------------------- //

        $user = $_SESSION['iduser'];

        $sql = "SELECT * FROM utilisateur WHERE ID_UTILISATEUR = " . $user;
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result);

        if ($row['EMAIL']  == "admin@fonemarket.fr") { ?>
            <div id="container">
                <!-- zone de connexion -->

                <div id="login">
                    <h2>Administrateur</h2>

                    <div class="info_acc_user">
                        <b><span id='ct'></span></b><br>
                        <b>Adresse e-mail : </b><?= $row['EMAIL'] ?><br>
                    </div>

                    <button onclick="window.location.href='../pages/admin_product.php';" class="user_add_marketplace">Gérer les articles</button>

                    <button onclick="window.location.href='../pages/add_marketplace.php';" class="user_acc_commande">Ajouter un article</button>

                    <button onclick="window.location.href='../pages/admin_user.php';" class="user_acc_commande">Gérer les utilisateurs</button>

                    <button onclick="window.location.href='../pages/nouveau_mdp.php';" class="modify_pwd">Modifier mon mot de passe</button>

                    <button onclick="window.location.href='../fonctions/deconnexion.php';" class="logout">Déconnexion</button>

                </div>
            </div>
        <?php
        } else {
        ?>

            <div id="container">
                <!-- zone de connexion -->

                <div id="login">
                    <h2>Mon compte</h2>

                    <div class="info_acc_user">
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
    <?php }
    } ?>
</body>


<footer>
    <?php
    include "../composants/footer.php"
    ?>
</footer>