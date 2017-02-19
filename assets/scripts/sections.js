function checkPageMobile(){
    var pc_header = jQuery('#header-nav .computer.tablet.only.row');
    var pc_display = pc_header.css('display');
    return pc_display === 'none';
}
function changeMobileSectionsHeight() {
    if(checkPageMobile()){
        jQuery('.custom-section').each(function(i){
            var bg_section = jQuery(this).find('.section-background');
            var content = jQuery(this).find('.section-content');
            if(content.length > 0){
                var content_height = content.height();
                jQuery(this).height(content_height);
                bg_section.height(content_height);
            }
        });
    }
}
