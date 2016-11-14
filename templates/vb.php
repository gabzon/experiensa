<?php
/**
 * Template Name: New Villa Blanca Template
 */
?>
<!-- VILLA BLANCA MAIN SECTION -->
<section id="section_page_villa_blanca" class="ui vertical segment custom-section" style="height:100vh;">
    <div class="section-background " style="background:linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url('<?= get_site_url().'/wp-content/themes/experiensa/dist/images/landing.jpg' ?>') no-repeat center center fixed;background-size: cover;height:100vh;"></div>
    <div class="ui  vertical segment section-content" style="padding: 0px 15px 0 15px;color:#FFFFFF;">
        <br>
        <div class="ui center aligned header" style="color:#FFFFFF;">
            <br>
            <br>
            <div class="page-header"><br><br><br>
                <h1>Villa Blanca</h1>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="ui grid centered">
            <div class="ten wide column">
                <p class="text-center" style="font-size: 2em"><strong>Close your eyes. Imagine your dream holidays. </strong><strong>Open your eyes: welcome to Villa Blanca.</strong></p>

            </div>
        </div>
        &nbsp;
        <div class="text-center"></div>    </div>
    <br>
    <br>
</section>
<!--ABOUT SECTION-->
<section id="section_page_about" class="ui vertical segment custom-section" style="">
    <div class="section-background " style="background:linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url('<?= get_site_url().'/wp-content/themes/experiensa/dist/images/about.jpg' ?>') no-repeat center center fixed;background-size: cover;"></div>
    <div class="ui  vertical segment section-content" style="padding: 0px 15px 0 15px;color:#FFFFFF;">
        <br>
        <div class="ui center aligned header" style="color:#FFFFFF;">
            <br>
            <br>
            <div class="page-header">
                <h1>About</h1>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="ui grid stackable">
            <div class="two wide column"></div>
            <div class="twelve wide column">
                <h3>At the heart of beautiful Catalonia: enjoy the elegance of the mansion, romantic gardens, calm and prestige, sports facilities fun, clear sea of Costa Brava, charms of Barcelona, in exclusivity for your family and friends</h3>
            </div>
            <div class="two wide column"></div>
        </div>
        <div class="ui two column grid stackable">
            <div class="column">
                Villa Blanca is a manorial mansion with views over the Mediterranean Sea. It is located in the Maresme Coast, where the approximate minimum temperature between spring and autumn is 10 degrees Celsius, and the approximate maximum temperature is 30 degrees Celsius.

                The house is found inside a family-owned property of an area of 5 hectare, located 40 km away from Barcelona. It was built by a stock market agent, Marcelino Coll, and was later sold to Juan Pich i Pon, mayor of Barcelona and president of the Generalitat de Catalunya (Catalonia’s regional government).

                It is surrounded by magnificent and romantic gardens designed by the famous architect Jean-Baptiste Nicolas Forestier. The house was built in 1909 and it is catalogued as a “protected building” by the Autonomous Regional Government of Catalonia.
            </div>
            <div class="column">
                The property is well connected by both train and car with Barcelona and la Costa Brava. The Foundation for Environmental Education granted many years ago the Blue Flag to the wonderful beaches of Sant Vicenç de Montalt and Caldes d’Estrac for their high environmental and quality standards. These beaches are within walking distance.
                <br>
                <br>
            </div>
        </div>    </div>
    <br>
    <br>

</section>
<!--FACILITIES SECTION-->
<section id="section_component_facilities" class="ui vertical segment custom-section" style="">
    <div class="section-background " style="background:linear-gradient(rgba(0,0,0,.6),rgba(0,0,0,.6)),url('<?= get_site_url().'/wp-content/themes/experiensa/dist/images/facilities.jpg' ?>') no-repeat center center fixed;background-size: cover;"></div>
    <div class="ui  vertical segment section-content" style="padding: 0px 15px 0 15px;color:#FFFFFF;">
        <div class="ui center aligned header" style="color:#FFFFFF;">
            <div class="page-header">
                <br>
                <h1>Facilities</h1>
            </div>
        </div>
        <?php
        $post_type = "facility";
        $category = "facility_type";
        $terms = [];
        $max = 9;
        $showcase_data = \Showcase::getData($post_type,$category,$terms,$max);
//        var_dump($showcase_data);
        $textimage['display_textimage'] = true;
        $textimage['display_title'] = "yes";
        $textimage['display_subtitle'] = "no";
        $textimage['display_overlay'] = "yes";
        $textimage['hover_animation'] = "imghvr-fade";
        $textimage['animation_color'] = "#000";
        $textimage['text_order'] = "title_first";
        $textimage['text_position'] = "center_middle";
        $textimage['text_transform'] = "capitalize";
        $textimage['font_size'] = "1.8";
        $textimage['text_color'] = '#FFFFFF';
