
function initCarousel(liveComposerClass){
    if (!liveComposerClass) {
        var carousel = jQuery(".owl-carousel.carousel-multi");
        if (carousel.length > 0) {
            carousel.owlCarousel({
                loop: true,
                margin: 5,
                nav: true,
                autoHeight: false,
                navText: [
                    "<i class='angle left big icon'></i>",
                    "<i class='angle right big icon'></i>"
                ],
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    600: {
                        items: 3
                    },
                    1920: {
                        items: 5
                    }
                }
            });
            carousel.each(function () {
                jQuery(".owl-dots", this).removeClass('disabled');
                jQuery(".owl-nav", this).removeClass('disabled');
            });
            var testimonial_carousel = jQuery(".owl-carousel.testimonial-carousel");
            if (testimonial_carousel.length > 0) {
                jQuery('.owl-nav').show();
            } else {
                var carousel_active = jQuery('.owl-item.active').length;
                if (carousel_active === 1) {
                    jQuery('.owl-nav').hide();
                }
            }
        }
    }
}
window.initCarousel = initCarousel;
function initMasonry(liveComposerClass) {
    if (!liveComposerClass) {
        var jMasonry = jQuery('.grid-masonry');
        if (jMasonry.length > 0) {
            jMasonry.masonry({
                // set itemSelector so .grid-sizer is not used in layout
                itemSelector: '.grid-item',
                // use element for option
                columnWidth: '.grid-sizer',
                percentPosition: true,
                gutter: 10
            });
        }
    }
}
function initSlides(liveComposerClass){
    if(!liveComposerClass) {
        var slides = jQuery('.super-slides-component');
        if (slides.length > 0) {
            slides.superslides({play: '8000'});
        }
    }
}
function initVegasSlider(liveComposerClass){
    if(!liveComposerClass) {
        var vegas_src = jQuery(".vegas-images");
        if (vegas_src.length > 0) {
            var slides = vegas_src.attr("data-img");
            var data = slides.split(',');
            var array_src = [];
            var row = {};
            for (var i = 0; i < data.length; i++) {
                row.src = data[i];
                array_src.push(row);
                row = {};
            }
            var jVegas = jQuery(".voyage-slider");
            var vegas_overlay = jQuery(".vegas-overlays");
            var overlay = vegas_overlay.attr("data-overlay");
            jQuery(".voyage-slider").vegas({
                overlay: overlay,
                slides: array_src
            });
        }
    }
}
function initPinterest(liveComposerClass){
    if(!liveComposerClass) {
        var pinterest = jQuery(".pinterest-container");
        if (pinterest.length > 0) {
            pinterest.pinto();
        }
    }
}
function changeEditorBackground(liveComposerClass){
    if(liveComposerClass){
        var x=0;
        jQuery('.section-background').each(function(i, obj) {
            var parent = jQuery( this ).parent();
            var parent_height = parent.height();
            jQuery(this).css("height",parent_height+"px");
        });
    }
}