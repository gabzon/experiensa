<?php

use \Experiensa\LiveComposer\Options\Catalog;
use \Experiensa\LiveComposer\Options\TextImage;
// Check if Live Composer is active
if ( defined( 'DS_LIVE_COMPOSER_URL' ) ) {
    class Catalog_LC_Module extends DSLC_Module{
        // Module Attributes
        var $module_id = 'Catalog_LC_Module';
        var $module_title = 'Catalog';
        var $module_icon = 'newspaper-o';
        var $module_category = 'Experiensa';
        function options() {

            // The options array
            $options = array(
                Catalog::type(),
                Catalog::elements(),
                TextImage::setTextFontFamily('title_font','Source Sans Pro','Title','.catalog-title'),
                TextImage::setTextFontFamily('content_font','Source Sans Pro','Content','.catalog-content'),
                TextImage::setTextFontFamily('button_font','Source Sans Pro','Button','.catalog-button'),
                TextImage::contentColor('title_text_color','#000','.catalog-title','styling','Title'),
                TextImage::contentColor('content_text_color','#000','.catalog-content','styling','Content'),
                TextImage::contentColor('button_text_color','#000','.catalog-button','styling','Button'),
                array(
                    'label' => __( 'Background', 'sage' ),
                    'id' => 'css_bg_button_group',
                    'type' => 'group',
                    'action' => 'open',
                    'section' => 'styling',
                    'tab' => __( 'Button', 'sage' )
                ),
                TextImage::backgroundColor('button_bg_color','Color','#fff','.button.catalog-button','styling','Button','background'),
                TextImage::backgroundColor('button_bg_hover_color','Color - Hover','#fff','.catalog-button:hover','styling','Button','background'),
                TextImage::backgroundColor('button_bg_active_color','Color - Active','#fff','.catalog-button:focus','styling','Button','background'),
                array(
                    'id' => 'css_bg_button_group',
                    'type' => 'group',
                    'action' => 'close',
                    'section' => 'styling',
                    'tab' => __( 'Button', 'sage' )
                ),
            );

            // Return the array
            return apply_filters( 'dslc_module_options', $options, $this->module_id );

        }
        // Module Output
        function output( $options ) {
            $type = $options['type'];
            $elements = $options['elements'];

            set_query_var('type',$type);
            set_query_var('elements',$elements);

            ob_start();
            get_template_part("templates/catalog/catalog-react");
            $html = ob_get_clean();
            // REQUIRED
            $this->module_start( $options );
            echo $html;
            // REQUIRED
            $this->module_end( $options );

        }
    }
    // Register Module
    add_action('dslc_hook_register_modules',
        create_function('', 'return dslc_register_module( "Catalog_LC_Module" );')
    );
}