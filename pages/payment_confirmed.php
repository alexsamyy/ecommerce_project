<header>
    <?php
    $title = "Vérification du paiement";
    ob_start();
    session_start();
    // connexion à la base de données
    require_once "../composants/db.php";
    include "../composants/main.php";
?>
    <meta http-equiv="refresh" content="6;url=../pages/home.php">
</header>

<body>

    <?php
    if (isset($_SESSION['iduser']) == true){
        $user = $_SESSION['iduser'];

        $sql = "SELECT * FROM utilisateur WHERE ID_UTILISATEUR = " . $user;
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result);

        $prenom = $row['PRENOM'];
?>

    <div class="center">
        <h3 class="thanks_txt">
            <?php
            echo ($prenom . " !");?><br>
            Votre commande a bien été prise en compte !<br>
            Merci d'avoir commandé chez FoneMarket !<br>
            Vous allez recevoir un email de confirmation.<br>
            (Vous allez être rediriger vers la boutique dans 6 secondes.
            <a style="color:black" href="../pages/home.php"><br>Cliquez-ici</a> pour être rediriger.)
        </h3>
    </div>
    <?php }
    else{
        header("Location: ../pages/login.php");
    }?>

</body>