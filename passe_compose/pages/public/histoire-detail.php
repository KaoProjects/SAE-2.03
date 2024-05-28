
<?php
/*
Fichier : histoire-index.php
*/
require('./../../bootstrap.php');
$sql = "SELECT * FROM histoire,participant where histoire.id_participant=participant.id_participant AND id_histoire = :id";
$stmt = $dbh->prepare($sql);
		$histoire = $stmt->execute([
			':id' => $_GET['id'],
		]);
$histoires = $stmt->fetch();;
echo head("Passé composé"); 
?>

<body>
    <div style="min-height:100vh;">
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

        <div id="ambient"></div>
        <script src="./../../assets/js/bvambient.js"></script>
    </div>

    <?php include './../../Helpers/footer.html'?>
</body>
</html>
