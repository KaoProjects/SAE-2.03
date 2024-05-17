
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
    <div id="video-container">
        <video autoplay muted loop>
            <source src="./../../assets/images/FondDetail.mp4" type="video/mp4">
            Votre navigateur ne supporte pas la lecture de vidéos au format HTML5.
        </video>
    </div>

    <div id="main-detail"> 
        <div id="podcastPage">
            <h1>Podcast de <?php echo $histoires['prénom']; ?></h1>
            <p><?php echo $histoires['résumé'];?></p>
            <?php echo $histoires["url_son"]?>
        </div>
    </div>
</body>
</html>