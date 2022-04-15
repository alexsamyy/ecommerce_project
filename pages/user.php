<header>
<?php
    session_start();
    include "../composants/header.php";
    include "../composants/main.php";
    // connexion à la base de données
    require_once "../composants/db.php";
?>
</header>
<!-- Body -->
<body>
    <!-- Récupération prénom et nom de l'utilisateur -->
    
    <form class="logout" action="../fonctions/deconnexion.php">
        <button>Déconnexion</button>
    </form>
     
    <!-- Récupération prénom et nom de l'utilisateur -->
</body>

</html>
<!-- Body -->
<footer>
<?php
include "../composants/footer.php";
?>
</footer> 