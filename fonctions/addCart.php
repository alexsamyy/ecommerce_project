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
        
            } // IF ALREADY LOGGID IN, ADD ARTICLE IN CART
            else{

                // QUANTITE 
                $quantity = 1;
                
                // ID DE L'UTILISATEUR
                $id_user = $_SESSION['iduser'];

                // ID DE L'ARTICLE
                $id_product = $_GET['id'];

                //CHECK IF PRODUCT IS ALREADY IN CART
                $check_in_cart = "SELECT * FROM panier WHERE ID_PRODUIT = $id_product AND ID_UTILISATEUR = $id_user";
                $check_result = mysqli_query($db,$check_in_cart);
                
                if ($row_check = mysqli_fetch_array($check_result)){
                $update_add_cart =
                "UPDATE panier SET QUANTITE = QUANTITE + 1 WHERE ID_PRODUIT = $id_product AND ID_UTILISATEUR = $id_user";

                mysqli_query($db, $update_add_cart);

                header('location: /FoneMarket/pages/page_produit.php?id=' . $id_product);

                }else{
                    $req_add_cart =
                    "insert into panier " . "values(NULL, '" . $id_user . "','" . $quantity . "','" . $id_product . "')";
                    
                    mysqli_query($db, $req_add_cart);
    
                    header('location: /FoneMarket/pages/page_produit.php?id=' . $id_product);
                }
            }
            ?>