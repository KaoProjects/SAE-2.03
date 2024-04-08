<?php 
require './../../bootstrap.php';
$sql = "SELECT * FROM histoire,participant where histoire.id_participant=participant.id_participant order by année_naissance";
$histoires = ($dbh->query($sql)->fetchAll());
echo head("Passé Composé")
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
            <div class="podcast">
                <?php foreach ($histoires as $histoire) {?>
                

                <p>podcast</p>
            </div>

            <div class="podcast">
                <p>podcast</p>
            </div>
            <div class="podcast">
                <p>podcast</p>
            </div>
            <div class="podcast">
                <p>podcast</p>
            </div>
            <div class="podcast">
                <p>podcast</p>
            </div>
            <div class="podcast">
                <p>podcast</p>
            </div>
            <div class="podcast">
                <p>podcast</p>
            </div>
            <div class="podcast">
                <p>podcast</p>
            </div>

        </div>


    </div>
</body>
</html>