<?php
/*
    Fichier : /Helpers/functions.php
 */

/**
 * Retourne le contenu HTML du bloc d'en tête d'une page.
 * @param string title le titre de la page.
 * @return string
 */
function head(string $title = ''): string
{
    return  <<<HTML_HEAD
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  <link rel="stylesheet" href="./../../assets/css/style.css">
  <link rel="stylesheet" href="./../../assets/css/detail.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

  <style>
@import url('https://fonts.googleapis.com/css2?family=Charmonman:wght@400;700&family=Namdhinggo:wght@400;500;600;700;800&family=Sail&display=swap')
</style>
  <title>$title</title>
</head>
HTML_HEAD;
}


/**
 * Retourne vrai si la méthode d'appel est GET.
 */
function isGetMethod(): bool
{
    return  ($_SERVER['REQUEST_METHOD'] === 'GET') ;
}

/**
 * Retourne vrai si la méthode d'appel est POST.
 */
function isPostMethod(): bool
{
    return  ($_SERVER['REQUEST_METHOD'] === 'POST') ;
}
?>
