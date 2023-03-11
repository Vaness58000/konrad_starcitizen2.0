<?php
require __DIR__ . '/../../back/connexion.php';
require __DIR__ . '/../../src/repository/ArticleRepository.php';
require __DIR__ . '/../../src/repository/UsersRepository.php';
$articleRepository = new ArticleRepository();
$type = $articleRepository->findIdTypeArticle("actualité");
$article_actu = $articleRepository->findAllAndTypeUserPage($type, 0, 5);
$type2 = $articleRepository->findIdTypeArticle("patch_note");
$article_patch = $articleRepository->findAllAndTypeUserPage($type2, 0, 5);
$type3 = $articleRepository->findIdTypeArticle("article");
$article = $articleRepository->findAllAndTypeUserPage($type3, 0, 6);
$usersRepository = new UsersRepository();
$id_vehicule = 2;
$id_vaiss = 1;
?>

<!--SLIDE IMAGE-->
<div class="flex-slider">
    <div class="sp-container">
        <div class="sp-content">
            <div class="sp-globe"></div>
            <h2 class="frame-1">COMMUNAUTE STAR CITIZEN</h2>
            <h2 class="frame-2">ACTUALITES</h2>
            <h2 class="frame-3">ASTUCES</h2>
            <h2 class="frame-4">CONCOURS</h2>
            <h2 class="frame-5">
                <span>UN UNIVERS</span>
                <span>VOUS</span>
                <span>ATTEND.</span>
            </h2>
        </div>
    </div>
    <ul class="slides">
        <li>
            <div class="slide-image" data-bg="src/img/image1.jpg" data-flex-start="center center "></div>
        </li>
        <li>
            <div class="slide-image" data-bg="src/img/image2.jpg" data-flex-start="center center "></div>
        </li>
        <li>
            <div class="slide-image" data-bg="src/img/image3.jpg" data-flex-start="center center "></div>
        </li>
    </ul>
</div>
<!--  FIN SLIDE IMAGE-->

<!--ACTUALITES-->
<div class="section_categorie">
    <h1 class="centered2">Dernières actus</h1>
    <hr>
</div>
<section class="post_dark">

    <div class="container_postcard">

        <?php foreach ($article_actu as $construct) { ?>
            <article class="postcard dark blue">
                <a class="postcard__img_link" href="?ind=actualite_ind&id=<?= $construct["id"]; ?>">
                    <?php
                    $article_img = $articleRepository->findAllImgArticle($construct["id"]);
                    if (count($article_img) >= 1) {
                    ?>
                        <img class="postcard__img" src="src/img/<?= $article_img[0]['name'] ?>" alt="Image Title" />

                    <?php } ?>
                </a>
                <div class="postcard__text">

                    <h1 class="postcard__title blue"><a href="?ind=actualite_ind&id=<?= $construct["id"]; ?>"><?= $construct['titre']; ?></a></h1>
                    <div class="postcard__subtitle small">
                        <time>
                            <i class="fas fa-calendar-alt mr-2"></i> <?= date('d/m/Y', strtotime($construct['date'])); ?>
                        </time>
                    </div>
                    <div class="postcard__bar"></div>
                    <div class="postcard__preview-txt"><?= $construct['resume'] ?></div>
                    <ul class="postcard__tagbox">
                        <li class="tag__item"><a href="?ind=patch_note">Actualité</a></li>

                        <li class="tag__item auteur blue">
                            <a href="?ind=streamer_ind&id=<?= $construct["id_user"] ?>">Publié par <?= $construct['pseudo'] ?>
                        </li>
                    </ul>
                </div>
            </article>
        <?php
        }
        ?>

    </div>

</section>
<div class="bouton">
    <a class="btn_actus" href="?ind=actualites"><span>+ d'actualités</span></a>
</div>
<!-- FIN ACTUALITES-->


<!--PATCH NOTES-->
<div class="section_categorie">
    <h1 class="centered2">Derniers patch notes</h1>
    <hr>
