<?php
/*
  Fichier : histoire-filtre.php
 */
require './../../bootstrap.php';

echo head("Passé composé");
?>
<body style="padding:30px">
	<?php if ( $_SERVER['REQUEST_METHOD'] != 'POST') { ?>
		<h1>Saisir une période</h1>
		<form action="" method="post" id="form">
			<div>
				<label >Année de début : </label>
				<select name="zl_deb" id="zl_deb">
					<?php 	for ($i=1920; $i<=1950;$i++) {
								echo "<option>" . $i . "</option>";
							}
					?>
				</select>
			</div>
			<div>
				<label >Année de fin : </label>
				<select name="zl_fin" id="zl_fin">
					<?php 	for ($i=1920; $i<=1950;$i++) {
								echo "<option>" . $i . "</option>";
							}
					?>
				</select>
			</div>
			<div>
				<button type="submit" id="btn" >Rechercher</button>
			</div>
		</form>
	<?php }
	else {
	
	   $année_deb =  $_POST['zl_deb'];
		$année_fin =  $_POST['zl_fin'];
		$sql = "SELECT * FROM  histoire,participant where histoire.id_participant=participant.id_participant and année_naissance >= :deb and année_naissance <= :fin order by année_naissance";
		$stmt = $dbh->prepare($sql);
		$histoires = $stmt->execute([
			':deb' => $année_deb,
			':fin' => $année_fin
		]);
		
		$histoires = ($stmt->fetchAll());
		?>
		<h1>Passé Composé - Liste des histoires</h1>
		<div>
		<?php foreach ($histoires as $histoire) { 
				//affichage des histoires ?>
			
		<?php } ?>                                                          
 
		
	  
	<?php }?> 
	<script src="./../../assets/js/pg1.js"></script>
</body>

</html>