// Menu sidebar ----------------------------------------------------------------
jQuery(function($){
    $('.mobile-menu').on('click', function (event) {
        $('#main-menu.ui.sidebar').sidebar('toggle');
        return false;
    });

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
function header_background_color(){
    var result="";
    jQuery.ajax({
        type:"POST",
        url: sage_vars.ajaxurl,
        data: {action: "header_background"},
        dataType: "html",
        async: false,
        success:function(data){
            result = data;
        },
        error: function() {
            result = "#FFFFFF";
        }
    });
    return result;
}
function scrollMenu(header_menu_background){
    jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() > 1) {
            jQuery('.header-menu').removeClass("secondary");
            jQuery('.header-menu a').removeClass("white-font");
            jQuery('.header-menu').addClass("top-zero");
            jQuery('.header-menu').css('background-color',header_menu_background);
        }
        else {
            jQuery('.header-menu').addClass("secondary");
            jQuery('.header-menu a.menu-link').addClass("white-font");
            jQuery('.header-menu').removeClass("top-zero");
            jQuery('.header-menu').css('background-color','');
        }
    });
}
