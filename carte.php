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
            <?php
            
            /* Connexion à la base de données */
            
            try {
                $bdd = new PDO('mysql:host=localhost;dbname=spacetruck;charset=utf8', 'root', '');
            }
            catch (PDOException $e) {
                die('Erreur : ' . $e->getMessage());
            }
            $bdd ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            /* récupération de toute la table article */
            
            $query = $bdd->prepare('SELECT * FROM article');
            $query->execute();
            $listearticle = $query->fetchAll();
            /**
            *   @param array $listearticle - contenu de la table article
            */
            ?>
            <div class="composition" id="composition1"><?php
                
                /* affichage de tous les articles de la base de données avec leurs informations */
                
                foreach ($listearticle as $value){?>
                    <form action="commande/traitement.php" method="post" class="article_form">
                        <div class="article">
                            <div class="top"><?php
                    
                                /* changement de certain nom de produit de la bdd pour être plus présentable et ajout du contenu */
                    
                                if ($value['Nom'] == "BASE_BURGER"){?>
                                    <h3>BASE BURGER</h3>
                                    <p><?php echo "Steak, fromage, tomates";?></p><?php
                                }else if ($value['Nom'] == "BASE_SANDWICH"){?>
                                    <h3>BASE SANDWICH</h3>
                                    <p><?php echo "Pain, jambon, beurre";?></p><?php
                                }else if ($value['Nom'] == "Boisson"){?>
                                    <h3><?php echo $value['Nom'];?></h3>
                                    <p><?php echo "Fanta, Pepsi, Ice-tea, Limonade maison";?></p><?php
                                }else if ($value['Nom'] == "Dessert"){?>
                                    <h3><?php echo $value['Nom'];?></h3>
                                    <p><?php echo "brownie, crêpes, cookies, brioche";?></p><?php
                                }else if ($value['Nom'] == "Sauce"){?>
                                    <h3>Supplément sauce</h3><?php
                                }else{?>
                                    <h3><?php echo $value['Nom'];?></h3><?php
                                }
                                ?>
                            </div>
                            <div>
                                <div class="middle">
                                    <input type="number" value="1" min="0" max="10" class="quantity" name="<?php echo $value['Nom'];?>"/>
                                    <p><?php echo $value['prix'];?>€</p>
                                </div>
                                <div class="bottom">
                                    <img src="images/ajouter-au-panier-40.png" class="caddie"/>
                                    <input type="submit" value="Ajouter au panier">
                                </div>
                            </div>
                        </div>
                    </form><?php
                }?>
                </div>
<!--        Les formules       -->
            <h2>NOS MENUS</h2>
            <?php 
            
            /* récupération de toute la table menu */
            
            $query = $bdd->prepare('SELECT * FROM menu');
            $query->execute();
            $listemenu = $query->fetchAll();
            /**
            *   @param array $listemenu - contenu de la table menu
            */
            ?>
            <div class="composition" id="composition2"><?php
                
                /* affichage de tous les menus de la base de données avec leurs informations */
                
                foreach ($listemenu as $value){?>
                    <form action="commande/traitement.php" method="post" class="article_form">
                        <div class="article">
                            <div class="top"><?php
                                
                                /* changement de certain nom de produit de la bdd pour être plus présentable et ajout du contenu */
                                
                                if ($value['Nom'] == "MENU_BURGER"){?>
                                    <h3>MENU BURGER</h3>
                                    <p><?php echo "BASE + frites/potatoes + sauce + boisson";?></p><?php
                                }else if ($value['Nom'] == "MENU_SANDWICH"){?>
                                    <h3>MENU SANDWICH</h3>
                                    <p><?php echo "BASE + frites/potatoes + sauce + boisson";?></p><?php
                                }?>
                            </div>
                            <div>
                                <div class="middle">
                                    <input type="number" value="1" min="0" max="10" class="quantity" name="<?php echo $value['Nom'];?>"/>
                                    <p><?php echo $value['prix'];?>€</p>
                                </div>
                                <div class="bottom">
                                    <img src="images/ajouter-au-panier-40.png" class="caddie"/>
                                    <input type="submit" value="Ajouter au panier">
                                </div>
                            </div>
                        </div>
                    </form><?php 
                }?>
            </div>
        </div>
    </body>
</html>

