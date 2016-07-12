<?php

namespace Configuration\Customizer\Footer;

class Footer{
    private $wp_customize;
    function __construct($wp_customize){
        $this->wp_customize = $wp_customize;
    }
    public function create_components(){
        $this->add_section();
        $this->add_settings();
        $this->add_controls();
    }
    public function add_section(){
        $footer_section = [
            'title'      => __('Footer Design','sage'),
            'priority'   => 30,
            'panel'     => 'experiensa_design'
        ];
        $this->wp_customize->add_section( 'experiensa_footer_design'  , $footer_section );
    }
    public function add_settings(){
        $this->wp_customize->add_setting( 'footer_layout' , array(
            'default'     => 'odin',
            'transport'   => 'refresh',
        ) );
        $this->wp_customize->add_setting( 'display_footer_logo' , array(
            'default'     => 'true',
            'transport'   => 'refresh',
        ) );
        $this->wp_customize->add_setting( 'footer_logo_size' , array(
            'default'     => 'tiny',
            'transport'   => 'refresh',
        ) );
        $this->wp_customize->add_setting( 'footer_company_tagline' , array(
            'default'     => 'true',
            'transport'   => 'refresh',
        ) );
        $this->wp_customize->add_setting( 'footer_container' , array(
            'default'     => 'container',
            'transport'   => 'refresh',
        ) );
        $this->wp_customize->add_setting( 'footer_background_color' , array(
            'default'     => '#1B1C1D',
            'transport'   => 'refresh',
        ) );
        $this->wp_customize->add_setting( 'footer_font_color' , array(
            'default'     => '#ffffff',
            'transport'   => 'refresh',
        ) );
    }
    public function add_controls()
    {
        $this->wp_customize->add_control(
            'footer_layout',
            array(
                'label'    => __('Footer Layout', 'sage'),
                'section'  => 'experiensa_footer_design',
                'settings' => 'footer_layout',
                'type'     => 'select',
                'choices'  => array(
                    'baldur'    => __('Baldur', 'sage'),
                    'borr'      => __('Borr', 'sage'),
                    'freyja'    => __('Freyja', 'sage'),
                    'lofn'      => __('Lofn', 'sage'),
                    'loki'      => __('Loki', 'sage'),
                    'odin'      => __('Odin', 'sage'),
                    'thor'      => __('Thor', 'sage'),
                    'yggdrasil' => __('Yggdrasil', 'sage')
                )
            )
        );
        $this->wp_customize->add_control(
            'display_footer_logo',
            array(
                'label'    => __('Display Website Logo', 'sage'),
                'section'  => 'experiensa_footer_design',
                'settings' => 'display_footer_logo',
                'type'     => 'select',
                'choices'  => array(
                    'true'  => __('Yes', 'sage'),
                    'false' => __('No', 'sage')
                )
            )
        );
        $this->wp_customize->add_control(
            'footer_logo_size',
            array(
                'label'           => __('Logo size', 'sage'),
                'section'         => 'experiensa_footer_design',
                'settings'        => 'footer_logo_size',
                'type'            => 'select',
                'active_callback' => 'display_footer_logo_callback',
                'choices'         => array(
                    'mini'  => __('Mini (35px)', 'sage'),
                    'tiny'  => __('Tiny (80px)', 'sage'),
                    'small' => __('Small (150px)', 'sage')
                ),
            )
        );
        $this->wp_customize->add_control(
            'footer_company_tagline',
            array(
                'label'           => __('Display Slogan', 'sage'),
                'section'         => 'experiensa_footer_design',
                'settings'        => 'footer_company_tagline',
                'type'            => 'checkbox',
                'active_callback' => 'display_footer_logo_callback',
                'choices'         => array(
                    'true' => __('Display Slogan', 'sage')
                ),
            )
        );
        $this->wp_customize->add_control(
            'footer_container',
            array(
                'label'    => __('Footer Container', 'sage'),
                'section'  => 'experiensa_footer_design',
                'settings' => 'footer_container',
                'type'     => 'select',
                'choices'  => array(
                    'container' => __('Contained', 'sage'),
                    'full'      => __('Full Width', 'sage')
                )
            )
        );
        $this->wp_customize->add_control(
            new \WP_Customize_Color_Control(
                $this->wp_customize,
                'footer_background_color',
                array(
                    'label'    => __('Background Color', 'sage'),
                    'section'  => 'experiensa_footer_design',
                    'settings' => 'footer_background_color'
                )
            )
        );
        $this->wp_customize->add_control(
            new \WP_Customize_Color_Control(
                $this->wp_customize,
                'footer_font_color',
                array(
                    'label'    => __('Font Color', 'sage'),
                    'section'  => 'experiensa_footer_design',
                    'settings' => 'footer_font_color'
                )
            )
        );
    }
}
