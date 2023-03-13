<?php
require __DIR__ . '/../../../back/connexion.php';
require __DIR__ . '/../../../src/repository/TransportRepository.php';
require __DIR__ . '/../../../src/repository/ConstructeurRepository.php';
$pg = 0;
if (!empty($_GET['pg'])) {
  $pg = intval($_GET['pg']) - 1;
}
if ($pg < 0) {
  $pg = 0;
}
$nomb_art = 20;

$transportRepository = new TransportRepository();
$nomb = $transportRepository->findAllAndTransportCount($_GET["type_transp"]);
$nomb_page = ceil($nomb / $nomb_art);
$vaisseau = $transportRepository->findAllAndTransportPage($_GET["type_transp"], $pg, $nomb_art);
$constructeurRepository = new ConstructeurRepository();
$construct_tab = $constructeurRepository->findAll();
?>


<section class="page_equipement">
  <div class="dropdown">
    <button onclick="categorie()" class="dropbtn"><i class="fa-solid fa-bars-sort" style="color:white"></i>Constructeur</button>

    <div id="myDropdown" class="dropdown-content">

      <?php foreach ($construct_tab as $construct) { ?>
        <a href="?ind=constructeur_ind&id=<?= $construct['id_constructeur']; ?>"><img src="src/img/<?= $construct['logo'] ?>" alt="logo <?= $construct['nom'] ?>" width="50px"><?= $construct['nom'] ?></a>
      <?php } ?>
    </div>

  </div>

  <div class="container_equipement">

    <?php foreach ($vaisseau as $construct) { ?>
      <div class="equipement_indiv">
        <a href="?ind=transport_ind&id=<?= $construct['id_objet']; ?>">
          <?php $vaisseau_img = $transportRepository->findAllImgObj($construct["id_objet"]);
          if (count($vaisseau_img) >= 1) {
          ?><img src="src/img/<?= $vaisseau_img[0]["name"] ?>" alt="vaisseau<?= $construct['nom_obj'] ?>"></a>
      <?php } ?>
      <div class="centered"><?= $construct['nom_obj'] ?></div>
      </div>
    <?php
    }
    ?>
  </div>
  <ul class="pagination">
    <?php for ($i = 1; $i <= $nomb_page; $i++) { ?>
      <li><a href="?ind=transports&type_transp=<?= $_GET['type_transp'] ?>&pg=<?= $i ?>"><?= $i ?></a></li>
    <?php } ?>
  </ul>
</section>

<script src="src/js/script_filtre_vaisseau.js"></script>