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
function headerMarginTop(){
    var admin_bar = jQuery("#wpadminbar");
    var headerArray = [];
    var menu_height = 0;
    var i;
    var acum;
    var homeClass = jQuery(".home.page");
    var voyageClass = jQuery(".single.single-voyage");
    var mainContent = jQuery("#main-content");
    var liveComposerEditor = jQuery(".dslca-enabled");

    if(admin_bar.length>0){//Check if WP adminbar is active
        var admin_bar_height = admin_bar.height();
        acum = admin_bar_height;
        if(liveComposerEditor.length < 1) {//Check if LiveComposer editor is active
            //Push all header-menu pc on one array
            jQuery(".ui.menu.navbar.grid.header-menu.pc").each(function (index) {
                headerArray.push(jQuery(this));
            });
            //Pc Header Margin
            for (i = 0; i < headerArray.length; i++) {
                acum += headerArray[i].height();
                if (i < 1) {
                    menu_height = menu_height + admin_bar_height;
                } else {
                    menu_height = menu_height + headerArray[i - 1].height();
                }
                headerArray[i].css('margin-top', menu_height + 'px');
            }
            //Mobile Header Margin
            var mobileHeader = jQuery('.ui.navbar.menu.header-menu.mobile');
            mobileHeader.css('margin-top',admin_bar_height+'px');
            if(homeClass.length <= 0 && voyageClass.length <= 0) {
                acum = acum - 4;
                mainContent.css('margin-top',  acum+ 'px');
            }
        }
    }else{
        jQuery( ".ui.menu.navbar.grid.header-menu.pc" ).each(function( index ) {
            headerArray.push(jQuery(this));
        });
        acum = 0;
        for(i=0;i<headerArray.length;i++){
            acum = acum + headerArray[i].height();
            if(i>0){
                menu_height = menu_height + headerArray[i-1].height();
                headerArray[i].css('margin-top',menu_height+'px');
            }
        }
        if(homeClass.length <= 0 && voyageClass.length <= 0) {
            mainContent.css('margin-top', acum + 'px');
        }
    }

}
function getPcHeaderMenuHeight(){
    var headerArray = [];
    jQuery(".ui.menu.navbar.grid.header-menu.pc").each(function (index) {
        headerArray.push(jQuery(this));
    });
    var acum = 0;
    for (var i = 0; i < headerArray.length; i++) {
        acum += headerArray[i].height();
    }
    return acum;
}
function setHeaderBackground(){
    var header_menu_background = header_background_color();
    //var body_class = jQuery('body').attr('class');
    var main_slider = jQuery('.main-slider');
    //var first_section = jQuery('.ui.vertical.segment:first');
    var header_pc = jQuery('.ui.menu.navbar.grid.header-menu.pc');
    var mobile_menu_pc = jQuery('.ui.vertical.navbar.menu.pc');
    var header_mobile = jQuery('.ui.navbar.menu.header-menu.mobile');
    var mobile_menu = jQuery('.ui.vertical.navbar.menu.mobile');
    if(mobile_menu_pc.length>0){
        mobile_menu_pc.css('background-color',header_menu_background);
    }
    //if(first_section.length>0){
    //    var bg = first_section.css('background');
    //    console.log('yes '+bg);
    //}else{
    //    console.log('no');
    //}
    //if(body_class.indexOf('home') !== -1){
    //    header_pc.css('background-color','');
    //    header_mobile.css('background-color','');
    //}else{
      if(main_slider.length>0){
          header_pc.css('background-color','');
          header_mobile.css('background-color','');
      }else{
          header_pc.css('background-color',header_menu_background);
          header_mobile.css('background-color',header_menu_background);
      }
    //}
    mobile_menu.css('background-color',header_menu_background);
}
