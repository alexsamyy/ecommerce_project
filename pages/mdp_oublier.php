<head>
    <?php
    $title = "Réinitialiser son mot de passe";
    ob_start();
    session_start();
    include "../composants/main.php";
    include "../composants/header.php";
    // connexion à la base de données
    require_once "../composants/db.php";
    ?>

    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="../style/mdp_oublier.css" media="screen" type="text/css" />

</head>

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

            <form id="login" action="../fonctions/reset_pwd.php" method="POST">
                <h2>Réinitialiser son mot de passe</h2>

                <label><b>Adresse e-mail</b></label><br/>
                <input type="mail" placeholder="Entrer votre adresse e-mail" name="mail" required><br/><br/>
                
                <?php
                if (isset($_GET['erreur'])) {
                    $err = $_GET['erreur'];
                    echo "<p style='color:red'><b>L'adresse e-mail saisie n'est pas liée à un compte.</b></p>";
                }

                if (isset($_GET['success'])) {
                    $succes = $_GET['success'];
                    echo "<p style='color:green'><b>Un e-mail de réinitialisation vous a été envoyé.</b></p>";
                }
                ?>

                <input type="submit" id='submit' value='Réinitialiser mon mot de passe'>

            </form>
        </div>
    <?php } ?>
</body>

<footer>
    <?php
    include "../composants/footer.php";
    ?>
</footer>