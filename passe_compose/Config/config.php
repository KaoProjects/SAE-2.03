<?php
/*
  Constantes de configuration générales.
  ------------------------------------------------

  Fichier : /Config/config.php

*/

// On vient charger les fichiers des constantes de configuration pour la base
// Si le projet ne nécéssite pas de base, alors ces fichiers peuvent rester vide.
// Deux fichiers peuvent être analysés selon la situation :
//   - config.local.php
//        pour le développement LOCAL
//   - config.prod.php
//        quand l'application fonctionne chez un hébergeur en production
//
// On détecte le local car l'IP de la machine est 127.0.0.1
$is_localhost = ($_SERVER['REMOTE_ADDR'] == '127.0.0.1' or $_SERVER['REMOTE_ADDR'] == '::1');
if ($is_localhost) {
    require 'config.local.php';
    define('APP_MODE', 'dev');
} else {
    require 'config.prod.php';
    define('APP_MODE', 'prod');
}

/** Séparateur entre dossiers qui correspond à \ sur un windows ou / sur un linux */
define('DS', DIRECTORY_SEPARATOR);

/** Chemin absolu vers le dossier du projet. */
define('APP_ROOT_DIRECTORY', realpath(__DIR__ . DS . '..' ) . DS);


/** Chemin absolu vers le dossier des ressources CSS,JS,IMAGES */
define('APP_ASSETS_DIRECTORY', APP_ROOT_DIRECTORY .  'assets' . DS);


