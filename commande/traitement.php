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
                
/* récupération de toutes les données envoyées par le formulaire */

foreach ($_POST as $key => $quantite)
{
    $produit = $key;
                        
}
/**
*   @param array $produit - nom du produit
*/
if (($produit == "MENU_BURGER") || ($produit == "MENU_SANDWICH")){
    
    /* vérification qu'un utilisateur est connecté */
    if(isset($_SESSION["id"])) {
        
        /* requete d'éxistance d'une commande en cours pour ce client */ 
        $query = $bdd->prepare('SELECT COUNT(*) FROM commande WHERE id_Client = "'.$_SESSION["id"].'" AND paiement = "en attente"');
        $query->execute();
        $commandenonpayee = $query->fetchColumn();
        /**
        *   @param int $commandenonpayee - nombre de commande correspondant a ce client et non payée
        */
        if ($commandenonpayee == 0){
            
            /* Création d'une id de commande pour ce client à la date du jour */
            
            $query = $bdd->prepare('INSERT INTO commande (date_commande,id_Client,paiement,livraison) VALUES (NOW(),"'.$_SESSION["id"].'","en attente","en attente")');
            $query->execute();
        }
        
        /* récupération de l'id de la commande */
        
        $query = $bdd->prepare('SELECT id FROM commande where id_Client = "'.$_SESSION["id"].'" AND paiement = "en attente"');
        $query->execute();
        $id_commande = $query->fetchColumn();
        /**
        *   @param int $id_commande - id de la commande du client connecté
        */
        
        /* récupération de l'id du menu */
        
        $query = $bdd->prepare('SELECT id FROM menu where Nom = "'.$produit.'"');
        $query->execute();
        $id_menu = $query->fetchColumn();
        /**
        *   @param int $id_menu - id du menu
        */
        
        /* compte du nombre de menu de cet id dans la commande déjà présent */
        
        $query = $bdd->prepare('SELECT COUNT(*) from commande_menu where "'.$id_commande.'" = id_Commande AND id_Menu = "'.$id_menu.'"');
        $query->execute();
        $countmenu = $query->fetchColumn();
        /**
        *   @param int $countmenu - nombre de ce menu dans la bdd
        */
        
        /* si il n'y pas de ce menu dans la commande, insertion dans la bdd, sinon récupération de la quantité déjà présente et update du total */
        
        if ($countmenu == 0){ 
            $query = $bdd->prepare('INSERT INTO commande_menu (id_Commande, id_Menu, quantite) VALUES ("'.$id_commande.'","'.$id_menu.'","'.$quantite.'")');
            $query->execute();?>
            <script>
                alert("Vous venez d'ajouter <?php echo $quantite." ".$produit;?>(s) à votre commande.");
                document.location.href="../carte.php";
            </script><?php
        }
        else {
            $query = $bdd->prepare('SELECT quantite FROM commande_menu where id_menu = "'.$id_menu.'" AND id_Commande = "'.$id_commande.'"');
            $query->execute();
            $total = $query->fetchColumn();
            $total = $total + $quantite;
            /**
            *   @param int $total - total du menu dans la commande
            */
            $query = $bdd->prepare('UPDATE Commande_menu SET quantite = "'.$total.'" WHERE id_menu = "'.$id_menu.'" AND id_Commande = "'.$id_commande.'"');
            $query->execute();?>
            <script>
                alert("Vous venez d'ajouter <?php echo $quantite." ".$produit;?>(s) à votre commande ce qui vous fait un total de <?php echo $total." ".$produit;?>(s)");
                document.location.href="../carte.php";
            </script><?php
        }
    }else {?>
            <script>
                alert("Veuillez vous inscrire et/ou vous connecter avant de commander.");
                document.location.href="../carte.php";
            </script><?php
    }
}
else if (isset($_SESSION["id"])) {
    
    /* vérification qu'un utilisateur est connecté */
    
    /* requete d'éxistance d'une commande en cours pour ce client */ 
    
    $query = $bdd->prepare('SELECT COUNT(*) FROM commande WHERE id_Client = "'.$_SESSION["id"].'" AND paiement = "en attente"');
    $query->execute();
    $commandenonpayee = $query->fetchColumn();
    /**
    *   @param int $commandenonpayee - nombre de commande correspondant a ce client et non payée
    */
    if ($commandenonpayee == 0){
        $query = $bdd->prepare('INSERT INTO commande (date_commande,id_Client,paiement,livraison) VALUES (NOW(),"'.$_SESSION["id"].'","en attente","en attente")');
        $query->execute();
    }
    
    /* récupération de l'id de la commande */
    
    $query = $bdd->prepare('SELECT id FROM commande where id_Client = "'.$_SESSION["id"].'" AND paiement = "en attente"');
    $query->execute();
    $id_commande = $query->fetchColumn();
    
    /* récupération de l'id du l'article */
    
    $query = $bdd->prepare('SELECT id FROM article where Nom = "'.$produit.'"');
    $query->execute();
    $id_article = $query->fetchColumn();
    /**
    *   @param int $id_article - id de l'article
    */
    
    /* compte du nombre de menu de cet id dans la commande déjà présent */
    
    $query = $bdd->prepare('SELECT COUNT(*) from commande_article where "'.$id_commande.'" = id_commande AND id_Article = "'.$id_article.'"');
    $query->execute();
    $countarticle= $query->fetchColumn();
    /**
    *   @param int $countarticle - nombre de cet article dans la bdd
    */
    
    /* si il n'y pas de cet article dans la commande, insertion dans la bdd, sinon récupération de la quantité déjà présente et update du total */
    
    if ($countarticle == 0){ 
        $query = $bdd->prepare('INSERT INTO Commande_article (id_Commande, id_Article, quantite) VALUES ("'.$id_commande.'","'.$id_article.'","'.$quantite.'")');
        $query->execute();?>
        <script>
            alert("Vous venez d'ajouter <?php echo $quantite." ".$produit;?>(s) à votre commande.");
            document.location.href="../carte.php";
        </script><?php
    }
    else {
        $query = $bdd->prepare('SELECT quantite FROM commande_article where id_article = "'.$id_article.'" AND id_Commande = "'.$id_commande.'"');
        $query->execute();
        $total = $query->fetchColumn();
        $total = $total + $quantite;
        /**
        *   @param int $total - total de l'article dans la commande
        */
        $query = $bdd->prepare('UPDATE Commande_article SET quantite = "'.$total.'" WHERE id_article = "'.$id_article.'" AND id_Commande = "'.$id_commande.'"');
        $query->execute();?>
        <script>
            alert("Vous venez d'ajouter <?php echo $quantite." ".$produit;?>(s) à votre commande ce qui vous fait un total de <?php echo $total." ".$produit;?>(s)");
            document.location.href="../carte.php";
        </script><?php        
    }
}
else {?>
    <script>
        alert("Veuillez vous inscrire et/ou vous connecter avant de commander.");
        document.location.href="../carte.php";
    </script><?php
}?>