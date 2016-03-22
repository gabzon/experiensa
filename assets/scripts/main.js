/* ========================================================================
* DOM-based Routing
* Based on http://goo.gl/EUTi53 by Paul Irish
*
* Only fires on body classes that match. If a body class contains a dash,
* replace the dash with an underscore when adding it to the object below.
*
* .noConflict()
* The routing is enclosed within an anonymous function so that you can
* always reference jQuery with $, even when in .noConflict() mode.
* ======================================================================== */

(function($) {

    // Use this variable to set up the common and page specific functions. If you
    // rename this variable, you will also need to rename the namespace below.
    var Sage = {
        // All pages
        'common': {
            init: function() {

                $('.ui.card button#modal-details').on('click', function () {
                    $(this).data('modal').modal('show');
                }).each(function (i, b) {
                    $(this).data('modal', $(this).parents('.column').children('.ui.modal').modal());
                });

                // var activatingElement;
                // $('.ui.card a#modal-details').on('click',function(){
                //     activatingElement = this;
                //     $('.ui.modal').modal('show','hide others');
                // });

                // Autocomplete google maps ------------------------------------
                // function initialize() {
                //     var input = document.getElementById('destination');
                //     var options = {
                //         types: ['(cities)'],
                //         language: 'fr',
                //     };
                //     var autocomplete = new google.maps.places.Autocomplete(input, options);
                // }
                // google.maps.event.addDomListener(window, 'load', initialize);
            },
            finalize: function() {
                // JavaScript to be fired on all pages, after page specific JS is fired
            }
        },
        // Home page
        'home': {
            init: function() {

                $('#slides').superslides({play:'8000'});

                scrollMenu();

                $(".owl-carousel").owlCarousel({
                    autoplay:true,
                    autoplayTimeout:3000,
                    autoplayHoverPause:true,
                    loop:true,
                    nav:true,
                    margin: 10,
                    navText: [
                        "<i class='chevron circle left large icon'></i>",
                        "<i class='chevron circle right large icon'></i>"
                    ],
                    responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:3
                        },
                        1920:{
                            items:5
                        }
                    }
                });

                $(".owl-carousel .item.promotion-item .image").dimmer({on:'hover'});

            },
            finalize: function() {
                // JavaScript to be fired on the home page, after the init JS
                var stHeight = $('#promotions-carousel').height();
                $('#promotions-carousel').css('height',stHeight + 'px' );
            }
        },
        // About us page, note the change from about-us to about_us.
        'about_us': {
            init: function() {
                // JavaScript to be fired on the about us page
            }
        },
        'single_voyage':{
            init: function(){
                scrollMenu();

                $('#host-gallery').slick({
                    autoplay:true,
                    slidesToShow: 1,
                    adaptiveHeight: true,
                    dots: true,
                    arrows: true,
                });

                function ajaxSubmit(){
                    var contact_form = $(this).serialize();
                    $.ajax({
                        type:"POST",
                        url: sage_vars.ajaxurl,
                        data: contact_form,
                        success:function(data){
                            $("#feedback").html(data);
                        }
                    });

                    return false;
                }
                $('#contact_form').submit(ajaxSubmit);
            }
        },
        'single_estimate':{
            init:function(){
                $(".owl-carousel").owlCarousel({
                    autoPlay: 5000, //Set AutoPlay to 3 seconds
                    loop:true,
                    items: 1,
                    nav:true,
                    navText: [
                        "<i class='chevron circle left icon'></i>",
                        "<i class='chevron circle right icon'></i>"
                    ],
                });
            }
        },
        'page_template_request_form':{
            init:function(){
                requestForm();
                function ajaxSubmit(){
                    var newRequest = $(this).serialize();
                    $.ajax({
                        type:"POST",
                        url: sage_vars.ajaxurl,
                        data: newRequest,
                        success:function(data){
                            $("#feedback").html(data);
                        },
                        error: function(request, error) {
                            console.log("Request: " + JSON.stringify(request));
                            console.log("Error: " + JSON.stringify(error));
                        }
                    });
                    return false;
                }
                $('#newRequest').submit(ajaxSubmit);
            }
        }
    };

    // The routing fires all common scripts, followed by the page specific scripts.
    // Add additional events for more control over timing e.g. a finalize event
    var UTIL = {
        fire: function(func, funcname, args) {
            var fire;
            var namespace = Sage;
            funcname = (funcname === undefined) ? 'init' : funcname;
            fire = func !== '';
            fire = fire && namespace[func];
            fire = fire && typeof namespace[func][funcname] === 'function';

            if (fire) {
                namespace[func][funcname](args);
            }
        },
        loadEvents: function() {
            // Fire common init JS
            //$("#promotions-carousel").slick();
            UTIL.fire('common');


            // Fire page-specific init JS, and then finalize JS
            $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
                UTIL.fire(classnm);
                UTIL.fire(classnm, 'finalize');
            });

            // Fire common finalize JS
            UTIL.fire('common', 'finalize');
        }
    };

    // Load Events
    $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
