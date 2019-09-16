<?php session_start(); ?>

<!DOCTYPE html><html lang="en" xml:lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8"/>
        <title>SpaceTruck - Commande</title>
        <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">        
        <link rel="stylesheet" href="../css/spacetruck.css"/>
        <link rel="icon" href="../images/logo.png" />        
    </head>
    <body id="no_wallet_management_body">
        <div id="header">
            <a href="../spacetruck.php"><img src="../images/logo.png" alt="Logo Space Truck" class="logo"/></a>
            <div class="panel">
                <div id="top">
                    <?php if(isset($_SESSION["id"])){
                            ?><a href="../onclick/deconnexion.php?click=1" id="account"><p>Se déconnecter</p><img src="../images/utilisateur-sexe-neutre-40.png" alt="Icone Compte" class="account"/></a><?php
                        }else{
                            ?><a href="../identification.php" id="account"><p>Se connecter</p><img src="../images/utilisateur-sexe-neutre-40.png" alt="Icone Compte" class="account"/></a><?php
                        }
                        ?>
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
        <div id="main"><div id="headerSips">
            <div class="title">
                <img src="../images/caddie-40.png" class="title_icone"/><h1>Paiement sécurisé</h1>
                <?php
                
                /* Connexion à la base de données */ 
                
                try {
                    $bdd = new PDO('mysql:host=localhost;dbname=spacetruck;charset=utf8', 'root', '');
                }   
                catch (PDOException $e) {
                    die('Erreur : ' . $e->getMessage());
                }
                $bdd ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                /* récupération de l'heure et minutes souhaités par le client */
                
                $_SESSION['heure'] = $_POST['hours'];
                $_SESSION['minute'] = $_POST['minutes'];
                
                $montant = 0;
                /**
                *   @param int $montant - Montant de la commande
                */
                
                /* insertion du montant à régler pour le client */
                
                if(isset($_SESSION["id"])){
                    $query = $bdd->prepare('SELECT montant FROM commande where id_Client = "'.$_SESSION["id"].'" AND paiement = "en attente"');
                    $query->execute();
                    $montant = $query->fetchColumn();
                    if ($montant == 0){?>
                        <script>
                            document.location.href="../carte.php";
                        </script><?php
                    }
                } else{?>
                    <script>
                        document.location.href="../commande.php";
                    </script><?php
                }?>
            </div>
            <form action="validation.php" method="post" id="captureCardForm">
                <div class="t-invisible"><input value="9179s6mfg8" name="sid" type="hidden"/>
                </div>
                <br/><fieldset><legend><?php echo "Montant à régler: ".$montant;?>€</legend><div class="card-data"><p class="" id="no_virtualnumpad_p"><label for="cardNumberField" id="cardNumberField-label">
                Numéro de carte:
                </label><input autocomplete="OFF" maxlength="19" id="cardNumberField" name="cardNumberField" type="tel"/></p><fieldset class="k-choice"><legend>Date d'expiration:</legend><p><label for="expirydatefield" id="expirydatefield-label"><span></span></label>
                <span class="monthdatafield" id="expirydatefield"><label class="month-date-label" for="expirydatefield-month">
                Mois:
                <span class="styledSelect"><select name="expirydatefield-month" class="date-select" id="expirydatefield-month"><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option><option>10</option><option>11</option><option>12</option></select></span></label>     
                <label class="year-date-label" for="expirydatefield-year">
                    Année:
                    <span class="styledSelect"><select name="expirydatefield-year" class="date-select" id="expirydatefield-year"><option>2018</option><option>2019</option><option>2020</option><option>2021</option><option>2022</option><option>2023</option><option>2024</option><option>2025</option><option>2026</option><option>2027</option><option>2028</option><option>2029</option><option>2030</option><option>2031</option><option>2032</option><option>2033</option><option>2034</option><option>2035</option></select></span></label></span></p></fieldset><p><label for="cvvfield" id="cvvfield-label">Code de sécurité:</label><input maxlength="4" autocomplete="OFF" id="cvvfield" name="cvvfield" type="tel"/> 
                </p></div><div class="conditional"><fieldset class="k-choice"><legend>Se souvenir de cette carte?:</legend><p><label for="radioY"><input class="addCardToWallet" value="true" name="addCardToWalletField" id="radioY" type="radio"/>
                Yes
                </label>

                <label for="radioN"><input class="addCardToWallet" checked="checked" value="false" name="addCardToWalletField" id="radioN" type="radio"/>
                    No
                </label></p></fieldset></div></fieldset>
                <div class="k-buttons-bar"><p><input value="Confirm" id="form_submit" name="form_submit" type="submit"/>
                    </p></div>
            </form>
            <section id="sectionOneClickLegalNotice" class="footnote">
            </section>
            </div>
        </div>
    </body>
</html>