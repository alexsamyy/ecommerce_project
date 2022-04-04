<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">

 <!-- importer le fichier de style -->
 <link rel="stylesheet" href="add_article.css" media="screen" type="text/css" />

<title>Ajouter un article</title>

</head>

<header>

<?php
include "header.php";
?>

</header>

<body>
    <div style="margin-top:250px;">
    <h1 style="text-align:center">Ajouter un article</h1>
    <form style="margin-top:50px; text-align:center;" action="verification_ajout.php" method="post">

        <label>Nom</label>
        <input type="text" name="nom"></input>
        <br><br>

        <label>Description</label>
        <textarea name="description"></textarea>
        <br><br>

        <label>Prix</label>
        <input style="width:50px" type="float" name="prix"></input>
        <label>euros (€)</label>
        <br><br>

        <label >Système d'exploitation</label>
        <select id="syst" id="systform">
        <option value="ios">iOS</option>
        <option value="android">Android</option>
        <option value="windows">Windows</option>
        <option value="blackberry">BlackBerry OS</option>
        </select>
        <br><br>

        <label >Stockage</label>
        <select id="stockage" id="stockageform">
        <option value="16">16</option>
        <option value="32">32</option>
        <option value="64">64</option>
        <option value="128">128</option>
        <option value="256">256</option>
        </select>
        <label >Go</label>
        <br><br>

        <label >Réseaux</label>
        <select id="reseau" id="resform">
        <option value="4g">4G</option>
        <option value="4g+">4G+</option>
        <option value="5g">5G</option>
        </select>
        <br><br>
        
        <label>Slot sim</label>
        <select id="slot_sim" id="simform">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="2+">2+</option>
        </select>
        <br><br>

        <label>Appareil photo</label>
        <input style="width:50px" type="float" name="app_photo"/>
        <label>Mpx</label>
        <br><br>

        <label>Taille de l'écran</label>
        <input style="width:50px" type="float" name="taille_ecran"/>
        <label>pouces</label>
        <br><br>


        <!-- AJOUTER DES PHOTOS -->

        <form method="post" action="verification_ajout.php" enctype='multipart/form-data'>
        <input type='file' name='file' />
        </form>

        <!-- AJOUTER DES PHOTOS -->

        <input type="submit" value="Ajouter un article"/></p>

    </form>
</div>
</body>

<footer>

<?php
include "footer.php";
?>

</footer>
