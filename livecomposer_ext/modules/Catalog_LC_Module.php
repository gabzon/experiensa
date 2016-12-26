<?php

// Check if Live Composer is active
//if ( defined( 'DS_LIVE_COMPOSER_URL' ) ) {
//    class Catalog_LC_Module extends DSLC_Module{
//        // Module Attributes
//        var $module_id = 'Catalog_LC_Module';
//        var $module_title = 'Catalog';
//        var $module_icon = 'newspaper-o';
//        var $module_category = 'Experiensa';
//        function options() {
//
//            // The options array
//            $options = array();
//
//            // Return the array
//            return apply_filters( 'dslc_module_options', $options, $this->module_id );
//
//        }
//        // Module Output
//        function output( $options ) {
//            ob_start();
//            get_template_part("templates/catalog/catalog-react");
//            $html = ob_get_clean();
//            // REQUIRED
//            $this->module_start( $options );
//            echo $html;
//            // REQUIRED
//            $this->module_end( $options );
//
//        }
//    }
//    // Register Module
//    add_action('dslc_hook_register_modules',
//        create_function('', 'return dslc_register_module( "Catalog_LC_Module" );')
//    );
//}