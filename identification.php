<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>SpaceTruck - Identification</title>
        <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">        
        <link rel="stylesheet" href="css/spacetruck.css"/>
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
            <img src="" class="title_icone"/><h1>Identification</h1>
            </div>
            <fieldset id="connexion">
                <legend>Connexion</legend>
                    <form action= "identification/connexion.php" method="post">
                        <div class="email">
                            <p>Votre e-mail : </p>
                            <input type="text" name="e-mail"/>
                        </div>
                        <div class="password">
                            <p>Votre mot de passe : </p>
                            <input type="password" name="password">
                        </div>
                        <input type="submit" name="envoyer" class="submit"/>
                    </form>
            </fieldset>            
            <fieldset id="inscription">
                <legend>Inscription</legend>
                    <form action= "identification/inscription.php" method="POST">
                        <div class="name">
                            <p>Votre Nom : </p>
                            <input type="text" name="name" required>
                        </div>
                        <div class="first_name">
                            <p>Votre Prénom : </p>
                            <input type="text" name="first_name" required>
                        </div>
                        <div class="email">
                            <p>Votre e-mail : </p>
                            <input type="text" placeholder="exemple@exemple.com" name="email" required/>
                        </div>
                        <div class="password">
                            <p>Mot de passe : </p>
                            <input type="password" placeholder="6 caractères minimum" name="password" required>
                        </div>
                        <div class="password">
                            <p>Confirmer le mot de passe :</p>
                            <input type="password" name="passwordc" required>
                        </div>                        
                        <input type="submit" name="envoyer" class="submit"/>
                    </form>
            </fieldset>
        </div>
    </body>
</html>

