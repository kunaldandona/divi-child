jQuery(document).ready(function ($) {

    $('#flexxi-logo').click((e) => {
        e.preventDefault();
        $('#main-flexxi-submenu').toggleClass("display-none", 1000);
    })

});