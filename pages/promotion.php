<head>
    <?php
    $title = "Mes commandes";
    ob_start();
    session_start();
    include "../composants/header.php";
    include "../composants/main.php";
    // connexion à la base de données
    require_once "../composants/db.php";
    ?>
</head>


<!-- importer le fichier de style -->
<link rel="stylesheet" href="../style/promotion.css" media="screen" type="text/css" />
</head>

<body>

    <div id="promo-body">
        <form id="login" action="../fonctions/add_promo.php" method="POST">
            <h2>Promotion</h2>
            <label>Entrer une nouvelle promotion :</label><br>
            <input name="promo" id="input" class="id_input" placeholder="Ex : 50">
            <input type="submit" id='submit' value='Ajouter le nouveau code promo'>
        </form> 
    </div>

    <?php
    include "../composants/footer.php"
    ?>