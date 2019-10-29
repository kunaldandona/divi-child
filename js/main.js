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

});