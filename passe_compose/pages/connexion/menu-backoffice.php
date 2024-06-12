<?php
session_start();
if(!isset($_SESSION["login"]))
	header('location: login.php');
else
	 $welcomeMessage = "Bonjour " . $_SESSION["login"];
require './../../bootstrap.php';
echo head("Back-office de Passé composé");
?>

<body>
	<div id="main-index">
		<h1 style="color:black;font-size:4rem"><?php echo $welcomeMessage; ?></h1>
		
		<a href="./../participant/participant-index.php"><span class="material-symbols-outlined">person</span>Gestion des participants</a>
		<a href="./../histoire/histoire-index.php"><span class="material-symbols-outlined">collections_bookmark</span>Gestion des histoires</a>
		<a href="./deconnexion.php"><span class="material-symbols-outlined">logout</span>Déconnexion</a>
	</div>

</body>
</html>
