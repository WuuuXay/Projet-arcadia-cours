# Projet-arcadia-cours
Zoo Arcadia
Description du projet
Zoo Arcadia est une application web destinée à présenter et gérer le site d'un zoo. Elle est développée en PHP avec le framework Symfony et utilise XAMPP pour la base de données SQL.
_____________________________________________________________________________________________________________________________________________________________________________________________________________________________
Prérequis
Pour faire fonctionner ce projet en local, tu as besoin des éléments suivants :

-XAMPP (pour la base de données MySQL et le serveur Apache).

-PHP (version 8.0 ou supérieure recommandée).

-Composer (gestionnaire de dépendances pour PHP).

-Symfony CLI (optionnel, mais recommandé pour faciliter le développement).
_____________________________________________________________________________________________________________________________________________________________________________________________________________________________
Installation
1. Cloner le dépôt
Clone le dépôt GitHub sur ta machine locale :

"git clone https://github.com/WuuuXay/Projet-arcadia-cours.git"

Ensuite, place-toi dans le dossier du projet :

"cd Projet-arcadia-cours"
_____________________________________________________________________________________________________________________________________________________________________________________________________________________________
2. Choisir la branche
Le projet contient deux branches : main et develop. Pour utiliser la branche develop, exécute :

"git checkout develop"

_____________________________________________________________________________________________________________________________________________________________________________________________________________________________
3. Installer les dépendances
Le projet utilise Composer pour gérer les dépendances. Pour installer toutes les dépendances nécessaires, exécute :

"composer install"

Dépendances installées
Voici la liste des dépendances principales installées par cette commande :

-Symfony (framework PHP)

-Doctrine (gestion de la base de données)

-Twig (moteur de templates)

-EasyAdmin (interface d'administration)

-Monolog (gestion des logs)

-PHPUnit (tests unitaires)

Pour voir la liste complète des dépendances, exécute :

"composer show"

_____________________________________________________________________________________________________________________________________________________________________________________________________________________________
4. Configurer la base de données
Démarre XAMPP et active les services Apache et MySQL.

Crée une base de données MySQL pour ton projet (par exemple, zoo_arcadia).

Configure la connexion à la base de données dans le fichier .env :

"DATABASE_URL="mysql://root:@127.0.0.1:3306/zoo_arcadia""

Exécute les migrations pour créer les tables dans la base de données :

php bin/console doctrine:migrations:migrate

Fichiers de création de la base de données
À venir : Les fichiers SQL pour la création de la base de données seront ajoutés au dépôt plus tard.

_____________________________________________________________________________________________________________________________________________________________________________________________________________________________
5. Lancer l'application
Pour démarrer le serveur de développement Symfony, exécute :

"symfony server:start"
L'application sera accessible à l'adresse : http://127.0.0.1:8000

Structure du projet

/src : Contient le code source de l'application (controllers, entités, etc.).

/templates : Contient les fichiers Twig pour les vues.

/.env : Contient les variables d'environnement (configuration de la base de données, etc.).

_____________________________________________________________________________________________________________________________________________________________________________________________________________________________
Informations supplémentaires
Documentation Symfony : https://symfony.com/doc

Documentation Composer : https://getcomposer.org/doc

Documentation XAMPP : https://www.apachefriends.org/index.html
_____________________________________________________________________________________________________________________________________________________________________________________________________________________________
À venir : Le manuel d'utilisation au format PDF sera ajouté au dépôt plus tard.

