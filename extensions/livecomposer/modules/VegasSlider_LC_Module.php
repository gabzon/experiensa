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
        var $module_icon = 'desktop';
        var $module_category = 'Experiensa';
        // Module Options
        function options() {

            // The options array
            $options = array(
                Query::postType('posttype','attachment'),
                Query::taxonomies('category','media_category'),
                Query::terms('terms','landing'),
                Query::max('max','5'),
                Color::titleColor('title_color','#FFFFFF'),
                Color::contentColor('content_color','#FFFFFF'),
                Layout::showTitle(),
                Layout::title(),
                Layout::showSubtitle(),
                Layout::subtitle(),
            );

            // Return the array
            return apply_filters( 'dslc_module_options', $options, $this->module_id );
        }
        // Module Output
        function output( $options ) {
            $post_type = [$options['posttype']];
            $category = $options['category'];
            $terms = explode(',',$options['terms']);
            $max = $options['max'];
            $slider = new Slider('vegas',$post_type,$category,$terms,false,$max);
            if($slider->checkExistData()){
                $showcase_data = $slider->getImages();
                $options['container'] = 'full';
                $options['title_alignment'] = 'center';
                $layout = Layout::setLayoutOptions($options);
                $name = Query::setSectionName('vegas',$category,$layout['title']);

                set_query_var('name',$name);
                set_query_var('data',$showcase_data);
                set_query_var('layout',$layout);
                set_query_var('title_color',"color:".$options['title_color']." !important;");
                set_query_var('subtitle_color',"color:".$options['content_color']." !important;");

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