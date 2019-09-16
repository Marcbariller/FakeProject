<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>SpaceTruck - Commande</title>
        <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">        
        <link rel="stylesheet" href="../css/spacetruck.css"/>
        <link rel="icon" href="../images/logo.png" />        
    </head>
    <body>
        <div id="header">
            <a href="../spacetruck.php"><img src="../images/logo.png" alt="Logo Space Truck" class="logo"/></a>
            <div class="panel">
                <div id="top">
                    <div id="social">
                        <a href="https://www.facebook.com/" target="_blank"><img src="../images/facebook.jpg" alt="Icone Facebook" class="facebook"/></a>
                        <a href="https://twitter.com" target="_blank"><img src="../images/twitter.jpg" alt="Icone Twitter" class="twitter"/></a>
                        <a href="https://instagram.com" target="_blank"><img src="../images/instagram.jpg" alt="Icone Instagam" class="instagram"/></a>
                    </div>
                </div>
                <div id="menu">
                    <div id="hamburger">
                        <img src="../images/menu-filled-40.png" alt="icone menu type hamburger">
                        <div id="nav">
                            <a href="../carte.php">Carte</a>
                            <a href="../nous_trouver.php">Nous trouver</a>
                            <a href="../commande.php">Commande</a>
                            <a href="../galerie.php">Galerie</a>
                            <a href="../collaborateurs.php">Collaborateurs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="main">
            <div class="title"><h1>Gestion des commandes</h1>
            </div><?php
            
            /* Connexion à la base de données */ 
            
            try {
                $bdd = new PDO('mysql:host=localhost;dbname=spacetruck;charset=utf8', 'root', '');
            }
            catch (PDOException $e) {
                    die('Erreur : ' . $e->getMessage());
            }
            $bdd ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);?>
            <div id="basket">
                <table id="basket_table">
                    <thead> <!-- En-tête du tableau -->
                        <tr>
                            <th>Client</th>
                            <th>Heures</th>
                            <th>Minutes</th>
                            <th>Commande</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody> <!-- Corps du tableau --><?php
                    
                    /* récupération de toutes les commandes payées non livrées, triées par heure et minute */
                               
                    $query = $bdd->prepare('SELECT * FROM commande WHERE paiement = "effectue" AND livraison = "en attente" ORDER BY heurelivraison,minutelivraison');
                    $query->execute();
                    $commande = $query->fetchAll();
                    /**
                    *   @param array $commande - données de la tablea commande ou le paiement est effectué et la livraison en attente
                    */
                    
                    /* Insertion dans le tableau des données des différentes commandes */
                        
                    foreach ($commande as $value){?>
                        <tr>
                            <td><?php $query = $bdd->prepare('SELECT * FROM client WHERE id = "'.$value["id_Client"].'"');
                            $prenom = $query->execute();
                            $prenom = $query->fetchAll(); 
                            foreach ($prenom as $value2){ echo $value2['Prenom'];echo " ".$value2['Nom'];};?></td>
                            <td><?php echo $value['heurelivraison'];?></td>
                            <td><?php echo $value['minutelivraison'];?></td>
                            <td><form action="admincommande.php" method="post" class="basket_form">
                                <input type="submit" value="détail" name="<?php echo $value['id'];?>" class="submit"/>
                                </form>
                            </td>
                            <td><form action="suppression.php" method="post" class="basket_form">
                                <input type="submit"  value="Supprimer" name="<?php echo $value['id'];?>" class="submit"/>
                                </form>
                            </td>
                        </tr><?php
                    }?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
