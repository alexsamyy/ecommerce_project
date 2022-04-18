<header>
    <?php
    $title = "Support retour";
    session_start();
    include "../composants/header.php";
    include "../composants/main.php";
    // connexion à la base de données
    require_once "../composants/db.php";
?>
</header>

<body>

    <div style="text-align:justify; padding:20px; height: 100px; margin-top:220px; margin-bottom:120px;">
        <h3 style="text-align:center">
            Retour 
        </h3>
        <h4 style="text-align:center">
            Suite à l'achat d'un produit, vous disposez d'une <b>période de rétractation de 30 jours</b> pour nous le renvoyer.<br>
            Tous les éléments doivent être retournés dans leur état et emballage d'origine.<br>
            Nous vous rembourserons le montant prélevé suite à la bonne réception du produit.
            <b>Le remboursement s'effectuera sous 14 jours ouvrés.</b><br>
            Dans le cas où les conditions de renvoi ne sont pas respectées, nous vous retournerons le produit.
            Des frais peuvent vous être facturés.<br>

            &#128721 (Pour le <a style="color:black; font-weight:bold" href="../pages/marketplace.php">Marketplace</a>, les retours ne sont pas
            autorisés.) <br>    

            Merci de nous contacter en cas de problème <a style="color:black; font-weight:bold" class="hire_mail"
                href="mailto:hr@fonemarket.fr">support@fonemarket.fr</a>.<br>
        </h4>
    </div>

</body>
<footer>
    <?php
    include "../composants/footer.php";
?>
</footer>