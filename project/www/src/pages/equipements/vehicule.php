<?php
require __DIR__.'/../../../back/connexion.php';

$sth = $dbco->prepare("SELECT * FROM vaisseau WHERE categorie='vehicule' ");
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
            <a href="vaisseau.php" id="construct"><img src="" alt="">Tous les vaisseaux</a></li>
            <?php foreach ($constructeurs as $constructeur) { ?>
                <a href="?ind=vehicule_construct&id=<?= $constructeur['idConstructeur']; ?>"><img src="src/img/<?= $constructeur['logo']; ?>" alt="" width="50px"><?= $constructeur['nom']; ?></a>
            <?php
            }
            ?>
        </div>

    </div>

    <div class="container_equipement">

        <?php foreach ($vaisseaux as $vaisseau) { ?>
            <div class="equipement_indiv">
                <a href="?ind=vaisseau_ind&id=<?= $vaisseau['id']; ?>"><img src="src/img/<?= $vaisseau['image_vaisseau']; ?>" alt="vaisseau<? $vaisseau['nom_vaisseau']; ?>"></a>
                <div class="centered"><?= $vaisseau['nom_vaisseau']; ?></div>
            </div>
        <?php
        }
        ?>
    </div>
</section>
<script src="src/js/script_filtre_vaisseau.js"></script>
