<?php session_start(); ?>
<?php

/* Connexion à la base de données */

try {
    $bdd = new PDO('mysql:host=localhost;dbname=spacetruck;charset=utf8', 'root', '');
}
catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


/* Récupération de l'adresse mail et test de compatibilité */

$mail = htmlspecialchars($_POST['email']);
/**
 *   @param string $mail - e-mail de l'utilisateur
 */
if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    
    /* vérification dans la bdd que l'adresse mail n'existe pas déjà */
    
    $query = $bdd->prepare('SELECT COUNT(*) FROM client WHERE mail= "'.$mail.'"');
    $query->execute();
    $count = $query->fetchColumn();
    /**
    *   @param int $count - Nombre d'e-mail présent dans la bdd correspondant au mail rentré par l'utilisateur
    */
    if ($count == 0){
        
        /* si l'adresse mail n'est pas déjà présente dans la bdd, test de la compatibilité des 2 mots de passe */
        
        if (htmlspecialchars($_POST['passwordc']) == htmlspecialchars($_POST['password'])){
            $nom = htmlspecialchars($_POST['name']);
            /**
            *   @param string $nom - Nom de l'utilisateur
            */
            $prenom = htmlspecialchars($_POST['first_name']);
            /**
            *   @param string $prenom - Prénom de l'utilisateur
            */
            $mdp = htmlspecialchars($_POST['passwordc']);
            /**
            *   @param string $mdp - Mot de passe de l'utilisateur
            */
            
            /* test de longueur du mot de passe */
            
            if (strlen($mdp) < 6){?>
                <script>
                    alert("Votre mot de passe est trop court, il doit faire 6 caractères minimum");
                    document.location.href="../identification.php";
                </script><?php
            }
            else {
                
                /* si le mot de passe est assez long, test de compatibilité du mdp */
                
                if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])#', $mdp)){
                    
                    /* inscription réussie et données insérées dans la bdd */
                    
                    $query = $bdd->prepare('INSERT INTO client (Nom, Prenom, mail, motdepasse) VALUES("'.$nom.'","'.$prenom.'","'.$mail.'","'.$mdp.'")');
                    $query->execute();?>
                    <script>
                        alert("Inscription réussie, vous pouvez vous connecter maintenant.");
                        document.location.href="../identification.php";
                    </script><?php
                }
                else {?>
                    <script>
                        alert("Votre mot de passe doit contenir au minimum une majuscule, une minuscule et un chiffre.");
                        document.location.href="../identification.php";
                    </script><?php
                }
            }
        }
        else {?>
            <script>
                alert("Le mot de passe de confirmation est différent de votre mot de passe");
                document.location.href="../identification.php";
            </script><?php
        }
    } 
    else {?>
        <script>
            alert("Cette adresse mail est déjà utilisée.");
            document.location.href="../identification.php";
        </script><?php
    } 
} 
else {?>
    <script>
        alert("Cette adresse mail possède un format non adapté.");
        document.location.href="../identification.php";
    </script><?php
}?>


