<?php
    include "header.php";
?>

<html><!--supportppe-->
    <head>
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
        <script>
             function test(){
                var role = document.getElementByname("role");
                if (role[0].checked == true)
                    alert ("acheteur");
                return true;
             }
        </script>
    </head>
    <body>
        <div id="container">
            <!-- zone de connexion -->
        
            
            <form action="traitement_newuser.php" method="GET" onsubmit="test()">
                <h1>Nouvel utilisateur</h1>
                
                <label><b>Prénom</b></label><br/>
                <input type="text" placeholder="Entrer votre prénom" name="prenom" required><br/>

                <label><b>Nom</b></label><br/>
                <input type="text" placeholder="Entrer votre nom" name="nom" required><br/>

                <label><b>Date de naissance</b></label><br/>
                <input type="date" placeholder="Entrer votre date de naissance" name="date_naissance" required><br/>


                <label><b>E-mail</b></label><br/>
                <input type="text" placeholder="Entrer votre adresse e-mail" name="mail" required><br/><br/>

                <label><b>Mot de passe</b></label>
                <input type="text" placeholder="Entrer votre mot de passe" name="password" required>
                
                <p style="color: green;">S'inscrire en tant que :</p>

<div>
  <input type="radio" id="acheteur" name="role" value="acheteur" checked>
  <label for="acheteur">Client acheteur</label>
<br/>

  <input type="radio" id="vendeur" name="role" value="vendeur">
  <label for="vendeur">Vendeur</label>
</div><br/>

                <input type="submit" id='submit' value='Enregistrer' >

        
            </form>
        </div>
    </body>
</html>

<?php
    include "footer.php";
?>