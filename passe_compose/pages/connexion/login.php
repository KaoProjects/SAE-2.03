<?php
/*
   Fichier : login.php
 */

require './../../bootstrap.php';


echo head("Passé composé");
?>

<body style="padding:30px">
    <?php if ( $_SERVER['REQUEST_METHOD'] != 'POST') { ?>
        <div class="form-conteneur">
    <form action="./login.php" method="post">
<div class="grp">
            <label>Login :</label>
            <input name="zt_login" type="text" size="15" required>
            <div class="grp">
            <label>Mot de passe :</label>
            <input name="zt_mp" type="password" size="15" required>
            <div class="grp">
            <button type="submit">Connexion</button>
        </div>
    </form>
    <?php }
	else {
		
$login_saisi = trim($_POST['zt_login']);
$mp_saisi = trim($_POST['zt_mp']);
$sql = 'SELECT * FROM utilisateur WHERE login = :login ';
$stmt = $dbh->prepare($sql);
$stmt->execute([
':login' => $login_saisi,
]);
$utilisateur = $stmt->fetch();
if ($utilisateur) {
$hash=password_hash($utilisateur["mot_de_passe"],PASSWORD_DEFAULT);
if (password_verify($mp_saisi,$hash)) {
session_start();
$_SESSION['login']=$login_saisi;
header('location: menu-backoffice.php');
}
else{
	header('location: login.php');
}
}
else
{
    header('location: login.php');
}

}
?>
</body>

</html>
