<?php

use \Experiensa\LiveComposer\Options\VillaBlanca;

if ( defined( 'DS_LIVE_COMPOSER_URL' ) ) {
    class MainPageVB_LC_Module extends DSLC_Module
    {
        var $module_id = 'MainPageVB_LC_Module';
        var $module_title = 'Main Page';
        var $module_icon = 'sitemap';
        var $module_category = 'Villa Blanca';

        // Module Options
        function options()
        {
            // The options array
            $options = array(
                VillaBlanca::mainTitle(),
                VillaBlanca::mainSubTitle()
            );
            // Return the array
            return apply_filters('dslc_module_options', $options, $this->module_id);
        }

        // Module Output
        function output($options)
        {
            $title = (!empty($options['main_title'])?$options['main_title']:'Villa Blanca');
            $subtitle = (!empty($options['sub_title'])?$options['sub_title']:'<strong>Close your eyes. Imagine your dream holidays. </strong><strong>Open your eyes: welcome to Villa Blanca.</strong>');
            set_query_var('title',$title);
            set_query_var('subtitle',$subtitle);

            ob_start();
            get_template_part("templates/villa_blanca/main");
            $html = ob_get_clean();
            $this->module_start( $options );
            echo $html;
            // REQUIRED
            $this->module_end( $options );
        }
    }
    // Register Module
    add_action('dslc_hook_register_modules',
        create_function('', 'return dslc_register_module( "MainPageVB_LC_Module" );')
    );
}