<?php
require __DIR__ . '/../../../back/connexion.php';

$sth = $dbco->prepare("SELECT * FROM actus");
$sth->execute();
$actus = $sth->fetchAll(PDO::FETCH_ASSOC);
require("back/connexion.php");

$sth = $dbco->prepare("SELECT * FROM actus");
$sth->execute();
$actus = $sth->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="streamer">

  <div class="card_streamer" data-state="#about">
    <div class="card-header">
      <img class="card-avatar" src="img/avatar.png" alt="avatar" />
      <h1 class="card-fullname">Konrad</h1>
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


    <section class="post_dark">
      <div class="container_postcard">

        <?php foreach ($actus as $actu) { ?>
          <article class="postcard dark blue">
            <a class="postcard__img_link" href="?ind=article_streamer_ind">
              <img class="postcard__img" src="img/<?= $actu['image1']; ?>" alt="Image Title" />
            </a>
            <div class="postcard__text">
              <h1 class="postcard__title blue"><a href="?ind=article_streamer_ind"><?= $actu['titre']; ?></a></h1>
              <div class="postcard__subtitle small">
                <time datetime="2020-05-25 12:00:00">
                  <i class="fas fa-calendar-alt mr-2"></i> Mercredi 8 février 2023
                </time>
              </div>
              <div class="postcard__bar"></div>
              <div class="postcard__preview-txt"><?= $actu['resume']; ?></div>
              <ul class="postcard__tagbox">
                <li class="tag__item">il y a 2 jours</li>

                <li class="tag__item auteur blue">
                  <a href="?ind=streamer_ind">Publié par Konrad</a>
                </li>
              </ul>
            </div>
          </article>
        <?php
        }
        ?>

      </div>

    </section>

  </div>
</div>