<?php

namespace Configuration\Customizer\Header;

class Header_Customizer{
    public function add_header_settings($wp_customize){
        $wp_customize->add_setting( 'header_style' , array(
            'default'     => 'all_horizontal',
            'transport'   => 'refresh',
        ) );
        $wp_customize->add_setting( 'header_logo_size' , array(
            'default'     => 'tiny',
            'transport'   => 'refresh',
        ) );
        $wp_customize->add_setting( 'header_company_name' , array(
            'default'     => 'TRUE',
            'transport'   => 'refresh',
        ) );
        $wp_customize->add_setting( 'header_company_tagline' , array(
            'default'     => 'TRUE',
            'transport'   => 'refresh',
        ) );
    }
}
