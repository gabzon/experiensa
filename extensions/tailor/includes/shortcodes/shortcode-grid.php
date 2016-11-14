<?php

/**
 * Posts shortcode definition.
 *
 * @package Tailor
 * @subpackage Shortcodes
 * @since 1.0.0
 */

if ( ! function_exists( 'tailor_shortcode_experiensa_grid' ) ) {

    /**
     * Defines the shortcode rendering function for the Posts element.
     *
     * @since 1.0.0
     *
     * @param array $atts
     * @param string $content
     * @param string $tag
     * @return string
     */
    function tailor_shortcode_experiensa_grid( $atts, $content = null, $tag ) {
//        var_dump($atts);
        $page_id     = get_queried_object_id();
//        var_dump($page_id);
        $post_type = $atts['posttype'];
        $category = $atts['category'];
        $terms = (($atts['terms']=='')?[]:$atts['terms']);
        $max = $atts['max'];
        $showcase_data = \Showcase::getData($post_type,$category,$terms,$max);
//        var_dump($showcase_data);

        /**
         * TextImage
         */
        $textimage['display_textimage'] = ($atts['display_textimage']=='yes'?true:false);
        $textimage['display_title'] = $atts['display_title'];
        $textimage['display_subtitle'] = $atts['display_subtitle'];
        $textimage['display_overlay'] = $atts['display_overlay'];
        $textimage['hover_animation'] = $atts['hover_animation'];
        $textimage['animation_color'] = $atts['animation_color'];
        $textimage['text_order'] = $atts['text_order'];
        $textimage['text_position'] = $atts['text_position'];
        $textimage['text_transform'] = $atts['text_transform'];
        $textimage['font_size'] = $atts['font_size'];
        $textimage['text_color'] = $atts['text_color'];
//        var_dump($textimage);
//        $textimage_obj = new \Experiensa\Component\Textimage($textimage);
//        var_dump($textimage_obj);
//        $template = get_template_directory() . '/templates/partials/showcase/grid/grid.php';
//        var_dump($templete);
//        $asd = locate_template($template);
//        var_dump($asd);
//        set_query_var('column_number',$column_number);
        set_query_var('data',$showcase_data);
        set_query_var('textimage_data',$textimage);
        ob_start();
        get_template_part("templates/partials/pruebas");
//        tailor_partial( 'pruebas', '',[
//            'data'              => $showcase_data,
//            'textimage_option' => $textimage_obj
//        ]);
        $html = ob_get_clean();
//        var_dump($html);
        return $html;
    }

    add_shortcode( 'tailor_experiensa_grid', 'tailor_shortcode_experiensa_grid' );
}