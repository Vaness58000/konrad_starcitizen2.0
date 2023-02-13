<?php
session_start();
require("back/connexion.php");
include 'header.php';

$sth = $dbco->prepare("SELECT * FROM actus");
$sth->execute();
$actus = $sth->fetchAll(PDO::FETCH_ASSOC);

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
            <div class="slide-image" data-bg="img/image1.jpg" data-flex-start="center center "></div>
        </li>
        <li>
            <div class="slide-image" data-bg="img/image2.jpg" data-flex-start="center center "></div>
        </li>
        <li>
            <div class="slide-image" data-bg="img/image3.jpg" data-flex-start="center center "></div>
        </li>
    </ul>
</div>
<!--  FIN SLIDE IMAGE-->

<!--ACTUALITES-->
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
<div class="bouton">
    <a class="btn_actus" href="actualites.php"><span>+ d'actualités</span></a>
</div>
<!-- FIN ACTUALITES-->


<!--PATCH NOTES-->


<div class="patch">
    <div class="patch-card">
        <div class="patch-card__thumbnail">
            <a href=""><img src="img/gallerie10.jpg" alt="" /></a>
        </div>

        <div class="patch-card__content">
            <a href="">
                <h2 class="patch-card__title">Patch note 3.18</h2>
            </a>

            <div class="patch-card__text">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates debitis dignissimos odio sequi ab. Architecto sed laudantium recusandae dolor
                </p>
            </div>

            <div class="patch-card__meta">
                <span class="patch-card__timestamp"><i class="ion-clock"></i>2 jours</span>
                <span class="patch-card__auteur">Konrad</span>
            </div>
        </div>
    </div>
    <div class="patch-card">
        <div class="patch-card__thumbnail">
            <a href=""><img src="img/gallerie11.jpg" alt="" /></a>
        </div>

        <div class="patch-card__content">
            <a href="">
                <h2 class="patch-card__title">Patch note 3.18</h2>
            </a>

            <div class="patch-card__text">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates debitis dignissimos odio sequi ab. Architecto sed laudantium recusandae dolor
                </p>
            </div>

            <div class="patch-card__meta">
                <span class="patch-card__timestamp"><i class="ion-clock"></i>2 jours</span>
                <span class="patch-card__auteur">Konrad</span>
            </div>
        </div>
    </div>
    <div class="patch-card">
        <div class="patch-card__thumbnail">
            <a href=""><img src="img/gallerie11.jpg" alt="" /></a>
        </div>

        <div class="patch-card__content">
            <a href="">
                <h2 class="patch-card__title">Patch note 3.18</h2>
            </a>

            <div class="patch-card__text">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates debitis dignissimos odio sequi ab. Architecto sed laudantium recusandae dolor
                </p>
            </div>

            <div class="patch-card__meta">
                <span class="patch-card__timestamp"><i class="ion-clock"></i>2 jours</span>
                <span class="patch-card__auteur">Konrad</span>
            </div>
        </div>
    </div>


</div>
<!--FIN PATCH NOTE-->


<div class="wrapper">



    <div class="news-slider">

        <div class="news-slider__wrp swiper-wrapper">

            <div class="news-slider__item swiper-slide">

                <a href="#" class="news__item">
                    <img src="img/avatar.png"/><span>Konrad</span>
                    <div class="news__title">
                        Lorem Ipsum Dolor Sit Amed
                    </div>
                    <div class="corner-borders corner-borders--left"></div>
                    <div class="corner-borders corner-borders--right"></div>
                    <p class="news__txt">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                    </p>
                    <span>12 février 2023</span>
                    <div class="news__img">
                        <img src="img/gallerie.jpg" alt="news">
                    </div>
                </a>
            </div>

            <div class="news-slider__item swiper-slide">
                <a href="#" class="news__item">
                <img src="img/avatar.png"/><span>Konrad</span>
                    <div class="corner-borders corner-borders--left"></div>
                    <div class="corner-borders corner-borders--right"></div>
                    <div class="news__title">
                        Lorem Ipsum Dolor Sit Amed
                    </div>

                    <p class="news__txt">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                    </p>
                    <span>12 février 2023</span>
                    <div class="news__img">
                        <img src="img/gallerie9.jpg" alt="news">
                    </div>
                </a>
            </div>

            <div class="news-slider__item swiper-slide">
                <a href="#" class="news__item">
                <img src="img/avatar.png"/><span>Konrad</span>
                    <div class="corner-borders corner-borders--left"></div>
                    <div class="corner-borders corner-borders--right"></div>
                    <div class="news__title">
                        Lorem Ipsum Dolor Sit Amed
                    </div>

                    <p class="news__txt">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                    </p>
                    <span>12 février 2023</span>
                    <div class="news__img">
                        <img src="img/gallerie10.jpg" alt="news">
                    </div>
                </a>
            </div>

            <div class="news-slider__item swiper-slide">
                <a href="#" class="news__item">
                <img src="img/avatar.png"/><span>Konrad</span>
                    <div class="corner-borders corner-borders--left"></div>
                    <div class="corner-borders corner-borders--right"></div>
                    <div class="news__title">
                        Lorem Ipsum Dolor Sit Amed
                    </div>

                    <p class="news__txt">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                    </p>
                    <span>12 février 2023</span>
                    <div class="news__img">
                        <img src="img/gallerie11.jpg" alt="news">
                    </div>
                </a>
            </div>

            <div class="news-slider__item swiper-slide">
                <a href="#" class="news__item">
                <img src="img/avatar.png"/><span>Konrad</span>
                    <div class="corner-borders corner-borders--left"></div>
                    <div class="corner-borders corner-borders--right"></div>
                    <div class="news__title">
                        Lorem Ipsum Dolor Sit Amed
                    </div>

                    <p class="news__txt">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                    </p>
                    <span>12 février 2023</span>
                    <div class="news__img">
                        <img src="img/gallerie6.jpg" alt="news">
                    </div>
                </a>
            </div>

            <div class="news-slider__item swiper-slide">
                <a href="#" class="news__item">
                <img src="img/avatar.png"/><span>Konrad</span>
                    <div class="corner-borders corner-borders--left"></div>
                    <div class="corner-borders corner-borders--right"></div>
                    <div class="news__title">
                        Lorem Ipsum Dolor Sit Amed
                    </div>

                    <p class="news__txt">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                    </p>
                    <span>12 février 2023</span>
                    <div class="news__img">
                        <img src="img/gallerie8.jpg" alt="news">
                    </div>
                </a>
            </div>
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

<?php
include 'footer.php';
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.5.0/jquery.flexslider.min.js"></script>
<script src="js/slide_accueil.js"></script>
</body>

</html>
</html>