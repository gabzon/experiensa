<?php

if ( ! defined( 'WPINC' ) ) {
    die;
}
if ( class_exists( 'Tailor_Element' ) && ! class_exists( 'Tailor_Custom_News_Element' ) ) {
    class Tailor_Custom_News_Element extends Tailor_Element {
        protected function register_controls() {
            $this->add_section( 'query', array(
                'title'                 =>  __( 'Query' ),
                'priority'              =>  10,
            ) );

            $priority = 0;
            $query_control_types = array(
                'categories',
                'tags',
                'order_by',
                'order',
                'offset',
            );
            $query_control_arguments = array();
            tailor_control_presets( $this, $query_control_types, $query_control_arguments, $priority );

        }
        public function generate_css( $atts = array() ) {
            $css_rules = array();
            $excluded_control_types = array();
            $css_rules = tailor_css_presets( $css_rules, $atts, $excluded_control_types );

            return $css_rules;
        }
    }
}