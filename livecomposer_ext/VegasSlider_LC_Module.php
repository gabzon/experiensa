<?php

use \Experiensa\LiveComposer\Options\Query;
use \Experiensa\LiveComposer\Options\Layout;
use \Experiensa\LiveComposer\Options\Color;
use \Experiensa\LiveComposer\Options\Background;
use \Experiensa\Component\Slider;
// Check if Live Composer is active
if ( defined( 'DS_LIVE_COMPOSER_URL' ) ) {
    class VegasSlider_LC_Module extends DSLC_Module{
        // Module Attributes
        var $module_id = 'VegasSlider_LC_Module';
        var $module_title = 'Vegas Slider';
        var $module_icon = 'th';
        var $module_category = 'Experiensa';
        // Module Options
        function options() {

            // The options array
            $options = array(
                Query::postType('posttype','attachment'),
                Query::taxonomies('category','media_category'),
                Query::terms('terms','landing'),
//                Query::max('max','5'),
                Color::titleColor(),
                Color::contentColor(),
                Background::type(),
                Background::color(),
                Background::colorInverted(),
                Layout::container(),
                Layout::showTitle(),
                Layout::title(),
                Layout::subtitle(),
                Layout::showSubtitle(),
                Layout::titleAlignment(),
            );

            // Return the array
            return apply_filters( 'dslc_module_options', $options, $this->module_id );
        }
        // Module Output
        function output( $options ) {
            $post_type = [$options['posttype']];
            $category = $options['category'];
            $terms = explode(',',$options['terms']);
            $slider = new Slider('vegas',$post_type,$category,$terms);
            if($slider->checkExistData()){
                $showcase_data = $slider->getImages();
                $layout = Layout::setLayoutOptions($options);
                $background = Background::setBackgroundOption($options);
                $name = Query::setSectionName('vegas',$category,$layout['title']);

                set_query_var('name',$name);
                set_query_var('data',$showcase_data);
                set_query_var('layout',$layout);
                set_query_var('background',$background);
                set_query_var('message','HOLA MUNDO');

                ob_start();
                get_template_part("templates/partials/slider/vegas");
                $html = ob_get_clean();
            }else{
                $html = "<h2>".__('Empty Data','sage')."</h2>";
            }
            // REQUIRED
            $this->module_start( $options );
            echo $html;
            // REQUIRED
            $this->module_end( $options );

        }
    }
    // Register Module
    add_action('dslc_hook_register_modules',
        create_function('', 'return dslc_register_module( "VegasSlider_LC_Module" );')
    );
}