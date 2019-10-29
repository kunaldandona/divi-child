jQuery(document).ready(function ($) {

    $('#flexxi-logo').click((e) => {
        e.preventDefault();
        $('#main-flexxi-submenu').toggleClass("display-none", 1000);
    });

    let colors = ["#A773FF", "#7568E8", "#689FE8", "#73D4FF"];

    colorChange = () => {
        colors.push(colors.shift());
        for (let i = 0; i < colors.length; i++) {
            $(".archive .container div:nth-child(" + (i + 1) + ")").css(
                "background-color",
                colors[i]
            );
        }
    };

    setInterval(() => {
        colorChange();
    }, 1000);

});