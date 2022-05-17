<head>
        <?php
        ob_start();
        session_start();
        // connexion à la base de données
        require_once "../composants/db.php";
        ?>
</head>


<?php
$chosen_id_user = $_GET["id"];
$prenom = $_POST["prenom"];
$nom = $_POST["nom"];
$mail = $_POST["mail"];
$birth = $_POST["birth"];

//CHECK IF USER IS ALREADY IN TABLE
$check_user_email = "SELECT EMAIL FROM utilisateur WHERE EMAIL = '$mail'";
$check_result_user = mysqli_query($db, $check_user_email);
if ($row_check_user = mysqli_fetch_array($check_result_user)) {
        header('Location: ../pages/admin_user.php?erreur=1');
} else {

        $sql = "UPDATE `utilisateur` SET
`PRENOM`= '" . $prenom . "',`NOM`= '" . $nom . "',`EMAIL`='" . $mail . "',`DATE_BIRTH`='" . $birth . "' WHERE ID_UTILISATEUR = $chosen_id_user";

        echo $sql;

        $sql = mysqli_query($db, $sql);

        header('Location: http://localhost/FoneMarket/pages/admin_user.php');
}
