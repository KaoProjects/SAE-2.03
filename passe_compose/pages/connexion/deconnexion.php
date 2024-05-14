<?php
session_start();
if(!isset($_SESSION["login"]))
  header('location: login.php');
else
  echo "Déconnexion" . $_SESSION["login"];
require './../../bootstrap.php';
echo head('Déconnexion du back-office de Passé Composé');
unset ($_SESSION['login']);
session_destroy();
?>
