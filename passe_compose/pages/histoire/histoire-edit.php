<?php
/*
   Fichier : histoire-edit.php
   
 */
session_start();
if (! isset($_SESSION["login"]))
	header('location: ./../connexion/form-login.html');
else
	echo "Bonjour " . $_SESSION["login"];
require './../../bootstrap.php';
echo head('Modifier une histoire');
?>
<body style="padding:30px;">
  
    <?php if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $num = (int) $_GET['num'];
        $sql = 'SELECT * FROM histoire where id_histoire = :param';
		$stmt = $dbh->prepare($sql);
		$histoire = $stmt->execute([
			':param' => $num,
		]);
		$histoire = $stmt->fetch();?>
		<h1>Éditer un histoire</h1>
		<form action="" method="post" enctype="multipart/form-data" >
			<input type="hidden" name="id" value="<?php echo $histoire['id_histoire'] ?>">
			<div>
				<label>Titre :</label>
				<input name="zt_titre" type="text" size="50" value="<?php echo $histoire['titre'] ?>">
			</div>
			<div >
				<label>Résumé :</label>
				<input name="zl_resum" type="text" size="200" value="<?php echo $histoire['résumé'] ?>">
			</div>
			<div>
				<label>Lien SoundCloud :</label>
				<input name="zl_link" type="text" value="<?php echo $histoire['url_son'] ?>">
			</div>
			<button type="submit" >Modifier</button>
			<a href="histoire-index.php" >Annuler</a>
    </form>
    <?php
} else {?>
    <?php

	$id =  (int) $_POST['id'];
	$titre_saisi =  trim($_POST['zt_titre']);
    $resum_saisi = trim($_POST['zl_resum']);
	$link_saisi= trim($_POST['zl_link']);
	
    $sql = 'UPDATE histoire
            SET titre=:titre, résumé=:resum, url_son=:link
            WHERE id_histoire = :param';
	
    $stmt = $dbh->prepare($sql);
    $stmt->execute([
        ':param' => $id,
       ':titre' => $titre_saisi,
        ':resum' => $resum_saisi,
		':link' => $link_saisi,
       
    ]);
	header('location: histoire-index.php'); ?>
    <?php }?>
  </div>
</body>

</html>