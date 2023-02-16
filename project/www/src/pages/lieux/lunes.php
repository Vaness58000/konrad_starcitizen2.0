<?php
require __DIR__.'/../../../back/connexion.php';

$sth = $dbco->prepare("SELECT * FROM lunes");
$sth->execute();
$lunes = $sth->fetchAll(PDO::FETCH_ASSOC);
/*css systeme.css*/
?>

<div class="container_lune">

    <?php foreach ($lunes as $lune) { ?>
        <div class="equipement_indiv">
            <a href="?ind=lune_ind&id=<?= $lune['id']; ?>"><img src="img/<?= $lune['image']; ?>" alt="lune<? $lune['nom']; ?>"></a>
            <div class="centered"><?= $lune['nom']; ?></div>
        </div>
    <?php
    }
    ?>
</div>
