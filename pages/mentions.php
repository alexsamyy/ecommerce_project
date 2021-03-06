<head>
<?php
    $title = "Mentions légales";
    session_start();
    include "../composants/header.php";
    include "../composants/main.php";
    // connexion à la base de données
    require_once "../composants/db.php";
?>
</head>
<body>
<div class="flex-grow flex flex-col">
<article style="text-align:center; margin-top:50px;">
    <h1>Mentions légales</h1>
    <section style="margin-top:150px">
        <div>
            Nom social et forme juridique : FoneMarket SAS
            <br>
            Adresse du siège : 17 rue Linné, 75005 Paris France
            <br>
            Numéro et ville du RCS : Registre du commerce et des sociétés de Paris
            <br>
            Registre du commerce : 804 049 476 R.C.S. Paris
            <br>
            Numéro de TVA intracommunautaire : FR 64000000005
            <br>
            Numéro de téléphone : +33 1 54 00 00 00
            <br>
            Adresse courriel : contact@fonemarket.fr
            <br>
            Capital Social : 3 900 €
            <br>
        </div>
    </section>
</div>
</article>
</body>
<footer>
<?php
    include "../composants/footer.php";
?>
</footer>