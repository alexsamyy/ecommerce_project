<head>
    <?php
    $title = "Connexion";
    ob_start();
    session_start();
    include "../composants/header.php";
    include "../composants/main.php";
    // connexion à la base de données
    require_once "../composants/db.php";
    ?>

    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="../style/login.css" media="screen" type="text/css" />

</head>

<p>COUCOU</p>
<body>
    <!-- IF YES, REDIRECT TO HOME PAGE -->
    <?php
    if (isset($_SESSION['iduser']) == true) {

        header("Location: home.php");
        die();
    } // IF NOT ALREADY LOGGED IN, DISPLAY LOGIN PAGE
    else {
    ?>

        <div id="container">
            <!-- zone de connexion -->

            <form id="login" action="../fonctions/verification_login.php" method="POST">
                <h2>Connexion</h2>

                <label><b>E-mail</b></label><br />
                <input type="email" placeholder="Entrer votre adresse e-mail" name="mail" required><br /><br />

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer votre mot de passe" name="password" required>

                <input type="submit" id='submit' value='Login'>
                
                <p><a href="mdp_oublier.php">Mot de passe oublié ?</a></p>
                <p><a href="../pages/newuser.php">Créer un compte </a> pour vous connecter si vous n'en avez pas un</p>

                <?php
                if (isset($_GET['erreur'])) {
                    $err = $_GET['erreur'];
                    if ($err == 1 || $err == 2)
                        echo "<p style='color:red'><b>Adresse e-mail ou mot de passe incorrect</b></p>";
                }
                ?>
            </form>
        </div>
    <?php } ?>
</body>

<footer>
    <?php
    include "../composants/footer.php"
    ?>
</footer>