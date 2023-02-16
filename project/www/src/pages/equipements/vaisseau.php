<?php
require __DIR__.'/../../../back/connexion.php';

$sth = $dbco->prepare("SELECT * FROM vaisseau WHERE categorie='vaisseau' ");
$sth->execute();
$vaisseaux = $sth->fetchAll(PDO::FETCH_ASSOC);

$sth2 = $dbco->prepare("SELECT * FROM constructeur ");
$sth2->execute();
$constructeurs = $sth2->fetchAll(PDO::FETCH_ASSOC);


$sth3 = $dbco->prepare("SELECT * FROM constructeur ");
$sth3->execute();
$constructs = $sth3->fetchAll(PDO::FETCH_ASSOC);
?>


<section class="page_equipement">
  <div class="dropdown">
    <button onclick="categorie()" class="dropbtn"><i class="fa-solid fa-bars-sort" style="color:white"></i>Constructeur</button>

    <div id="myDropdown" class="dropdown-content">

      <input type="text" placeholder="Recherche.." id="myInput" onkeyup="filterFunction()">
      <a href="vehicule.php" id="construct"><img src="" alt="">Tous les vaisseaux</a></li>
      <?php foreach ($constructs as $unConstru) { ?>
        <a href="?ind=vaisseau_construct&id=<?= $unConstru['idConstructeur']; ?>"><img src="img/<?= $unConstru['logo']; ?>" alt="" width="50px"><?= $unConstru['nom']; ?></a>
      <?php
      }
      ?>
    </div>

  </div>

  <!--  <form id="form1" action ="verif-form.php" method ="get">
        <div id="recherches">
         <label for="terme">GAMES</label>
         <input type="search" id="terme" name="terme" placeholder="entrez votre jeu" required>
         <input type="submit" name = "s" value="Rechercher">
        </div>
      </form>-->
  <div class="container_equipement">

    <?php foreach ($vaisseaux as $vaisseau) { ?>
      <div class="equipement_indiv">
        <a href="?ind=vaisseau_ind&id=<?= $vaisseau['id']; ?>"><img src="img/<?= $vaisseau['image_vaisseau']; ?>" alt="vaisseau<? $vaisseau['nom_vaisseau']; ?>"></a>
        <div class="centered"><?= $vaisseau['nom_vaisseau']; ?></div>
      </div>
    <?php
    }
    ?>
  </div>
</section>
<script src="./../../../js/script_filtre_vaisseau.js"></script>
