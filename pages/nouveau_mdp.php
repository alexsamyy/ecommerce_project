<head>
    <?php
    $title = "Nouveau mot de passe";
    ob_start();
    session_start();
    include "../composants/main.php";
    include "../composants/header.php";
    // connexion à la base de données
    require_once "../composants/db.php";
    ?>

    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="../style/nouveau_mdp.css" media="screen" type="text/css" />

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

            <form id="login" action="../fonctions/modification_pwd.php" method="POST">
                <h2>Nouveau mot de passe</h2>

                <label><b>Mot de passe actuel</b></label><br />
                <input id="mdp" type="password" placeholder="Entrer votre mot de passe actuel" name="current_pwd" required><br /><br />

                <label><b>Nouveau mot de passe</b></label>
                <input id="confirm_mdp" type="password" placeholder="Entrer votre nouveau mot de passe" name="new_pwd" required>

                <input type="submit" id='submit' value='Changer mon mot de passe'>

                <p><a href="mdp_oublier.php">Mot de passe oublié ?</a></p>


                <?php
                if (isset($_GET['erreur'])) {
                    $err = $_GET['erreur'];
                    echo "<p style='color:red'><b>Mot de passe incorrect</b></p>";
                }

                if (isset($_GET['success'])) {
                    $succes = $_GET['success'];
                    echo "<p style='color:green'><b>Votre mot de passe a bien été modifié !</b></p>";
                }
                ?>
            </form>
        </div>
    <?php } ?>

</body>

<footer>
    <?php
    include "../composants/footer.php";
    ?>
</footer>