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

    <div style="text-align:justify; padding:20px; height: 100px; margin-top:220px; margin-bottom:110px;">
        <h3 style="text-align:center">
            Livraison &#128666
        </h3>
        <h4 style="text-align:center">
            FoneMarket ne livre que dans les pays où le site est disponible. Il n'est pas possible de commander sur un
            site pour se faire livrer dans un autre pays.<br>

            FoneMarket est aujourd'hui présent uniquement en France métropolitaine.<br>

            Les frais de livraison dépendent de l'adresse de livraison. Les frais sont calculés lors du passage au
            paiement.<br>

            &#128721 (Pour le <a style="color:black; font-weight:bold" href="../pages/marketplace.php">Marketplace</a>, la livraison est à voir avec le vendeur
            directement.
            <br>
            FoneMarket ne sera pas tenu responsable en cas d'erreur dans l'adresse de livraison ou en cas d'erreur durant l'envoi.)<br>

            Si vous avez des questions, n'hésitez pas à nous contacter <a style="color:black; font-weight:bold" class="hire_mail"
                href="mailto:hr@fonemarket.fr">support@fonemarket.fr &#128172</a>.<br>
        </h4>
    </div>

</body>
<footer>
    <?php
    include "../composants/footer.php";
?>
</footer>