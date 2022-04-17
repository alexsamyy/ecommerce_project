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

    <div style="text-align:justify; height: 100px; margin-top:250px; margin-bottom:220px; padding:20px">
        <h3 style="text-align:center">
            Les moyens de paiement
        </h3>

        <ul>
            <li>
                <h4>Carte bancaire :<h4>
                        <p style="font-size:medium">Le paiement par carte bancaire est 100% sécurisé, avec la
                            technologie 3D Secure. Ce moyen de paiement
                            est
                            proposé pour tous les produits du site.
                            Vous recevez systématiquement un code de vérification de votre banque sur votre téléphone
                            portable
                            afin
                            de finaliser la transaction.
                            Si votre paiement n'est pas validé alors que la 3D Secure est activée sur votre carte,
                            veuillez
                            vérifier
                            auprès de votre banque que vous disposez bien de la fonctionnalité « liability
                            shift / transfert des risques ».
                        </p>
            </li>
            <li>
                <h4>Vente sur le <a style="color:black; font-weight:bold" href="../pages/marketplace.php">Marketplace</a> :<h4>
                    <p style="font-size:medium">
                    Pour assurer le paiement et la bonne réception du produit de la part d'un vendeur, nous bloquons
                    les fonds jusqu'à que vous validiez la bonne réception du produit.<br>
                    Au bout de 30 jours suivant l'envoi du produit, nous validons
                    automatiquement la réception. Veuillez nous contacter en cas de litige
                    <a style="color:black; font-weight:bold" href="mailto::contact@fonemarket.fr">support@fonemarket.fr</a>.
                </p>
            </li>
        </ul>

    </div>

</body>
<footer>
    <?php
   include "../composants/footer.php";
?>
</footer>