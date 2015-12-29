// Menu sidebar ----------------------------------------------------------------
jQuery(function($){
    $('.mobile-menu').on('click', function (event) {
        $('#main-menu.ui.sidebar').sidebar('toggle');
    });

    $('#request-button').on('click',function(event) {
        $('#request-form.ui.right.sidebar').sidebar('toggle');
    });
});

function scrollMenu(){
    jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() > 1) {
            jQuery('header').removeClass("secondary");
            jQuery('header a').removeClass("white-font");
        }
        else {
            jQuery('header').addClass("secondary");
            jQuery('header a.menu-link').addClass("white-font");
        }
    });
}