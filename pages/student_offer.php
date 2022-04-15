<header>
<?php
    session_start();
    include "../composants/header.php";
    include "../composants/main.php";
    // connexion à la base de données
    require_once "../composants/db.php";
?>
</header>
<body>

<div style="height: 100px; margin-top:250px; margin-bottom:10px;" class="text_sell">
<h3 style="text-align:center">
    Découvrez nos offres étudiantes !
</h3>
<h4 style="text-align:center";>
    Connectez-vous avec votre <a class="unidays" href="https://www.myunidays.com/FR/fr-FR/account/log-in">compte Unidays</a> ! <br>
    Et profitez de -10% de réduction lors de l'achat de votre nouveau smartphone ! <br>
    <h6 style="text-align:center">(Uniquement sur les smartphones neufs. Non disponible pour le marketplace.)</h6>
</h4>
</div>

</body>
<footer>
<?php
    include "../composants/footer.php";
?>
</footer>