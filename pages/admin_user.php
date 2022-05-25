<head>
    <?php
    $title = "Gérer les utilisateurs";
    session_start();
    ob_start();
    include "../composants/header.php";
    // connexion à la base de données
    require_once "../composants/db.php";
    ?>

    <link rel="stylesheet" href="../style/admin_user.css" media="screen" type="text/css" />

</head>

<body>

    <?php

    if (isset($_SESSION['iduser']) == false) { // IF NOT ALREADY LOGGED IN, DISPLAY LOGIN PAGE

        header("Location: ../pages/login.php");
        die();
    } // IF ALREADY LOGGED IN, DISPLAY CART
    else {

        $user = $_SESSION['iduser'];

        //MYSQL SELECT USER INFORMATION
        $sql = "SELECT * FROM utilisateur WHERE ID_UTILISATEUR = " . $user;
        $result = mysqli_query($db, $sql);
        $row_user_info = mysqli_fetch_array($result);

        if ($row_user_info['EMAIL']  == "admin@fonemarket.fr") {

            //MYSQL SELECT SMARTPHONE TABLE
            $requete_all_prod = "SELECT * FROM smartphone";
            $all_prod = mysqli_query($db, $requete_all_prod);
    ?>

            <!-------------------------------------------------------->

            <?php
            $requete_all_users = "SELECT * FROM utilisateur";
            $all_users = mysqli_query($db, $requete_all_users);
            $array_user = mysqli_fetch_all($all_users, MYSQLI_ASSOC);
            ?>

            <table class="list_users">
                <tr>
                    <th>#</th>
                    <th>PRÉNOM</th>
                    <th>NOM</th>
                    <th>ADRESSE E-MAIL</th>
                    <th>DATE DE NAISSANCE</th>
                    <th></th>
                </tr>
                <?php
                $usr_id = 0;
                foreach ($array_user as $usr) {
                    $usr_id += 1;
                ?>
                    <tr>
                        <form action="../fonctions/admin_modify_user.php?id=<?php echo $usr["ID_UTILISATEUR"] ?>" method="POST">
                            <td><input id="input" class="id_input" name="id" readonly value="<?= $usr_id ?>"></td>
                            <td><input id="input" name="prenom" type="text" value="<?= $usr["PRENOM"]; ?>"></td>
                            <td><input id="input" name="nom" type="text" value="<?= $usr["NOM"]; ?>"></td>
                            <td><input id="input" name="mail"" type=" email" value="<?= $usr["EMAIL"]; ?>"></td>
                            <td><input id="input" name="birth" type="date" value="<?= $usr["DATE_BIRTH"]; ?>"></td>
                            <td>
                                <span class="modify_btn"><button type="submit" class="modify">Modifier</button></span>
                        </form>

                        <span class="delete_btn"><a class="delete" href="../fonctions/admin_delete_user.php?id=<?= $usr["ID_UTILISATEUR"]; ?>">Supprimer</a></span>
                        </td>
                        
                    </tr>
                <?php } ?>
            </table>


    <?php
        } else {
            header("Location: ../pages/home.php");
            die();
        }
    } ?>

</body>

<footer>
    <?php
    include "../composants/footer.php";
    ?>
</footer>