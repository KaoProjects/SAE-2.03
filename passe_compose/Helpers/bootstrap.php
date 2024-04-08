<?php
/*
  Intégration des librairies communes.
  ------------------------------------------------

  Fichier : bootstrap.php

  Le rôle de ce fichier est de mettere en place toutes les actions
  qui seront utiles pour la plupart des scripts.
  Ici, plusieurs librairies sont appelées.
  La variable globale $dbh est mise en place.
*/

require 'Config/config.php';

   


// les fonctions utilisateur
require 'Helpers/functions.php';


// mettre en place le processus de connexion à la base de données
// documentation php.net/manual/fr/pdo.construct.php
try {
    // mettre en place la variable $dsn (Data Source Name) qui contient
    // les informations pour se connecter à la base
    $dsn = 'mysql:host=' . APP_DB_HOST . ';dbname=' . APP_DB_NAME . ';charset=UTF8';
    // la variable GLOBALE $dbh (Data Base Handler) est importante
    // c'est elle qui permet de dialoguer avec la base
    $dbh = new PDO(
        $dsn,
        // nom de l'utilisateur MYSQL
        APP_DB_USER,
        // mot de passe de dl'utilisateur MYSQL
        APP_DB_PASSWORD,
        // réglage d'options qui permet de récupérer les informations de la base
        // sous forme de tableau associatif
        // et de demander de déclencher une exception quand une erreur de SQL est détectée
        [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]
    );
} catch (PDOException $e) {
    var_dump($e);
}
