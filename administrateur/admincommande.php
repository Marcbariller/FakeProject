<?php session_start(); ?>
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

/* récupération du nom et de la quantité des menus dans la commande */

$query = $bdd->prepare('SELECT Nom,quantite FROM commande_menu INNER JOIN menu ON commande_menu.id_menu = menu.id WHERE id_Commande = "'.$id.'"');
$query->execute();
$commandemenu = $query->fetchall();
/**
*   @param array $commandemenu - Liste des noms et quantité des menus de la commande
*/
?>
<script>
alert("<?php foreach($commandemenu as $value){echo $value['quantite'];echo ' '.$value['Nom'].'\n';}?>");   
</script><?php

/* récupération du nom et de la quantité des articles dans la commande */

$query = $bdd->prepare('SELECT Nom,quantite FROM commande_article INNER JOIN article ON commande_article.id_article = article.id WHERE id_Commande = "'.$id.'"');
$query->execute();
$commandearticle = $query -> fetchall();
/**
*   @param array $commandarticle - Liste des noms et quantité des articles de la commande
*/
?>
<script>
alert("<?php foreach($commandearticle as $value){echo $value['quantite'];echo ' '.$value['Nom'].'\n';}?>");   
document.location.href="administrateur.php";
</script>