<?php
/*
   Fichier : login.php
 */

require './../../bootstrap.php';


echo head("Passé composé");
?>

<body style="padding:30px">
    <?php if ( $_SERVER['REQUEST_METHOD'] != 'POST') { ?>
        <div id="logo">
            <img src="./../../assets/images/Logo PC.png" alt="">
        </div>
        <div id="form">
            <form action="./login.php" method="post">
                    <label>Login :</label>
                    <input  name="zt_login" type="text" size="15" required>
                    <label>Mot de passe :</label>
                    <input id="zt_mp" name="zt_mp" type="password" size="15" required>

                    <p id="showPass">
                        <span class="material-symbols-outlined" id="eye">visibility</span>
                        Afficher le mot de passe
                    </p>
                    <button type="submit">Connexion</button>
            </form>
        </div>
        
        <script src="./../../assets/js/showpassword.js"></script>
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


}
?>
</body>

</html>
