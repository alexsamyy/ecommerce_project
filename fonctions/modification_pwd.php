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
$user = $_SESSION['iduser'];

if ($user == false) {
    header("Location: login.php");
    die();
} else {
    $sql = "SELECT * FROM utilisateur WHERE ID_UTILISATEUR = " . $user;
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);

    $pwd = $row["MDP"];
    $new_pwd1 = $_POST["new_pwd"];
    $new_pwd = password_hash($new_pwd1, PASSWORD_DEFAULT);
    $current_pwd1 = $_POST["current_pwd"];

    if ($current_pwd = (password_verify($current_pwd1, $pwd))) {
        $update_pwd = "UPDATE utilisateur SET MDP = '$new_pwd' WHERE ID_UTILISATEUR = $user ";
        echo $update_pwd;
        $req_update = mysqli_query($db, $update_pwd);
        header("Location: ../pages/nouveau_mdp.php?success=1");
        echo ("Votre mot de passe a bien été modifié !");
    } else {
        header('Location: ../pages/nouveau_mdp.php?erreur=1'); // veuiller enregistrer ce champs
    }
}


?>