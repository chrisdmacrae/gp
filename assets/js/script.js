jQuery("body").append("<div class='loading'></div>");

jQuery(window).on('load', function () {
    "use strict";
    jQuery(".loading, .page-loader").fadeOut();
});

jQuery(window).on('load', function () {
    "use strict";
    jQuery(".se-pre-con").fadeOut("slow");

});
//--- document ready 

jQuery(document).ready(function ($) {

    "use strict";
    $(document).on('webinane_donation_modal_opened', function (app) {
        $('.donation-wrapper-content.webinane-donation-modal').addClass('active');
        $('.donation-wrapper-content.webinane-donation-modal').perfectScrollbar();
    });

    $(document).on('webinane_donation_modal_closed', function (app) {
        $('.donation-wrapper-content.webinane-donation-modal').removeClass('active');
    })
    // 	$('.donation-modal-box-callerrrr').on('click', function(){
    // 	    $('.donation-wrapper-content.webinane-donation-modal').addClass('active');
    // 	});
    // 	$('.donation-popup .close').on('click', function(){
    // 	    $('.donation-wrapper-content.webinane-donation-modal').removeClass('active');
    // 	    $('html').removeClass('modalOpen');
    // 	});


    //===== Wow Animation Setting =====//
    var wow = new WOW({
        boxClass: 'wow', // default
        animateClass: 'animated', // default
        offset: 0, // default
        mobile: true, // default
        live: true // default
    });

    wow.init();

    // search for header style 2

    $('.search-btn').on("click", function () {
        $('.search-from').addClass('active animated slideInDown faster');
        return false;
    });
    $('.search-close-btn').on("click", function () {
        $('.search-from').removeClass('active slideInDown faster');
        return false;
    });

    // Responsive Search

    $('.res-searc-btn').on("click", function () {
        $('.res-search-popup').addClass('active animated slideInDown faster');
        return false;
    });

    $('.res-search-close-btn').on("click", function () {
        $('.res-search-popup').removeClass('active slideInDown faster');
        return false;
    });



    // Responsive nav dropdowns
    $('.res-menu-btn').on('click', function () {
        $('.res-menu-wrapper').addClass('slidein');
        return false;
    });
    $('.res-clos-btn').on('click', function () {
        $('.res-menu-wrapper').removeClass('slidein');
        return false;
    });
    $('.res-menu-list ul li.menu-item-has-children > a, .menus-wraper > ul li.menu-item-has-children > a').on('click', function () {
        $(this).parent().siblings().children('ul').slideUp();
        $(this).parent().siblings().removeClass('active');
        $(this).parent().children('ul').slideToggle();
        $(this).parent().toggleClass('active');
        return false;
    });


    // Responsive Login Popup
    $('.res-login-btn').on('click', function () {
        $('.res-login-popup').addClass('slidein');
        return false;
    });
    $('.popup-clos-btn').on('click', function () {
        $('.res-login-popup').removeClass('slidein');
        return false;
    });


    // Humburger menu

    $('.humbrgr-menu-btn').on('click', function () {
        $('.menus-wraper').addClass('menu-slide');

    });

    $('.close-menu-btn').on('click', function () {
        $('.menus-wraper').removeClass('menu-slide');

    });

    // search form
    $('.serch-btn').on('click', function () {
        $('form.search').addClass('active');

    });

    $('.clos-sform').on('click', function () {
        $('form.search').removeClass('active');

    });


    // sticky header 1

    $(window).scroll(function () {
        if ($(this).scrollTop() > 1) {
            $('.header-style2-pos').addClass("sticky animated slideInDown");
        } else {
            $('.header-style2-pos').removeClass("sticky animated slideInDown");
        }
    });


    // sticky header 2

    $(window).scroll(function () {
        if ($(this).scrollTop() > 1) {
            $('.header_2.sticky_header, .menu-area.sticky_header').addClass("sticky animated slideInDown");
        } else {
            $('.header_2.sticky_header, .menu-area.sticky_header').removeClass("sticky animated slideInDown");
        }
    });


    // sticky header 3

    $(window).scroll(function () {
        if ($(this).scrollTop() > 1) {
            $('.header_3').addClass("sticky animated slideInDown");
        } else {
            $('.header_3').removeClass("sticky animated slideInDown");
        }
    });

    jQuery(".filter").on("click", function(){
        jQuery(".adv-search, .theme-layout").addClass("filter-on");
        return false;
    });
    
    jQuery("html,body").on("click", function(){
        jQuery(".adv-search, .theme-layout").removeClass("filter-on");  
    });
    // header style 1

    /*if ($('.header_1').length > 0) { 
        $('.page-top').css({"margin-top": "-15.4%", "z-index": "2"});
    }*/

    /*if ($('.page-top').length > 0) { 
        $('.header-bg-image').css({"height": "400px"});
    }*/

    /*
    	if ($(window).width() > 1380) {
    	    if ($('.page-top').length > 0) { 
    		    $('.header-bg-image').css({"height": "400px"});
    		}
    	}
    	else {
    		if ($('.page-top').length > 0) { 
    	    	$('.header-bg-image').css({"height": "320px"});
    	    }
    	}*/


    //parallax
    if ($.isFunction($.fn.scrolly)) {
        $('.parallax').scrolly({
            bgParallax: true
        });
    }


    //counter for funfacts
    if ($.isFunction($.fn.counterUp)) {
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });
    }


    //chosen select plugin
    if ($.isFunction($.fn.chosen)) {
        $("select").chosen();
    }

    //select plugin
    if ($.isFunction($.fn.select2)) {
        $('.theme-select').select2();
    }

    //===== owl carousel  =====//
    if ($.isFunction($.fn.owlCarousel)) {
        $('.gallery-caro').owlCarousel({
            items: 1,
            loop: true,
            margin: 0,
            autoplay: true,
            autoplayTimeout: 1500,
            smartSpeed: 1000,
            autoplayHoverPause: true,
            nav: true,
            dots: false,
            animateIn: 'fadeIn',
            animateOut: 'fadeOut',
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 1,

                },
                1000: {
                    items: 1,
                }
            }

        });

        $('.news-carousel').owlCarousel({
            items: 1,
            loop: true,
            margin: 0,
            autoplay: true,
            autoplayTimeout: 1500,
            smartSpeed: 1000,
            autoplayHoverPause: true,
            nav: true,
            dots: false,
            animateIn: 'fadeIn',
            animateOut: 'fadeOut',
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 1,

                },
                1000: {
                    items: 1,
                }
            }

        });


        $('.camps-caro').owlCarousel({
            items: 1,
            loop: false,
            margin: 0,
            autoplay: false,
            autoplayTimeout: 1500,
            smartSpeed: 1500,
            autoplayHoverPause: true,
            nav: true,
            dots: false,
            onInitialized: counter, //When the plugin has initialized.
            onTranslated: counter, //When the translation of the stage has 
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 1,

                },
                1000: {
                    items: 1,
                }
            }

        });

        function counter(event) {
            // var element = event.target; // DOM element, in this example .owl-carousel
            // var items = event.item.count; // Number of items
            // var item = event.item.index + 1; // Position of the current item

            // it loop is true then reset counter from 1
            // if (item > items) {
            //     item = item - items
            // }
            // $('#camps-info').html("<span>" + item + "</span>" + " / " + items)
        }

        /*$('.camps-caro').on('changed.owl.carousel', function(e) {
          if (!e.namespace || e.property.name != 'position') return
          $('#camps-info').html("<span>"+e.item.index+"</span>" + '/' + e.item.count)
        });*/


        //featured caro

        const $owl1 = $(".owl-1");
        const $owl2 = $(".owl-2");
        let flag = false;
        let duration = 300;

        $owl1
            .owlCarousel({
                items: 1,
                lazyLoad: false,
                loop: false,
                margin: 10,
                nav: false,
                autoplay: true,
                dots: false,
                autoplayTimeout: 2500,
                smartSpeed: 2000,
                responsiveClass: true
            })
            .on("changed.owl.carousel", function (e) {
                if (!flag) {
                    flag = true;
                    console.log(e.item.index);
                    $owl2
                        .find(".owl-item")
                        .removeClass("current")
                        .eq(e.item.index)
                        .addClass("current");
                    if (
                        $owl2
                        .find(".owl-item")
                        .eq(e.item.index)
                        .hasClass("active")
                    ) {

                    } else {
                        $owl2.trigger("to.owl.carousel", [e.item.index, duration, true]);
                    }
                    flag = false;
                }
            });

        $owl2
            .on("initialized.owl.carousel", function () {
                $owl2
                    .find(".owl-item")
                    .eq(0)
                    .addClass("current");
            })
            .owlCarousel({
                items: 3,
                lazyLoad: false,
                loop: false,
                dots: false,
                margin: 10,
                nav: false,
                responsiveClass: true,
                responsive: {
                    320: {
                        items: 2,
                        nav: false,
                        dots: false,
                    },
                    360: {
                        items: 2,
                        nav: false,
                        dots: false,
                    },
                    375: {
                        items: 2,
                        nav: false,
                        dots: false,
                    },
                    414: {
                        items: 2,
                        nav: false,
                        dots: false,
                    },
                    480: {
                        items: 2,
                        nav: false,
                        dots: false,
                    },
                    640: {
                        items: 3,
                        dots: false,
                        nav: false,
                    },
                    1000: {
                        items: 3,
                        dots: false,
                        nav: false,
                    }
                }
            })
            .on("click", ".owl-item", function (e) {
                e.preventDefault();
                var number = $(this).index();
                $owl1.trigger("to.owl.carousel", [number, duration, true]);
            });

        //services caro

        $('.our-clients').owlCarousel({
            loop: true,
            margin: 20,
            autoplay: false,
            autoplayTimeout: 1500,
            smartSpeed: 1000,
            autoplayHoverPause: true,
            nav: false,
            dots: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                360: {
                    items: 2,

                },
                640: {
                    items: 2,

                },
                768: {
                    items: 3,

                },
                1000: {
                    items: 5,
                }
            }

        });

        /* media sponsor carousel */
        $('.media-sponsors').owlCarousel({
            loop: true,
            margin: 30,
            autoplay: false,
            autoplayTimeout: 1500,
            smartSpeed: 1000,
            autoplayHoverPause: true,
            nav: false,
            dots: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 2,
                    nav: false
                },
                600: {
                    items: 4,

                },
                1000: {
                    items: 4,
                }
            }

        });
    }


    //===== Slick Carousel =====//
    if ($.isFunction($.fn.slick)) {
        //=== Speech Nav Carousel ===//
        $('.speeches-nav-car').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
            centerPadding: '0',
            focusOnSelect: true,
            vertical: false,
            infinite: false,
            prevArrow: "<button type='button' class='slick-prev brd-rd30'><i class='fa fa-long-arrow-left'></i></button>",
            nextArrow: "<button type='button' class='slick-next brd-rd30'><i class='fa fa-long-arrow-right'></i></button>",
            responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: true
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: true
                    }
                }
            ]
        });

        //event carousel  
        /*$('.slider-for-event').slick({
        	slidesToShow: 1,
        	slidesToScroll: 1,
        	arrows: false,
        	slide: 'li',
        	fade: false,
        	asNavFor: '.slider-nav-event'
        });*/

        /*$('.slider-nav-event').slick({
        	slidesToShow: 3,
        	slidesToScroll: 1,
        	asNavFor: '.slider-for-event',
        	dots: false,
        	arrows: true,
        	slide: 'li',
        	vertical: false,
        	centerMode: true,
        	centerPadding: '0',
        	focusOnSelect: true,
        	responsive: [
        	{
        		breakpoint: 769,
        		settings: {
        			slidesToShow: 1,
        			slidesToScroll: 1,
        			infinite: true,
        			vertical: false,
        			centerMode: true,
        			dots: false,
        			arrows: true
        		}
        	},
        	{
        		breakpoint: 641,
        		settings: {
        			slidesToShow: 1,
        			slidesToScroll: 1,
        			infinite: true,
        			vertical: true,
        			centerMode: true,
        			dots: false,
        			arrows: true
        		}
        	}
        	]
        });  */

    }

    // gallery images carousel 

    //---sticky social side bar

    $('.sharing-sidebar').css('opacity', 0);
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.sharing-sidebar').css('opacity', 1);
            $('.sharing-sidebar').addClass('animated slideInLeft');
        } else {
            $('.sharing-sidebar').removeClass('animated slideInLeft');
            $('.sharing-sidebar').css('opacity', 0);
        }
    });

    //--- bootstrap tooltip	
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

    //scrollbar plugin
    if ($.isFunction($.fn.perfectScrollbar)) {
        $('.responsive-menu').perfectScrollbar();
    }

    // donation butttons
    $('.donation-amounts > a').on("click", function () {
        $('.donation-amounts > a').removeClass('active');
        $(this).addClass('active');
        return false;

    });


    // Sticky Sidebar & header
    if ($(window).width() < 769) {
        jQuery(".sidebar").children().removeClass("stick-widget");
    }

    if ($.isFunction($.fn.stick_in_parent)) {
        $('.stick-widget').stick_in_parent({
            parent: '#page-contents',
            offset_top: 60,
        });

    }


    //----- popup display on window load
    function delay() {
        jQuery(".popup-wraper").fadeIn();
    }

    window.setTimeout(delay, 2000);
    jQuery('.wraper-close').on('click', function () {
        jQuery('.popup-wraper').addClass('closed');
        return false;
    });
    jQuery('.quickpopup').on("click", function () {
        var this_ = jQuery(this);
        var productid = this_.data('id');
        var data = 'action=actavista_ajax&subaction=product_quick_view&id=' + productid;
        jQuery.ajax({
            type: 'POST',
            url: actavista_data.ajaxurl,
            data: data,
            beforeSend: function () {
                this_.children('i').removeClass('fa fa-search');
                this_.children('i').addClass('fa fa-spinner fa-spin');
            },
            success: function (response) {
                jQuery('#quickview').html(response);
                jQuery('#quickview').addClass('popup_show');
                this_.children('i').removeClass('fa fa-spinner fa-spin');
                this_.children('i').addClass('fa fa-search');
            }
        });
        return false;
    });
    jQuery('.close-quickview').on("click", function () {
        jQuery('#quickview').removeClass('popup_show');
        return false;
    });

    //overlay product load more
    $("#overlay .load-mor a").on("click", function () {
        var cal_event = "button";
        var tthis = this;
        return posts_sets(cal_event, tthis);
    });
    $("#overlay #nav-tab li a").on("click", function () {
        var load_cat = jQuery("#overlay #nav-tab a.active").attr("href");
        var present_post = jQuery(load_cat + " .fullwidth").children().size();
        if (present_post == 0) {
            var cal_event = "tab";
            return posts_sets(cal_event);
        }
    });


}); //document ready end

