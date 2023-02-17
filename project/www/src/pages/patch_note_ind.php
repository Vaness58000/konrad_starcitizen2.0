<?php
require __DIR__ . '/../../back/connexion.php';
require __DIR__ . '/../../src/repository/ArticleRepository.php';

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
                <p><strong><?= str_replace("\n", "<br/>", $construct['resume']) ?></strong></p>

                <p><?= str_replace("\n", "<br/>", $construct['contenu']) ?></p>
                <?php
                $article_img = $articleRepository->findAllImgArticle($construct["id"]);

                foreach ($article_img as $construct_img) { ?>
                    <img src="img/<?= $construct_img['name'] ?>">
                <?php } ?>
            </div>
        </section>
    <?php } ?>
</div>