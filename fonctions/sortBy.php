<?php
    session_start();
    // connexion à la base de données
    require_once "../composants/db.php";

    function sortBy(){
        $requete = "SELECT * FROM smartphone s WHERE s.ID_MARQUE = 'Apple' and NEUF = true ORDER BY value";
    }
    

?>