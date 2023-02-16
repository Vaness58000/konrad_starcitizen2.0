<?php
require __DIR__ . '/../../../back/connexion.php';
require __DIR__ . '/../../../src/repository/ArticleRepository.php';

$articleRepository = new ArticleRepository();
$article = $articleRepository->findAllAndTypeUserId($_GET['id'], 1);
?>
<div class="page_actu">
    <?php foreach ($article as $construct) { ?>
        <section class="page_generale">

            <h1><?= $construct['titre'] ?></h1>

            <div class="info_generale">
                <div id="auteur">
                    <a href="#"><img src="img/avatar.png" alt="">
                        <h3>Publié par <?= $construct['pseudo'] ?>
                    </a> </br>
                    le <?= $construct['date'] ?></h3>
                </div>
                <p><?= str_replace("\n", "<br/>", $construct['resume']) ?></p>

                <p><?= str_replace("\n", "<br/>", $construct['contenu']) ?></p>
                <iframe width="560" height="315" src="<?= $construct['video'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>

        <?php } ?>
        </section>
</div>