<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <title>SpaceTruck - Nous Trouver</title>
        <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">        
        <link rel="stylesheet" href="css/spacetruck.css"/>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
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
            <img src="images/carte-balis%C3%A9e-40.png" class="title_icone"/><h1>Nous trouver</h1>
            </div>
            <div id="location">
                <div id="week">
                    <div id="lundi" class="day"><a>Lundi</a>
                    <p>18H-21H</p></div>
                    <div id="mardi" class="day"><a>Mardi</a>
                    <p>10H-15H</p>
                    <p>18H-21H</p></div>
                    <div id="mercredi" class="day"><a>Mercredi</a>
                    <p>10H-15H</p>
                    <p>18H-21H</p></div>
                    <div id="jeudi" class="day"><a>Jeudi</a>
                    <p>10H-15H</p>
                    <p>18H-21H</p></div>
                    <div id="vendredi" class="day"><a>Vendredi</a>
                    <p>10H-15H</p>
                    <p>18H-21H</p></div>
                    <div id="samedi" class="day"><a>Samedi</a>
                    <p>10H-21H</p></div>
                </div>
                <div id=map>
                    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBp01RXMvMoGsMPa4ujy3Z5bD5Sizt1Zzs&callback=initMap"></script>
                    <script src="js/map.js"></script>
                    
                </div>
            </div>
            <div id="localisation"></div>
        </div>
    </body>
</html>

