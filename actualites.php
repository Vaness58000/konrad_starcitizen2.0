<?php
session_start();
include "header.php";
?>
<div class="page_actu">

  <!--  <div class="wrapper_actu">

        <h1>Les dernières actualités</h1>

        <div class="news-slider">
            <div class="news-slider__wrp swiper-wrapper">
                <div class="news-slider__item swiper-slide">
                    <a href="#" class="news__item">
                        <div class="news-date">
                            <span class="news-date__title">24</span>
                            <span class="news-date__txt">Décembre</span>
                        </div>
                        <div class="news__title">
                            Lorem Ipsum Dolor Sit Amed
                        </div>

                        <p class="news__txt">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...
                        </p>

                        <div class="news__img">
                            <img src="img/262f7041f0f5f688_1920xH.jpg" alt="news">
                        </div>
                    </a>
                </div>

                <div class="news-slider__item swiper-slide">
                    <a href="#" class="news__item">
                        <div class="news-date">
                            <span class="news-date__title">25</span>
                            <span class="news-date__txt">Décembre</span>
                        </div>
                        <div class="news__title">
                            Lorem Ipsum Dolor Sit Amed
                        </div>

                        <p class="news__txt">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...
                        </p>

                        <div class="news__img">
                            <img src="img/fond3.jpg" alt="news">
                        </div>
                    </a>
                </div>

                <div class="news-slider__item swiper-slide">
                    <a href="#" class="news__item">
                        <div class="news-date">
                            <span class="news-date__title">26</span>
                            <span class="news-date__txt">Décembre</span>
                        </div>
                        <div class="news__title">
                            Lorem Ipsum Dolor Sit Amed
                        </div>

                        <p class="news__txt">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...
                        </p>

                        <div class="news__img">
                            <img src="img/image1.jpg" alt="news">
                        </div>
                    </a>
                </div>

                <div class="news-slider__item swiper-slide">
                    <a href="#" class="news__item">
                        <div class="news-date">
                            <span class="news-date__title">27</span>
                            <span class="news-date__txt">Décembre</span>
                        </div>
                        <div class="news__title">
                            Lorem Ipsum Dolor Sit Amed
                        </div>

                        <p class="news__txt">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...
                        </p>

                        <div class="news__img">
                            <img src="img/image2.jpg" alt="news">
                        </div>
                    </a>
                </div>

                <div class="news-slider__item swiper-slide">
                    <a href="#" class="news__item">
                        <div class="news-date">
                            <span class="news-date__title">28</span>
                            <span class="news-date__txt">Décembre</span>
                        </div>
                        <div class="news__title">
                            Lorem Ipsum Dolor Sit Amed
                        </div>

                        <p class="news__txt">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...
                        </p>

                        <div class="news__img">
                            <img src="img/image3.jpg" alt="news">
                        </div>
                    </a>
                </div>

                <div class="news-slider__item swiper-slide">
                    <a href="#" class="news__item">
                        <div class="news-date">
                            <span class="news-date__title">29</span>
                            <span class="news-date__txt">Décembre</span>
                        </div>
                        <div class="news__title">
                            Lorem Ipsum Dolor Sit Amed
                        </div>

                        <p class="news__txt">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...
                        </p>

                        <div class="news__img">
                            <img src="img/Source.jpg" alt="news">
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
    </div>
-->
    <div class="container_actu">

        <div class="actu_ind">
            <a href="#" class="news_actus">
                <div class="date">
                    <span class="date_title">24</span>
                    <span class="date_txt">Décembre</span>
                </div>
                <div class="title">
                    Lorem Ipsum Dolor Sit Amed
                </div>

                <p class="txt">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...
                </p>

                <div class="img_actu">
                    <img src="img/262f7041f0f5f688_1920xH.jpg" alt="actualités">
                </div>
            </a>
        </div>

        <div class="actu_ind">
            <a href="#" class="news_actus">
                <div class="date">
                    <span class="date_title">24</span>
                    <span class="date_txt">Décembre</span>
                </div>
                <div class="title">
                    Lorem Ipsum Dolor Sit Amed
                </div>

                <p class="txt">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...
                </p>

                <div class="img_actu">
                    <img src="img/262f7041f0f5f688_1920xH.jpg" alt="actualités">
                </div>
            </a>
        </div>
        <div class="actu_ind">
            <a href="#" class="news_actus">
                <div class="date">
                    <span class="date_title">24</span>
                    <span class="date_txt">Décembre</span>
                </div>
                <div class="title">
                    Lorem Ipsum Dolor Sit Amed
                </div>

                <p class="txt">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...
                </p>

                <div class="img_actu">
                    <img src="img/262f7041f0f5f688_1920xH.jpg" alt="actualités">
                </div>
            </a>
        </div>

    </div>



<?php
include "footer.php";
?>
<script src="js/actualites.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.5.0/jquery.flexslider.min.js"></script>
<script type="text/javascript">
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