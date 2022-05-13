<header>
<?php
    $title = "Ajouter un article";
    ob_start();
    session_start();
    include "../composants/header.php";
    include "../composants/main.php";
    // connexion à la base de données
    require_once "../composants/db.php";
?>
</header>


        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="../style/login.css" media="screen" type="text/css" />
    </head>
    <body>
        
        <div id="container">
            <!-- zone de connexion -->
            
            <form id="login" action="../fonctions/traitement_add_marketplace.php" method="POST">
                <h2>Ajouter un article</h2>
                
                <label for="nom"><b>Nom:</b></label><br/>
                <input type="texte" placeholder="Ex : iPhone 13" name="nom" required><br/><br/>

                <label for="photo"><b>Image :</b></label><br/>
                <input type="text" placeholder="Télécharger un fichier" name="photo" required><br/><br/>

                <label for="prix"><b>Prix :</b></label><br/>
                <input type="text" placeholder="Saisir le prix" name="prix" required><br/><br/>
            
                <label for="systeme_d_exploitation"><b>Système d'exploitation :</b></label><br/>
                <input type="text" placeholder="Ex : Android " name="systeme_d_exploitation" required><br/><br/>

                <label for="stockage"><b>Mémoire :</b></label><br/>
                <input type="text" placeholder="Ex : 64" name="stockage" required><br/><br/>

                <label for="reseau"><b>Réseau :</b></label><br/>
                <input type="text" placeholder="Ex : 5G" name="reseau" required><br/><br/>

                <label for="double_sim"><b>Dual sim :</b></label><br/>
                <input type="" placeholder="   " name="double_sim" required><br/><br/>

                <label for="app_photo"><b>Résolution de l'appareil photo :</b></label><br/>
                <input type="text" placeholder="Ex : 5" name="app_photo" required><br/><br/>

                <label for="taille_ecran"><b>Taille de l'écran :</b></label><br/>
                <input type="texte" placeholder="Ex : 6" name="taille_ecran" required><br/><br/>

                <label for="description"><b>Description du téléphone :</b></label><br/>
                <input type="text" placeholder="Ex : Smartphone en bon état..." name="description" required><br/><br>

                <input type="submit" id='submit' value='Login' >

                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";

                }
                ?>
            </form>
            </div>
            <?php  ?>

    <?php
       include "../composants/footer.php"
    ?>

</html>