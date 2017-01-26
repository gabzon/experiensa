<?php

namespace Configuration\Customizer;


class General
{
    private $wp_customize;
    function __construct($wp_customize){
        $this->wp_customize = $wp_customize;
    }
    public function create_components(){
        $this->add_section();
        $this->add_settings();
        $this->add_controls();
    }
    /**
     * Create General Section
     */
    public function add_section(){
        $general_section = [
            'title'      => __('General Design','sage'),
            'priority'   => 10,
            'panel'     => 'experiensa_design'
        ];
        $this->wp_customize->add_section( 'experiensa_general_design'  , $general_section );
    }
    /**
     * Define settings
     */
    public function add_settings(){
        $this->wp_customize->add_setting( 'website_color' , array(
            'default'     => '',
            'transport'   => 'refresh',
        ) );
        $this->wp_customize->add_setting( 'agency_catalog_template' , array(
            'default'     => 'simple-grid',
            'transport'   => 'refresh',
        ) );
    }
    /**
     * Create setting controls
     */
    public function add_controls()
    {
        $this->wp_customize->add_control(
            'website_color',
            array(
                'label' => __('Website Color', 'sage'),
                'section' => 'experiensa_general_design',
                'settings' => 'website_color',
                'type' => 'select',
                'choices' => array(
                    ''              => __('Default (White)','sage'),
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
                ),
            )
        );
        $this->wp_customize->add_control(
            'agency_catalog_template',
            array(
                'label' => __('Catalog template', 'sage'),
                'section' => 'experiensa_general_design',
                'settings' => 'agency_catalog_template',
                'type' => 'select',
                'choices' => array(
                    'simple-grid'   =>  __('Simple Grid','sage'),
                    'isotope-grid'  =>  __('Isotope Grid','sage'),
                    'partners-api'  =>  __('Partners API','sage'),
                    'cards'         =>  __('Cards','sage'),
                    'minimalist'    =>  __('Minimalist','sage'),
                    'pinterest'     =>  __('Pinterest','sage'),
                ),
            )
        );
    }
}