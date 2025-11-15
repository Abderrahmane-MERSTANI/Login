📘 Système d’Inscription et d’Authentification en PHP

Ce projet est une application simple en PHP permettant aux utilisateurs de créer un compte, se connecter, puis accéder à une page de session. Il utilise MySQL pour stocker les informations et PDO pour les interactions avec la base de données.

🚀 Fonctionnalités
🔹 Inscription

Saisie du nom, prénom, login et mot de passe.

Vérification : les mots de passe doivent être identiques.

Stockage en base MySQL avec un hash MD5 (peut être amélioré).

Redirection automatique vers la page de connexion.

🔹 Connexion

Authentification via login + mot de passe.

Vérification dans la base de données via PDO et requête préparée.

Message d’erreur si les identifiants sont incorrects.

Redirection vers la page de session en cas de succès.

🔹 Page de session

Interface simple affichant un bouton de déconnexion.

Permet d'étendre facilement vers un système de sessions réelles.

🛠️ Technologies utilisées

PHP

MySQL

PDO

HTML5

CSS3

📁 Structure des fichiers
/ (racine du projet)
│── inscription.php   → Formulaire + traitement d’inscription
│── authentification.php  → Formulaire + traitement login
│── session.php       → Page de session après connexion
│── inscription.css
│── authentification.css
└── base de données : table "inscription"

🗄️ Base de données
Table inscription
Champ	Type
nom	VARCHAR(255)
prenom	VARCHAR(255)
login	VARCHAR(255)
password	VARCHAR(255)
⚙️ Installation

Importer la base de données :

CREATE DATABASE inscription;
USE inscription;
CREATE TABLE inscription (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255),
    prenom VARCHAR(255),
    login VARCHAR(255),
    password VARCHAR(255)
);


Placer les fichiers PHP et CSS dans un serveur local (XAMPP, WAMP, Laragon…).

Lancer l’application via http://localhost/ton_projet/.

🔐 Sécurité (Améliorations possibles)

Remplacer MD5 par password_hash() et password_verify().

Ajouter de vraies sessions session_start().

Vérifier si le login existe déjà avant inscription.
