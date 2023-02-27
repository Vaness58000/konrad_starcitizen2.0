<?php
require __DIR__ . '/../../../back/connexion.php';
require __DIR__ . '/../../../src/repository/ArticleRepository.php';
require __DIR__ . '/../../../src/repository/UsersRepository.php';
$articleRepository = new ArticleRepository();
$article = $articleRepository->findAllUserId($_GET['id']);
$usersRepository = new UsersRepository();
$user = $usersRepository->findAllId($_GET['id']);
?>
<div class="streamer">
  <?php if (count($user)) { ?>
    <div class="card_streamer" data-state="#about">
      <div class="card-header">
        <?php
        $user_avatar = $user["src"];
        if (empty($user_avatar)) { ?>
          <img class="card-avatar" src="src/img/avatar.png" alt="avatar de <?= $user['pseudo'] ?>"></a>
        <?php } else { ?>
          <img class="card-avatar" src="upload/<?= $user_avatar ?>" alt="avatar de <?= $user['pseudo'] ?>"></a>
        <?php } ?>
        <h1 class="card-fullname"><?= $user['pseudo'] ?></h1>
        <h2 class="card-jobtitle">Streamer Star Citizen</h2>


        <div class="reseau">
          <ul class="social">
            <li><a href="#"><i class="fab fa-discord"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa fa-twitch"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
          </ul>
        </div>
      </div>
  
    <div class="card-buttons">

      <a class="radio" href="?ind=streamer_ind">ARTICLES</a>
      <a class="radio" href="?ind=streamer_a_propos_ind">A PROPOS</a>
    </div>

    <?php
  }
    ?>
    <section class="post_dark">
      <div class="container_postcard">
<?php if(count($article) > 0){ ?>
        <?php foreach ($article as $construct) { ?>

          <article class="postcard dark blue">
            <a class="postcard__img_link" href="?ind=article_streamer_ind&type=<?= $construct["id_categorie_article"] ?>&id=<?= $construct["id"]; ?>">

              <?php
              $article_img = $articleRepository->findAllImgArticle($construct["id"]);
              if (count($article_img) >= 1) {
              ?>
                <img class="postcard__img" src="src/img/<?= $article_img[0]['name'] ?>" alt="<?= $article_img[0]['alt'] ?>" />

              <?php } ?>
            </a>
            <div class="postcard__text">

              <h1 class="postcard__title blue"><a href="?ind=article_streamer_ind&type=<?= $construct["id_categorie_article"] ?>&id=<?= $construct["id"]; ?>"><?= $construct['titre']; ?></a></h1>
              <div class="postcard__subtitle small">
                <time datetime="2020-05-25 12:00:00">
                  <i class="fas fa-calendar-alt mr-2"></i> <?= date('d/m/Y H:i:s', strtotime($construct['date'])); ?>
                </time>
              </div>
              <div class="postcard__bar"></div>
              <div class="postcard__preview-txt"><?= $construct['resume']; ?></div>
              <ul class="postcard__tagbox">
                <li class="tag__item">Gameplay</li>

                <li class="tag__item auteur blue">
                  Publié par <?= $user['pseudo'] ?>
                </li>
              </ul>
            </div>
          </article>
        <?php
        }
      }else{
        echo "aucun article publié";
      }
        ?>
      </div>
    </section>

    </div>
</div>