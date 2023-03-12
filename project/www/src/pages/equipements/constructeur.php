<?php
require __DIR__ . '/../../../back/connexion.php';
require __DIR__ . '/../../../src/repository/VaisseauRepository.php';
require __DIR__ . '/../../../src/repository/ConstructeurRepository.php';

$constructeurRepository = new ConstructeurRepository();
$construct_tab = $constructeurRepository->findAll();
?>

<div class="container_construct">

    <?php foreach ($construct_tab as $construct) { ?>
        <div class="construct_indiv">

        <a href="?ind=constructeur_ind&id=<?= $construct['id_constructeur']; ?>">
           
            <div class="image_construct">
          <img src="src/img/<?= $construct['image'] ?>" alt="">
            </div>
            <div id="logo_constructeur">
                <img src="src/img/<?= $construct["logo"] ?>" alt="logo <?= $construct['nom'] ?>">
            </div>
            
            </a>
        </div>
    <?php
    }
    ?>

</div>

</section>
<script src="src/js/script_filtre_vaisseau.js"></script>