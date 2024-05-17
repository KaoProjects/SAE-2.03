<?php
/*
   Fichier : histoire-insert.php
 */
session_start();
if (! isset($_SESSION["login"]))
	header('location: ./../connexion/form-login.html');
else
	echo "Bonjour " . $_SESSION["login"];
require './../../bootstrap.php';

echo head('Ajouter une histoire');
?>
<body style="padding:30px;">
     
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
		
		$id_saisie = $_POST['zt_id'];
		$titre_saisi =  trim($_POST['zt_titre']);
        $resum_saisi = trim($_POST['zl_resum']);
		$link_saisi=trim($_POST['zl_link']);
		
		$sql = 'INSERT INTO histoire (id_participant, titre, résumé, url_son) VALUES(:id, :titre, :resum,:link)';
        $stmt = $dbh->prepare($sql);
        $stmt->execute([
             ':id' => $id_saisie,
			 ':titre' => $titre_saisi,
             ':resum' => $resum_saisi,
			 ':link' => $link_saisi,
                 
        ]);
       header('location: histoire-index.php');
	}
	else {
	?>
    	<h1>Ajouter une histoire</h1>
		<form action="" method="post" enctype="multipart/form-data">
			<div>
				<label> Participant : </label>
				<?php
				$sql = "SELECT id_participant, prénom FROM participant";
				$participants = ($dbh->query($sql)->fetchAll());?>
				<select name="zt_id" >
					<?php 
						foreach ($participants as $participant) {?>
						<option value="<?php echo $participant['id_participant']?>"><?php echo $participant['prénom']?></option>
					<?php }; ?>
				</select>
			<div>
				<label > Titre :</label>
				<input name="zt_titre" type="text" size="50" required>
			</div>
			<div >
				<label > Résumé :</label>
				<input name="zl_resum" type="text" size="200" required>
			</div>
			<div>
				<label >Lien SoundCloud :</label>
				<input name="zl_link" type="text" required >
			</div>
			<div>
				<input type="submit" value="Envoyer"></input>
				<a href="histoire-index.php" >Annuler</a>
			</div>
		</form>
    <?php };	?>
</body>

</html>