<?php
session_start();
require("back/connexion.php");
include 'header.php';

$sth = $dbco->prepare("SELECT * FROM actus");
$sth->execute();
$actus = $sth->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="page_actu">

    <div class="container_actu">
        <?php foreach ($actus as $actu) { ?>
            <div class="actu_ind_accueil">
                <a href="actu.php?id=<?= $actu['id']; ?>" class="news_actus">


                    <div class="img_actu_accueil">
                        <img src="img/<?= $actu['image1']; ?>" alt="news">
                        <div class="contenu_accueil">

                            <div class="title_accueil">
                                <?= $actu['titre']; ?>
                            </div>

                        
                            <div class="date_accueil">
                                <span><span class="news-date__title"><?= $actu['date']; ?></span>
                            </div>
                        </div>

                    </div>
                </a>
            </div>
        <?php
        }
        ?>
       

    </div>
    <!--<div id="hero-header">
    <div id="hero-content">

        <h1 id="hero-title"> Communauté Star citizen </h1>
        <p id="hero-text">Retrouvez toute l’actualité du jeu Star Citizen sur notre site : Infos, traductions et forum pour partager ensemble le nouveau jeu en développement de Chris Roberts !</p>


        <a href="forum/index.php" target="_blank"><button id="hero-button"> Visiter le forum</button></a>
    </div>

</div>-->
    <div class="flex-slider">
        <div class="sp-container">
            <div class="sp-content">
                <div class="sp-globe"></div>
                <h2 class="frame-1">STAR CITIZEN</h2>
                <h2 class="frame-2">SE BATTRE</h2>
                <h2 class="frame-3">EXPLORER</h2>
                <h2 class="frame-4">REJOIGNEZ-NOUS !</h2>
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

        /*CAROUSSEL ACTU*/

        var items = document.querySelectorAll('.news__item');
        var item = document.querySelector('.news__item');

        function cLog(content) {
            console.log(content)
        }

        if ($(window).width() > 800) {
            $(document).on("mouseover", ".news__item", function(_event, _element) {

                var newsItem = document.querySelectorAll('.news__item');
                newsItem.forEach(function(element, index) {
                    element.addEventListener('mouseover', function() {
                        var x = this.getBoundingClientRect().left;
                        var y = this.getBoundingClientRect().top;
                        var width = this.getBoundingClientRect().width;
                        var height = this.getBoundingClientRect().height;


                        $('.news__item').removeClass('active');
                        // $('.news__item').removeClass('active');

                    });

                    element.addEventListener('mouseleave', function() {

                        $('.news__item').removeClass('active');
                    });

                });

            });
        }


        var swiper = new Swiper('.news-slider', {
            effect: 'coverflow',
            grabCursor: true,
            loop: true,
            centeredSlides: true,
            keyboard: true,
            spaceBetween: 0,
            slidesPerView: 'auto',
            speed: 300,
            coverflowEffect: {
                rotate: 0,
                stretch: 0,
                depth: 0,
                modifier: 3,
                slideShadows: false
            },
            breakpoints: {
                480: {
                    spaceBetween: 0,
                    centeredSlides: true
                }
            },
            simulateTouch: true,
            navigation: {
                nextEl: '.news-slider-next',
                prevEl: '.news-slider-prev'
            },
            pagination: {
                el: '.news-slider__pagination',
                clickable: true
            },
            on: {
                init: function() {
                    var activeItem = document.querySelector('.swiper-slide-active');

                    var sliderItem = activeItem.querySelector('.news__item');

                    $('.swiper-slide-active .news__item').addClass('active');

                    var x = sliderItem.getBoundingClientRect().left;
                    var y = sliderItem.getBoundingClientRect().top;
                    var width = sliderItem.getBoundingClientRect().width;
                    var height = sliderItem.getBoundingClientRect().height;


                }
            }
        });

        swiper.on('touchEnd', function() {
            $('.news__item').removeClass('active');
            $('.swiper-slide-active .news__item').addClass('active');
        });

        swiper.on('slideChange', function() {
            $('.news__item').removeClass('active');
        });

        swiper.on('slideChangeTransitionEnd', function() {
            $('.news__item').removeClass('active');
            var activeItem = document.querySelector('.swiper-slide-active');

            var sliderItem = activeItem.querySelector('.news__item');

            $('.swiper-slide-active .news__item').addClass('active');

            var x = sliderItem.getBoundingClientRect().left;
            var y = sliderItem.getBoundingClientRect().top;
            var width = sliderItem.getBoundingClientRect().width;
            var height = sliderItem.getBoundingClientRect().height;




        });
    </script>
    </body>

    </html>