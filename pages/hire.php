<head>
<?php
    $title = "Recrutement";
    session_start();
    include "../composants/header.php";
    include "../composants/main.php";
    // connexion à la base de données
    require_once "../composants/db.php";
?>

<link rel="stylesheet" href="../style/hire.css" media="screen" type="text/css"/>

</head>


<body>

<div style="height: 100px; margin-top:220px; margin-bottom:100px;">
<h3 style="text-align:center">
    Vous souhaitez nous rejoindre dans l'aventure FoneMarket ?
</h3>
<h4 style="text-align:center";>
    Travaillez dans une toute nouvelle start-up parmi une équipe de trois personnes dans une bonne ambiance !<br>
    Nous recherchons des personnes qualifiées dans la vente à distance peu importe l'expérience.<br>
    Les seules qualités à avoir sont d'être dynamique, savoir coopérer avec son équipe et avoir le sourire !<br>
    Si vous pensez pouvoir remplir ces critères, n'hésitez pas à nous envoyer
    votre CV à cette adresse email <a class="hire_mail" href="mailto:hr@fonemarket.fr">hr@fonemarket.fr</a><br>
</h4>
</div>

</body>
<footer>
<?php
    include "../composants/footer.php";
?>
</footer>