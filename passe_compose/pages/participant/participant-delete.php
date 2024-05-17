<?php
/*
   Fichier : participant-delete.php
 */
 session_start();
 if (! isset($_SESSION["login"]))
	header('location: ./../connexion/form-login.html');
else
	echo "Bonjour " . $_SESSION["login"];
include './../../bootstrap.php';
if (isset($_GET['num'])) {
    $num = (int) $_GET['num'];
    $sql = 'DELETE FROM participant WHERE id_participant = :param';
    $stmt = $dbh->prepare($sql);
    $stmt->execute([
        ':param' => $num,
    ]);
}

header('Location: participant-index.php');
?>