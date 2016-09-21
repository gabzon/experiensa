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
function mobileMenuOnPcMarginConf(){
    var mobileMenuOnPC = jQuery(".ui.vertical.inverted.navbar.fixed.menu.pc");
    if(mobileMenuOnPC.length>0){
        var header = jQuery( ".ui.menu.navbar.grid.header-menu.pc" );
        var header_height = header.height();
        var admin_bar = jQuery("#wpadminbar");
        var menu_height;
        if(admin_bar.length>0){
            var admin_bar_height = admin_bar.height();
            menu_height = admin_bar_height + header_height;
            mobileMenuOnPC.css('margin-top',menu_height+'px');
        }else{
            mobileMenuOnPC.css('margin-top',header_height+'px');
        }
    }
}
function mobileMenuMarginConfig(){
    var mobileHeader = jQuery('.ui.navbar.menu.header-menu.mobile');
    var mobileHeaderHeight = mobileHeader.height();
    var mobileMenu = jQuery('.ui.vertical.inverted.navbar.menu.mobile');
    var admin_bar = jQuery("#wpadminbar");
    var menu_height;
    if(admin_bar.length>0){
        var admin_bar_height = admin_bar.height();
        menu_height = admin_bar_height + mobileHeaderHeight;
    }else{
        menu_height = mobileHeaderHeight;
    }
    mobileMenu.css('margin-top',menu_height+'px');
}
function scrollMenu(header_menu_background){
    jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() > 1) {
            jQuery('.header-menu').removeClass("secondary");
            jQuery('.header-menu a').removeClass("white-font");
            //jQuery('.header-menu').addClass("top-zero");
            jQuery('.header-menu').css('background-color',header_menu_background);
        }
        else {
            jQuery('.header-menu').addClass("secondary");
            jQuery('.header-menu a.menu-link').addClass("white-font");
            //jQuery('.header-menu').removeClass("top-zero");
            jQuery('.header-menu').css('background-color','');
        }
    });
}

function smoothPageScroll(){
    jQuery('a[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = jQuery(this.hash);
            target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                jQuery('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });
}