<?php

namespace Configuration\Customizer\Footer;

class Footer_Customizer{
    public function add_footer_settings($wp_customize){
        $wp_customize->add_setting( 'footer_style' , array(
            'default'     => 'all_horizontal',
            'transport'   => 'refresh',
        ) );

        $wp_customize->add_setting( 'footer_logo_size' ,
        [
            'default'     => 'tiny',
            'transport'   => 'refresh'
        ]);
        $wp_customize->add_setting( 'header_company_name' , array(
            'default'     => 'TRUE',
            'transport'   => 'refresh',
        ) );
        $wp_customize->add_setting( 'header_company_tagline' , array(
            'default'     => 'TRUE',
            'transport'   => 'refresh',
        ) );
    }

    function add_footer_controls($wp_customize){
        /***************************************************************************
        ** Footer layout controls
        ***************************************************************************/
        $layout =  [
            'label'    => __( 'Footer layout', 'sage' ),
            'section'  => 'experiensa_footer_design',
            'settings' => 'footer_layout',
            'type'     => 'select',
            'choices'  =>
            [
                'logo_above_menu_below'       => __('Logo Above and Menu Below', 'sage'),
                'all_vertical'                 => __('All Vertical', 'sage'),
                'right_logo_menu_icon'         => __('Right Logo and Menu Icon', 'sage'),
                'left_logo_menu_icon'          => __('Left Logo and Menu Icon', 'sage'),
                'logo_above_right_menu_below' => __('Logo Above and to the Right and Below Menu', 'sage'),
                'logo_above_left_menu_below'  => __('Logo Above and to the Left and Below Menu', 'sage'),
                'right_logo_menu_left'         => __('Right Logo and Left Menu', 'sage'),
                'left_logo_menu_right'         => __('Left Logo and Right Menu', 'sage')
            ]
        ];
        $wp_customize->add_control( 'footer_layout_options', $args);

        /***************************************************************************
        ** Footer Logo controls
        ***************************************************************************/
        $footer_logo = [
            'label'    => __( 'Logo size', 'sage' ),
            'section'  => 'experiensa_footer_design',
            'settings' => 'footer_logo_size',
            'type'     => 'select',
            'choices'  =>
            [
                'mini'      => __('Mini (35px)','sage'),
                'tiny'      => __('Tiny (80px)','sage'),
                'small'     => __('Small (150px)','sage')
            ]
        ];
        $wp_customize->add_control('header_logo_size', $footer_logo);

        /***************************************************************************
        ** Footer Company name & tagline controls
        ***************************************************************************/
        $company_name = [
            'label'    => __( 'Display Company name next to the logo ', 'sage' ),
            'section'  => 'experiensa_header_design',
            'settings' => 'footer_company_name',
            'type'     => 'checkbox',
            'choices'  => [ 'TRUE' => __('Display Company name next to the logo','sage') ]
        ];
        $wp_customize->add_control('footer_company_name',$company_name );

        $tagline = [
            'label'    => __( 'Display Company tagline next to the logo', 'sage' ),
            'section'  => 'experiensa_header_design',
            'settings' => 'header_company_tagline',
            'type'     => 'checkbox',
            'choices'  => ['TRUE' => __('Display Company tagline next to the logo','sage') ]
        ];
        $wp_customize->add_control('footer_company_tagline', $tagline );
    }
}
