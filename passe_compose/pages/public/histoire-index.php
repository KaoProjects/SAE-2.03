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
    <div id="banniere">
        <img src="./../../assets/images/Logo PC.png" alt="Logo Passé Composé" id="logo-img">
    </div>
    

    <div id="paragraphe">
        <p> Bienvue sur Passé Composé, ici nous vous proposons d'écouter les histoires passionnantes de nos aînés en un simple clic.</p>
    </div>

    <div id="main-index">
        <div id="menu">
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
            </form>
            <div>
                <button id="btn" >Rechercher</button>
            </div>
        </div>

        <p id="noPodcast">Aucun podcast n'a été trouvé pour la période sélectionnée</p>
        <div id="podcastsList">
            
            <?php foreach($histoires as $histoire) {?>
                <div data_an="<?php echo $histoire["année_naissance"];?>" class="podcast">
                    <div class="phantom"></div>
                    <a href="./histoire-detail.php?id=<?php echo $histoire['id_histoire'];?>">
                    <img src="./../../assets/images/photos/<?php echo $histoire["photo"];?>" alt="" class="podcastPhoto">
                    <p class="titre"><?php echo $histoire['titre'];?></p>
                    <p class="prenom"><?php echo $histoire['prénom'];?></p>
                    </a>
                </div>
                    
            <?php };?>
        </div>
    </div>
    <script src="./../../assets/js/pg2.js"></script>
</body>
</html>