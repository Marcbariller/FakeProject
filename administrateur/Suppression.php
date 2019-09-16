<?php session_start(); 
header('Location: administrateur.php')?>
<?php
    
/* Connexion à la base de données */ 
    
try {
    $bdd = new PDO('mysql:host=localhost;dbname=spacetruck;charset=utf8', 'root', '');
}
catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
$bdd ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/* récupération de l'id de la commande */

foreach ($_POST as $key => $quantite){
    $id = $key;            
}

/* update de la commande en livraison effectuée */

$query = $bdd->prepare('UPDATE commande SET livraison = "effectue" where id = "'.$id.'"');
$query->execute();
exit();

?>