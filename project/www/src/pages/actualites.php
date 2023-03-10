<?php
require __DIR__ . '/../../back/connexion.php';
require __DIR__ . '/../../src/repository/ArticleRepository.php';
$pg = 0;
if (!empty($_GET['pg'])) {
	$pg = intval($_GET['pg']) - 1;
}
if ($pg < 0) {
	$pg = 0;
}
$nomb_art = 2;
$articleRepository = new ArticleRepository();
$type = $articleRepository->findIdTypeArticle("actualité");
$nomb = $articleRepository->findAllAndTypeUserCount($type);

$nomb_page = ceil($nomb / $nomb_art);

$article = $articleRepository->findAllAndTypeUserPage($type, $pg, $nomb_art);
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
                        <img class="postcard__img" src="src/img/<?= $article_img[0]['name'] ?>" alt="<?= $article_img[0]['alt'] ?>" />

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
                        <li class="tag__item">Actualité</li>

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
<ul class="pagination">
<?php for ($i = 1; $i <= $nomb_page; $i++) { ?>
		<li><a href="?ind=actualites&pg=<?= $i ?>"><?= $i ?></a></li>
	<?php } ?>
</ul>