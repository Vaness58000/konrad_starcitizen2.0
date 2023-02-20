<?php
require __DIR__.'/../../../back/connexion.php';
require __DIR__.'/../../../src/repository/VaisseauRepository.php';
require __DIR__.'/../../../src/repository/ConstructeurRepository.php';

$vaisseauRepository = new VaisseauRepository();
$vaisseau = $vaisseauRepository->findAll();

$constructeurRepository = new ConstructeurRepository();
$construct_tab = $constructeurRepository->findAll();
?>


<section class="page_equipement">
  <div class="dropdown">
    <button onclick="categorie()" class="dropbtn"><i class="fa-solid fa-bars-sort" style="color:white"></i>Constructeur</button>

    <div id="myDropdown" class="dropdown-content">

      <input type="text" placeholder="Recherche.." id="myInput" onkeyup="filterFunction()">
      <a href="?ind=vaisseau" id="construct"><img src="" alt="">Tous les vaisseaux</a></li>
     <?php foreach ($construct_tab as $construct) {?>
        <a href="?ind=vaisseau_construct&id=<?= $construct['id_constructeur'] ?>"><img src="src/img/<?= $construct['logo'] ?>" alt="logo <?= $construct['nom'] ?>" width="50px"><?= $construct['nom'] ?></a>
        <?php } ?>
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

    <?php foreach ($vaisseau as $construct) {?>
      <div class="equipement_indiv">
        <a href="?ind=vaisseau_ind&id=<?= $construct['id']; ?>">
        <?php $vaisseau_img = $vaisseauRepository->findAllImgObj($construct["id_objet"]);
        if (count($vaisseau_img) >= 1) {
        ?><img src="src/img/<?= $vaisseau_img[0]["name"] ?>" alt="vaisseau<?= $construct['nom_vaiss'] ?>"></a>
        <?php } ?>
        <div class="centered"><?= $construct['nom_vaiss'] ?></div>
      </div>
    <?php
    }
    ?>
  </div>
</section>
<script src="src/js/script_filtre_vaisseau.js"></script>
