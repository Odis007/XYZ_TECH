DROP DATABASE IF EXISTS xyz_tech;
CREATE DATABASE IF NOT EXISTS xyz_tech;
USE xyz_tech;

CREATE TABLE utilisateur (
id_utilisateur INT AUTO_INCREMENT PRIMARY KEY,
nom VARCHAR(255) NOT NULL,
prenom VARCHAR(255) NOT NULL,
email VARCHAR(255) NOT NULL UNIQUE,
mot_de_passe VARCHAR(255) NOT NULL,
role ENUM ('client', 'admin') DEFAULT 'client' 
);

CREATE TABLE message (
id_message INT AUTO_INCREMENT PRIMARY KEY,
id_utilisateur INT NOT NULL,
date_envoi DATETIME DEFAULT CURRENT_TIMESTAMP,
email_expediteur VARCHAR(100) NOT NULL,
contenu VARCHAR(500) NOT NULL,
FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id_utilisateur) ON DELETE CASCADE
);

CREATE TABLE commande (
id_commande INT AUTO_INCREMENT PRIMARY KEY,
id_utilisateur INT,
date_commande DATETIME DEFAULT CURRENT_TIMESTAMP,
total DECIMAL(10, 3) NOT NULL,
adresse VARCHAR(500) NOT NULL,
statut ENUM('en_attente', 'expediee', 'livree', 'annulee') DEFAULT 'en_attente',
FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id_utilisateur) ON DELETE SET NULL
);


CREATE TABLE categorie (
id_categorie INT AUTO_INCREMENT PRIMARY KEY,
libelle VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE produit (
id_produit INT AUTO_INCREMENT PRIMARY KEY,
id_categorie INT NOT NULL,
nom VARCHAR(255) NOT NULL,
annee VARCHAR(4) NOT NULL,
date_ajout DATETIME DEFAULT CURRENT_TIMESTAMP,
prix DECIMAL(10, 3) NOT NULL,
stock INT DEFAULT 0,
image VARCHAR(500) NOT NULL,
FOREIGN KEY (id_categorie) REFERENCES categorie (id_categorie) ON DELETE RESTRICT
);

CREATE TABLE ligne_commande (
id_commande INT NOT NULL,
id_produit INT NOT NULL,
quantite INT NOT NULL,
prix_unite DECIMAL(10, 2) NOT NULL,
PRIMARY KEY (id_commande, id_produit),
FOREIGN KEY (id_commande) REFERENCES commande (id_commande) ON DELETE CASCADE,
FOREIGN KEY (id_produit) REFERENCES produit (id_produit) ON DELETE RESTRICT
);