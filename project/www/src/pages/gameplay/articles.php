<?php
require __DIR__ . '/../../../back/connexion.php';
require __DIR__ . '/../../../src/repository/ArticleRepository.php';
$articleRepository = new ArticleRepository();
$article = $articleRepository->findAllAndTypeUser(1);

?>

<div class="grid_article">
<?php foreach ($article as $construct) { ?>
  <div class="grid-item">
    <div class="card_article">
    <a href="?ind=article_streamer_ind&id=<?=$construct["id"] ?>"><img class="card_article-img" src="img/gallerie10.jpg" alt="" /></a>
      <div class="card_article-content">
        <div id="streamer">
          <img src="img/avatar.png" alt="">
          <h3><?= $construct['pseudo'] ?></h3>
          <span class="patch-card__timestamp"><i class="ion-clock"></i><?= $construct['date'] ?> </span>
        </div>

        <a href="?ind=article_streamer_ind&id=<?=$construct["id"] ?>"><h1 class="card_article-header"><?= $construct['titre'] ?></h1></a>
        <p class="card_article-text">
        <?= $construct['resume'] ?>
        </p>
        <a href="?ind=article_streamer_ind&id=<?=$construct["id"] ?>" class="card_article-btn">Lire<span>&rarr;</span></a>
      </div>
    </div>
  </div>
  <?php } ?>
 
</div>
