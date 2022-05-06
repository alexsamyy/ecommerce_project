<?php
    session_start();
    ob_start();
    // connexion à la base de données
    require_once "../composants/db.php";
    include "../composants/main.php";
?>

<?php

print_r($_GET);?>

<?php 
            if (isset($_SESSION['iduser']) == false){
                
                    header("Location: ../pages/login.php");
                    die();
        
            } // IF NOT ALREADY LOGGED IN, DISPLAY LOGIN PAGE
            else{

                // QUANTITE 
                $quantity = 1;
                
                //ID DE L'UTILISATEUR
                $id_user = $_SESSION['iduser'];

                //

            ?>