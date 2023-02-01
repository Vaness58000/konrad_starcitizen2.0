<?php
session_start();
require("back/connexion.php");

include 'header.php';


$sth = $dbco->prepare("SELECT * FROM vaisseau WHERE categorie='vehicule'");
$sth->execute();
$vaisseaux = $sth->fetchAll(PDO::FETCH_ASSOC);

$id = strip_tags($_GET["id"]);
$sth2 = $dbco->prepare(" 
SELECT * 
FROM constructeur WHERE idConstructeur=:id");
$sth2->bindValue(":id", $id, PDO::PARAM_INT);
$sth2->execute();
/*Retourne un tableau associatif pour chaque entrée de notre table
*avec le nom des colonnes sélectionnées en clefs*/
$constructeurs = $sth2->fetchAll(PDO::FETCH_ASSOC);


$sth3 = $dbco->prepare(" 
                SELECT *
                FROM constructeur
                INNER JOIN vaisseau ON constructeur.idConstructeur = vaisseau.idConstructeur WHERE constructeur.idConstructeur=:id AND categorie='vehicule'");
$sth3->bindValue(":id", $id, PDO::PARAM_INT);
$sth3->execute();
/*Retourne un tableau associatif pour chaque entrée de notre table
                *avec le nom des colonnes sélectionnées en clefs*/
$constructs = $sth3->fetchAll(PDO::FETCH_ASSOC);

$sth4 = $dbco->prepare("SELECT * FROM constructeur ");
$sth4->execute();
$tousConstrus = $sth4->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="page_vaisseau">
    <div class="dropdown">
        <button onclick="categorie()" class="dropbtn"><i class="fa-solid fa-bars-sort" style="color:white"></i>Constructeur</button>

        <div id="myDropdown" class="dropdown-content">

            <input type="text" placeholder="Recherche.." id="myInput" onkeyup="filterFunction()">
            <a href="vehicule.php" id="construct"><img src="" alt="">Tous les vaisseaux</a></li>
            <?php foreach ($tousConstrus as $unConstru) { ?>
                <a href="vehicule_construct.php?id=<?= $unConstru['idConstructeur']; ?>"><img src="img/<?= $unConstru['logo']; ?>" alt="" width="50px"><?= $unConstru['nom']; ?></a>
            <?php
            }
            ?>
        </div>

    </div>


    <?php foreach ($constructeurs as $constructeur) { ?>
        <div class="container_contructeur">

            <h1><img src="img/<?= $constructeur['logo']; ?>"><?= $constructeur['nom']; ?></h1>

            <div class="info_construct">
                <img src="img/<?= $constructeur['image']; ?>" alt="<?= $constructeur['nom']; ?>">
                <label class="btn btn--blue" for="modal-2">+ d'infos sur <?= $constructeur['nom']; ?> </label>
                <input class="modal-state" id="modal-2" type="checkbox" />
                <div class="modal">
                    <label class="modal__bg" for="modal-2"></label>
                    <div class="modal__inner">
                        <label class="modal__close" for="modal-2"></label>
                        <h2><?= $constructeur['nom']; ?></h2>
                        <p><img src="img/<?= $constructeur['image']; ?>" alt="<?= $constructeur['nom']; ?>">
                        <p><?= $constructeur['paragraphe1']; ?></p>
                        <p><?= $constructeur['paragraphe2']; ?></p>
                        <p><?= $constructeur['paragraphe3']; ?></p>
                        <p><?= $constructeur['paragraphe4']; ?></p>
                        <p><?= $constructeur['paragraphe5']; ?></p>
                        <p><?= $constructeur['paragraphe6']; ?></p>
                        <p><?= $constructeur['paragraphe7']; ?></p>
                    </div>
                </div>


            </div>
            <h2><img src="img/account_corners.png" alt="deco">&ensp;Les véhicules <?= $constructeur['nom']; ?></h2>
        </div>
    <?php
    }
    ?>
    <div class="container_vaisseau">

        <?php foreach ($constructs as $construct) { ?>
            <div class="vaisseau_indiv">
                <a href="vaisseau_ind.php?id=<?= $construct['id']; ?>"><img src="img/<?= $construct['image_vaisseau']; ?>" alt="vaisseau<? $construct['nom_vaisseau']; ?>"></a>
                <div class="centered"><?= $construct['nom_vaisseau']; ?></div>
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