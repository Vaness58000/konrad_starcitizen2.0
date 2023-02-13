<?php
session_start();
include "header.php";
require "back/connexion.php";
$sth = $dbco->prepare("SELECT * FROM actus");
$sth->execute();
$actus = $sth->fetchAll(PDO::FETCH_ASSOC);
?>

    <section class="post_dark">
        <div class="container_postcard">

            <?php foreach ($actus as $actu) { ?>
                <article class="postcard dark blue">
                    <a class="postcard__img_link" href="#">
                        <img class="postcard__img" src="img/<?= $actu['image1']; ?>" alt="Image Title" />
                    </a>
                    <div class="postcard__text">
                        <h1 class="postcard__title blue"><a href="#"><?= $actu['titre']; ?></a></h1>
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
                                <a href="#">Publié par Konrad</a>
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
<?php
include "footer.php";
?>