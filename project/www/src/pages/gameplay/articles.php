<?php
require __DIR__ . '/../../../back/connexion.php';
require __DIR__ . '/../../../src/repository/ArticleRepository.php';
require __DIR__ . '/../../../src/repository/UsersRepository.php';
$pg = 0;
if (!empty($_GET['pg'])) {
	$pg = intval($_GET['pg']) - 1;
}
if ($pg < 0) {
	$pg = 0;
}
$nomb_art = 3;
$articleRepository = new ArticleRepository();
$type = $articleRepository->findIdTypeArticle("article");
$usersRepository = new UsersRepository();
$nomb = $articleRepository->findAllAndTypeUserCount($type);

$nomb_page = ceil($nomb / $nomb_art);

$article = $articleRepository->findAllAndTypeUserPage($type, $pg, $nomb_art);
?>
<section class="page_article">
  <div class="container_article">
    <?php foreach ($article as $construct) { ?>
      <div class="card_article">
        <div class="card-header_article">
          <a href="?ind=article_streamer_ind&id=<?= $construct["id"] ?>">
            <?php
            $article_img = $articleRepository->findAllImgArticle($construct["id"]);
            if (count($article_img) >= 1) {
            ?>
              <img src="src/img/<?= $article_img[0]['src'] ?>" alt="<?= $article_img[0]['alt'] ?>" />

            <?php } ?>

        </div>
        <div class="card-body_article">
          <span class="tag tag-teal">GamePlay</span>
          <h4><?= $construct['titre'] ?></h4>
          <p style="height: 80px; overflow:hidden;">
            <?= $construct['resume'] ?>
          </p>
          </a>
          <div class="user_article">
            <?php
            $user = $usersRepository->findAllUserAvatarId($construct["id_user"]);
            if (count($user) <= 0) { ?>
              <img src="src/img/avatar.png" alt="<?= $construct['pseudo'] ?>" />

            <?php } else if (count($user) >= 1) { ?>
              <img src="upload/<?= $user["src"] ?>" alt="avatar de <?= $construct['pseudo'] ?>" />
            <?php } ?>
            <div class="user-info">
              <h5><?= $construct['pseudo'] ?></h5>
              <small class="date"><?= date('d/m/Y', strtotime($construct['date'])); ?></small>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</section>
<ul class="pagination">
	<?php for ($i = 1; $i <= $nomb_page; $i++) { ?>
		<li><a href="?ind=articles&pg=<?= $i ?>"><?= $i ?></a></li>
	<?php } ?>
</ul>