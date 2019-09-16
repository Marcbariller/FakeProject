<?php session_start(); ?>
 <?php
header('Location: ../commande.php');
            try {
                $bdd = new PDO('mysql:host=localhost;dbname=spacetruck;charset=utf8', 'root', '');
            }
            catch (PDOException $e) {
                    die('Erreur : ' . $e->getMessage());
            }
            $bdd ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
/* Suppression du produit de la commande */
if (isset($_GET["click"])) {
     $query = $bdd->prepare('SELECT id FROM commande where id_client = "'.$_SESSION["id"].'" AND paiement = "en attente"');
     $idcommande = $query->execute();
     $idcommande = $query->fetchColumn();
     $query = $bdd->prepare('DELETE FROM commande_article WHERE id_article = 1 AND id_commande = "'.$idcommande.'"');
     $query->execute();
    exit();
}

?>