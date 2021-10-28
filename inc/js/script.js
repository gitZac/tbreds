jQuery(document).ready(function ($) {

    function get_height() {

        if (jQuery(window).width() < 601) {

            return jQuery(window).height();
        } else {
            return jQuery(window).height();
        }


    }

    thoroughbreds_slider();

    function thoroughbreds_slider() {

        var height = get_height();

        jQuery('#thoroughbreds-slider').camera({
            height: height + 'px',
            loader: 'bar',
            overlay: false,
            fx: 'simpleFade',
            pagination: false,
            thumbnails: false,
            transPeriod: 1000,
            overlayer: false,
            playPause: false,
            hover: false,
        });
    }
});

jQuery(document).ready(function ($) {

    $('#thoroughbreds-featured .featured-box').click(function () {

        if( $(this).attr('data-target') && $(this).attr('data-target') != '#' ) {
            window.location.href = $(this).attr('data-target');
        }

    });


    $('.featured-box').hover(function () {

        $('.thoroughbreds-icon', this).stop(true, false).animate({
            top: '-7px'

        }, 300);
        $('.thoroughbreds-desc', this).stop(true, false).animate({
            top: '7px'

        }, 300);

        $('.thoroughbreds-title', this).stop(true, false).animate({
            'letter-spacing': '1.5px'

        }, 300);

    }, function () {
        $('.thoroughbreds-icon', this).stop(true, false).animate({
            top: '0px'

        }, 300);
        $('.thoroughbreds-desc', this).stop(true, false).animate({
            top: '0px'

        }, 300);
        $('.thoroughbreds-title', this).stop(true, false).animate({
            'letter-spacing': '1px'

        }, 300);
    });




    $('#primary-menu').slicknav({
        prependTo: $('.thoroughbreds-header-menu'),
        label: '',
        allowParentLinks: true
    });

    $('.thoroughbreds-search, #thoroughbreds-search .fa.fa-close').click(function () {

        $('#thoroughbreds-search').fadeToggle(449)

    });

    // Homepage Overlay
    $('#thoroughbreds-overlay-trigger .fa').click(function () {

        var selector = $('#thoroughbreds-overlay-trigger');

        if (selector.hasClass('open')) {

            $('.overlay-widget').hide();
            selector.removeClass('open animated slideInUp');

        } else {

            selector.addClass('open animated slideInUp');
            $('.overlay-widget').fadeIn(330);
        }

    });

    // scroll to top trigger
    $('.scroll-top').click(function () {
        $("html, body").animate({scrollTop: 0}, 1000);
        return false;
    });

    // scroll to top trigger
    $('.scroll-down').click(function () {

        $("html, body").animate({
            scrollTop: ($(window).height() - 85)
        }, 1000);

        return false;

    });



    // Parallax
    $(window).scroll(function () {

        var s = $(window).scrollTop();

        $('.parallax').css({top: (s / 3.)});

        if (s > $(window).height()) {

            $('#thoroughbreds-header.frontpage').addClass('sticky animated slideInDown');

        } else {
            $('#thoroughbreds-header.frontpage').removeClass('sticky animated slideInDown');
        }

    })

    // ------------
    var thoroughbredsWow = new WOW({
        boxClass: 'reveal',
        animateClass: 'animated',
        offset: 150

    });

    thoroughbredsWow.init();
    
    
});