<head>
    <?php
    $title = "Créer un compte";
    session_start();

    if (isset($_SESSION['iduser']) == true) {

        header("Location: home.php");
    } // IF NOT ALREADY LOGGED IN, DISPLAY CREATE AN ACCOUNT PAGE
    else {

        include "../composants/header.php";
        include "../composants/main.php";
        // connexion à la base de données
        require_once "../composants/db.php";
    ?>

        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="../style/login.css" media="screen" type="text/css" />

        <script>
            window.onload = () => {
                const confirm_pwd = document.getElementById('confirm_input');
                confirm_pwd.onpaste = e => e.preventDefault();
            }
            function motdp(){
                var mdp = document.getElementById('mdp').value;
                mdp.search([a-z](1)[A-z](4));
            }
        </script>
</head>

<body>

    <div id="container">
        <!-- zone de connexion -->


        <form id="login" action="../fonctions/traitement_newuser.php" method="POST">
            <h2>Créer un compte</h2>

            <label><b>Prénom</b></label><br />
            <input  type="text" placeholder="Entrer votre prénom" name="prenom" required><br /><br />

            <label><b>Nom</b></label><br />
            <input type="text" placeholder="Entrer votre nom" name="nom" required><br /><br />

            <label><b>Date de naissance</b></label><br />
            <input type="date" placeholder="Entrer votre date de naissance" name="date_naissance" required><br /><br />


            <label><b>E-mail</b></label><br />
            <input type="email" placeholder="Entrer votre adresse e-mail" name="mail" required><br /><br />

            <label><b>Mot de passe</b></label>
            <input id="mdp" type="password" placeholder="Entrer votre mot de passe" name="password" required><br /><br />

            <label><b>Confirmer votre mot de passe</b></label>
            <input id="confirm_input" type="password" placeholder="Confirmer votre mot de passe" name="password_confirm" required><br /><br />

            <input type="submit" id='submit' value='Créer un compte'>
            <br><br>
            <p>Déjà membre ? <a href="../pages/login.php" class="HasAcc">Connectez-vous !</a></p>

            <?php
            if (isset($_GET['erreur'])) {
                if ($_GET['erreur'] == 1){
                    echo "<p style='color:red'><b>L'adresse e-mail est déjà utilisée !</b></p>";
                }
                if ($_GET['erreur'] == 2){
                    echo "<p style='color:red'><b>Veuillez entrer le même mot de passe !</b></p>";
                }
                if ($_GET['erreur'] == 3){
                    echo "<p style='color:red'><b>Veuillez vérifier votre date de naissance !</b></p>";
                }
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