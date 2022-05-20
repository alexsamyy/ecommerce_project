<?php
require_once "../composants/db.php";
?>

<?php

$prenom = addslashes($_POST["prenom"]);
$nom = addslashes($_POST["nom"]);
$date_naissance = addslashes($_POST["date_naissance"]);
$mail = addslashes($_POST["mail"]);
$mdp1 = addslashes($_POST["password"]);
//hachage du mot de passe $mdp1
$mdp = password_hash($mdp1, PASSWORD_DEFAULT);
$role = addslashes($_POST["role"]);

//CHECK IF USER IS ALREADY IN TABLE
$check_user_email = "SELECT EMAIL FROM utilisateur WHERE EMAIL = '$mail'";
$check_result_user = mysqli_query($db, $check_user_email);
if ($row_check_user = mysqli_fetch_array($check_result_user)) {
    header('Location: ../pages/newuser.php?erreur=1');
} else {
    $sql = "insert into utilisateur " .
        "values(NULL,'" . $prenom . "','" . $nom .
        "','" . $mail .  "','" . $date_naissance . "','" . $mdp . "')";

    mysqli_query($db, $sql);

    header('location: ../pages/login.php');
}
?>