//        var_dump($textimage);
        $textimage_obj = new \Experiensa\Component\Textimage($textimage);
//        var_dump($textimage_obj);
        set_query_var('column_number','five');
        set_query_var('component','grid');
        set_query_var('data',$showcase_data);
        set_query_var('textimage_option',$textimage_obj);
        get_template_part("templates/partials/showcase/grid/grid");
        ?>
        <br>
        <br>
        <br>
    </div>
</section>
<!-- Princing Section -->
<section id="villa_blanca_pricing" class="ui segment vertical custom-section" style="height:100vh;">
    <div class="section-background " style="background:linear-gradient(rgba(219,63,46,0.31),rgba(219,63,46,0.31)),url('<?= get_site_url().'/wp-content/themes/experiensa/dist/images/price.jpg' ?>') no-repeat center center fixed;background-size: cover;height:100vh;"></div>
    <div class="section-content">
        <br><br><br>
        <h1 class="text-center" style="color: #FFFFFF;">Pricing</h1>
        <br>
        <div class="ui two column stackable grid centered">
            <div class="five wide column" style="padding-left: 35px !important;">
                <div class="ui card">
                    <div class="content">
                        <div class="center aligned header">High season</div>
                    </div>
                    <div class="center aligned content">
                        <h1 class="ui massive header">10'500<sup class="meta">€</sup></h1>
                        <div class="meta">
                            Per Week
                        </div>
                        <div class="description">
                            <b>From</b>
                        </div>
                        <div class="meta">
                            June 1st
                        </div>
                        <br>
                        <div class="description">
                            <b>To</b>
                        </div>
                        <div class="meta">
                            Sectember 30th
                        </div>
                    </div>
                    <div class="extra center aligned content">
                        <a href="http://bnb.experiensa.com/#villa_blanca_reservations" class="ui pink button" data-slimstat-clicked="false" data-slimstat-type="2" data-slimstat-tracking="false" data-slimstat-async="false" data-slimstat-callback="false">Get it!</a>
                    </div>
                </div>
            </div>
            <div class="five wide column" style="padding-left: 35px !important;">
                <div class="ui card">
                    <div class="content">
                        <div class="center aligned header">Low season</div>
                    </div>
                    <div class="center aligned content">
                        <h1 class="ui massive header">9'0500<sup class="meta">€</sup></h1>
                        <div class="meta">
                            Per Week
                        </div>
                        <div class="description">
                            <b>From</b>
                        </div>
                        <div class="meta">
                            October 1st
                        </div>
                        <br>
                        <div class="description">
                            <b>To</b>
                        </div>
                        <div class="meta">
                            May 31th
                        </div>
                    </div>
                    <div class="extra center aligned content">
                        <a href="http://bnb.experiensa.com/#villa_blanca_reservations" class="ui pink button" data-slimstat-clicked="false" data-slimstat-type="2" data-slimstat-tracking="false" data-slimstat-async="false" data-slimstat-callback="false">Get it!</a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
    </div>
</section>
<!-- RESERVATIONS SECTION -->
<section id="villa_blanca_reservations" class="ui segment vertical custom-section" style="height:100vh;">
    <div class="section-background " style="background:url('<?= get_site_url().'/wp-content/themes/experiensa/dist/images/reservation.jpg' ?>') no-repeat center center fixed;background-size: cover;height:100vh;"></div>
    <div class="section-content">
        <br>
        <br>
        <br>
        <h1 class="text-center" style="color: #FFFFFF;">Reservation</h1>
        <br>
        <div class="ui two column stackable grid">
            <div class="five wide centered column">
                <div id="reservation_datepicker" class="villa-blanca" style="padding-left: 50px !important;"></div>
                <br>
                <div style="padding-left: 40px;">
                    <button class="compact ui button" style="background-color: #fff; color: #000">Available Date</button>
                    <button class="compact ui button" style="background-color: #fff; color: #777">Unable Date</button>
                    <button class="compact ui button" style="background-color: #e61a8d; color: #fff">Today/Selected</button>
                </div>
            </div>
            <div class="five wide centered column">
                <?php get_template_part('templates/components/reservation','form'); ?>
                <br><br>
                <div id="reservationFeedback" style="display: none;"></div>
                <br><br>
            </div>
        </div>
        <br>
    </div>
