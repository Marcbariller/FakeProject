<?php session_start(); ?>
<?php

/* Connexion à la base de données */ 

try {
    $bdd = new PDO('mysql:host=localhost;dbname=spacetruck;charset=utf8', 'root', '');
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
$bdd ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if(isset($_SESSION["id"])) {
    
    /* update de l'horaire de réception de la commande et du paiement effectué */
    
    $query = $bdd->prepare('SELECT id FROM commande WHERE commande.id_Client = "'.$_SESSION["id"].'" AND paiement = "en attente"');
    $query->execute();
    $idcommande = $query->fetchColumn();
    /**
    *   @param int $idcommande - id de la commande
    */
    $query = $bdd -> prepare('UPDATE commande SET paiement = "effectue" WHERE id = "'.$idcommande.'"');
    $query -> execute();
    $query = $bdd -> prepare('UPDATE commande SET heurelivraison = "'.$_SESSION["heure"].'" WHERE id = "'.$idcommande.'"');
    $query -> execute();
    $query = $bdd -> prepare('UPDATE commande SET minutelivraison = "'.$_SESSION["minute"].'" WHERE id = "'.$idcommande.'"');
    $query -> execute();?>
    <script>
        alert("Merci <?php echo $_SESSION['pseudo'];?> le paiement de votre commande a bien été effectué. On se retrouve à <?php echo $_SESSION['heure'];?>H<?php if ($_SESSION['minute'] < 10){echo "0".$_SESSION['minute'];}else{ echo $_SESSION['minute'];}?>");
        document.location.href="../spacetruck.php";
    </script><?php
}