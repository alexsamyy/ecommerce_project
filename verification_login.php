<?php
session_start();

if(isset($_POST['mail']) && isset($_POST['password']))
{
    // connexion à la base de données
    $db_username = 'root';
    $db_password = '';
    $db_name     = 'fonemarket';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $mail = mysqli_real_escape_string($db,htmlspecialchars($_POST['mail'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
    

    if($mail !== "" && $password !== "")
    {         

        $requete = "SELECT count(*) as nb, ID_UTILISATEUR FROM utilisateur where EMAIL = '" . $mail .
         "' and MDP = '" . $password . "'";
        $exec_requete = mysqli_query($db,$requete);
        $reponse  = mysqli_fetch_array($exec_requete);

        $count = $reponse["nb"];
        if($count > 0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['iduser'] = $reponse["ID_UTILISATEUR"];  
           header('Location: principale.php');
        }
        else
        {
           header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: login.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else if($_GET["logout"]){
   session_destroy();
   header('Location: login.php');

}else
{
   header('Location: login.php');
}
mysqli_close($db); // fermer la connexion
?>