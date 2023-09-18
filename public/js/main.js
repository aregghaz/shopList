(function($) {
    "use strict";

    /*-------------------------------------
     jQuery MeanMenu activation code
     --------------------------------------*/
    $('nav#dropdown').meanmenu({ siteLogo: "<a href='/' class='logo-mobile-menu'><img src='img/logosm.png' /></a>" });

    /*-------------------------------------
     Home page 4 Category Menu
     -------------------------------------*/
    $('#menu-content').on('click', 'li.has-sub-menu > a', function(e) {
        e.preventDefault();
    });

    /*-------------------------------------
     wow js active
     -------------------------------------*/
        /*new WOW().init();*/

    /*-------------------------------------
     jquery Scollup activation code
     -------------------------------------*/
    $.scrollUp({
        scrollText: '<i class="fa fa-angle-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });




    /*-------------------------------------
     Carousel slider initiation
     -------------------------------------*/

    $(document).ready(function(){
        $('.owl-carousel').owlCarousel({
            loop:true,
            dots:true,
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true,
            margin:10,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:false,
                    dots:false
                },
                767:{
                    items:2,
                    nav:false,
                    dots: false
                },
                1000:{
                    items:5,
                    nav:true,
                    loop:false
                }
            }
        })
    });

    /*-------------------------------------
     Countdown activation code
     -------------------------------------*/
    $('#countdown').countdown('2019/07/17', function(e) {
        $(this).html(e.strftime("<div class='countdown-section'><h3>%-d</h3> <p>day%!d</p> </div><div class='countdown-section'><h3>%H</h3> <p>Hour%!H</p> </div><div class='countdown-section'><h3>%M</h3> <p>Min%!M</p> </div><div class='countdown-section'><h3>%S</h3> <p>Sec%!S</p> </div>"));
    });

    /*-------------------------------------
     Jquery Serch Box
     -------------------------------------*/
    $(document).on('click', '#top-search-form a.search-button', function(e) {
        e.preventDefault();

        var targrt = $(this).prev('input.search-input');
        targrt.animate({
            width: ["toggle", "swing"],
            height: ["toggle", "swing"],
            opacity: "toggle"
        }, 500, "linear");

        return false;

    });

    /*-------------------------------------
     Contact Form activation code
     -------------------------------------*/
    if ($('#contact-form').length) {
        $('#contact-form').validator().on('submit', function(e) {
            var $this = $(this),
                $target = $('.form-response');
            if (e.isDefaultPrevented()) {
                $target.html("<div class='alert alert-success'><p>Խնդրում ենք լրացնել բոլոր պառտադիր դաշտերը.</p></div>");
            } else {
                var name = $('#form-name').val();
                var email = $('#form-email').val();
                var message = $('#form-message').val();
                var formLast = $('#form-last-name').val();
                var phone = $('#form-phone').val();
                // ajax call
                $.ajax({
                    url: "/contact",
                    type: "POST",
                    data: "name=" + name + "&email=" + email + "&message=" + message + "&lastName="+formLast + "&phone="+phone+ "&_token="+window.Laravel.csrfToken,
                    beforeSend: function() {
                        $target.html("<div class='alert alert-info'><p>Բեռնվում է ...</p></div>");
                    },
                    success: function(text) {
                        if (text == 'success') {
                            $this[0].reset();
                            $target.html("<div class='alert alert-success'><p>Հաղորդագրություն հաջողությամբ ուղարկված է</p></div>");
                        } else {

                            $target.html("<div class='alert alert-success'><p>Հաղորդագրությունը չի ուղարկվել, լրացրեք բոլոր պարտադիր դաշտերը և փորցեք կրկին</p></div>");
                        }
                    }
                });
                return false;
            }
        });
    }


    /*-------------------------------------
     Input Quantity Up & Down activation code
     -------------------------------------*/
    $('#quantity-holder,#quantity-holder2').on('click', '.quantity-plus', function() {

        var $holder = $(this).parents('.quantity-holder');
        var $target = $holder.find('input.quantity-input');
        var $quantity = parseInt($target.val(), 10);
        if ($.isNumeric($quantity) && $quantity > 0) {
            $quantity = $quantity + 1;
            $target.val($quantity);
        } else {
            $target.val($quantity);
        }

    }).on('click', '.quantity-minus', function() {

        var $holder = $(this).parents('.quantity-holder');
        var $target = $holder.find('input.quantity-input');
        var $quantity = parseInt($target.val(), 10);
        if ($.isNumeric($quantity) && $quantity >= 2) {
            $quantity = $quantity - 1;
            $target.val($quantity);
        } else {
            $target.val(1);
        }

    });

    /*-------------------------------------
     Select2 activation code
     -------------------------------------*/
    if ($('#checkout-form select.select2').length) {
        $('#checkout-form select.select2').select2({
            theme: 'classic',
            dropdownAutoWidth: true,
            width: '100%'
        });
    }

    /*-------------------------------------
     Sidebar Menu activation code
     -------------------------------------*/
    $('#additional-menu-area').on('click', 'span.side-menu-trigger', function() {

        var $this = $(this);
        if ($this.hasClass('open')) {
            document.getElementById('mySidenav').style.width = '0';
            $this.removeClass('open').find('i.fa').removeClass('fa-times').addClass('fa-bars');
        } else {
            $this.addClass('open').find('i.fa').removeClass('fa-bars').addClass('fa-times');
            document.getElementById('mySidenav').style.width = '280px';
        }

    });

    $('#mySidenav').on('click', '.closebtn', function(e) {
        e.preventDefault();
        document.getElementById('mySidenav').style.width = '0';
        $('#additional-menu-area span.side-menu-trigger').removeClass('open').find('i.fa').removeClass('fa-times').addClass('fa-bars');

    });

    /*-------------------------------------
     Category menu selecting
     -------------------------------------*/
    $('#adv-search .sidenav-nav li').on('click', 'a', function() {
        var $this = $(this),
            target = $this.parents('div.dropdown').children('button').children('span');
        target.text($this.text());
    });


    /*-------------------------------------
     Shop category submenu positioning
     -------------------------------------*/
    $('#category-menu-area,#category-menu-area-top').on("mouseenter", "ul > li", function() {
        var self = $(this),
            target = self.find('ul.dropdown-menu'),
            targetUlW = target.outerWidth(),
            parentHolder = self.parents('.category-menu-area'),
            w = $(window).width() - (parentHolder.offset().left + parentHolder.width());
        if (targetUlW > w) {
            target.css({
                'top': 0,
                'left': '-' + targetUlW + 'px'
            });
        }
    }).on("mouseleave", "ul li > a", function() {
        var self = $(this),
            target = self.find('ul.dropdown-menu');
        target.css({
            'top': '',
            'left': ''
        });
    });

    /*-------------------------------------
     Auto height for product listing
     -------------------------------------*/
    function equalHeight() {
        $('.products-container').each(function() {
            var mHeight = 0;
            $(this).children('div').children('div').height('auto');
            $(this).children('div').each(function() {
                var itemHeight = $(this).actual('height');
                if (itemHeight > mHeight) {
                    mHeight = itemHeight;
                }
                $(this).children('div').height(mHeight + 'px');
            });
        });
    }

    /*-------------------------------------
     Window load function
     -------------------------------------*/
    $(window).on('load', function() {
        // Page Preloader
        $('#preloader').fadeOut('fast', function() {
            $(this).remove();
        });

        //jQuery for Isotope initialization
        var $container = $('#home-isotope');
        if ($container.length > 0) {
            var $isotope = $container.find('.featuredContainer').isotope({
                filter: '*',
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });

            $container.find('.isotop-classes-tab').on('click', 'a', function() {
                var $this = $(this);
                $this.parent('.isotop-classes-tab').find('a').removeClass('current');
                $this.addClass('current');
                var selector = $this.attr('data-filter');
                $isotope.isotope({
                    filter: selector,
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false
                    }
                });
                return false;
            });
        }
    }); // end window load function

    /*-------------------------------------
     Call the load and resized function
     -------------------------------------*/
    $(window).on('load resize', function() {
        equalHeight(); // Call Equal height function
        //Define the maximum height for mobile menu
        var wHeight = $(window).height(),
            mLogoH = $('a.logo-mobile-menu').outerHeight();
        wHeight = wHeight - 50;
        $('.mean-nav > ul').css('height', wHeight + 'px');
    });

    /*-------------------------------------
     window scroll function
     -------------------------------------*/
    $(window).on('scroll', function() {
        //jquery Stiky Menu activation code
        var s = $('#sticker'),
            w = $('.wrapper-area'),
            target = s.find('.header-bottom'),
            windowpos = $(window).scrollTop(),
            windowWidth = $(window).width();

        if (windowWidth > 767) {
            var topBar = s.find('.header-top'),
                topBarH = 0;
            if (topBar.length) {
                topBarH = topBar.outerHeight();
            }

            if (windowpos >= topBarH) {
                s.addClass('stick');
                var h = target.outerHeight();
                w.css('padding-top', h + 'px');
            } else {
                s.removeClass('stick');
                w.css('padding-top', 0);
            }
        }
    }); // end of scrool function

    /*-------------------------------------
     Google Map activation code
     -------------------------------------*/
    if ($('#googleMap').length) {
        var initialize = function() {
            var mapOptions = {
                zoom: 15,
                scrollwheel: false,
                center: new google.maps.LatLng(40.202233, 44.461988)
            };
            var map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);
            var marker = new google.maps.Marker({
                position: map.getCenter(),
                animation: google.maps.Animation.BOUNCE,
                icon: 'img/map-marker.png',
                map: map
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    }

    /*-------------------------------------
    Price Range Filter activation code
    -------------------------------------*/
    var priceSlider = document.getElementById('price-range-filter');
    if (priceSlider) {
        noUiSlider.create(priceSlider, {
            start: [20, 80],
            connect: true,
            /*tooltips: true,*/
            range: {
                'min': 0,
                'max': 100
            },
            format: wNumb({
                decimals: 0
            }),
        });
        var marginMin = document.getElementById('price-range-min'),
            marginMax = document.getElementById('price-range-max');
        priceSlider.noUiSlider.on('update', function(values, handle) {
            if (handle) {
                marginMax.innerHTML = "$" + values[handle];
            } else {
                marginMin.innerHTML = "$" + values[handle];
            }
        });
    }

})(jQuery);
