<?php
session_start();
// connexion à la base de données
require_once "../composants/db.php";
?>
<?php
if(isset($_POST['mail']) && isset($_POST['password'])){

    $mail = addslashes ($_POST['mail']); 
    $password = addslashes ($_POST['password']);


    $sql = "SELECT count(*) as nbr,  MDP, ID_UTILISATEUR from utilisateur WHERE EMAIL = '".$mail."'";
    $result = mysqli_query($db, $sql);
    $tab = mysqli_fetch_array($result);
    $count1 = $tab["nbr"];
    if($count1 > 0){
         $hash = $tab["MDP"];
         // récupérer le hash de la base et vérifier si elle correspond à $password
         if (password_verify($password, $hash)){
               $_SESSION['iduser'] = $tab["ID_UTILISATEUR"];
                  header('Location: ../pages/home.php');
               }
               else
               {
                  header('Location: ../pages/login.php?erreur=1'); // veuiller enregistrer ce champs
               }
   }

           else
           {
              header('Location: ../pages/login.php?erreur=2'); // veuiller enregistrer ce champs
           }
   }
       else if($_GET["logout"]){
          session_destroy();
          header('Location: ../pages/login.php');

       }else
       {
          header('Location: ../pages/login.php');
       }
       mysqli_close($db); // fermer la connexion

?>