</section>
<!--TESTIMONIAL SECTION-->
<section id="section_component_testimonials" class="ui vertical segment custom-section" style="">
    <div class="section-background " style="background:linear-gradient(rgba(0,0,0,.6),rgba(0,0,0,.6)),url('<?= get_site_url().'/wp-content/themes/experiensa/dist/images/testimonials.jpg' ?>') no-repeat center center fixed;background-size: cover;"></div>
    <div class="ui container vertical segment section-content" style="color:#FFFFFF;">
        <div class="ui center aligned header" style="color:#FFFFFF;">
            <div class="page-header">
                <h1>Testimonials</h1>
            </div>
        </div>
        <script type="text/javascript">
            jQuery(function() {
                var testimonial_carousel = jQuery(".testimonial-carousel");
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
            });
        </script>
        <!-- Testimonial Carousel Component -->
        <div class="owl-carousel owl-theme testimonial-carousel owl-loaded owl-drag">
            <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-2224px, 0px, 0px); transition: 0s; width: 7784px;"><div class="owl-item cloned" style="width: 1107px; margin-right: 5px;"><div class="item">
                            <div class="ui two column middle aligned centered grid">
                                <div class="row">
                                    <div class="center aligned column">
                                        <br><br>
                                        <div class="ui pointing below basic label" style="padding: 1em;">
                                            <p>
                                                <em>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In metus eros, posuere vitae lectus vehicula, scelerisque semper mi. Sed sagittis mi at dignissim rutrum.</em>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="four column centered row">
                                    <div class="right aligned column">
                                        <div class="ui tiny circular image">
                                            <img src="http://i1.wp.com/bnb.experiensa.com/files/2016/09/77.jpg?fit=128%2C128">
                                        </div>
                                    </div>
                                    <div class="column">
                                        <div class="content">
                                            <div class="header"><strong>Carlos Hernandez</strong></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                        </div></div><div class="owl-item cloned" style="width: 1107px; margin-right: 5px;"><div class="item">
                            <div class="ui two column middle aligned centered grid">
                                <div class="row">
                                    <div class="center aligned column">
                                        <br><br>
                                        <div class="ui pointing below basic label" style="padding: 1em;">
                                            <p>
                                                <em>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In metus eros, posuere vitae lectus vehicula, scelerisque semper mi. Sed sagittis mi at dignissim rutrum. Donec arcu augue, semper sit amet imperdiet eget, facilisis eget quam. Nunc at purus id est ultrices aliquam. Aenean iaculis fringilla efficitur. Etiam vulputate tempus nunc, at consectetur lorem pharetra sit amet.</em>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="four column centered row">
                                    <div class="right aligned column">
                                        <div class="ui tiny circular image">
                                            <img src="http://i2.wp.com/bnb.experiensa.com/files/2016/09/85.jpg?fit=128%2C128">
                                        </div>
                                    </div>
                                    <div class="column">
                                        <div class="content">
                                            <div class="header"><strong>María Gonzalez</strong></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                        </div></div><div class="owl-item active" style="width: 1107px; margin-right: 5px;"><div class="item">
                            <div class="ui two column middle aligned centered grid">
                                <div class="row">
                                    <div class="center aligned column">
                                        <br><br>
                                        <div class="ui pointing below basic label" style="padding: 1em;">
                                            <p>
                                                <em>Lorem ipsum dolor sit amet, consectetur adipiscing elit!</em>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="four column centered row">
                                    <div class="right aligned column">
                                        <div class="ui tiny circular image">
                                            <img src="http://i2.wp.com/bnb.experiensa.com/files/2016/09/64.jpg?fit=128%2C128">
                                        </div>
                                    </div>
                                    <div class="column">
                                        <div class="content">
                                            <div class="header"><strong>Amy Smith</strong></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                        </div></div><div class="owl-item" style="width: 1107px; margin-right: 5px;"><div class="item">
                            <div class="ui two column middle aligned centered grid">
                                <div class="row">
                                    <div class="center aligned column">
                                        <br><br>
                                        <div class="ui pointing below basic label" style="padding: 1em;">
                                            <p>
                                                <em>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In metus eros, posuere vitae lectus vehicula, scelerisque semper mi. Sed sagittis mi at dignissim rutrum.</em>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="four column centered row">
                                    <div class="right aligned column">
                                        <div class="ui tiny circular image">
                                            <img src="http://i1.wp.com/bnb.experiensa.com/files/2016/09/77.jpg?fit=128%2C128">
                                        </div>
                                    </div>
                                    <div class="column">
                                        <div class="content">
                                            <div class="header"><strong>Carlos Hernandez</strong></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                        </div></div><div class="owl-item" style="width: 1107px; margin-right: 5px;"><div class="item">
                            <div class="ui two column middle aligned centered grid">
                                <div class="row">
                                    <div class="center aligned column">
                                        <br><br>
                                        <div class="ui pointing below basic label" style="padding: 1em;">
                                            <p>
                                                <em>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In metus eros, posuere vitae lectus vehicula, scelerisque semper mi. Sed sagittis mi at dignissim rutrum. Donec arcu augue, semper sit amet imperdiet eget, facilisis eget quam. Nunc at purus id est ultrices aliquam. Aenean iaculis fringilla efficitur. Etiam vulputate tempus nunc, at consectetur lorem pharetra sit amet.</em>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="four column centered row">
                                    <div class="right aligned column">
                                        <div class="ui tiny circular image">
                                            <img src="http://i2.wp.com/bnb.experiensa.com/files/2016/09/85.jpg?fit=128%2C128">
                                        </div>
                                    </div>
                                    <div class="column">
                                        <div class="content">
                                            <div class="header"><strong>María Gonzalez</strong></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                        </div></div><div class="owl-item cloned" style="width: 1107px; margin-right: 5px;"><div class="item">
                            <div class="ui two column middle aligned centered grid">
                                <div class="row">
                                    <div class="center aligned column">
                                        <br><br>
                                        <div class="ui pointing below basic label" style="padding: 1em;">
                                            <p>
                                                <em>Lorem ipsum dolor sit amet, consectetur adipiscing elit!</em>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="four column centered row">
                                    <div class="right aligned column">
                                        <div class="ui tiny circular image">
                                            <img src="http://i2.wp.com/bnb.experiensa.com/files/2016/09/64.jpg?fit=128%2C128">
                                        </div>
                                    </div>
                                    <div class="column">
                                        <div class="content">
                                            <div class="header"><strong>Amy Smith</strong></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                        </div></div><div class="owl-item cloned" style="width: 1107px; margin-right: 5px;"><div class="item">
                            <div class="ui two column middle aligned centered grid">
                                <div class="row">
                                    <div class="center aligned column">
                                        <br><br>
                                        <div class="ui pointing below basic label" style="padding: 1em;">
                                            <p>
                                                <em>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In metus eros, posuere vitae lectus vehicula, scelerisque semper mi. Sed sagittis mi at dignissim rutrum.</em>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="four column centered row">
                                    <div class="right aligned column">
                                        <div class="ui tiny circular image">
                                            <img src="http://i1.wp.com/bnb.experiensa.com/files/2016/09/77.jpg?fit=128%2C128">
                                        </div>
                                    </div>
                                    <div class="column">
                                        <div class="content">
                                            <div class="header"><strong>Carlos Hernandez</strong></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                        </div></div></div></div><div class="owl-nav"><div class="owl-prev"><i class="angle left big icon"></i></div><div class="owl-next"><i class="angle right big icon"></i></div></div><div class="owl-dots"><div class="owl-dot active"><span></span></div><div class="owl-dot"><span></span></div><div class="owl-dot"><span></span></div></div></div>
        <br>
        <br>
        <br>
    </div>
