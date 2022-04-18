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
            if (isset($_SESSION['iduser']) == true){
                ?>

                <form class="logout" action="../fonctions/deconnexion.php">
                <button>Déconnexion</button>
                </form>

                <?php
            } // IF NOT ALREADY LOGGED IN, REDIRECTS TO HOME PAGE
            else{
               
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