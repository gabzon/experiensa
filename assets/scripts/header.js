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
function headerDefaultConfig(){
  var header_menu_background = header_background_color();
  //jQuery header on pc display selector
  var header_menu = jQuery('.ui.menu.navbar.grid.header-menu.pc');
  header_menu.css('background-color',header_menu_background);
  var headerHieght = header_menu.height();
  var mobile_menu_on_pc = jQuery('.ui.vertical.inverted.navbar.fixed.menu.pc');
  var menu_height_pc = headerHieght+'px';
  mobile_menu_on_pc.css('margin-top',menu_height_pc);
  var mobile_header = jQuery('.ui.navbar.menu.header-menu.mobile');
  mobile_header.css('background-color',header_menu_background);
  var mobileHeaderHieght = mobile_header.height();
  var mobile_menu = jQuery('.ui.vertical.navbar.menu.mobile');
  var menu_height_mobile = mobileHeaderHieght+'px';
  mobile_menu.css('margin-top',menu_height_mobile);
  mobile_menu.css('background-color',header_menu_background);
  mobile_menu_on_pc.css('background-color',header_menu_background);
}
