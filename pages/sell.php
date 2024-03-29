<head>
<?php
    $title = "Vendre son smartphone";
    session_start();
    include "../composants/header.php";
    include "../composants/main.php";
    // connexion à la base de données
    require_once "../composants/db.php";
?>
</head>

<body>
<div style="height: 100px; margin-top:230px; margin-bottom:100px;" class="text_sell">
<h3 style="text-align:center">
    Vous souhaitez redonner vie à votre ancien appareil ?
</h3>
<h4 style="text-align:center";>
    Comment ça marche ?
</h4>
<br>
<p style="text-align:center">
    Répondez à notre <a href="#" style="color:black; font-weight:bold">questionnaire</a> pour savoir si votre smartphone est éligible !
    <br>
    Si votre smartphone est éligible, <a href="../pages/newuser.php" style="color:black; font-weight:bold">créez-vous un compte</a> et postez votre annonce !
    <br>
    Vous avez déjà répondu au questionnaire et votre smartphone est éligible à la vente ? <a href="../pages/add_marketplace.php" style="color:black; font-weight:bold">Cliquez-ici !</a>
</div>
</body>

<footer>
<?php
    include "../composants/footer.php";
?>
</footer>