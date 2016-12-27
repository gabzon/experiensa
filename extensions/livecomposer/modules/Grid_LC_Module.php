<?php

use \Experiensa\LiveComposer\Options\Query;
use \Experiensa\LiveComposer\Options\Layout;
use \Experiensa\LiveComposer\Options\Color;
use \Experiensa\LiveComposer\Options\Background;
use \Experiensa\LiveComposer\Options\TextImage;

// Check if Live Composer is active
if ( defined( 'DS_LIVE_COMPOSER_URL' ) ) {

    class Grid_LC_Module extends DSLC_Module {

        // Module Attributes
        var $module_id = 'Grid_LC_Module';
        var $module_title = 'Grid';
        var $module_icon = 'table';
        var $module_category = 'Experiensa';

        // Module Options
        function options() {

            // The options array
            $options = array(
                Query::postType('posttype'),
                Query::taxonomies('category'),
                Query::terms('terms'),
                Query::max('max','4'),
                Query::columnGrid('columns'),
                Color::titleColor(),
                Color::contentColor(),
                Background::type(),
                Background::color(),
                Background::colorInverted(),
                TextImage::display(),
                TextImage::displayTitle(),
                TextImage::displaySubtitle(),
                TextImage::displayOverlay(),
                TextImage::textOrder(),
                TextImage::fontSize(),
                TextImage::textTransform(),
                TextImage::textColor(),
                TextImage::textPosition(),
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
            $post_type = $options['posttype'];
            $category = $options['category'];
            $terms = (($options['terms']=='')?[]:$options['terms']);
            $max = $options['max'];
            $showcase_data = \Showcase::getData($post_type,$category,$terms,$max);
            if(!empty($showcase_data)){
                $textimage_option = TextImage::setTextImageOptions($options);
                $layout = Layout::setLayoutOptions($options);
                $background = Background::setBackgroundOption($options);
                $name = Query::setSectionName('grid',$category,$layout['title']);

                set_query_var('name',$name);
                set_query_var('data',$showcase_data);
                set_query_var('textimage_option',$textimage_option);
                set_query_var('layout',$layout);
                set_query_var('background',$background);
                set_query_var('column_number',$options['columns']);

                ob_start();
                get_template_part("templates/partials/showcase/grid/grid");
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
        create_function('', 'return dslc_register_module( "Grid_LC_Module" );')
    );
}