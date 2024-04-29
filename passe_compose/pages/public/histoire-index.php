<?php
/*
Fichier : histoire-index.php
*/
require('./../../bootstrap.php');
$sql = "SELECT * FROM histoire,participant where histoire.id_participant=participant.id_participant";
$histoires = ($dbh->query($sql)->fetchAll());
echo head("Passé composé");
?>
<body>
    <div id="logo">
        <img src="./../../assets/images/Logo PC.png" alt="">
    </div>

    <div id="main">
        <div id="menu">
            <label>Entrez une date</label>
            <input type="text">
        </div>


        <div id="podcastsList">
            <?php foreach($histoires as $histoire) {?>
                <div class="podcast">
                    <a href="./histoire-detail.php/?id=<?php echo $histoire['id_histoire']?>">
                    <img src="<?php echo $histoire["image"]?>" alt="" class="podcastPhoto">
                    <div class="phantom"></div>
                    <p class="titre"><?php echo $histoire['titre']?></p>
                    <p class="prenom"><?php echo $histoire['prenom']?></p>
                </div>
                    </a>
            <?php };?>
        </div>


    </div>
</body>
</html>