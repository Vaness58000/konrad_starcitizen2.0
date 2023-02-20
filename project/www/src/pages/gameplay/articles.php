<?php
require __DIR__ . '/../../../back/connexion.php';
require __DIR__ . '/../../../src/repository/ArticleRepository.php';
require __DIR__ . '/../../../src/repository/UsersRepository.php';
$articleRepository = new ArticleRepository();
$article = $articleRepository->findAllAndTypeUser(1);
$usersRepository = new UsersRepository();
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
              <img src="src/img/<?= $article_img[0]['name'] ?>" alt="<?= $article_img[0]['alt'] ?>" />

            <?php } ?>

        </div>
        <div class="card-body_article">
          <span class="tag tag-teal">GamePlay</span>
          <h4><?= $construct['titre'] ?></h4>
          <p>
            <?= $construct['resume'] ?>
          </p>
          </a>
          <div class="user_article">
            <?php
            $user = $usersRepository->findAllUserId($construct["id_user"]);
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