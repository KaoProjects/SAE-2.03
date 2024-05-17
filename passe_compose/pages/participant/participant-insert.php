<?php
/*
   Fichier : participant-insert.php
 */
session_start();
if (! isset($_SESSION["login"]))
	header('location: ./../connexion/form-login.html');
else
	echo "Bonjour " . $_SESSION["login"];
require './../../bootstrap.php';

echo head('Ajouter un participant');
?>
<body style="padding:30px;">
     
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
		// 1. préparer le nom du fichier (le nom original est modifié)
		$filename = '';
		// traiter la photo du participant
		if (!empty($_FILES['file_photo']) && $_FILES['file_photo']['type'] == 'image/jpeg') {
			// récupérer le nom et emplacement du fichier dans sa zone temporaire
			$source = $_FILES['file_photo']['tmp_name'];
			// récupérer le nom originel du fichier
			$filename = $_FILES['file_photo']['name'];
			// ajout d'un suffixe unique
			// récupérer séparément le nom du fichier et son extension
			$filename_name = pathinfo($filename, PATHINFO_FILENAME);
			$filename_extension = pathinfo($filename, PATHINFO_EXTENSION);
			// produire un suffixe unique
			$suffix = uniqid();
			$filename = $filename_name . '_' . $suffix . '.' . $filename_extension;
			// construire le nom et l'emplacement du fichier de destination
			
			$destination = APP_ASSETS_DIRECTORY . 'images' . DS . 'photos' . DS . $filename;
			
			// placer le fichier dans son dossier cible (le fichier de la zone temporaire est effacé)
			move_uploaded_file($source, $destination);
		}
		$pnom_saisi =  trim($_POST['zt_pnom']);
        $année_naiss_saisi = $_POST['zl_naiss'];
		$genre_saisi=$_POST['zl_genre'];
		
		$sql = 'INSERT INTO participant (prénom,année_naissance,genre,photo) VALUES( :pnom, :naiss,:genre,:photo)';
        $stmt = $dbh->prepare($sql);
        $stmt->execute([
             ':pnom' => $pnom_saisi,
             ':naiss' => $année_naiss_saisi,
			 ':genre' => $genre_saisi,
			 ':photo' => $filename,
                 
        ]);
       header('location: participant-index.php');
	}
	else {
	?>
    	<h1>Ajouter un participant</h1>
		<form action="" method="post" enctype="multipart/form-data">
			<div>
				<label >Prénom:</label>
				<input name="zt_pnom" type="text" size="50" required>
			</div>
			<div >
				<label >Année de naissance :</label>
				<select name="zl_naiss" >
					<?php 	for ($i=1920; $i<=1950;$i++) {
								echo "<option>" . $i . "</option>";
							}
					?>
				</select>
			</div>
			<div>
				<label >Genre :</label>
				<select name="zl_genre" >
					<option value="F">Femme</option>
					<option value="H" selected>Homme</option>
				</select>
				
			</div>
			<div>
				<label>Photo :</label>
				<input name="file_photo" type="file" id="file_photo">
				<img src="" id="photo_affich" class="d-none">
			</div>
      		<div>
				<input type="submit" value="Envoyer"></input>
				<?php
					if ($_FILES['file_photo'] == NULL) {

        				
					} else {
   						echo "Aucune photo téléchargée. Utilisation de la photo par défaut : <img src='$defaultPhoto'>";
					}
				?>
				<a href="participant-index.php" >Annuler</a>
			</div>
		</form>
    <?php }	?>
 
  <script>
  document.addEventListener('DOMContentLoaded', () => {
    // chercher une nouvelle image
    document.querySelector('[name="file_photo"]').addEventListener('change', function() {
      // récupérer l'objet File
	  const file = this.files[0];
      // compléter ici pour tester le type du fichier sélectionné
      // et afficher un éventuel message d'erreur
      if (file.type != 'image/jpeg' ) {
        alert("le format de votre image" + file.type + " n'est pas correct");
		document.getElementById("file_photo").value="";
      }
	  else {
		// récupérer le contenu de l'image
		let reader = new FileReader();
		reader.readAsDataURL(file);
		// attendre que le contenu de l'image soit totalement chargé
		reader.onload = function(e) {
			// le contenu binaire de l'image est disponible dans e.target.result
			document.querySelector('#photo_affich').src = e.target.result;
			document.querySelector('#photo_affich').classList.remove('d-none');
		}
	  }

    });

  })
  </script>
</body>

</html>