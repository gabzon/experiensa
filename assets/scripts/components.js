
function initCarousel(){
    var carousel = jQuery(".owl-carousel");
    carousel.owlCarousel({
        loop:true,
        margin:5,
        nav:true,
        autoHeight:false,
        navText: [
            "<i class='angle left big icon'></i>",
            "<i class='angle right big icon'></i>"
        ],
        responsive:{
            0:{
                items:1,
                nav:false
            },
            600:{
                items:3
            },
            1920:{
                items:5
            }
        }
    });
    carousel.each(function(){
        jQuery(".owl-dots",this).removeClass('disabled');
        jQuery(".owl-nav",this).removeClass('disabled');
    });
    var carousel_active = jQuery('.owl-item.active').length;
    if(carousel_active === 1){
        jQuery('.owl-nav').hide();
    }
}
function initLandingComponents(){
    initCarousel();
}