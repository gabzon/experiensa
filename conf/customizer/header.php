<?php

namespace Configuration\Customizer\Header;

class Header{
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
        $header_section = [
            'title'      => __('Header Design','sage'),
            'priority'   => 30,
            'panel'     => 'experiensa_design'
        ];
        $this->wp_customize->add_section( 'experiensa_header_design'  , $header_section );
    }
    public function add_settings(){
        $this->wp_customize->add_setting( 'header_style' , array(
            'default'     => 'fodla',
            'transport'   => 'refresh',
        ) );
        $this->wp_customize->add_setting( 'header_logo_size' , array(
            'default'     => 'tiny',
            'transport'   => 'refresh',
        ) );
        $this->wp_customize->add_setting( 'header_company_name' , array(
            'default'     => 'TRUE',
            'transport'   => 'refresh',
        ) );
        $this->wp_customize->add_setting( 'header_company_tagline' , array(
            'default'     => 'TRUE',
            'transport'   => 'refresh',
        ) );
        $this->wp_customize->add_setting( 'header_background' , array(
            'default'     => 'inverted',
            'transport'   => 'refresh',
        ) );
        $this->wp_customize->add_setting( 'header_menu_style' , array(
            'default'     => 'fixed',
            'transport'   => 'refresh',
        ) );
        $this->wp_customize->add_setting( 'header_menu_options' , array(
            'default'     => '',
            'transport'   => 'refresh',
        ) );
        $this->wp_customize->add_setting( 'header_color_fill' , array(
            'default'     => 'inverted',
            'transport'   => 'refresh',
        ) );
        /* ****************************************************************************/
        /* Phone button ***************************************************************/
        /* ****************************************************************************/
        $this->wp_customize->add_setting( 'header_display_phone_number' , array(
            'default'     => 'FALSE',
            'transport'   => 'refresh',
        ) );
        $this->wp_customize->add_setting( 'header_phone_color_button' , array(
            'default'     => '',
            'transport'   => 'refresh',
        ) );
        $this->wp_customize->add_setting( 'header_button_styles' , array(
            'default'     => 'basic',
            'transport'   => 'refresh',
        ) );
        /* ****************************************************************************/
        /* Request a quote button *****************************************************/
        /* ****************************************************************************/
        $this->wp_customize->add_setting( 'header_display_quote_button' , array(
            'default'     => 'FALSE',
            'transport'   => 'refresh',
        ) );
        $this->wp_customize->add_setting( 'header_quote_button_color' , array(
            'default'     => '',
            'transport'   => 'refresh',
        ) );
        /* ****************************************************************************/
        /* Select language button *****************************************************/
        /* ****************************************************************************/
        $this->wp_customize->add_setting( 'header_language_display' , array(
            'default'     => 'FALSE',
            'transport'   => 'refresh',
        ) );
        $this->wp_customize->add_setting( 'header_language_button_color' , array(
            'default'     => '',
            'transport'   => 'refresh',
        ) );
    }
    public function add_controls(){
        $this->wp_customize->add_control(
            'header_style_options',
            array(
                'label'    => __( 'Header Style', 'sage' ),
                'section'  => 'experiensa_header_design',
                'settings' => 'header_style',
                'type'     => 'select',
                'choices'  => array(
                    'aengus'   => __('Aengus', 'sage'),
                    'aine'     => __('Aine', 'sage'),
                    'banba'    => __('Banba', 'sage'),
                    'bodb'     => __('Bodb', 'sage'),
                    'brigid'   => __('Brigid', 'sage'),
                    'cliodhna' => __('Cliodhna', 'sage'),
                    'dian'     => __('Dian', 'sage'),
                    'eriu'     => __('Eriu', 'sage'),
                    'etain'    => __('Etain', 'sage'),
                    'fodla'    => __('Fodla', 'sage')
                ),
            )
        );
        $this->wp_customize->add_control(
            'header_logo_size',
            array(
                'label'    => __( 'Logo size', 'sage' ),
                'section'  => 'experiensa_header_design',
                'settings' => 'header_logo_size',
                'type'     => 'select',
                'choices'  => array(
                    'mini'      => __('Mini (35px)','sage'),
                    'tiny'      => __('Tiny (80px)','sage'),
                    'small'     => __('Small (150px)','sage')
                ),
            )
        );
        $this->wp_customize->add_control(
            'header_company_name',
            array(
                'label'    => __( 'Display Company name next to the logo ', 'sage' ),
                'section'  => 'experiensa_header_design',
                'settings' => 'header_company_name',
                'type'     => 'checkbox',
                'choices'  => array(
                    'TRUE'      => __('Display Company name next to the logo','sage')
                ),
            )
        );
        $this->wp_customize->add_control(
            'header_company_tagline',
            array(
                'label'    => __( 'Display Company tagline next to the logo', 'sage' ),
                'section'  => 'experiensa_header_design',
                'settings' => 'header_company_tagline',
                'type'     => 'checkbox',
                'choices'  => array(
                    'TRUE'      => __('Display Company tagline next to the logo','sage')
                ),
            )
        );
        /*$this->wp_customize->add_control(
            new WP_Customize_Color_Control(
                $this->wp_customize,
                'link_color',
                array(
                    'label'    => __( 'Header Background', 'sage' ),
                    'section'  => 'experiensa_header_design',
                    'settings' => 'header_background'
                )
            )
        );*/
        $this->wp_customize->add_control(
            'header_menu_style',
            array(
                'label'    => __( 'Fixed or attached', 'sage' ),
                'section'  => 'experiensa_header_design',
                'settings' => 'header_menu_style',
                'type'     => 'select',
                'choices'  => array(
                    'attached'  => __('Attached','sage'),
                    'fixed'     => __('Fixed','sage')
                ),
            )
        );

        $this->wp_customize->add_control(
            'header_menu_options',
            array(
                'label'    => __( 'Header menu Style', 'sage' ),
                'section'  => 'experiensa_header_design',
                'settings' => 'header_menu_options',
                'type'     => 'select',
                'choices'  => array(
                    ''          => __('None','sage'),
                    'borderless'=> __('Borderless','sage'),
                    'small'     => __('Small','sage'),
                    'large'     => __('Large','sage')
                ),
            )
        );
        $this->wp_customize->add_control(
            'header_color_fill',
            array(
                'label'    => __( 'Menu color fill', 'sage' ),
                'section'  => 'experiensa_header_design',
                'settings' => 'header_color_fill',
                'type'     => 'select',
                'choices'  => array(
                    'inverted'  => __('Background fill (inverted)','sage'),
                    ''          => __('Font colors (normal)','sage')
                ),
            )
        );
        /* ****************************************************************************/
        /* Phone button ***************************************************************/
        /* ****************************************************************************/
        $this->wp_customize->add_control(
            'header_display_phone_number',
            array(
                'label'    => __('Display Phone number','sage'),
                'section'  => 'experiensa_header_design',
                'settings' => 'header_display_phone_number',
                'type'     => 'select',
                'choices'  => array(
                    'TRUE'      => __('Yes','sage'),
                    'FALSE'     => __('No','sage')
                ),
            )
        );
        $this->wp_customize->add_control(
            'header_phone_color_button',
            array(
                'label'    => __('Phone Button Color','sage'),
                'section'  => 'experiensa_header_design',
                'settings' => 'header_phone_color_button',
                'type'     => 'select',
                'active_callback' => 'choice_display_phonebutton_callback',
                'choices'  => array(
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
            'header_button_styles',
            array(
                'label'    => __('Phone Button Style','sage'),
                'section'  => 'experiensa_header_design',
                'settings' => 'header_button_styles',
                'type'     => 'select',
                'active_callback' => 'choice_display_phonebutton_callback',
                'choices'  => array(
                    'inverted'  => __('Inverted','sage'),
                    'emphasis'  => __('Emphasis','sage'),
                    'basic'     => __('Basic','sage'),
                ),
            )
        );

        $this->wp_customize->add_control(
            'header_display_quote_button',
            array(
                'label'    => __('Display Resquest button','sage'),
                'section'  => 'experiensa_header_design',
                'settings' => 'header_display_quote_button',
                'type'     => 'select',
                'choices'  => array(
                    'TRUE'      => __('Yes','sage'),
                    'FALSE'     => __('No','sage')
                ),
            )
        );
        $this->wp_customize->add_control(
            'header_quote_button_color',
            array(
                'label'    => __('Request Button Color','sage'),
                'section'  => 'experiensa_header_design',
                'settings' => 'header_quote_button_color',
                'type'     => 'select',
                'active_callback' => 'choice_display_quotebutton_callback',
                'choices'  => array(
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
        /* ****************************************************************************/
        /* Select language button *****************************************************/
        /* ****************************************************************************/
        $this->wp_customize->add_control(
            'header_language_display',
            array(
                'label'    => __('Display multilanguage','sage'),
                'section'  => 'experiensa_header_design',
                'settings' => 'header_language_display',
                'type'     => 'select',
                'choices'  => array(
                    'TRUE'      => __('Yes','sage'),
                    'FALSE'     => __('No','sage')
                ),
            )
        );
        $this->wp_customize->add_control(
            'header_language_button_color',
            array(
                'label'    => __('Language Button Color','sage'),
                'section'  => 'experiensa_header_design',
                'settings' => 'header_language_button_color',
                'type'     => 'select',
                'active_callback' => 'choice_display_languagebutton_callback',
                'choices'  => array(
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
    }
}
