
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

    <div id="main-detail"> 
        <div id="podcastPage">
            <h1>Podcast de <?php echo $histoires['prénom']; ?></h1>
            <p><?php echo $histoires['résumé'];?></p>
            <?php echo $histoires["url_son"]?>
        </div>
    </div>

    <canvas></canvas>
    <script src="./../../assets/js/detailBG.js"></script>

    <footer>
        <div id="footerLogo">
            <img src="./../../assets/images/Logo PC.png" alt="Logo de Passé Composé">
        </div>
        <div>
            <a href="#">Mentions Légales</a>
            <p>Passé Composé <i class="fa-regular fa-copyright"></i> tous droits réservés</p>
            <p>Développé par <a href="#">Viviane Laoue</a>, <a href="#">Solal Bonnel</a> et <a href="#">Gibeaud Clément</a></p>
        </div>
    </footer>
</body>
</html>