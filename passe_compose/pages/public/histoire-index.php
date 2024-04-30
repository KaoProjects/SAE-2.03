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
    <div id="logo">
        <img src="./assets/images/Logo PC.png" alt="">
    </div>
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
                <div>
                    <button type="submit" id="btn" >Rechercher</button>
                </div>
            </form>
        </div>


        <div id="podcastsList">
            <?php foreach($histoires as $histoire) {?>
                <div data_an="<?php echo $histoire["année_naissance"];?>" class="podcast">
                    <a href="./histoire-detail.php/?id=<?php echo $histoire['id_histoire'];?>">
                    <img src="./../../assets/images/photos/<?php echo $histoire["photo"];?>" alt="" class="podcastPhoto">
                    <div class="phantom"></div>
                    <p class="titre"><?php echo $histoire['titre'];?></p>
                    <p class="prenom"><?php echo $histoire['prénom'];?></p>
                </div>
                    </a>
            <?php };?>
        </div>


    </div>
</body>
</html>