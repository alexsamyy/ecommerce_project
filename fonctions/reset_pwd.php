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
if (isset($_SESSION['iduser'])) {
    header("Location: ../pages/login.php");
    die();
} else {
    //CHECK IF USER IS ALREADY IN TABLE
    $mail = $_POST["mail"];
    $check_user_email = "SELECT EMAIL FROM utilisateur WHERE EMAIL = '$mail'";
    $check_result_user = mysqli_query($db, $check_user_email);
    if ($row_check_user = mysqli_fetch_array($check_result_user)) {

        $to      = '$mail';
        $subject = 'Réinitialisation du mot de passe';

        // Le message
        $message = "Demande de réinitialisation du mot de passe.\r\n
        Si  vous n'êtes pas à l'origine de cette demande, veuillez modifier votre mot de passe.";

        $headers = 'From: no-reply@fonemarket.fr' . "\r\n" .

        mail($to, $subject, $message, $headers);


        header('Location: ../pages/mdp_oublier.php?success=1');
    } else {
        header('Location: ../pages/mdp_oublier.php?erreur=1');
    }
}
?>