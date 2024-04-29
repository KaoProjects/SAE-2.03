<?php
/*
Fichier : histoire-index.php
*/
require('./../../bootstrap.php');
$sql = "SELECT * FROM histoire,participant where histoire.id_participant=participant.id_participant AND id_histoire=".$_GET['id'];
$histoires = ($dbh->query($sql)->fetchAll());
$histoires = $histoires[0];
echo head("Passé composé");
?>
<body>
    <div id="logo">
        <img src="./../../assets/images/Logo PC.png" alt="">
    </div>

    <div id="main"> 
        <div id="podcastPage">
            <h1>Podcast de <?php echo $histoires['prenom']; ?></h1>
            <p><?php echo $histoires['resume'];?></p>

        </div>
    </div>
</body>
</html>