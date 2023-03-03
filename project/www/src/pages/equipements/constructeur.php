<?php
require __DIR__ . '/../../../back/connexion.php';
require __DIR__ . '/../../../src/repository/VaisseauRepository.php';
require __DIR__ . '/../../../src/repository/ConstructeurRepository.php';

$constructeurRepository = new ConstructeurRepository();
$construct_tab = $constructeurRepository->findAll();
?>

<style>
    .bttn {
        display: inline-block;
        vertical-align: middle;
        position: relative;
    }

    .bttn a {
        display: block;
        padding: 30px;
        font-size: 30px;
        color: #ffb902;
        text-transform: uppercase;
    }

    .bttn:hover {
        cursor: pointer;
    }

    .bttn.out .corners {
        position: absolute;
        width: 100%;
        transition-duration: 0.3s;
    }

    .bttn.out .corners:before,
    .bttn.out .corners:after {
        content: '';
        position: absolute;
        width: 7px;
        height: 7px;
        border-color: cyan;
        border-style: solid;
        transition-duration: 0.3s;
        transform: translateZ(0);
    }

    .bttn.out .corners.top:before {
        border-width: 1px 0 0 1px;
    }

    .bttn.out .corners.top:after {
        border-width: 1px 1px 0 0;
    }

    .bttn.out .corners.bottom:before {
        border-width: 0 0 1px 1px;
    }

    .bttn.out .corners.bottom:after {
        border-width: 0 1px 1px 0;
    }

    .bttn.out .corners:before {
        left: 0;
    }

    .bttn.out .corners:after {
        right: 0;
    }

    .bttn.out .corners.top {
        top: 0;
    }

    .bttn.out .corners.bottom {
        bottom: 7px;
    }

    .bttn.out:hover .corners:before {
        left: 20px;
    }

    .bttn.out:hover .corners:after {
        right: 20px;
    }

    .bttn.out:hover .corners.top {
        top: 20px;
    }

    .bttn.out:hover .corners.bottom {
        bottom: 27px;
    }
</style>
<div class="container_construct">

    <?php foreach ($construct_tab as $construct) { ?>
        <div class="construct_indiv">

            <!--<div class="bttn out cyan">-->
            <a href="?ind=constructeur_ind&id=<?= $construct['id_constructeur']; ?>">
                <img src="src/img/<?= $construct['image'] ?>" alt="">

                <img id="logo_constructeur" src="src/img/<?= $construct["logo"] ?>" alt="logo <?= $construct['nom'] ?>">
            </a>
            <!--<div class="corners top"></div>
                <div class="corners bottom"></div>-->
        </div>
    <?php
    }
    ?>

</div>

</section>
<script src="src/js/script_filtre_vaisseau.js"></script>