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
	<div id="main-index">
		<h1><?php echo $welcomeMessage; ?></h1>

			<a href="participant-insert.php" ><span class="material-symbols-outlined">add_circle</span>Ajouter un participant</a>
			<h1>Passé Composé - Liste des participants</h1>
			<?php foreach ($participants as $participant) { ?>
			<p><?php echo  $participant["prénom"] . " - " . $participant["année_naissance"]. " - " . $participant["genre"]; ?>
			<a href="participant-delete.php?num=<?php echo $participant['id_participant'] ?>" ><span class="material-symbols-outlined">delete</span>Effacer</a> ----
			<a href="participant-edit.php?num=<?php echo $participant['id_participant'] ?>" ><span class="material-symbols-outlined">edit</span>Modifier</a>
			</p>
			<?php } ?> 
			<a href="./../connexion/menu-backoffice.php"><span class="material-symbols-outlined">home</span>Menu</a>
			</div>
</body>

</html>