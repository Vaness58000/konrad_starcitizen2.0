<?php
session_start();
require("back/connexion.php");

include 'header.php';


$sth = $dbco->prepare("SELECT * FROM arme WHERE categorie='pistolet' ");
$sth->execute();
$pistolets = $sth->fetchAll(PDO::FETCH_ASSOC);

$sth2 = $dbco->prepare("SELECT * FROM arme WHERE categorie='mitrailleur' ");
$sth2->execute();
$mitrailleurs = $sth2->fetchAll(PDO::FETCH_ASSOC);


$sth3 = $dbco->prepare("SELECT * FROM arme WHERE categorie='fusil' ");
$sth3->execute();
$fusils = $sth3->fetchAll(PDO::FETCH_ASSOC);

$sth4 = $dbco->prepare("SELECT * FROM arme WHERE categorie='sniper' ");
$sth4->execute();
$snipers = $sth4->fetchAll(PDO::FETCH_ASSOC);
?>


<section class="page_vaisseau">
  <h2>Pistolets</h2>
  <div class="container_arme">

    <?php foreach ($pistolets as $pistolet) { ?>

      <div class="arme_indiv">
        <a href="arme_ind.php?id=<?= $pistolet['id']; ?>"><img src="img/<?= $pistolet['image']; ?>" alt="pistolet<? $pistolet['nom']; ?>"></a>
        <div class="centered"><?= $pistolet['nom']; ?></div>
      </div>
    <?php
    }
    ?>
  </div>
  <h2>Pistolets-mitrailleurs</h2>
  <div class="container_arme">

    <?php foreach ($mitrailleurs as $mitrailleur) { ?>
      <div class="arme_indiv">
        <a href="arme_ind.php?id=<?= $mitrailleur['id']; ?>"><img src="img/<?= $mitrailleur['image']; ?>" alt="pistolet<? $mitrailleur['nom']; ?>"></a>
        <div class="centered"><?= $mitrailleur['nom']; ?></div>
      </div>
    <?php
    }
    ?>
  </div>
  <h2>Fusils d'assaut</h2>
  <div class="container_arme">

    <?php foreach ($fusils as $fusil) { ?>
      <div class="arme_indiv">
        <a href="arme_ind.php?id=<?= $fusil['id']; ?>"><img src="img/<?= $fusil['image']; ?>" alt="pistolet<? $fusil['nom']; ?>"></a>
        <div class="centered"><?= $fusil['nom']; ?></div>
      </div>
    <?php
    }
    ?>
  </div>
  <h2>Fusil de précision, Sniper</h2>
  <div class="container_arme">

    <?php foreach ($snipers as $sniper) { ?>
      <div class="arme_indiv">
        <a href="arme_ind.php?id=<?= $sniper['id']; ?>"><img src="img/<?= $sniper['image']; ?>" alt="pistolet<? $sniper['nom']; ?>"></a>
        <div class="centered"><?= $sniper['nom']; ?></div>
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