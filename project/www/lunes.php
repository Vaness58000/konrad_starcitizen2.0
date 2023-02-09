<?php
session_start();
require("back/connexion.php");

include 'header.php';


$sth = $dbco->prepare("SELECT * FROM lunes");
$sth->execute();
$lunes = $sth->fetchAll(PDO::FETCH_ASSOC);
/*css systeme.css*/
?>

<div class="container_lune">

    <?php foreach ($lunes as $lune) { ?>
        <div class="vaisseau_indiv">
            <a href="lune_ind.php?id=<?= $lune['id']; ?>"><img src="img/<?= $lune['image']; ?>" alt="lune<? $lune['nom']; ?>"></a>
            <div class="centered"><?= $lune['nom']; ?></div>
        </div>
    <?php
    }
    ?>
</div>
</section>
<?php
include 'footer.php';
?>
<script type="text/javascript" src="js/script_filtre_vaisseau.js"></script>
</body>

</html>