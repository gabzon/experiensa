<?php
/**
 * Template Name: New Villa Blanca Template
 */
?>
<!-- VILLA BLANCA MAIN SECTION -->
<section id="section_page_villa_blanca" class="ui vertical segment custom-section" style="height:100vh;">
    <div class="section-background " style="background:linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url('http://bnb.experiensa.com/files/2016/09/portadabuenaretocada-1.jpg') no-repeat center center fixed;background-size: cover;height:100vh;"></div>
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
    <div class="section-background " style="background:linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url('http://bnb.experiensa.com/files/2016/09/garden6.jpg') no-repeat center center fixed;background-size: cover;"></div>
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
            </div>
        </div>    </div>
    <br>
    <br>
</section>
<!--FACILITIES SECTION-->
<section id="section_component_facilities" class="ui vertical segment custom-section" style="">
    <div class="section-background " style="background:linear-gradient(rgba(0,0,0,.6),rgba(0,0,0,.6)),url('http://bnb.experiensa.com/files/2016/10/beach1.jpg') no-repeat center center fixed;background-size: cover;"></div>
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
    <div class="section-background " style="background:linear-gradient(rgba(219,63,46,0.31),rgba(219,63,46,0.31)),url('http://bnb.experiensa.com/files/2016/09/34-854x1280.jpg') no-repeat center center fixed;background-size: cover;height:100vh;"></div>
    <div class="section-content">
        <br><br><br>
        <h1 class="text-center" style="color: #FFFFFF;">Pricing</h1>
        <br>
        <div class="ui two column stackable grid centered">
            <div class="five wide column">
                <div class="ui card">
                    <div class="content">
                        <div class="center aligned header">High season</div>
                    </div>
                    <div class="center aligned content">
                        <h1 class="ui massive header">10'500<sup class="meta">€</sup></h1>
                        <div class="meta">
                            Per Week      </div>
                        <div class="description">
                            <b>From</b>
                        </div>
                        <div class="meta">
                            June 1st      </div>
                        <br>
                        <div class="description">
                            <b>To</b>
                        </div>
                        <div class="meta">
                            Sectember 30th      </div>
                    </div>
                    <div class="extra center aligned content">
                        <a href="http://bnb.experiensa.com/#villa_blanca_reservations" class="ui pink button" data-slimstat-clicked="false" data-slimstat-type="2" data-slimstat-tracking="false" data-slimstat-async="false" data-slimstat-callback="false">Get it!</a>
                    </div>
                </div>
            </div><div class="five wide column">
                <div class="ui card">
                    <div class="content">
                        <div class="center aligned header">Low season</div>
                    </div>
                    <div class="center aligned content">
                        <h1 class="ui massive header">9'0500<sup class="meta">€</sup></h1>
                        <div class="meta">
                            Per Week      </div>
                        <div class="description">
                            <b>From</b>
                        </div>
                        <div class="meta">
                            October 1st      </div>
                        <br>
                        <div class="description">
                            <b>To</b>
                        </div>
                        <div class="meta">
                            May 31th      </div>
                    </div>
                    <div class="extra center aligned content">
                        <a href="http://bnb.experiensa.com/#villa_blanca_reservations" class="ui pink button" data-slimstat-clicked="false" data-slimstat-type="2" data-slimstat-tracking="false" data-slimstat-async="false" data-slimstat-callback="false">Get it!</a>
                    </div>
                </div>
            </div>        </div>
        <br>
    </div>
