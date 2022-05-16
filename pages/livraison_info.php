<head>
    <?php
    $title = "Livraison";
    session_start();
    include "../composants/header.php";
    include "../composants/main.php";
    // connexion à la base de données
    require_once "../composants/db.php";
    ?>
</head>

<body>

    <div style="text-align:justify; padding:20px; height: 190px; margin-top:200px; margin-bottom:110px;">
        <h3 style="text-align:center">
            Livraison &#128666
        </h3>
        <h4 style="text-align:center">
            FoneMarket ne livre que dans les pays où le site est disponible.<br>Il n'est pas possible de commander sur un
            site pour se faire livrer dans un autre pays.<br>

            FoneMarket est aujourd'hui présent uniquement en France métropolitaine.<br>

            Les frais de livraison sont aujourd'hui fixés à 20 €, peu importe le montant de la commande.<br>

            &#128721 (Pour le <a style="color:black; font-weight:bold" href="../pages/marketplace.php">Marketplace</a>, les frais de livraison sont les mêmes.
            <br>
            FoneMarket ne sera pas tenu responsable en cas d'erreur provenant de l'acheteur dans l'adresse de livraison.)<br>

            Si vous avez des questions, n'hésitez pas à nous contacter <a style="color:black; font-weight:bold" class="hire_mail" href="mailto:hr@fonemarket.fr">support@fonemarket.fr &#128172</a>.<br>
        </h4>
    </div>

</body>

<footer>
    <?php
    include "../composants/footer.php";
    ?>
</footer>