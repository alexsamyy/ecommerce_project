<?php
require_once "../composants/db.php";
?>

<?php

$prenom = addslashes($_POST["prenom"]);
$nom = addslashes($_POST["nom"]);
$date_naissance = addslashes($_POST["date_naissance"]);
$mail = addslashes($_POST["mail"]);
$mdp1 = addslashes($_POST["password"]);

//CHECK IF USER IS ALREADY IN TABLE
$check_user_email = "SELECT EMAIL FROM utilisateur WHERE EMAIL = '$mail'";
$check_result_user = mysqli_query($db, $check_user_email);
if ($row_check_user = mysqli_fetch_array($check_result_user)) {
    header('Location: ../pages/newuser.php?erreur=1');
} else {

    //CHECK USER'S AGE
    //Calculate user's age
    $diff = intval(substr(date('Ymd') - date('Ymd', strtotime($date_naissance)), 0, -4));
    //If user's age less than 18 then go back to create account page with error
    if ($diff < 18) {
        header('Location: ../pages/newuser.php?erreur=3');
    } else {

    //hachage du mot de passe $mdp1
    $mdp = password_hash($mdp1, PASSWORD_DEFAULT);

    //Confirmation du mot de passe
    $mdp2 = addslashes($_POST["password_confirm"]);
    $confirm_mdp = password_hash($mdp2, PASSWORD_DEFAULT);


    //Vérifie si les deux mots de passe entrés sont identiques
    if ($mdp1 == $mdp2) {
            $sql = "insert into utilisateur " .
                "values(NULL,'" . $prenom . "','" . $nom .
                "','" . $mail .  "','" . $date_naissance . "','" . $mdp . "')";

            mysqli_query($db, $sql);

            header('location: ../pages/login.php');
        }
    else {
        header('Location: ../pages/newuser.php?erreur=2');
    }
}}
?>

