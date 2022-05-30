<?php
    session_start();
    ob_start();
    // connexion à la base de données
    require_once "../composants/db.php";
    include "../composants/main.php";
?>

<?php
            if (isset($_SESSION['iduser']) == false){ // IF NOT ALREADY LOGGED IN, DISPLAY LOGIN PAGE
                
                    header("Location: ../pages/login.php");
                    die();
        
            } // IF ALREADY LOGGED IN, ADD ARTICLE AS A FAVORITE
            else{

                // QUANTITE 
                $quantity = 1;
                
                // ID DE L'UTILISATEUR
                $id_user = $_SESSION['iduser'];

                // ID DE L'ARTICLE
                $id_product = $_GET['id'];

                $req_add_cart =
                "insert into panier " . "values(NULL, '" . $id_user . "','" . $quantity . "','" . $id_product . "')";

                mysqli_query($db, $req_add_cart);

                header('location: /FoneMarket/pages/page_produit.php?id=' . $id_product);
            }
            ?>