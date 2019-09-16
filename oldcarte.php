<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>SpaceTruck - Carte</title>
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
            <img src="images/restaurant-40.png" class="title_icone"/><h1>CARTE</h1>
            </div>
<!--        Les articles       -->            
            <h2>NOS ARTICLES</h2>            
            <div class="composition" id="composition1">
                <form action="traitement.php" method="post" class="article_form">
                <div class="article" id="article1">
                    <div class="top">
                        <h3>BASE BURGER</h3>
                        <p>Steak, fromage , tomates</p>
                    </div>
                    <div>
                    <div class="middle">
                        <input type="number" value="1" min="1" max="10" class="quantity" name="Baseburger"/>
                        <p>3€</p>
                    </div>
                    <div class="bottom">
                        <img src="images/ajouter-au-panier-40.png" class="caddie"/>
                        <input type="submit" value="Ajouter au panier">
                    </div>
                    </div>
                </div>
                </form>
                <form action="traitement.php" method="post" class="article_form">
                <div class="article" id="article2">
                    <div class="top">
                        <h3>BASE SANDWICH</h3>
                        <p>Pain, jambon, beurre</p>
                    </div>
                    <div class="middle">
                        <input type="number" value="1" min="1" max="10" class="quantity" name="Basesandwich"/>
                        <p>2€</p>
                    </div>
                    <div class="bottom">
                        <img src="images/ajouter-au-panier-40.png" class="caddie"/>
                        <input type="submit" value="Ajouter au panier">
                    </div>
                </div>
                </form>
                <form action="traitement.php" method="post" class="article_form">
                <div class="article" id="article5">
                    <div class="top">
                        <h3>Boissons</h3>
                        <p>Fanta, Pepsi, Ice-tea, Limonade maison</p>
                    </div>
                    <div class="middle">
                        <input type="number" value="1" min="1" max="10" class="quantity" name="boisson"/>
                        <p>0.50€</p>
                    </div>
                    <div class="bottom">
                        <img src="images/ajouter-au-panier-40.png" class="caddie"/>
                        <input type="submit" value="Ajouter au panier">
                    </div>
                </div>
                </form>                
                <form action="traitement.php" method="post" class="article_form">
                <div class="article" id="article3">
                    <div class="top">
                        <h3>Frites</h3>
                    </div>
                    <div class="middle">
                        <input type="number" value="1" min="1" max="10" class="quantity" name="frite"/>
                        <p>1.90€</p>
                    </div>
                    <div class="bottom">
                        <img src="images/ajouter-au-panier-40.png" class="caddie"/>
                        <input type="submit" value="Ajouter au panier">
                    </div>
                </div>
                </form>
                <form action="traitement.php" method="post" class="article_form">
                <div class="article" id="article4">
                    <div class="top">
                        <h3>Potatoes</h3>
                    </div>
                    <div class="middle">
                        <input type="number" value="1" min="1" max="10" class="quantity" name="potatoe"/>
                        <p>0.50€</p>
                    </div>
                    <div class="bottom">
                        <img src="images/ajouter-au-panier-40.png" class="caddie"/>
                        <input type="submit" value="Ajouter au panier">
                    </div>
                </div>
                </form>
                <form action="traitement.php" method="post" class="article_form">
                <div class="article" id="article6">
                    <div class="top">
                        <h3>Supplément sauce</h3>
                    </div>
                    <div class="middle">
                        <input type="number" value="1" min="1" max="10" class="quantity" name="sauce"/>
                        <p>0.20€</p>
                    </div>
                    <div class="bottom">
                        <img src="images/ajouter-au-panier-40.png" class="caddie"/>
                        <input type="submit" value="Ajouter au panier">
                    </div>
                </div>
                </form>
                <form action="traitement.php" method="post" class="article_form">
                <div class="article" id="article7">
                    <div class="top">
                        <h3>Desserts</h3>
                        <p>brownie, crêpes, cookies, brioche</p>
                    </div>
                    <div class="middle">
                        <input type="number" value="1" min="1" max="10" class="quantity" name="dessert"/>
                        <p>2.50€</p>
                    </div>
                    <div class="bottom">
                        <img src="images/ajouter-au-panier-40.png" class="caddie"/>
                        <input type="submit" value="Ajouter au panier">
                    </div>
                </div>
                </form>
            </div>
<!--        Les formules       -->
            <h2>NOS MENUS</h2>
            <div class="composition" id="composition2">
                <form action="traitement.php" method="post" class="article_form">
                 <div class="article" id="article7">
                    <div class="top">
                        <h3>MENU BURGER</h3>
                        <p>BASE + frites/potatoes + sauce + boisson</p>
                    </div>
                    <div class="middle">
                        <input type="number" value="1" min="1" max="10" class="quantity" name="Menu_burger"/>
                         <p>4.90€</p>
                    </div>
                    <div class="bottom">
                        <img src="images/ajouter-au-panier-40.png" class="caddie"/>
                        <input type="submit" value="Ajouter au panier">
                    </div>
                </div>
                </form>
                <form action="traitement.php" method="post" class="article_form">
                <div class="article" id="article8">
                    <div class="top">
                        <h3>MENU SANDWICH</h3>
                        <p>BASE + frites/potatoes + sauce + boisson</p>
                    </div>
                    <div class="middle">
                        <input type="number" value="1" min="1" max="10" class="quantity" name="Menu_sandwich"/>
                        <p>3.90€</p>
                    </div>
                        <div class="bottom">
                        <img src="images/ajouter-au-panier-40.png" class="caddie"/>
                        <input type="submit" value="Ajouter au panier">
                    </div>
                </div>
                </form>
            </div>
        </div>
    </body>
</html>