</section>
<!--CONTACT SECTION-->
<section id="section_page_contact" class="ui vertical segment custom-section" style="">
    <div class="section-background " style="background:url('<?= get_site_url().'/wp-content/themes/experiensa/dist/images/contact.jpg' ?>') no-repeat center center fixed;background-size: cover;"></div>
    <div class="ui  vertical segment section-content" style="padding: 0px 15px 0 15px;color:#FFFFFF;">
        <br>
        <div class="ui center aligned header" style="color:#FFFFFF;">
            <br>
            <br>
            <div class="page-header">
                <h1>Contact</h1>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="ui grid stackable">
            <div class="two wide column"></div>
            <div class="twelve wide column">
                <iframe style="border: 0;" src="https://www.google.com/maps/embed/v1/search?key=AIzaSyCisQVncn8n6L3RrF6I0vjM4v5Fi-x3KJ8&amp;q=Passeig+dels+Pins+4+08394+Sant+Vicenç+de+Montalt&amp;zoom=7" width="100%" height="350" frameborder="0" allowfullscreen=""></iframe>
            </div>
            <div class="two wide column"></div>
        </div>
        <div class="ui three column grid stackable center aligned">
            <div class="column">
                <h5>ADDRESS</h5>
                7 Sant Viçens de Montalt
                8342, Catalonia, Spain

            </div>
            <div class="column">
                <h5>QUESTIONS</h5>
                info@villablancabarcelona.com

            </div>
            <div class="column">
                <h5>KEEP IN TOUCH</h5>
                &nbsp;

            </div>
        </div>    </div>
    <br>
    <br>
</section>