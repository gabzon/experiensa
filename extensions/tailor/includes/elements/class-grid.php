<?php

if ( ! defined( 'WPINC' ) ) {
    die;
}
if ( class_exists( 'Tailor_Element' ) && ! class_exists( 'Tailor_Custom_Grid_Element' ) ) {
    class Tailor_Custom_Grid_Element extends Tailor_Element {
        protected function register_controls() {
            /**
             * Query Section
             */
            $this->add_section( 'query', array(
                'title'                 =>  __( 'Query' ),
                'priority'              =>  10,
            ) );
            /**
             * Query Settings and Controls
             */
            $priority = 0;
            $this->add_setting( 'posttype', array(
                'sanitize_callback'     =>  'tailor_sanitize_text',
                'default'               =>  'none',
            ) );
            $this->add_control( 'posttype', array(
                'label'                 =>  __( 'Post Type', 'sage' ),
                'type'                  =>  'select',
                'choices'               =>  \Experiensa\Modules\QueryBuilder::getPostTypes(),
                'section'               =>  'query',
                'priority'              =>  $priority += 10,
            ) );
            $this->add_setting( 'category', array(
                'sanitize_callback'     =>  'tailor_sanitize_text',
                'default'               =>  'location',
            ) );
            $this->add_control( 'category', array(
                'label'                 =>  __( 'Category', 'sage' ),
                'type'                  =>  'select',
                'choices'               =>  \Experiensa\Modules\QueryBuilder::getTaxonomies(),
                'section'               =>  'query',
                'priority'              =>  $priority += 10,
            ) );
            $this->add_setting( 'terms', array(
                'sanitize_callback'     =>  'tailor_sanitize_text',
                'default'               =>  ''
            ) );
            $this->add_control( 'terms', array(
                'label'                 =>  __( 'Categories', 'sage' ),
                'type'                  =>  'text',
                'section'               =>  'query',
                'priority'              =>  $priority += 10,
            ) );
            $this->add_setting( 'max', array(
                'sanitize_callback'     =>  'tailor_sanitize_text',
                'default'               =>  '2',
            ) );
            $this->add_control( 'max', array(
                'label'                 =>  __( 'Max post #', 'sage' ),
                'type'                  =>  'range',
                'section'               =>  'query',
                'input_attrs' => array(
                    'min' => -1,
                    'max' => 50,
                    'step' => 1,
                ),
                'priority'              =>  $priority += 10,
            ) );
            $this->add_setting( 'columns', array(
                'sanitize_callback'     =>  'tailor_sanitize_text',
                'default'               =>  'four',
            ) );
            $this->add_control( 'columns', array(
                'label'                 =>  __( 'Column #', 'sage' ),
                'type'                  =>  'select',
                'section'               =>  'query',
                'choices'               =>  array(
                    'eight' => '2',
                    'five'  => '3',
                    'four'  => '4',
                    'three' => '5',
                    'two'   => '8',
                ),
                'priority'              =>  $priority += 10,
            ) );
            /**
             * TextImage Section
             */
            $this->add_section( 'textimage', array(
                'title'                 =>  __( 'TextImage' ),
                'priority'              =>  10,
            ) );
            /**
             * TextImage Settings and Controls
             */
            $priority = 0;
            $this->add_setting( 'display_textimage', array(
                'sanitize_callback'     =>  'tailor_sanitize_text',
                'default'               =>  'yes',
            ) );
            $this->add_control( 'display_textimage', array(
                'label'                 =>  __( 'Display TextImage?', 'sage' ),
                'type'                  =>  'select',
                'choices'               =>  array(
                    'yes' => __('Yes', 'sage'),
                    'no'  => __('No', 'sage'),
                ),
                'section'               =>  'textimage',
                'priority'              =>  $priority += 10,
            ) );
            $this->add_setting( 'display_title', array(
                'sanitize_callback'     =>  'tailor_sanitize_text',
                'default'               =>  'yes',
            ) );
            $this->add_control( 'display_title', array(
                'label'                 =>  __( 'Display Title?', 'sage' ),
                'type'                  =>  'select',
                'choices'               =>  array(
                    'yes' => __('Yes', 'sage'),
                    'no'  => __('No', 'sage'),
                ),
                'section'               =>  'textimage',
                'priority'              =>  $priority += 10,
            ) );
            $this->add_setting( 'display_subtitle', array(
                'sanitize_callback'     =>  'tailor_sanitize_text',
                'default'               =>  'yes',
            ) );
            $this->add_control( 'display_subtitle', array(
                'label'                 =>  __( 'Display Subtitle?', 'sage' ),
                'type'                  =>  'select',
                'choices'               =>   array(
                    'yes' => __('Yes', 'sage'),
                    'no'  => __('No', 'sage'),
                ),
                'section'               =>  'textimage',
                'priority'              =>  $priority += 10,
            ) );
            $this->add_setting( 'display_overlay', array(
                'sanitize_callback'     =>  'tailor_sanitize_text',
                'default'               =>  'yes',
            ) );
            $this->add_control( 'display_overlay', array(
                'label'                 =>  __( 'Display Overlay?', 'sage' ),
                'type'                  =>  'select',
                'choices'               =>  array(
                    'yes' => __('Yes', 'sage'),
                    'no'  => __('No', 'sage'),
                ),
                'section'               =>  'textimage',
                'priority'              =>  $priority += 10,
            ) );
            $this->add_setting( 'hover_animation', array(
                'sanitize_callback'     =>  'tailor_sanitize_text',
                'default'               =>  'imghvr-fade',
            ) );
            $this->add_control( 'hover_animation', array(
                'label'                 =>  __( 'Hover Animation', 'sage' ),
                'type'                  =>  'select',
                'choices'               =>  Helpers::getHoverEffectList(),
                'section'               =>  'textimage',
                'priority'              =>  $priority += 10,
            ) );
            $this->add_setting( 'animation_color', array(
                'sanitize_callback'     =>  'tailor_sanitize_text',
                'default'               =>  '#FFFFFF',
            ) );
            $this->add_control( 'animation_color', array(
                'label'                 =>  __( 'Hover Animation Color', 'sage' ),
                'type'                  =>  'colorpicker',
                'section'               =>  'textimage',
                'priority'              =>  $priority += 10,
            ) );
            $this->add_setting( 'text_order', array(
                'sanitize_callback'     =>  'tailor_sanitize_text',
                'default'               =>  'title_first',
            ) );
            $this->add_control( 'text_order', array(
                'label'                 =>  __( 'Display Title?', 'sage' ),
                'type'                  =>  'select',
                'choices'               => array(
                    'title_first'              => __('Title First','sage'),
                    'subtitle_first'           => __('Subtitle First','sage')
                ),
                'section'               =>  'textimage',
                'priority'              =>  $priority += 10,
            ) );
            $this->add_setting( 'font_size', array(
                'sanitize_callback'     =>  'tailor_sanitize_text',
                'default'               =>  '0.3',
            ) );
            $this->add_control( 'font_size', array(
                'label'                 =>  __( 'Text Size', 'sage' ),
                'type'                  =>  'range',
                'section'               =>  'textimage',
                'input_attrs' => array(
                    'min' => 0.1,
                    'max' => 3,
                    'step' => 0.1,
                ),
                'priority'              =>  $priority += 10,
            ) );
            $this->add_setting( 'text_transform', array(
                'sanitize_callback'     =>  'tailor_sanitize_text',
                'default'               =>  'capitalize',
            ) );
            $this->add_control( 'text_transform', array(
                'label'   => __('Text Transtransform', 'sage'),
                'type'    => 'select',
                'section' => 'textimage',
                'choices' => array(
                    'uppercase'  => __('Uppercase', 'sage'),
                    'lowercase'  => __('Lowercase', 'sage'),
                    'capitalize' => __('Capitalize', 'sage')
                ),
                'priority'              =>  $priority += 10,
            ) );
            $this->add_setting( 'text_color', array(
                'sanitize_callback'     =>  'tailor_sanitize_text',
                'default'               =>  '#FFFFFF',
            ) );
            $this->add_control( 'text_color', array(
                'label'                 =>  __( 'Text Color', 'sage' ),
                'type'                  =>  'colorpicker',
                'section'               =>  'textimage',
                'priority'              =>  $priority += 10,
            ) );
            $this->add_setting( 'text_position', array(
                'sanitize_callback'     =>  'tailor_sanitize_text',
                'default'               =>  'center_middle',
            ) );
            $this->add_control( 'text_position', array(
                'label'                 =>  __( 'Text Position', 'sage' ),
                'type'                  =>  'select',
                'section'               =>  'textimage',
                'choices'               =>  array(
                    'top_left'      => __('Top & Left', 'sage'),
                    'center_left'   => __('Center & Left', 'sage'),
                    'bottom_left'   => __('Bottom & Left', 'sage'),
                    'top_middle'    => __('Top & Middle', 'sage'),
                    'center_middle' => __('Center & Middle', 'sage'),
                    'bottom_middle' => __('Bottom & Middle', 'sage'),
                    'top_right'     => __('Top & Right', 'sage'),
                    'center_right'  => __('Center & Right', 'sage'),
                    'bottom_right'  => __('Bottom & Right', 'sage')
                ),
                'priority'              =>  $priority += 10,
            ) );
        }

        public function generate_css( $atts = array() ) {
            $css_rules = array();
            $excluded_control_types = array();

            // Just generate the default setting CSS
            $css_rules = tailor_css_presets( $css_rules, $atts, $excluded_control_types );
            return $css_rules;
        }
    }
}