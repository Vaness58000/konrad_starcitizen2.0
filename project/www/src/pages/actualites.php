<?php
require __DIR__ . '/../../back/connexion.php';
require __DIR__ . '/../../src/repository/ArticleRepository.php';
$articleRepository = new ArticleRepository();
$article = $articleRepository->findAllAndTypeUser(1);

?>
<section class="post_dark">

    <div class="container_postcard">

        <?php foreach ($article as $construct) { ?>
            <article class="postcard dark blue">
                <a class="postcard__img_link" href="?ind=actualite_ind&id=<?= $construct["id"]; ?>">
                  
                    <?php
                    $article_img = $articleRepository->findAllImgArticle($construct["id"]);
                    if (count($article_img) >= 1) {
                    ?>
                        <img class="postcard__img" src="img/<?= $article_img[0]['name'] ?>" alt="<?= $article_img[0]['alt'] ?>" />

                    <?php } ?>
                </a>
                <div class="postcard__text">

                    <h1 class="postcard__title blue"><a href="?ind=actualite_ind&id=<?= $construct["id"]; ?>"><?= $construct['titre']; ?></a></h1>
                    <div class="postcard__subtitle small">
                        <time datetime="2020-05-25 12:00:00">
                            <i class="fas fa-calendar-alt mr-2"></i> <?= date('d/m/Y', strtotime($construct['date'])); ?>
                        </time>
                    </div>
                    <div class="postcard__bar"></div>
                    <div class="postcard__preview-txt"><?= $construct['resume']; ?></div>
                    <ul class="postcard__tagbox">
                        <li class="tag__item">il y a 2 jours</li>

                        <li class="tag__item auteur blue">
                            <a href="?ind=actualite_ind&id=<?= $construct["id"]; ?>">Publié par <?= $construct['pseudo'] ?></a>
                        </li>
                    </ul>
                </div>
            </article>
        <?php
        }
        ?>

    </div>

</section>