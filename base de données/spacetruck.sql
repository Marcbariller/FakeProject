#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

DROP DATABASE IF EXISTS spacetruck;
CREATE DATABASE spacetruck;
USE spacetruck;

#------------------------------------------------------------
# Table: Client
#------------------------------------------------------------

CREATE TABLE Client(
        id         int (11) Auto_increment  NOT NULL ,
        Nom        Varchar (25) NOT NULL ,
        Prenom     Varchar (25) NOT NULL ,
        mail       Varchar (25) NOT NULL ,
        motdepasse Varchar (25) NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Commande
#------------------------------------------------------------

CREATE TABLE Commande(
        id            int (11) Auto_increment  NOT NULL ,
        date_commande Date NOT NULL ,
        id_Client           Int NOT NULL ,
        montant Float ,
        paiement Varchar (25) NOT NULL ,
        livraison Varchar (25) NOT NULL ,
        heurelivraison TinyINT ,
        minutelivraison TinyINT ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;
jme

#------------------------------------------------------------
# Table: Menu
#------------------------------------------------------------

CREATE TABLE Menu(
        id   int (11) Auto_increment  NOT NULL ,
        Nom  Varchar (25) NOT NULL ,
        prix Float NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Produit
#------------------------------------------------------------

CREATE TABLE Produit(
        id       int (11) Auto_increment  NOT NULL ,
        Nom      Varchar (25) NOT NULL ,
        quantite TinyINT ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Article
#------------------------------------------------------------

CREATE TABLE Article(
        id   int (11) Auto_increment  NOT NULL ,
        Nom  Varchar (25) NOT NULL ,
        prix Float NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: produit_article
#------------------------------------------------------------

CREATE TABLE produit_article(
        id_Produit        Int NOT NULL ,
        id_Article Int NOT NULL ,
        PRIMARY KEY (id_Produit ,id_Article )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: menu_article
#------------------------------------------------------------

CREATE TABLE menu_article(
        id_Menu         Int NOT NULL ,
        id_Article Int NOT NULL ,
        PRIMARY KEY (id_Menu ,id_Article )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: commande_menu
#------------------------------------------------------------

CREATE TABLE commande_menu(
        id_Commande     Int NOT NULL ,
        id_Menu Int NOT NULL ,
        quantite TinyINT NOT NULL,
        PRIMARY KEY (id_Commande ,id_Menu )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Commande_article
#------------------------------------------------------------

CREATE TABLE Commande_article(
        id_Commande         Int NOT NULL ,
        id_Article Int NOT NULL ,
        quantite TinyINT NOT NULL,
        PRIMARY KEY (id_Commande ,id_Article )
)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: markers
#------------------------------------------------------------

CREATE TABLE `markers` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  `name` VARCHAR( 60 ) NOT NULL ,
  `address` VARCHAR( 80 ) NOT NULL ,
  `lat` FLOAT( 10, 6 ) NOT NULL ,
  `lng` FLOAT( 10, 6 ) NOT NULL ,
  `type` VARCHAR( 30 ) NOT NULL
) ENGINE = MYISAM ;

ALTER TABLE Commande ADD CONSTRAINT FK_Commande_ID FOREIGN KEY (id_Client) REFERENCES Client(id);
ALTER TABLE produit_article ADD CONSTRAINT FK_produit_article_id FOREIGN KEY (id_Produit) REFERENCES Produit(id);
ALTER TABLE produit_article ADD CONSTRAINT FK_produit_article_id_Article FOREIGN KEY (id_Article) REFERENCES Article(id);
ALTER TABLE menu_article ADD CONSTRAINT FK_menu_article_id FOREIGN KEY (id_Menu) REFERENCES Menu(id);
ALTER TABLE menu_article ADD CONSTRAINT FK_menu_article_id_Article FOREIGN KEY (id_Article) REFERENCES Article(id);
ALTER TABLE commande_menu ADD CONSTRAINT FK_commande_menu_id FOREIGN KEY (id_Commande) REFERENCES Commande(id);
ALTER TABLE commande_menu ADD CONSTRAINT FK_commande_menu_id_Menu FOREIGN KEY (id_Menu) REFERENCES Menu(id);
ALTER TABLE Commande_article ADD CONSTRAINT FK_Commande_article_id FOREIGN KEY (id_Commande) REFERENCES Commande(id);
ALTER TABLE Commande_article ADD CONSTRAINT FK_Commande_article_id_Article FOREIGN KEY (id_Article) REFERENCES Article(id);

INSERT INTO article (Nom, prix) VALUES ("BASE_BURGER","3");
INSERT INTO article (Nom, prix) VALUES ("BASE_SANDWICH","2");
INSERT INTO article (Nom, prix) VALUES ("Boisson","0.5");
INSERT INTO article (Nom, prix) VALUES ("Frite","1.9");
INSERT INTO article (Nom, prix) VALUES ("Potatoe","0.5");
INSERT INTO article (Nom, prix) VALUES ("Sauce","0.2");
INSERT INTO article (Nom, prix) VALUES ("Dessert","2.5");

INSERT INTO menu (Nom, prix) VALUES ("MENU_BURGER","4.9");
INSERT INTO menu (Nom, prix) VALUES ("MENU_SANDWICH","3.9");

INSERT INTO produit (Nom, quantite) VALUES ("Steak","100");
INSERT INTO produit (Nom, quantite) VALUES ("fromage","100");
INSERT INTO produit (Nom, quantite) VALUES ("tomate","100");
INSERT INTO produit (Nom, quantite) VALUES ("pain","100");
INSERT INTO produit (Nom, quantite) VALUES ("jambon","100");
INSERT INTO produit (Nom, quantite) VALUES ("beurre","100");
INSERT INTO produit (Nom, quantite) VALUES ("fanta","100");
INSERT INTO produit (Nom, quantite) VALUES ("pepsi","100");
INSERT INTO produit (Nom, quantite) VALUES ("Ice-tea","100");
INSERT INTO produit (Nom, quantite) VALUES ("limonade","100");
INSERT INTO produit (Nom, quantite) VALUES ("brownie","100");
INSERT INTO produit (Nom, quantite) VALUES ("crêpes","100");
INSERT INTO produit (Nom, quantite) VALUES ("cookies","100");
INSERT INTO produit (Nom, quantite) VALUES ("brioche","100");

#------------------------------------------------------------
# Data: markers
#------------------------------------------------------------

INSERT INTO `markers` (`name`, `address`, `lat`, `lng`, `type`) VALUES ('République',"Place de la République, Station de métro - 35000 Rennes",'48.109684','-1.6814463','Place publique, métro');
INSERT INTO `markers` (`name`, `address`, `lat`, `lng`, `type`) VALUES ('Villejean',"Villejean-Université, Station de métro - 35000 Rennes",'48.1213462','-1.7064364','Place publique, métro');
INSERT INTO `markers` (`name`, `address`, `lat`, `lng`, `type`) VALUES ('Sainte Anne',"Place Sainte Anne, Station de métro - 35000 Rennes",'48.1142272','-1.6810257','Place publique, métro');
INSERT INTO `markers` (`name`, `address`, `lat`, `lng`, `type`) VALUES ('Colombier',"Place du Colombier, Station de métro - 35000 Rennes",'48.1047213','-1.6817933','Place publique, métro');
INSERT INTO `markers` (`name`, `address`, `lat`, `lng`, `type`) VALUES ('Beaulieu',"39 Avenue Professeur Charles Foulon, 35700 Rennes",'48.122426','-1.6396949','Place publique');

