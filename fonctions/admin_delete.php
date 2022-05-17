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
        
            } 
            else{
            
                // ID DE L'ARTICLE
                $id_product = $_GET['id'];
            
                $req_del_db =
                "DELETE FROM smartphone WHERE ID = $id_product";
                echo $req_del_db;
                    
                mysqli_query($db, $req_del_db);
    
                header('location: http://localhost/FoneMarket/pages/admin_product.php');
                }
            
            ?>