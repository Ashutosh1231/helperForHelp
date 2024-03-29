(function ($) {
    "use strict";

    //Preloder
    jQuery(window).on('load', function () {
        $(".egns-preloader").delay(1600).fadeOut("slow");
    });

    //Active menu
    const currentLocation = location.href;
    const menuItem = document.querySelectorAll('ul li a');
    const menuLength = menuItem.length;
    for (let i = 0; i < menuLength; i++) {
        if (menuItem[i].href === currentLocation) {
            menuItem[i].className = "active";
        }
    }


    //sticky menu
    $(window).on('scroll', function () {

        if ($(this).scrollTop() > 200) {
            $('.sticky_top').addClass('sticky');
        } else {
            $('.sticky_top').removeClass('sticky');
        }
    });


    //Mobile menu
    $('.cross-btn').on('click', function (event) {
        //$(this).toggleClass('h-active');
        $('.main-nav').toggleClass('slidenav');
    });
    $('.remove').on('click', function (event) {
        $('.main-nav').removeClass('slidenav');
    });

    $(".main-nav .bi").on('click', function (event) {
        var $fl = $(this);
        $(this).parent().siblings().find('.sub-menu').slideUp();
        $(this).parent().siblings().find('.bi').addClass('bi-chevron-down');
        if ($fl.hasClass('bi-chevron-down')) {
            $fl.removeClass('bi-chevron-down').addClass('bi-chevron-up');
        } else {
            $fl.removeClass('bi-chevron-up').addClass('bi-chevron-down');
        }
        $fl.next(".sub-menu").slideToggle();
    });

    //Counter up
    $('.counter').counterUp({
        delay: 10,
        time: 1000
    });

    $('.popup-video').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,

        fixedContentPos: false
    });

    $('select').niceSelect();
    
    
    var swiper = new Swiper(".category-slider", {
        spaceBetween: 25,
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next-c",
            prevEl: ".swiper-button-prev-c",
        },
        breakpoints: {
            // when window width is >= 320px
            320: {
                slidesPerView: 1,
                spaceBetween: 25
            },
            // when window width is >= 480px
            480: {
                slidesPerView: 2,
            },
            // when window width is >= 768px
            768: {
                slidesPerView: 3,
            },
            // when window width is >= 992px
            992: {
                slidesPerView: 4,
            },
            // when window width is >= 1200px
            1200: {
                slidesPerView: 6,
            }
        }
    });


    var swiper = new Swiper(".creative-service-slider", {
        slidesPerView: 6,
        spaceBetween: 25,
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next-c",
            prevEl: ".swiper-button-prev-c",
        },
        breakpoints: {
            // when window width is >= 320px
            320: {
                slidesPerView: 1,
                spaceBetween: 0
            },
            // when window width is >= 480px
            480: {
                slidesPerView: 2,
            },
            // when window width is >= 768px
            768: {
                slidesPerView: 3,
            },
            // when window width is >= 992px
            992: {
                slidesPerView: 5,
            },
            // when window width is >= 1200px
            1200: {
                slidesPerView: 6,
            }
        }
    });


    var swiper = new Swiper(".creative-service-slider-two", {
        slidesPerView: 4,
        spaceBetween: 25,
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next-c",
            prevEl: ".swiper-button-prev-c",
        },
        breakpoints: {
            // when window width is >= 320px
            320: {
                slidesPerView: 1,
                spaceBetween: 0
            },
            // when window width is >= 480px
            480: {
                slidesPerView: 2,
            },
            // when window width is >= 768px
            768: {
                slidesPerView: 3,
            },
            // when window width is >= 992px
            992: {
                slidesPerView: 4,
            }
        }
    });


    var swiper = new Swiper(".regular-service-slider", {
        slidesPerView: 3,
        spaceBetween: 25,
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next-c",
            prevEl: ".swiper-button-prev-c",
        },
        breakpoints: {
            // when window width is >= 320px
            320: {
                slidesPerView: 1,
                spaceBetween: 0
            },
            // when window width is >= 480px
            480: {
                slidesPerView: 2,
            },
            // when window width is >= 768px
            768: {
                slidesPerView: 2,
            },
            // when window width is >= 992px
            992: {
                slidesPerView: 3,
            }
        }
    });



    var swiper = new Swiper(".offer-service-slider", {
        slidesPerView: 3,
        spaceBetween: 25,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            // when window width is >= 320px
            320: {
                slidesPerView: 1,
                spaceBetween: 0
            },
            // when window width is >= 480px
            480: {
                slidesPerView: 2,
            },
            // when window width is >= 768px
            768: {
                slidesPerView: 2,
            },
            // when window width is >= 992px
            992: {
                slidesPerView: 3,
            }
        }
    });


    var swiper = new Swiper(".shop-slider", {
        slidesPerView: 4,
        spaceBetween: 25,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            // when window width is >= 320px
            320: {
                slidesPerView: 1,
                spaceBetween: 0
            },
            // when window width is >= 480px
            480: {
                slidesPerView: 2,
            },
            // when window width is >= 768px
            768: {
                slidesPerView: 2,
            },
            // when window width is >= 992px
            992: {
                slidesPerView: 3,
            },
            // when window width is >= 1200px
            1200: {
                slidesPerView: 4,
            }
        }
    });


    var swiper = new Swiper(".testimonial-slider-three", {
        slidesPerView: 1,
        spaceBetween: 25,
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next-c",
            prevEl: ".swiper-button-prev-c",
        },
    });



    var swiper = new Swiper(".testimonial-slider2", {
        slidesPerView: 2,
        spaceBetween: 25,
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next-c",
            prevEl: ".swiper-button-prev-c",
        },
        breakpoints: {
            // when window width is >= 320px
            320: {
                slidesPerView: 1,
                spaceBetween: 0
            },
            // when window width is >= 768px
            768: {
                slidesPerView: 2,
            },
            // when window width is >= 1200px
            1200: {
                slidesPerView: 3,
            }
        }
    });


    var swiper = new Swiper(".testimonial-slider", {
        slidesPerView: 2,
        spaceBetween: 25,
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next-c",
            prevEl: ".swiper-button-prev-c",
        },
        breakpoints: {
            // when window width is >= 320px
            320: {
                slidesPerView: 1,
                spaceBetween: 0
            },
            // when window width is >= 768px
            768: {
                slidesPerView: 2,
            },
            // when window width is >= 992px
            992: {
                slidesPerView: 2,
            }
        }
    });

    jQuery(window).on('load', function () {
        new WOW().init();
        window.wow = new WOW({
            boxClass: 'wow',
            animateClass: 'animated',
            offset: 0,
            mobile: true,
            live: true,
            offset: 100
        })
        window.wow.init();
    });

       // slick slider
       $('#shop-arrival').slick({
        rows: 2,
        dots: true,
        arrows: false,
        infinite: true,
        speed: 2000,
        slidesToShow: 6,
        slidesToScroll: 3,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
          {
            breakpoint: 1200,
            settings: {
              arrows: false,
              slidesToShow: 5
            }
          },
          {
            breakpoint: 991,
            settings: {
              arrows: false,
              slidesToShow: 4
            }
          },
          {
            breakpoint: 768,
            settings: {
              arrows: false,
              slidesToShow: 3
            }
          },
          {
            breakpoint: 576,
            settings: {
              arrows: false,
              slidesToShow: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              arrows: false,
              slidesToShow: 1
            }
          }
        ]
    });

}(jQuery));


//Password Show Hide fuction


const togglePassword = document.querySelector('#togglePassword');


const password = document.querySelector('#password');

if(togglePassword){
 togglePassword.addEventListener('click', function (e) {
   // toggle the type attribute
   const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
   password.setAttribute('type', type);
   // toggle the eye / eye slash icon
   this.classList.toggle('bi-eye');
 });
}



function confirmPass() {
    var y = document.getElementById("confirm-password");
    if (y.type === "password") {
        y.type = "text";
    } else {
        y.type = "password";
    }
}
