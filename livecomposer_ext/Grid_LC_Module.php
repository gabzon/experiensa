<?php

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
                \Experiensa\LiveComposer\Options\Query::postType('posttype'),
                \Experiensa\LiveComposer\Options\Query::taxonomies('category'),
                \Experiensa\LiveComposer\Options\Query::terms('terms'),
                \Experiensa\LiveComposer\Options\Query::max('max'),
                \Experiensa\LiveComposer\Options\Query::columnGrid('columns'),
                \Experiensa\LiveComposer\Options\TextImage::display(),
                \Experiensa\LiveComposer\Options\TextImage::displayTitle(),
                \Experiensa\LiveComposer\Options\TextImage::displaySubtitle(),
                \Experiensa\LiveComposer\Options\TextImage::displayOverlay(),
//                \Experiensa\LiveComposer\Options\TextImage::hoverAnimation()
                \Experiensa\LiveComposer\Options\TextImage::textOrder(),
                \Experiensa\LiveComposer\Options\TextImage::fontSize(),
                \Experiensa\LiveComposer\Options\TextImage::textTransform(),
                \Experiensa\LiveComposer\Options\TextImage::textColor(),
                \Experiensa\LiveComposer\Options\TextImage::textPosition(),
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
            /**
             * TextImage
             */
            $textimage['display_textimage'] = ($options['display_textimage']=='yes'?true:false);
            $textimage['display_title'] = $options['display_title'];
            $textimage['display_subtitle'] = $options['display_subtitle'];
            $textimage['display_overlay'] = $options['display_overlay'];
            $textimage['hover_animation'] = 'imghvr-fade';//$options['hover_animation'];
            $textimage['animation_color'] = "#000";//$options['animation_color'];
            $textimage['text_order'] = $options['text_order'];
            $textimage['text_position'] = $options['text_position'];
            $textimage['text_transform'] = $options['text_transform'];
            $textimage['font_size'] = $options['font_size'];
            $textimage['text_color'] = $options['text_color'];
            $textimage_obj = new \Experiensa\Component\Textimage($textimage);
//            var_dump($textimage);
            set_query_var('column_number',$options['columns']);
            set_query_var('component','grid');
            set_query_var('data',$showcase_data);
            set_query_var('textimage_data',$textimage);

//            var_dump($showcase_data);
            if(!empty($showcase_data)) {
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