// Menu sidebar ----------------------------------------------------------------
jQuery(function($){
    $('.mobile-menu').on('click', function (event) {
        $('#main-menu.ui.sidebar').sidebar('toggle');
        return false;
    });
    /*$('.mobile-menu').on('click', function (event) {
        $('#main-menu.ui.sidebar').sidebar('toggle');
    });*/

    $('#request-button').on('click',function(event) {
        $('#request-form.ui.right.sidebar').sidebar('toggle');
    });
    //ui languages floating dropdown

    $('#select-language').dropdown();
    $('#language-menu').dropdown();
    $('.language-menu').dropdown();
    $('.landing-menu').dropdown({
        allowCategorySelection: true
    });
    $('.mobile-menu').dropdown({
        allowCategorySelection: true
    });
    $('.ui.accordion').accordion();
});

function scrollMenu(){
    jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() > 1) {
            jQuery('.header-menu').removeClass("secondary");
            jQuery('.header-menu a').removeClass("white-font");
        }
        else {
            jQuery('.header-menu').addClass("secondary");
            jQuery('.header-menu a.menu-link').addClass("white-font");
        }
    });
}
