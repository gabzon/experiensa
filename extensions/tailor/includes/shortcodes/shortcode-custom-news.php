<?php

/**
 * Posts shortcode definition.
 *
 * @package Tailor
 * @subpackage Shortcodes
 * @since 1.0.0
 */

if ( ! function_exists( 'tailor_shortcode_news' ) ) {

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
    function tailor_shortcode_news( $atts, $content = null, $tag ) {
        $default_atts = apply_filters( 'tailor_shortcode_default_atts_' . $tag, array() );
        $atts = shortcode_atts( $default_atts, $atts, $tag );
        $html_atts = array(
            'id'            =>  empty( $atts['id'] ) ? null : $atts['id'],
            'class'         =>  explode( ' ', "tailor-element tailor-custom-content {$atts['class']}" ),
            'data'          =>  array(),
        );

        $content = '<p><b>This is a test element with all control types.</b></p>';

        $html_atts = apply_filters( 'tailor_shortcode_html_attributes', $html_atts, $atts, $tag );
        $html_atts['class'] = implode( ' ', (array) $html_atts['class'] );
        $html_atts = tailor_get_attributes( $html_atts );

        $outer_html = "<div {$html_atts}>%s</div>";
        $inner_html = '%s';
        $html = sprintf( $outer_html, sprintf( $inner_html, $content ) );

        $html = apply_filters( 'tailor_shortcode_html', $html, $outer_html, $inner_html, $html_atts, $atts, $content, $tag );

        return $html;
    }

    add_shortcode( 'tailor_experiensa_news', 'tailor_shortcode_news' );
}