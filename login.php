
 <?php
    include "header.php";
?>

        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
    <body>
        
        <div id="container">
            <!-- zone de connexion -->
            
            <form action="verification.php" method="POST">
                <h1>Connexion</h1>

                <label><b>E-mail</b></label><br/>
                <input type="text" placeholder="Entrer votre adresse e-mail" name="mail" required><br/><br/>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer votre mot de passe" name="password" required>

                <input type="submit" id='submit' value='Login' >
                <label><input type="checkbox"> Se rappeler de moi </label>
                <p><a href="" >Mot de passe oublié ?</a></p>
                <p><a href="newuser.php">Créer un compte  </a> pour vous connecter si vous  n'en avez pas un</p>
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                        echo $str;
                }
                ?>
            </form>
            </div>

    <?php
    include "footer.php";
    ?>

</html>