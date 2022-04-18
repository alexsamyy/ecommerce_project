<header>
    <?php
    $title = "Vérification du paiement";
    session_start();
    // connexion à la base de données
    require_once "../composants/db.php";
    include "../composants/main.php";
?>
    <meta http-equiv="refresh" content="3.5;url=../pages/payment_confirmed.php">
</header>

<body>
    <div class="center">
        <div class="processing">
            <div class="gif_part">
                <img class="gif_panda" src="../media/pandaRolling.gif">
            </div>
            <br>
            <div class="text_confirm">
                <h3 class="text_confirm_process">Confirmation de votre commande...</h3>
            </div>
        </div>
    </div>
</body>