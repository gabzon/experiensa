

(function($) {
    $('#page-builder-frame').on('load', function(){
        // $(this).show();
        console.log('loaded the iframe');
    });

//}
//     function cargarCarousel() {
//         console.log("aqui se llamo a la function");
//     }
    // console.log("aqui hay algo");
    // var carousel = jQuery(".owl-carousel");
    // if(carousel.length>0) {
    //     carousel.owlCarousel({
    //         loop: true,
    //         margin: 5,
    //         nav: true,
    //         autoHeight: false,
    //         navText: [
    //             "<i class='angle left big icon'></i>",
    //             "<i class='angle right big icon'></i>"
    //         ],
    //         responsive: {
    //             0: {
    //                 items: 1,
    //                 nav: false
    //             },
    //             600: {
    //                 items: 3
    //             },
    //             1920: {
    //                 items: 5
    //             }
    //         }
    //     });
    //     carousel.each(function () {
    //         jQuery(".owl-dots", this).removeClass('disabled');
    //         jQuery(".owl-nav", this).removeClass('disabled');
    //     });
    //     var testimonial_carousel = jQuery(".testimonial-carousel");
    //     if(testimonial_carousel.length > 0) {
    //         jQuery('.owl-nav').show();
    //     }else{
    //         var carousel_active = jQuery('.owl-item.active').length;
    //         if (carousel_active === 1) {
    //             jQuery('.owl-nav').hide();
    //         }
    //     }
    // }
})(jQuery); // Fully reference jQuery after this point.
// DSLC.Editor.frameContext.cargarCarousel();