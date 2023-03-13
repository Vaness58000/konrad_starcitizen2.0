<?php
require __DIR__ . '/../../back/connexion.php';
require __DIR__ . '/../../src/repository/ArticleRepository.php';
require __DIR__ . '/../../src/repository/UsersRepository.php';
$articleRepository = new ArticleRepository();
$type = $articleRepository->findIdTypeArticle("actualité");
$article = $articleRepository->findAllAndIdTypeUser($_GET['id'], $type);
$usersRepository = new UsersRepository();
$tous_article = $articleRepository->findAllAndTypeUserNoId($type, $_GET["id"]);
?>
<div class="page_actu">
    <?php
    foreach ($article as $construct) { ?>
        <section class="page_generale">
            <div class="wrapper_article">
                <div class="top">
                    <div class="title">
                        <h1><?= $construct['titre'] ?></h1>
                    </div>
                </div>
            </div>
            <div class="content_article_ind">
                <div class="card_article_ind first">
                    <div class="user_article">
                        <?php
                        $user = $usersRepository->findAllUserAvatarId($construct["id_user"]);
                        if (count($user) <= 0) { ?>
                            <img src="./upload/avatar/avatar.png" alt="<?= $construct['pseudo'] ?>" />

                        <?php } else if (count($user) >= 1) { ?>
                            <img src="./upload/avatar/<?= $user["src"] ?>" alt="avatar de <?= $construct['pseudo'] ?>" />
                        <?php } ?>
                        <div class="user-info">
                            <h5><?= $construct['pseudo'] ?></h5>
                            <small class="date"><?= date('d/m/Y', strtotime($construct['date'])); ?></small>
                        </div>
                    </div>

                    <p class="text"><strong><?= str_replace("\n", "<br/>", $construct['resume']) ?></strong></p>
                    <?php
                    $article_img = $articleRepository->findAllImgArticle($construct["id"]);
                    if (count($article_img) >= 1) {
                    ?>
                        <img src="./upload/articles/<?= $article_img[0]['src'] ?>" alt="<?= $article_img[0]['alt'] ?>" />

                    <?php } ?>
                    <p class="text bbcode"><?= str_replace("\n", "<br/>", $construct['contenu']) ?></p>

                    <?php
                    $article_img = $articleRepository->findAllImgArticle($construct["id"]);

                    foreach ($article_img as $construct_img) { ?>
                        <img src="./upload/articles/<?= $construct_img['src'] ?>">

                    <?php } ?>

                    <div class="voir_aussi">
                        <h2 class="centered">Voir aussi</h2>
                        <?php foreach ($tous_article as $tous) { ?>
                            <div class="blog-card">

                                <div class="meta">
                                    <?php
                                    $article_img = $articleRepository->findAllImgArticle($tous["id"]);
                                    if (count($article_img) >= 1) {
                                    ?>
                                        <div class="photo" style="background-image: url(./upload/articles/<?= $article_img[0]['src'] ?>" ;><a href="?ind=patch_ind&id=<?= $tous["id"]; ?>"></a></div>
                                    <?php } ?>

                                </div>
                                <div class="description">
                                    <h2><a href="?ind=actualite_ind&id=<?= $tous["id"]; ?>"><?= $tous['titre']; ?></a></h2>
                                    <ul class="postcard__tagbox">
                                        <li class="tag__item">Actualité</li>

                                        <li class="tag__item auteur blue">
                                            <a href="?ind=streamer_ind&id=<?= $construct["id"]; ?>">Publié par <?= $construct['pseudo'] ?></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
        </section>
    <?php } ?>
</div>