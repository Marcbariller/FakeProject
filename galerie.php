<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>SpaceTruck - Galerie</title>
        <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">        
        <link rel="stylesheet" href="css/spacetruck.css"/>
        <link rel="icon" href="images/logo.png" />
    </head>
    <body>
<div id="header">
            <a href="spacetruck.php"><img src="images/logo.png" alt="Logo Space Truck" class="logo"/></a>
            <div class="panel">
                <div id="top">
                    <?php if(isset($_SESSION["id"])){
                            ?><a href="onclick/deconnexion.php?click=1" id="account"><p>Se déconnecter</p><img src="images/utilisateur-sexe-neutre-40.png" alt="Icone Compte" class="account"/></a><?php
                        }else{
                            ?><a href="identification.php" id="account"><p>Se connecter</p><img src="images/utilisateur-sexe-neutre-40.png" alt="Icone Compte" class="account"/></a><?php
                        }
                        ?>
                    <div id="social">
                        <a href="https://www.facebook.com/" target="_blank"><img src="images/facebook.jpg" alt="Icone Facebook" class="facebook"/></a>
                        <a href="https://twitter.com" target="_blank"><img src="images/twitter.jpg" alt="Icone Twitter" class="twitter"/></a>
                        <a href="https://instagram.com" target="_blank"><img src="images/instagram.jpg" alt="Icone Instagam" class="instagram"/></a>
                    </div>
                </div>
                <div id="menu">
                    <div id="hamburger">
                        <img src="images/menu-filled-40.png" alt="icone menu type hamburger">
                        <div id="nav">
                            <a href="carte.php">Carte</a>
                            <a href="nous_trouver.php">Nous trouver</a>
                            <a href="commande.php">Commande</a>
                            <a href="galerie.php">Galerie</a>
                            <a href="collaborateurs.php">Collaborateurs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="main">
            <div class="title">
            <img src="images/appareil-photo-40.png" class="title_icone"/><h1>Galerie</h1>
            </div>
            <div id="galerie">
                <img src="images/picture.png" class="picture"/>
                <img src="images/picture.png" class="picture"/>
                <img src="images/picture.png" class="picture"/>
                <img src="images/picture.png" class="picture"/>
                <img src="images/picture.png" class="picture"/>
                <img src="images/picture.png" class="picture"/>
                <img src="images/picture.png" class="picture"/>
                <img src="images/picture.png" class="picture"/>
                <img src="images/picture.png" class="picture"/>
                <img src="images/picture.png" class="picture"/>
                <img src="images/picture.png" class="picture"/>
                <img src="images/picture.png" class="picture"/>
                <img src="images/picture.png" class="picture"/>
                <img src="images/picture.png" class="picture"/>
                <img src="images/picture.png" class="picture"/>
                <img src="images/picture.png" class="picture"/>
                <img src="images/picture.png" class="picture"/>
                <img src="images/picture.png" class="picture"/>
                <img src="images/picture.png" class="picture"/>
                <img src="images/picture.png" class="picture"/>
                <img src="images/picture.png" class="picture"/>
                <img src="images/picture.png" class="picture"/>
                <img src="images/picture.png" class="picture"/>
                <img src="images/picture.png" class="picture"/>
            </div>
            <a href="https://www.instagram.com/?hl=fr" id="instagram_picture" target="_blank">Pour en voir plus</a>
        </div>
    </body>
</html>

