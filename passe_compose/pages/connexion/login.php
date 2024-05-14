<?php
/*
   Fichier : login.php
 */

require './../../bootstrap.php';


echo head("Passé composé");
?>
<body style="padding:30px">
	<?php if ( $_SERVER['REQUEST_METHOD'] != 'POST') { ?>
		<form action="./login.php" method="post">
			<div>
				<label >Login :</label>
				<input name="zt_login" type="text" size="15" required>
			</div>
			<div>
				<label >Mot de passe :</label>
				<input name="zt_mp" type="password" size="15" required>
			</div>
			<div>
				<button type="submit" >Connexion</button>
			</div>
		</form>
	<?php }
	else {
		
		$login_saisi =  trim($_POST['zt_login']);
		$mp_saisi = trim($_POST['zt_mp']);

		$sql = 'select * from utilisateur WHERE login = :login and mot_de_passe=:mp';
		$stmt = $dbh->prepare($sql);
		$stmt->execute([
			':login' => $login_saisi,
			':mp' => $mp_saisi,
		]);
		$utilisateur = $stmt->fetch();
		if ($utilisateur) {
			header('location: menu-backoffice.php');
		}
		else
			header('location: login.php');
	}
?>
</body>
</html>