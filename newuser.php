<?php
    include "header.php";
?>

<html><!--supportppe-->
    <head>
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
    <body>
        <div id="container">
            <!-- zone de connexion -->
            
            <form action="verification.php" method="POST">
                <h1>Nouvel utilisateur</h1>
                
                <label><b>Prénom</b></label><br/>
                <input type="text" placeholder="Entrer votre prénom" name="prenom" required><br/>

                <label><b>Nom</b></label><br/>
                <input type="text" placeholder="Entrer votre nom" name="nom" required><br/>

                <label><b>Date de naissance</b></label><br/>
                <input type="text" placeholder="Entrer votre date de naissance" name="date_naissance" required><br/>


                <label><b>E-mail</b></label><br/>
                <input type="text" placeholder="Entrer votre adresse e-mail" name="mail" required><br/><br/>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer votre mot de passe" name="password" required>
                <label><b>Confirmer votre mot de passe</b></label>
                <input type="password" placeholder="Confirmer votre mot de passe" name="password" required>
                
                <p style="color: green;">S'inscrire en tant que :</p>

<div>
  <input type="radio" id="acheteur" name="role" value="acheteur"
         checked>
  <label for="acheteur">Client acheteur</label>
</div><br/>

<div>
  <input type="radio" id="vendeur" name="role" value="vendeur">
  <label for="vendeur">Vendeur</label>
</div><br/>

                <input type="submit" id='submit' value='Enregistrer' >

                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
            </form>
        </div>
    </body>
</html>

<?php
    include "footer.php";
?>