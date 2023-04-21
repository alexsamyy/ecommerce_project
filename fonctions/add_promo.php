<head>
    <?php
    session_start();
    ob_start();
    include "../composants/main.php";
    // connexion à la base de données
    require_once "../composants/db.php";
    ?>
</head>

<?php
if (!isset($_SESSION['iduser'])) {
    header("Location: ../pages/login.php");
} else {
    $promo = $_POST["promo"];

    $rq_add_promo = "INSERT INTO promotion VALUES(null,$promo)";
    $add_promo = mysqli_query($db, $rq_add_promo);
    header("Location: ../pages/promotion.php?success=1");
}
?>