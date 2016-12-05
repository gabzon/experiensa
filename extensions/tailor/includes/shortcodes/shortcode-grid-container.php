<?php

/**
 * Posts shortcode definition.
 *
 * @package Tailor
 * @subpackage Shortcodes
 * @since 1.0.0
 */

if ( ! function_exists( 'tailor_shortcode_experiensa_grid_container' ) ) {

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
    function tailor_shortcode_experiensa_grid_container( $atts, $content = null, $tag ) {
        echo "mis atts<br>";
        var_dump($atts);
        echo "mis content<br>";
        var_dump($content);
        echo "mis tag<br>";
        var_dump($tag);
        $default_atts = apply_filters( 'tailor_shortcode_default_atts_' . $tag, array() );
        $atts = shortcode_atts( $default_atts, $atts, $tag );
        $html_atts = array(
            'id'            =>  empty( $atts['id'] ) ? null : $atts['id'],
            'class'         =>  explode( ' ', "tailor-element tailor-custom-container {$atts['class']}" ),
            'data'          =>  array(),
        );

        /**
         * Filter the HTML attributes for the element.
         *
         * @param array $html_attributes
         * @param array $atts
         * @param string $tag
         */
        $html_atts = apply_filters( 'tailor_shortcode_html_attributes', $html_atts, $atts, $tag );
        $html_atts['class'] = implode( ' ', (array) $html_atts['class'] );
        $html_atts = tailor_get_attributes( $html_atts );

        $outer_html = "<div {$html_atts}>%s</div>";
        $inner_html = '%s';
        $content = do_shortcode( $content );
        $html = sprintf( $outer_html, sprintf( $inner_html, $content ) );
//        echo "mis innet_html<br>";
//        var_dump($inner_html);
//        echo "mis html<br>";
//        var_dump($html);

        /**
         * Filter the HTML for the element.
         *
         * @param string $html
         * @param string $outer_html
         * @param string $inner_html
         * @param string $html_atts
         * @param array $atts
         * @param string $content
         * @param string $tag
         */
        $html = apply_filters( 'tailor_shortcode_html', $html, $outer_html, $inner_html, $html_atts, $atts, $content, $tag );

        return $html;
    }

    add_shortcode( 'tailor_experiensa_grid_container', 'tailor_shortcode_experiensa_grid_container' );
}