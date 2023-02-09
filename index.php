<?php
session_start();
require("back/connexion.php");
include 'header.php';

$sth = $dbco->prepare("SELECT * FROM actus");
$sth->execute();
$actus = $sth->fetchAll(PDO::FETCH_ASSOC);
?>
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


<?php
include 'footer.php';
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.5.0/jquery.flexslider.min.js"></script>

    <script>
        $('.slide-image').each(function() {
            var bg = $(this).data('bg');
            var pos = $(this).data('flex-start');
            $(this).css({
                "background-image": "url(" + bg + ")",
                "transform-origin": pos,
            })
        });
        $('.flex-slider').flexslider({
            slideshow: true,
            slideshowSpeed: 5000,
            animationSpeed: 1000,
            controlNav: false,
            // autoplay
            pauseOnAction: true,
            after: function(slider) {
                if (!slider.playing) {
                    slider.play();
                }
            }
            //autoplay
        });

</script>
</body>

</html>