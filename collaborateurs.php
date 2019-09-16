<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>SpaceTruck - Collaborateurs</title>
        <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">        <link rel="stylesheet" href="css/spacetruck.css"/>
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
            <img src="images/conf%C3%A9rence-t%C3%A9l%C3%A9phonique-40.png" class="title_icone"/><h1>Collaborateurs</h1>
            </div>
            <div id="supporters">
                <div id="creditmutuel">
                    <a href="https://www.creditmutuel.fr/home/index.html" target="_blank"><img src="images/Credit_Mutuel.svg.png" alt="credit mutuel"></a>
                </div>
                <div id="cic">
                    <a href="https://www.cic.fr/fr/index.html" target="_blank"><img src="images/cic.png" alt="cic"></a>
                </div>
                <div id="regionbretagne">
                    <a href="http://www.bretagne.bzh/" target="_blank"><img src="images/regionbretagne.png" alt="region bretagne"></a>
                </div>
                <div id="ferme_les_aubriais">
                    <a href="http://www.ferme-les-aubriais.com/" target="_blank"><img src="images/Ferme_les_Aubriais.png" alt="ferme les aubriais"></a>
                </div>
                <div id="augustin">
                    <a href="http://laplacegourmande.fr/boutique/augustin" target="_blank"><img src="images/LOGO-AUGUSTIN.jpg" alt="augustin"></a>
                </div>
            </div>
        </div>
    </body>
</html>

