<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>SpaceTruck - Commande</title>
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
            <img src="images/caddie-40.png" class="title_icone" alt="icone caddie"/><h1>Commande</h1>
            </div>
            <?php
            
            /* Connexion à la base de données */
            
            try {
                $bdd = new PDO('mysql:host=localhost;dbname=spacetruck;charset=utf8', 'root', '');
            }
            catch (PDOException $e) {
                    die('Erreur : ' . $e->getMessage());
            }
            $bdd ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);?>
            <form action="commande/paiement.php" method="post" class="basket_form">
                <div id="basket">
                    <table id="basket_table">
                        <thead> <!-- En-tête du tableau -->
                            <tr>
                                <th>Article</th>
                                <th>Prix</th>
                                <th>Quantité</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody> <!-- Corps du tableau -->
                            <?php
                            
                            /* vérification qu'un utilisateur est connecté */
                            
                            if(isset($_SESSION["id"])) {
                                $prixglobale = 0;
                                /**
                                *   @param int $prixglobale - prix globale de la commande
                                */
                                
                                /* récupération de l'id de la commande */
                                
                                $query = $bdd->prepare('SELECT id FROM commande WHERE commande.id_Client = "'.$_SESSION["id"].'" AND paiement = "en attente"');
                                $query->execute();
                                $idcommande = $query->fetchColumn();
                                
                                /* récupération du nom, prix et quantité de tous les articles de la commande */
                                
                                $query = $bdd->prepare('SELECT Nom,prix,quantite FROM article INNER JOIN commande_article ON article.id = commande_article.id_Article WHERE commande_article.id_commande = "'.$idcommande.'"');
                                $query->execute();
                                $commande = $query->fetchAll();
                                
                                /* affichage de tous les éléments présent dans la base de donnée */
                                
                                foreach ($commande as $value){?>
                                    <tr>
                                        <?php $nom_article = $value['Nom']; ?>
                                        <td><?php echo $value['Nom'];?></td>
                                        <td><?php echo $value['prix'];?>€</td>
                                        <?php $prixglobale = $prixglobale + ($value['prix']*$value['quantite']); ?>
                                        <td><?php echo $value['quantite'];?></td>
                                        <td><a href="onclick/<?php echo $nom_article;?>.php?click=1"><img src="images/annuler-40.png"/></a></td>
                                    </tr><?php
                                }
                                
                                /* même procédure pour les menus présent dant la commande */
                                
                                $query = $bdd->prepare('SELECT Nom,prix,quantite FROM menu INNER JOIN commande_menu ON menu.id = commande_menu.id_menu WHERE commande_menu.id_commande = "'.$idcommande.'"');
                                $query->execute();
                                $commande = $query->fetchAll();
                                foreach ($commande as $value){?>
                                    <tr>
                                        <?php $nom_menu = $value['Nom']; ?>
                                        <td><?php echo $value['Nom'];?></td>
                                        <td><?php echo $value['prix'];?>€</td>
                                        <?php $prixglobale = $prixglobale + ($value['prix']*$value['quantite']); ?>
                                        <td><?php echo $value['quantite'];?></td>
                                        <td><a href="onclick/<?php echo $nom_menu;?>.php?click=1"><img src="images/annuler-40.png"/></a></td>
                                    </tr><?php
                                }?>
                                    <tr>
                                        <td>Total à régler</td>
                                        <td><?php echo $prixglobale;?>€</td>
                                        <td></td>
                                        <td></td>
                                    </tr><?php
                                
                                /* insertion du prix global dans la commande */
                                
                                $query = $bdd -> prepare('UPDATE commande SET montant = ("'.$prixglobale.'") WHERE id = "'.$idcommande.'" AND paiement = "en attente"');
                                $query -> execute();?>
                                <?php
                            }else {
                                echo "Veuillez vous connecter ou vous inscrire avant de commander.";
                            }?>
                        </tbody>
                    </table>
                    <div id="schedule_infos">
                        <p>Pour récupérer votre commande, veuillez sélectionner un horaire:</p>
                        <div id="schedule">
                            <input type="number" value="12" min="10" max="21" class="schedule" name="hours"/><p>H</p>
                            <input type="number" value="0" min="0" max="59" class="schedule" name="minutes"/><p>Min</p>
                        </div>
                    </div>
                </div>
                <input type="submit" name="envoyer" class="submit"/>
            </form>
        </div>
    </body>
</html>