</div>
<div class="patch">
    <?php foreach ($article_patch as $construct) { ?>
        <div class="patch-card">
            <div class="patch-card__thumbnail">
                <a href="?ind=patch_ind&id=<?= $construct["id"]; ?>">
                    <?php
                    $article_img = $articleRepository->findAllImgArticle($construct["id"]);
                    if (count($article_img) >= 1) {
                    ?><img src="src/img/<?= $article_img[0]['name'] ?>" alt="" />
                    <?php } ?>
                </a>
            </div>

            <div class="patch-card__content">
                <a href="?ind=patch_ind&id=<?= $construct["id"]; ?>">
                    <h2 class="patch-card__title"><?= $construct['titre']; ?></h2>
                </a>

                <div class="patch-card__text">
                    <p style="height: 120px; overflow:hidden; margin-bottom: 20px;">
                        <?= $construct['resume']; ?>
                    </p>
                </div>

                <div class="patch-card__meta">
                    <div>
                        <span class="patch-card__timestamp"><i class="fas fa-calendar-alt mr-2"></i> <?= date('d/m/Y', strtotime($construct['date'])); ?></span>
                    </div>
                    <ul class="postcard__tagbox">
                        <li class="tag__item"><a href="?ind=patch_note">Patch Notes</a></li>

                        <li class="tag__item auteur blue">

                            <a href="?ind=streamer_ind&id=<?= $construct["id_user"] ?>">Publié par <?= $construct['pseudo'] ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<div class="bouton">
    <a class="btn_actus" href="?ind=patch_note"><span>Voir +</span></a>
</div>
<!--FIN PATCH NOTE-->


<div class="wrapper">
    <div class="section_categorie">
        <h1 class="centered2">Derniers GamePlay</h1>
        <hr>
    </div>

    <div class="news-slider">

        <div class="news-slider__wrp swiper-wrapper">
            <?php foreach ($article as $construct) { ?>
                <div class="news-slider__item swiper-slide">

                    <a href="?ind=article_streamer_ind&id=<?= $construct["id"]; ?>" class="news__item">
                        <?php
                        $user = $usersRepository->findAllUserAvatarId($construct["id_user"]);
                        if (count($user) <= 0) { ?>
                            <img src="src/img/avatar.png" alt="<?= $construct['pseudo'] ?>" />

                        <?php } else if (count($user) >= 1) { ?>
                            <img src="upload/<?= $user["src"] ?>" alt="avatar de <?= $construct['pseudo'] ?>" />
                        <?php } ?>
                        <span><?= $construct['pseudo'] ?></span>
                        <div class="news__title">
                            <?= $construct['titre']; ?>
                        </div>
                        <div class="corner-borders corner-borders--left"></div>
                        <div class="corner-borders corner-borders--right"></div>
                        <p class="news__txt" style="height: 100px; overflow:hidden; margin-bottom: 20px;">
                            <?= $construct['resume']; ?>
                        </p>
                        <span><?= date('d/m/Y', strtotime($construct['date'])); ?></span>
                        <div class="news__img">
                            <?php
                            $article_img = $articleRepository->findAllImgArticle($construct["id"]);
                            if (count($article_img) >= 1) {
                            ?><img src="src/img/<?= $article_img[0]['name'] ?>" alt="" />
                            <?php } ?>
                        </div>
                    </a>
                </div>
            <?php } ?>

        </div>

        <div class="news-slider__ctr">

            <div class="news-slider__arrows">
                <button class="news-slider__arrow news-slider-prev">
                    <span class="icon-font">
                        <svg class="icon icon-arrow-left">
                            <use xlink:href="#icon-arrow-left"></use>
                        </svg>
                    </span>
                </button>
                <button class="news-slider__arrow news-slider-next">
                    <span class="icon-font">
                        <svg class="icon icon-arrow-right">
                            <use xlink:href="#icon-arrow-right"></use>
                        </svg>
                    </span>
                </button>
            </div>

            <div class="news-slider__pagination"></div>

        </div>
        <div class="bouton">
            <a class="btn_actus" href="?ind=patch_note"><span>Voir +</span></a>
        </div>
    </div>

</div>

<svg hidden="hidden">
    <defs>
        <symbol id="icon-arrow-left" viewBox="0 0 32 32">
            <title>arrow-left</title>
            <path d="M0.704 17.696l9.856 9.856c0.896 0.896 2.432 0.896 3.328 0s0.896-2.432 0-3.328l-5.792-5.856h21.568c1.312 0 2.368-1.056 2.368-2.368s-1.056-2.368-2.368-2.368h-21.568l5.824-5.824c0.896-0.896 0.896-2.432 0-3.328-0.48-0.48-1.088-0.704-1.696-0.704s-1.216 0.224-1.696 0.704l-9.824 9.824c-0.448 0.448-0.704 1.056-0.704 1.696s0.224 1.248 0.704 1.696z"></path>
        </symbol>
        <symbol id="icon-arrow-right" viewBox="0 0 32 32">
            <title>arrow-right</title>
            <path d="M31.296 14.336l-9.888-9.888c-0.896-0.896-2.432-0.896-3.328 0s-0.896 2.432 0 3.328l5.824 5.856h-21.536c-1.312 0-2.368 1.056-2.368 2.368s1.056 2.368 2.368 2.368h21.568l-5.856 5.824c-0.896 0.896-0.896 2.432 0 3.328 0.48 0.48 1.088 0.704 1.696 0.704s1.216-0.224 1.696-0.704l9.824-9.824c0.448-0.448 0.704-1.056 0.704-1.696s-0.224-1.248-0.704-1.664z"></path>
        </symbol>
    </defs>
</svg>
<div class="section_categorie">
    <h1 class="centered2">Notre guide</h1>
    <hr>
</div>
<section class="cards_guide">
    <article class="card_guide card--1">

        <div class="card__img"></div>
        <a href="?ind=transports&type_transp=<?= $id_vaiss ?>" class="card_link">
            <div class="card__img--hover"></div>
        </a>
        <div class="card__info">
            <h3 class="card__title">Vaisseaux</h3>
        </div>
    </article>


    <article class="card_guide card--2">

        <div class="card__img"></div>
        <a href="?ind=transports&type_transp=<?= $id_vehicule ?>" class="card_link">
            <div class="card__img--hover"></div>
        </a>
        <div class="card__info">

            <h3 class="card__title">Véhicules</h3>
            </span>
        </div>
    </article>
    <article class="card_guide card--3">

        <div class="card__img"></div>
        <a href="?ind=armes" class="card_link">
            <div class="card__img--hover"></div>
        </a>
        <div class="card__info">

            <h3 class="card__title">Armes</h3>
            </span>
        </div>
    </article>
    <article class="card_guide card--4">

        <div class="card__img"></div>
        <a href="?ind=especes" class="card_link">
            <div class="card__img--hover"></div>
        </a>
        <div class="card__info">

            <h3 class="card__title">Espèces</h3>
            </span>
        </div>
    </article>
    <article class="card_guide card--9">

        <div class="card__img"></div>
        <a href="?ind=systemes" class="card_link">
            <div class="card__img--hover"></div>
        </a>
        <div class="card__info">

            <h3 class="card__title">Systèmes</h3>
            </span>
        </div>
    </article>
    <article class="card_guide card--5">

        <div class="card__img"></div>
        <a href="?ind=planetes" class="card_link">
            <div class="card__img--hover"></div>
        </a>
        <div class="card__info">

            <h3 class="card__title">Planètes</h3>
            </span>
        </div>
    </article>
    <article class="card_guide card--6">

        <div class="card__img"></div>
        <a href="?ind=lunes" class="card_link">
            <div class="card__img--hover"></div>
        </a>
        <div class="card__info">

            <h3 class="card__title">Lunes</h3>
            </span>
        </div>
    </article>
    <article class="card_guide card--7">

        <div class="card__img"></div>
        <a href="?ind=villes" class="card_link">
            <div class="card__img--hover"></div>
        </a>
        <div class="card__info">

            <h3 class="card__title">Villes</h3>
            </span>
        </div>
    </article>
    <article class="card_guide card--8">

        <div class="card__img"></div>
        <a href="?ind=station_spatiale" class="card_link">
            <div class="card__img--hover"></div>
        </a>
        <div class="card__info">

            <h3 class="card__title">Stations</h3>
            </span>
        </div>
    </article>
</section>


</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.5.0/jquery.flexslider.min.js"></script>
<script src="src/js/slide_accueil.js"></script>