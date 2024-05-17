<?php
/*
  Fichier : histoire-index.php
 */
session_start();
if (! isset($_SESSION["login"]))
	header('location: ./../connexion/login.php');
else
	echo "Bonjour " . $_SESSION["login"];
require './../../bootstrap.php';

$sql = "SELECT * FROM  histoire order by id_histoire";
$histoires = ($dbh->query($sql)->fetchAll());
echo head("Passé composé");
?>
<body style="padding:30px">
	<a href="histoire-insert.php" >Ajouter une histoire</a>
    <h1>Passé Composé - Liste des histoires</h1>
	<?php foreach ($histoires as $histoire) { ?>
	<p><?php echo  $histoire["titre"] . " - " . $histoire["résumé"]; ?>
	<a href="histoire-delete.php?num=<?php echo $histoire['id_histoire'] ?>" >Effacer</a> ----
	<a href="histoire-edit.php?num=<?php echo $histoire['id_histoire'] ?>" >Modifier</a>
	</p>
	<?php } ?> 
	<a href="./../connexion/menu-backoffice.php">Menu</a>

</body>

</html>