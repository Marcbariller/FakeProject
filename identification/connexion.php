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

/* Récupération de l'adresse mail et du mot de passe */

$mail = htmlspecialchars($_POST['e-mail']);
/**
 *   @param string $mail - e-mail de l'utilisateur
 */
$mdp = htmlspecialchars($_POST['password']);
/**
 *   @param string $mdp - mot de passe de l'utilisateur
 */

/* test d'existance de l'adresse mail dans la base de donnée */
            
$query = $bdd->prepare('SELECT COUNT(*) FROM client WHERE mail= "'.$mail.'"');
$query->execute();
$count = $query->fetchColumn();
/**
*   @param int $count - Nombre d'e-mail présent dans la bdd correspondant au mail rentré par l'utilisateur
*/
            
/* requête d'existance du mot de passe en fonction de l'adresse mail */

$query = $bdd->prepare('SELECT motdepasse FROM client WHERE mail= "'.$mail.'"');
$query->execute();
$check = $query->fetchColumn();
/**
*   @param string $check - mot de passe correspondant à l'adresse mail dans la bdd
*/
            
/* test de présence du mail dans la bdd */
if ($count == 0){?>
    <script>
        alert("L'adresse mail ne correspond à aucun compte existant.");
        document.location.href="../identification.php";
    </script><?php
}
else{

    /* test du bon mdp en fonction de l'adresse mail */
    
    if ($check != $mdp){?>
        <script>
            alert("Vous n'avez pas entré le bon mot de passe.");
            document.location.href="../identification.php";
        </script><?php
    }
    else{
        
        /* récupération du prénom de l'utilisateur */
        
        $query = $bdd->prepare('SELECT Prenom FROM client WHERE mail= "'.$mail.'"');
        $query->execute();
        $bjr = $query->fetchColumn();
        /**
        *   @param string $bjr - Prénom de l'utilisateur
        */
        $_SESSION['pseudo'] = $bjr;
        
        /* récupération de l'id du client et transfert sur la session */
        
        $query = $bdd->prepare('SELECT id FROM client WHERE mail= "'.$mail.'"');
        $query->execute();
        $id = $query->fetchColumn();
        /**
        *   @param int $id - id du client
        */
        $_SESSION['id'] = $id;
        
        /* Création d'une id de commande pour ce client */
        /* requete d'éxistance d'une commande en cours pour ce client */
        
        $query = $bdd->prepare('SELECT COUNT(*) FROM commande WHERE id_Client = "'.$id.'" AND paiement = "en attente"');
        $query->execute();
        $commandenonpayee = $query->fetchColumn();
        /**
        *   @param int $commandenonpayee - nombre de commande correspondant a ce client et non payée
        */
        if ($commandenonpayee == 0){
            
            /* Création d'une id de commande pour ce client à la date du jour */
            
            $query = $bdd->prepare('INSERT INTO commande (date_commande,id_Client,paiement,livraison) VALUES (NOW(),"'.$id.'","en attente","en attente")');
            $query->execute();
        }?>
        <script>
            alert("Connexion réussie, bonjour <?php echo $bjr;?>");
            document.location.href="../carte.php";
        </script><?php
    }
}?>