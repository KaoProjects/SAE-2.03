<?php
/*
  Fichier : participant-index.php
 */
session_start();
if (! isset($_SESSION["login"]))
	header('location: ./../connexion/login.php');
else
$welcomeMessage = "Bonjour " . $_SESSION["login"];
require './../../bootstrap.php';

$sql = "SELECT * FROM  participant order by année_naissance";
$participants = ($dbh->query($sql)->fetchAll());
echo head("Passé composé");
?>
<body style="padding:30px">
<div class="Gestion-conteneur">
<div class="welcome-message"><?php echo $welcomeMessage; ?></div>

	<a href="participant-insert.php" >Ajouter un participant</a>
    <h1>Passé Composé - Liste des participants</h1>
	<?php foreach ($participants as $participant) { ?>
	<p><?php echo  $participant["prénom"] . " - " . $participant["année_naissance"]. " - " . $participant["genre"]; ?>
	<a href="participant-delete.php?num=<?php echo $participant['id_participant'] ?>" >Effacer</a> ----
	<a href="participant-edit.php?num=<?php echo $participant['id_participant'] ?>" >Modifier</a>
	</p>
	<?php } ?> 
	<a href="./../connexion/menu-backoffice.php">Menu</a>

</body>

</html>