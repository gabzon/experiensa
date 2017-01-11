<?php

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
            $options = array();
            // Return the array
            return apply_filters('dslc_module_options', $options, $this->module_id);
        }

        // Module Output
        function output($options)
        {
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