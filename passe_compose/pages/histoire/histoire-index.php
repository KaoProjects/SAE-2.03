<?php
/*
  Fichier : histoire-index.php
 */
session_start();
if (! isset($_SESSION["login"]))
	header('location: ./../connexion/login.php');
else
$welcomeMessage = "Bonjour " . $_SESSION["login"];
require './../../bootstrap.php';

$sql = "SELECT * FROM  histoire order by id_histoire";
$histoires = ($dbh->query($sql)->fetchAll());
echo head("Passé composé");
?>
<body style="padding:30px">
	<div id="main-index">
	<h1><?php echo $welcomeMessage; ?></h1>
		<a href="histoire-insert.php" ><span class="material-symbols-outlined">add_circle</span>Ajouter une histoire</a>
		<h1>Passé Composé - Liste des histoires</h1>
		<?php foreach ($histoires as $histoire) { ?>
		<p><?php echo  $histoire["titre"] . " - " . $histoire["résumé"]; ?>
		<a href="histoire-delete.php?num=<?php echo $histoire['id_histoire'] ?>" ><span class="material-symbols-outlined">delete</span>Effacer</a> ----
		<a href="histoire-edit.php?num=<?php echo $histoire['id_histoire'] ?>" ><span class="material-symbols-outlined">edit</span>Modifier</a>
		</p>
		<?php } ?> 
		<a href="./../connexion/menu-backoffice.php"><span class="material-symbols-outlined">home</span>Menu</a>
	</div>
</body>

</html>