<?php
include ('../header.php');
$portrait1 = array('name' => 'Victor', 'firstname' => 'Hugo', 'portrait' => 'http://upload.wikimedia.org/wikipedia/commons/5/5a/Bonnat_Hugo001z.jpg');
$portrait2 = array('name' => 'Jean', 'firstname' => 'de La Fontaine', 'portrait' => 'http://upload.wikimedia.org/wikipedia/commons/e/e1/La_Fontaine_par_Rigaud.jpg');
$portrait3 = array('name' => 'Pierre', 'firstname' => 'Corneille', 'portrait' => 'http://upload.wikimedia.org/wikipedia/commons/2/2a/Pierre_Corneille_2.jpg');
$portrait4 = array('name' => 'Jean', 'firstname' => 'Racine', 'portrait' => 'http://upload.wikimedia.org/wikipedia/commons/d/d5/Jean_racine.jpg');

function show($showPortrait) {
    ?>
    <p> <?= $showPortrait['name'] ?> </p>
    <p> <?= $showPortrait['firstname'] ?> </p>
    <img src="<?= $showPortrait['portrait'] ?>" alt="portrait" />
    <?php
};
?>
<div class="container">
    <p>Faire une fonction qui permet d'afficher les données des tableaux et les afficher tous sur une même page.</p>

    <p><?= show($portrait1) ?></p>
    <p><?= show($portrait2) ?></p>
    <p><?= show($portrait3) ?></p>
    <p><?= show($portrait4) ?></p>
</div>
</body>
</html>
