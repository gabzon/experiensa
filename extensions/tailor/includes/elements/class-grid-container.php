<?php

if ( ! defined( 'WPINC' ) ) {
    die;
}
if ( class_exists( 'Tailor_Element' ) && ! class_exists( 'Tailor_Custom_Grid_Container_Element' ) ) {
    class Tailor_Custom_Grid_Container_Element extends Tailor_Element {
        protected function register_controls() {
            /**
             * Layout Section
             */
            $this->add_section( 'layout', array(
                'title'                 =>  __( 'Layout' ),
                'priority'              =>  10,
            ) );
            $this->add_setting( 'container', array(
                'sanitize_callback'     =>  'tailor_sanitize_text',
                'default'               =>  '',
            ) );
            $this->add_control( 'container', array(
                'label'                 =>  __( 'Container Type', 'sage' ),
                'type'                  =>  'select',
                'choices'               =>   array(
                    ''              => __('Full width','sage'),
                    'container'     => __('Container','sage'),
                ),
                'section'               =>  'layout',
            ) );
            $this->add_setting( 'title_alignment', array(
                'sanitize_callback'     =>  'tailor_sanitize_text',
                'default'               =>  'center',
            ) );
            $this->add_control( 'title_alignment', array(
                'label'                 =>  __( 'Title & Tagline Alignment', 'sage' ),
                'type'                  =>  'select',
                'choices'               =>   array(
                    'center'     => __('Center','sage'),
                    'left'       => __('Left','sage'),
                    'right'      => __('Right','sage')
                ),
                'section'               =>  'layout',
            ) );
            $this->add_setting( 'segment_title', array(
                'sanitize_callback'     =>  'tailor_sanitize_text'
            ) );
            $this->add_control( 'segment_title', array(
                'label'                 =>  __( 'Segment Title', 'sage' ),
                'type'                  =>  'text',
                'section'               =>  'layout',
            ) );
            $this->add_setting( 'segment_subtitle', array(
                'sanitize_callback'     =>  'tailor_sanitize_text',
            ) );
            $this->add_control( 'segment_subtitle', array(
                'label'                 =>  __( 'Segment Subtitle', 'sage' ),
                'type'                  =>  'text',
                'section'               =>  'layout',
            ) );
            /**
             * Colors Section
             */
            $this->add_section( 'colors', array(
                'title'                 =>  __( 'Colors' ),
                'priority'              =>  30,
            ) );
            $this->add_setting( 'title_color', array(
                'sanitize_callback'     =>  'tailor_sanitize_color',
                'default'               =>  '#FFFFFF',
            ) );
            $this->add_control( 'title_color', array(
                'label'                 =>  __( 'Title Color', 'sage' ),
                'type'                  =>  'colorpicker',
                'section'               =>  'colors',
            ) );
            $this->add_setting( 'content_color', array(
                'sanitize_callback'     =>  'tailor_sanitize_color',
                'default'               =>  '#FFFFFF',
            ) );
            $this->add_control( 'content_color', array(
                'label'                 =>  __( 'Content Color', 'sage' ),
                'type'                  =>  'colorpicker',
                'section'               =>  'colors',
            ) );
            /**
             * Background Section
             */
            $this->add_section( 'background', array(
                'title'                 =>  __( 'Background' ),
                'priority'              =>  40,
            ) );
            $this->add_setting( 'background_type_showcase', array(
                'sanitize_callback'     =>  'tailor_sanitize_text',
                'default'               =>  'color',
            ) );
            $priority = 0;
            $this->add_control( 'background_type_showcase', array(
                'label'                 =>  __( 'Background Type', 'sage' ),
                'type'                  =>  'select',
                'choices'               =>   array(
                    'color'   => __('Color', 'sage'),
                    'texture' => __('Texture', 'sage'),
                    'image'   => __('Image', 'sage')
                ),
                'section'               =>  'background',
                'priority'              =>  $priority += 10,
            ) );
            $this->add_setting( 'background_color_showcase', array(
                'sanitize_callback'     =>  'tailor_sanitize_text',
                'default'               =>  '',
            ) );
            $this->add_control( 'background_color_showcase', array(
                'label'                 =>  __( 'Color', 'sage' ),
                'type'                  =>  'select',
                'choices'               =>   array(
                    ''              => __('No Color','sage'),
                    'red'           => __('Red','sage'),
                    'orange'        => __('Orange','sage'),
                    'yellow'        => __('Yellow','sage'),
                    'olive'         => __('Olive','sage'),
                    'green'         => __('Green','sage'),
                    'teal'          => __('Teal','sage'),
                    'blue'          => __('Blue','sage'),
                    'violet'        => __('Violet','sage'),
                    'purple'        => __('Purple','sage'),
                    'pink'          => __('Pink','sage'),
                    'brown'         => __('Brown','sage'),
                    'grey'          => __('Grey','sage'),
                    'black'         => __('Black','sage'),
                    'website'       => __('Default website','sage'),
                ),
                'section'               =>  'background',
                'priority'              =>  $priority += 10,
            ) );
            $this->add_setting( 'color_inverted_showcase', array(
                'sanitize_callback'     =>  'tailor_sanitize_text',
                'default'               =>  '',
            ) );
            $this->add_control( 'color_inverted_showcase', array(
                'label'                 =>  __( 'Background style', 'sage' ),
                'type'                  =>  'select',
                'choices'               =>   array(
                    ''         => __('Simple', 'sage'),
                    'inverted' => __('Inverted color', 'sage')
                ),
                'section'               =>  'background',
                'priority'              =>  $priority += 10,
            ) );
        }

        public function generate_css( $atts = array() ) {
            $css_rules = array();
            $excluded_control_types = array();
            $css_rules = tailor_css_presets( $css_rules, $atts, $excluded_control_types );

            return $css_rules;
        }
    }
}