</section>
<!-- RESERVATIONS SECTION -->
<section id="villa_blanca_reservations" class="ui segment vertical custom-section" style="height:100vh;">
    <div class="section-background " style="background:url('http://bnb.experiensa.com/files/2016/09/inside-08.jpg') no-repeat center center fixed;background-size: cover;height:100vh;"></div>
    <div class="section-content">
        <br>
        <br>
        <br>
        <h1 class="text-center" style="color: #FFFFFF;">Reservation</h1>
        <br>
        <div class="ui two column stackable grid centered">
            <div class="five wide column">
                <div id="reservation_datepicker" class="villa-blanca hasDatepicker"><div class="ui-datepicker-inline ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" style="display: block;"><div class="ui-datepicker-header ui-widget-header ui-helper-clearfix ui-corner-all"><a class="ui-datepicker-prev ui-corner-all" data-handler="prev" data-event="click" title="Prev" data-slimstat-clicked="false" data-slimstat-type="0" data-slimstat-tracking="true" data-slimstat-async="false" data-slimstat-callback="true"><span class="ui-icon ui-icon-circle-triangle-w">Prev</span></a><a class="ui-datepicker-next ui-corner-all" data-handler="next" data-event="click" title="Next" data-slimstat-clicked="false" data-slimstat-type="0" data-slimstat-tracking="true" data-slimstat-async="false" data-slimstat-callback="true"><span class="ui-icon ui-icon-circle-triangle-e">Next</span></a><div class="ui-datepicker-title"><span class="ui-datepicker-month">November</span>&nbsp;<span class="ui-datepicker-year">2016</span></div></div><table class="ui-datepicker-calendar"><thead><tr><th scope="col"><span title="Monday">Mo</span></th><th scope="col"><span title="Tuesday">Tu</span></th><th scope="col"><span title="Wednesday">We</span></th><th scope="col"><span title="Thursday">Th</span></th><th scope="col"><span title="Friday">Fr</span></th><th scope="col" class="ui-datepicker-week-end"><span title="Saturday">Sa</span></th><th scope="col" class="ui-datepicker-week-end"><span title="Sunday">Su</span></th></tr></thead><tbody><tr><td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" undefined" data-handler="selectDay" data-event="click" data-month="10" data-year="2016"><a class="ui-state-default" href="#" data-slimstat-clicked="false" data-slimstat-type="2" data-slimstat-tracking="false" data-slimstat-async="false" data-slimstat-callback="false">1</a></td><td class=" undefined" data-handler="selectDay" data-event="click" data-month="10" data-year="2016"><a class="ui-state-default" href="#" data-slimstat-clicked="false" data-slimstat-type="2" data-slimstat-tracking="false" data-slimstat-async="false" data-slimstat-callback="false">2</a></td><td class=" undefined" data-handler="selectDay" data-event="click" data-month="10" data-year="2016"><a class="ui-state-default" href="#" data-slimstat-clicked="false" data-slimstat-type="2" data-slimstat-tracking="false" data-slimstat-async="false" data-slimstat-callback="false">3</a></td><td class=" undefined" data-handler="selectDay" data-event="click" data-month="10" data-year="2016"><a class="ui-state-default" href="#" data-slimstat-clicked="false" data-slimstat-type="2" data-slimstat-tracking="false" data-slimstat-async="false" data-slimstat-callback="false">4</a></td><td class=" ui-datepicker-week-end undefined" data-handler="selectDay" data-event="click" data-month="10" data-year="2016"><a class="ui-state-default" href="#" data-slimstat-clicked="false" data-slimstat-type="2" data-slimstat-tracking="false" data-slimstat-async="false" data-slimstat-callback="false">5</a></td><td class=" ui-datepicker-week-end undefined" data-handler="selectDay" data-event="click" data-month="10" data-year="2016"><a class="ui-state-default" href="#" data-slimstat-clicked="false" data-slimstat-type="2" data-slimstat-tracking="false" data-slimstat-async="false" data-slimstat-callback="false">6</a></td></tr><tr><td class=" undefined" data-handler="selectDay" data-event="click" data-month="10" data-year="2016"><a class="ui-state-default" href="#" data-slimstat-clicked="false" data-slimstat-type="2" data-slimstat-tracking="false" data-slimstat-async="false" data-slimstat-callback="false">7</a></td><td class=" undefined" data-handler="selectDay" data-event="click" data-month="10" data-year="2016"><a class="ui-state-default" href="#" data-slimstat-clicked="false" data-slimstat-type="2" data-slimstat-tracking="false" data-slimstat-async="false" data-slimstat-callback="false">8</a></td><td class=" undefined" data-handler="selectDay" data-event="click" data-month="10" data-year="2016"><a class="ui-state-default" href="#" data-slimstat-clicked="false" data-slimstat-type="2" data-slimstat-tracking="false" data-slimstat-async="false" data-slimstat-callback="false">9</a></td><td class=" undefined" data-handler="selectDay" data-event="click" data-month="10" data-year="2016"><a class="ui-state-default" href="#" data-slimstat-clicked="false" data-slimstat-type="2" data-slimstat-tracking="false" data-slimstat-async="false" data-slimstat-callback="false">10</a></td><td class=" undefined" data-handler="selectDay" data-event="click" data-month="10" data-year="2016"><a class="ui-state-default" href="#" data-slimstat-clicked="false" data-slimstat-type="2" data-slimstat-tracking="false" data-slimstat-async="false" data-slimstat-callback="false">11</a></td><td class=" ui-datepicker-week-end undefined" data-handler="selectDay" data-event="click" data-month="10" data-year="2016"><a class="ui-state-default" href="#" data-slimstat-clicked="false" data-slimstat-type="2" data-slimstat-tracking="false" data-slimstat-async="false" data-slimstat-callback="false">12</a></td><td class=" ui-datepicker-week-end undefined" data-handler="selectDay" data-event="click" data-month="10" data-year="2016"><a class="ui-state-default" href="#" data-slimstat-clicked="false" data-slimstat-type="2" data-slimstat-tracking="false" data-slimstat-async="false" data-slimstat-callback="false">13</a></td></tr><tr><td class=" ui-datepicker-days-cell-over undefined ui-datepicker-current-day ui-datepicker-today" data-handler="selectDay" data-event="click" data-month="10" data-year="2016"><a class="ui-state-default ui-state-highlight ui-state-active ui-state-hover" href="#" data-slimstat-clicked="false" data-slimstat-type="2" data-slimstat-tracking="false" data-slimstat-async="false" data-slimstat-callback="false">14</a></td><td class=" undefined" data-handler="selectDay" data-event="click" data-month="10" data-year="2016"><a class="ui-state-default" href="#" data-slimstat-clicked="false" data-slimstat-type="2" data-slimstat-tracking="false" data-slimstat-async="false" data-slimstat-callback="false">15</a></td><td class=" undefined" data-handler="selectDay" data-event="click" data-month="10" data-year="2016"><a class="ui-state-default" href="#" data-slimstat-clicked="false" data-slimstat-type="2" data-slimstat-tracking="false" data-slimstat-async="false" data-slimstat-callback="false">16</a></td><td class=" undefined" data-handler="selectDay" data-event="click" data-month="10" data-year="2016"><a class="ui-state-default" href="#" data-slimstat-clicked="false" data-slimstat-type="2" data-slimstat-tracking="false" data-slimstat-async="false" data-slimstat-callback="false">17</a></td><td class=" undefined" data-handler="selectDay" data-event="click" data-month="10" data-year="2016"><a class="ui-state-default" href="#" data-slimstat-clicked="false" data-slimstat-type="2" data-slimstat-tracking="false" data-slimstat-async="false" data-slimstat-callback="false">18</a></td><td class=" ui-datepicker-week-end undefined" data-handler="selectDay" data-event="click" data-month="10" data-year="2016"><a class="ui-state-default" href="#" data-slimstat-clicked="false" data-slimstat-type="2" data-slimstat-tracking="false" data-slimstat-async="false" data-slimstat-callback="false">19</a></td><td class=" ui-datepicker-week-end undefined" data-handler="selectDay" data-event="click" data-month="10" data-year="2016"><a class="ui-state-default" href="#" data-slimstat-clicked="false" data-slimstat-type="2" data-slimstat-tracking="false" data-slimstat-async="false" data-slimstat-callback="false">20</a></td></tr><tr><td class=" undefined" data-handler="selectDay" data-event="click" data-month="10" data-year="2016"><a class="ui-state-default" href="#" data-slimstat-clicked="false" data-slimstat-type="2" data-slimstat-tracking="false" data-slimstat-async="false" data-slimstat-callback="false">21</a></td><td class=" undefined" data-handler="selectDay" data-event="click" data-month="10" data-year="2016"><a class="ui-state-default" href="#" data-slimstat-clicked="false" data-slimstat-type="2" data-slimstat-tracking="false" data-slimstat-async="false" data-slimstat-callback="false">22</a></td><td class=" undefined" data-handler="selectDay" data-event="click" data-month="10" data-year="2016"><a class="ui-state-default" href="#" data-slimstat-clicked="false" data-slimstat-type="2" data-slimstat-tracking="false" data-slimstat-async="false" data-slimstat-callback="false">23</a></td><td class=" undefined" data-handler="selectDay" data-event="click" data-month="10" data-year="2016"><a class="ui-state-default" href="#" data-slimstat-clicked="false" data-slimstat-type="2" data-slimstat-tracking="false" data-slimstat-async="false" data-slimstat-callback="false">24</a></td><td class=" undefined" data-handler="selectDay" data-event="click" data-month="10" data-year="2016"><a class="ui-state-default" href="#" data-slimstat-clicked="false" data-slimstat-type="2" data-slimstat-tracking="false" data-slimstat-async="false" data-slimstat-callback="false">25</a></td><td class=" ui-datepicker-week-end undefined" data-handler="selectDay" data-event="click" data-month="10" data-year="2016"><a class="ui-state-default" href="#" data-slimstat-clicked="false" data-slimstat-type="2" data-slimstat-tracking="false" data-slimstat-async="false" data-slimstat-callback="false">26</a></td><td class=" ui-datepicker-week-end undefined" data-handler="selectDay" data-event="click" data-month="10" data-year="2016"><a class="ui-state-default" href="#" data-slimstat-clicked="false" data-slimstat-type="2" data-slimstat-tracking="false" data-slimstat-async="false" data-slimstat-callback="false">27</a></td></tr><tr><td class=" undefined" data-handler="selectDay" data-event="click" data-month="10" data-year="2016"><a class="ui-state-default" href="#" data-slimstat-clicked="false" data-slimstat-type="2" data-slimstat-tracking="false" data-slimstat-async="false" data-slimstat-callback="false">28</a></td><td class=" undefined" data-handler="selectDay" data-event="click" data-month="10" data-year="2016"><a class="ui-state-default" href="#" data-slimstat-clicked="false" data-slimstat-type="2" data-slimstat-tracking="false" data-slimstat-async="false" data-slimstat-callback="false">29</a></td><td class=" undefined" data-handler="selectDay" data-event="click" data-month="10" data-year="2016"><a class="ui-state-default" href="#" data-slimstat-clicked="false" data-slimstat-type="2" data-slimstat-tracking="false" data-slimstat-async="false" data-slimstat-callback="false">30</a></td><td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" ui-datepicker-week-end ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td><td class=" ui-datepicker-week-end ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td></tr></tbody></table></div></div>
            </div>
            <div class="five wide column">
                <form class="ui form" type="post" action="" id="newReservation">
                    <div class="field">
                        <div class="ui left icon input fluid">
                            <input type="text" name="fullname" placeholder="Full name" required="">
                            <i class="user icon"></i>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input fluid">
                            <input name="email" type="text" placeholder="Email" required="">
                            <i class="envelope icon"></i>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="field" style="width: 50%;">
                            <div class="ui left icon input">
                                <input name="reservation_start" id="reservation_start" type="text" class="villa-blanca hasDatepicker" placeholder="Start Date" required="">
                                <i class="calendar icon"></i>
                            </div>
                        </div>
                        <div class="field" style="width: 50%;">
                            <div class="ui left icon input">
                                <input name="reservation_end" id="reservation_end" type="text" class="villa-blanca hasDatepicker" placeholder="End Date" required="">
                                <i class="calendar icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <textarea rows="4" name="comments" placeholder="Comments"></textarea>
                    </div>
                    <input type="hidden" name="action" value="requestReservation">
                    <input type="hidden" name="agency_email" value="info@experiensa.com">
                    <input type="hidden" id="reservation_date" name="reservation_date" value="14/11/2016">
                    <input id="form-submit" type="submit" class="ui button pink" value="Send a Reservation">
                </form>            <br><br>
                <div id="reservationFeedback" style="display: none;">0</div>
                <br><br>
            </div>
        </div>
        <br>
    </div>
</section>
<!--TESTIMONIAL SECTION-->
<section id="section_component_testimonials" class="ui vertical segment custom-section" style="">
    <div class="section-background " style="background:linear-gradient(rgba(0,0,0,.6),rgba(0,0,0,.6)),url('http://bnb.experiensa.com/files/2016/09/inside-01.jpg') no-repeat center center fixed;background-size: cover;"></div>
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
    <div class="section-background " style="background:url('http://bnb.experiensa.com/files/2016/09/chairs.jpg') no-repeat center center fixed;background-size: cover;"></div>
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