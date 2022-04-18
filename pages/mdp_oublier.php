<header>
<?php
    $title = "Réinitialiser son mot de passe";
    ob_start();
    session_start();
    include "../composants/main.php";
    // connexion à la base de données
    require_once "../composants/db.php";
?>
</header>

<body>
    <form id="mdp_oublier" action="../fonctions/traitement_mdp_oublier.php" method="GET">
        <label>entrer un nouveau mot de passe</label><br />
        <input type="text" placeholder=" " name="mdp_oublier" required><br /><br />
        <input type="submit" id='submit' value='valider' >
    </form>
</body>

<footer>

</footer>
</html>