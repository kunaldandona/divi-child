jQuery(document).ready(function ($) {

    $('#flexxi-logo').click((e) => {
        e.preventDefault();
        $('#main-flexxi-submenu').toggleClass("display-none", 1000);
    });

    let colors = ['#d90368', '#ec368d', '#ee4266', '#820263'];

    colorChange = () => {
        colors.push(colors.shift());
        for (let i = 0; i < colors.length; i++) {
            $(".archive .container-flex div:nth-child(" + (i + 1) + ")").css(
                "background-color",
                colors[i]
            );
        }
    };

    setInterval(() => {
        colorChange();
    }, 1000);

    // Hiding Header on scroll Down

    var didScroll;
    var lastScrollTop = 0;
    var delta = 5;
    var navbarHeight = $('header').outerHeight();

    $(window).scroll(function (event) {
        didScroll = true;
    });

    setInterval(function () {
        if (didScroll) {
            hasScrolled();
            didScroll = false;
        }
    }, 250);

    function hasScrolled() {
        var st = $(this).scrollTop();

        // Make sure they scroll more than delta
        if (Math.abs(lastScrollTop - st) <= delta)
            return;

        // If they scrolled down and are past the navbar, add class .nav-up.
        // This is necessary so you never see what is "behind" the navbar.
        if (st > lastScrollTop && st > navbarHeight) {
            // Scroll Down
            $('header').addClass('nav-up');
            $('#main-flexxi-submenu').addClass("display-none");
        } else {
            // Scroll Up
            if (st + $(window).height() < $(document).height()) {
                $('header').removeClass('nav-up');
            }
        }

        lastScrollTop = st;
    }

});