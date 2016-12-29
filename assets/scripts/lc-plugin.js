/**
 *
 */
// var $ = jQuery;
jQuery(document).ready(function ($) {
    function initCarouselLC(){
        var carousel_module = jQuery("#page-builder-frame").contents().find( ".dslc-module-ExperiensaCarousel_LC_Module" );
        if(carousel_module.length > 0) {
            // console.log("hay dslc-module-ExperiensaCarousel_LC_Module*****");
            var carousel = jQuery("#page-builder-frame").contents().find(".owl-carousel.carousel-multi");
            if (carousel.length > 0) {
                // console.log("ahora hay un carousel************");
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
            }
        }
    }
    window.initCarouselLC = initCarouselLC;

    function initSingleCarousel(){
        var single_carousel_module = jQuery("#page-builder-frame").contents().find( ".dslc-module-SingleCarousel_LC_Module" );
        if(single_carousel_module.length > 0) {
            var testimonial_carousel = jQuery("#page-builder-frame").contents().find(".owl-carousel.testimonial-carousel");
            if (testimonial_carousel.length > 0) {
                testimonial_carousel.owlCarousel({
                    autoPlay: 3000,
                    loop:true,
                    margin:5,
                    nav:true,
                    items: 1,
                    stopOnHover:true,
                    navText: [
                        "<i class='angle left big icon'></i>",
                        "<i class='angle right big icon'></i>"
                    ],
                });
                testimonial_carousel.each(function(){
                    jQuery(".owl-dots",this).removeClass('disabled');
                    jQuery(".owl-nav",this).removeClass('disabled');
                });
            }
        }
    }
    window.initSingleCarousel = initSingleCarousel;

    function initMasonryLC() {
        var jMasonry = jQuery("#page-builder-frame").contents().find( ".grid-masonry" );
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
    window.initMasonryLC = initMasonryLC;

    function initSuperSliderLC(){
        var super_slide_module = jQuery('#page-builder-frame') .contents().find( ".dslc-module-SuperSlider_LC_Module" );
        if(super_slide_module.length > 0){
            var super_slides = super_slide_module.find(".super-slides-component");
            super_slides.superslides({play:'8000'});
            // console.log("he iniciado superslides!!!!!!!!!!!!!!!!!");
        }
    }
    window.initSuperSliderLC = initSuperSliderLC;

    function initVegasSliderLC(){
        var vegas_module = jQuery('#page-builder-frame').contents().find( ".dslc-module-VegasSlider_LC_Module" );
        if(vegas_module.length > 0){
            var vegas_src = vegas_module.find(".vegas-images");
            if(vegas_src.length > 0) {
                var slides = vegas_src.attr("data-img");
                var data = slides.split(',');
                var array_src = [];
                var row = {};
                for(var i = 0; i < data.length; i++){
                    row.src = data[i];
                    array_src.push(row);
                    row = {};
                }
                var jVegas = vegas_module.find(".voyage-slider");
                var vegas_overlay = vegas_module.find(".vegas-overlays");
                var overlay = vegas_overlay.attr("data-overlay");
                if(jVegas.length > 0) {
                    jVegas.vegas({
                        overlay: overlay,
                        slides: array_src
                    });
                }
            }
        }
    }
    window.initVegasSliderLC = initVegasSliderLC;

    var Freewall = freewall;
    function initFreewallFlexLC(){
        var flex_module = jQuery('#page-builder-frame').contents().find( ".dslc-module-FlexLayout_LC_Module" );
        if(flex_module.length > 0){
            var wall = new Freewall(flex_module.find('#freewall'));
            wall.reset({
                selector: '.brick',
                animate: true,
                cellW: 150,
                cellH: 'auto',
                onResize: function () {
                    wall.fitWidth();
                }
            });
            wall.fitWidth();
        }
    }
    window.initFreewallFlexLC = initFreewallFlexLC;

    function initFreewallImageLC(){
        var image_module = jQuery('#page-builder-frame').contents().find( ".dslc-module-ImageLayout_LC_Module" );
        if(image_module.length > 0){
            var wall_image = new Freewall(image_module.find("#freewall-image"));
            wall_image.reset({
                selector: '.freewall-cell',
                animate: true,
                cellW: 20,
                cellH: 200,
                onResize: function() {
                    wall_image.fitWidth();
                }
            });
            wall_image.fitWidth();
        }
    }
    window.initFreewallImageLC = initFreewallImageLC;

    function initFreewallPinterestLC(){
        // console.log("ya estoy aqui initFreewallPinterestLC");
        var pinterest_module = $('#page-builder-frame').contents().find( ".dslc-module-PinterestLayout_LC_Module" );
        if(pinterest_module.length > 0){
            // console.log("voy a crear el initFreewallPinterestLC");
            var pinterest = pinterest_module.find(".pinterest-container");
            pinterest.pinto();
        }
    }
    window.initFreewallPinterestLC = initFreewallPinterestLC;

    function initFreewallWindows8LC(){
        // console.log("ya estoy aqui initFreewallWindows8LC");
        var windows8_module = jQuery('#page-builder-frame').contents().find( ".dslc-module-Windows8Layout_LC_Module" );
        if(windows8_module.length > 0){
            // console.log("voy a crear el initFreewallWindows8LC");
            var win8 = windows8_module.find("#win8-freewall");
            var selector = win8.find('.level1');
            // if(selector.length>0){
            //     console.log("existe selector");
            // }else{
            //     console.log("NOOOO existe selector");
            // }
            var wall_win8 = new Freewall(win8);
            wall_win8.reset({
                selector: selector,
                cellW: 320,
                cellH: 160,
                fixSize: 0,
                gutterX: 20,
                gutterY: 10,
                onResize: function() {
                    wall_win8.fitWidth();
                }
            });
            wall_win8.fitWidth();
        }
    }
    window.initFreewallWindows8LC = initFreewallWindows8LC;
    //Init all registered componets
    jQuery('#page-builder-frame').on('load', function () {
        // jQuery(this).find("#dslc-content").css("margin-top","250px");
        //Carousel
        var carousel_module = jQuery(this).contents().find( ".dslc-module-ExperiensaCarousel_LC_Module" );
        if(carousel_module.length>0){
            // console.log("hay un dslc-module-ExperiensaCarousel_LC_Module");
            initCarouselLC();
        }
        //Single Carousel
        var single_carousel_module = jQuery(this).contents().find( ".dslc-module-SingleCarousel_LC_Module" );
        if(single_carousel_module.length>0){
            // console.log("hay un dslc-module-SingleCarousel_LC_Module");
            initSingleCarousel();
        }
        //Masonry
        var masonry_module = jQuery(this).contents().find( ".grid-masonry" );
        if(masonry_module.length>0){
            // console.log("si hay");
            initMasonryLC();
        }
        //SuperSlides
        var super_slide_module = jQuery(this).contents().find( ".dslc-module-SuperSlider_LC_Module" );
        if(super_slide_module.length>0){
            // console.log("hay un dslc-module-SuperSlider_LC_Module");
            initSuperSliderLC();
        }
        //Vegas
        var vegas_module = jQuery(this).contents().find( ".dslc-module-VegasSlider_LC_Module" );
        if(vegas_module.length>0){
            // console.log("hay un .dslc-module-VegasSlider_LC_Module");
            initVegasSliderLC();
        }
        //Freewall Flex Layout
        var flex_module = jQuery(this).contents().find( ".dslc-module-FlexLayout_LC_Module" );
        if(flex_module.length > 0){
            initFreewallFlexLC();
        }
        //Freewall Image Layout
        var image_module = jQuery(this).contents().find( ".dslc-module-ImageLayout_LC_Module" );
        if(image_module.length > 0){
            initFreewallImageLC();
        }
        //Freewall Pinterest Layout
        var pinterest_module = jQuery(this).contents().find( ".dslc-module-PinterestLayout_LC_Module" );
        if(pinterest_module.length > 0){
            initFreewallPinterestLC();
        }
        //Freewall Windows8 Layout
        var windows8_module = jQuery(this).contents().find( ".dslc-module-Windows8Layout_LC_Module" );
        if(windows8_module.length > 0){
            initFreewallWindows8LC();
        }
    });

});
jQuery(document).ajaxSuccess(function(event, xhr, settings) {
    // console.log("An individual AJAX call has completed successfully***********");
    // console.log(event);
    // console.log(xhr);
    // console.log(settings);
    var action = 'action=dslc-ajax-add-module';
    if(settings.data.indexOf('dslc_module_id=SuperSlider_LC_Module')!==-1 && settings.data.indexOf(action) !== -1) {
        initSuperSliderLC();
    }
    if(settings.data.indexOf('dslc_module_id=ExperiensaCarousel_LC_Module')!==-1 && settings.data.indexOf(action) !== -1) {
        initCarouselLC();
    }
    if(settings.data.indexOf('dslc_module_id=SingleCarousel_LC_Module')!==-1 && settings.data.indexOf(action) !== -1) {
        initSingleCarousel();
    }
    if(settings.data.indexOf('dslc_module_id=Masonry_LC_Module')!==-1 && settings.data.indexOf(action) !== -1) {
        initMasonryLC();
    }
    if(settings.data.indexOf('dslc_module_id=VegasSlider_LC_Module')!==-1 && settings.data.indexOf(action) !== -1) {
        initVegasSliderLC();
    }
    if(settings.data.indexOf('dslc_module_id=FlexLayout_LC_Module')!==-1 && settings.data.indexOf(action) !== -1) {
        initFreewallFlexLC();
    }
    if(settings.data.indexOf('dslc_module_id=ImageLayout_LC_Module')!==-1 && settings.data.indexOf(action) !== -1) {
        // console.log("voy a image layout");
        initFreewallImageLC();
    }
    if(settings.data.indexOf('dslc_module_id=PinterestLayout_LC_Module')!==-1 && settings.data.indexOf(action) !== -1) {
        // console.log("voy a pintrest layout");
        initFreewallPinterestLC();
    }
    if(settings.data.indexOf('dslc_module_id=Windows8Layout_LC_Module')!==-1 && settings.data.indexOf(action) !== -1) {
        // console.log("voy a windows8 layout");
        initFreewallWindows8LC();
    }
});