function posts_sets(cal_event, tthis = "") {
    var load_data = jQuery("#overlay .load-mor > a").attr("data-args");
    var load_data_q = jQuery("#overlay .load-mor > a").attr("data-q");
    var load_cat = jQuery("#overlay #nav-tab a.active").attr("href");
    /*if (cal_event == "button") {
        var load_data_offset = jQuery(tthis).attr("data-offset");
    } else {*/
    var load_data_offset = jQuery(load_cat + " .load-mor a").attr("data-offset");
    /*}*/
    var btn_n = jQuery("#overlay .load-mor a").attr("title");
    var present_post = jQuery(load_cat + " .fullwidth").children().size();
    var load_max = jQuery(load_cat + " .load-mor a").attr("data-max");
    jQuery.ajax({
        type: "POST",
        url: actavista_data.ajaxurl,
        data: {
            action: "actavista_ajax",
            subaction: "loadmore_overlay_product",
            data_args: load_data,
            data_q: load_data_q,
            data_c: load_cat,
            btn_n: btn_n,
            offset: load_data_offset,
            cal_event: cal_event,
            max: load_max,
            post_present: present_post,
        },
        beforeSend: function () {
            jQuery("body").find(".tab-pane").children(".loader").html("<span>LOADING</span><ul class='clouds'><li class='cloud'></li><li class='cloud'></li><li class='cloud'></li><li class='cloud'></li><li class='cloud'></li><li class='cloud'></li><li class='cloud'></li></ul></div>");
        },
        success: function (res) {
            jQuery("body").find(".tab-pane").children(".loader").html('');
            if (res.data != "") {
                jQuery("#" + res.tab_id + " .fullwidth").append(res.data);
                jQuery("#" + res.tab_id + " .load-mor").html(res.button);
            } else {
                jQuery("#" + res.tab_id + " .load-mor").html(res.button);
            }
            setTimeout(function () {
                jQuery("#" + res.tab_id + " .fullwidth").isotope("destroy");
                jQuery("#" + res.tab_id + " .fullwidth").isotope({
                    masonry: {}
                });
            }, 1000);
        }
    });
} 