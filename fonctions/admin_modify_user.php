<head>
    <?php
    ob_start();
    session_start();
    // connexion à la base de données
    require_once "../composants/db.php";
    ?>
</head>


<?php
        $chosen_id_user = $_POST["id"];
        $prenom = $_POST["prenom"];
        $nom = $_POST["nom"];
        $mail = $_POST["mail"];
        $birth = $_POST["birth"];

        $sql = "UPDATE `utilisateur` SET
`PRENOM`= '" . $prenom . "',`NOM`= '". $nom ."',`EMAIL`='" . $mail . "',`DATE_BIRTH`='" . $birth . "' WHERE ID_UTILISATEUR = $chosen_id_user";

        echo $sql;

        $sql = mysqli_query($db, $sql);

        header('Location: http://localhost/FoneMarket/pages/admin_user.php');
