<?php
session_start();
if(!isset($_SESSION["login"]))
	header('location: login.php');
else
	echo "Bonjour " . $_SESSION["login"];
require './../../bootstrap.php';
echo head("Back-office de Passé composé");
?>

<body style="padding:30px">
	<nav>
		<div>
			<a href="./../participant/participant-index.php">Gestion des participants</a>
		</div>
		<div>
			<a href="./../histoire/histoire-index.php">Gestion des histoires</a>
		</div>
		<div>
			<a href="./deconnexion.php">Déconnexion</a>
		</div>
	</nav>
</body>
</html>
