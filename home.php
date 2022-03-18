<?php
session_start();
// connexion à la base de données
require_once "db.php";
?>
<?php
if(isset($_POST['mail']) && isset($_POST['password']))
{

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
           header('Location: home.php');
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