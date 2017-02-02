<?php

use Configuration\Customizer\Header as HeaderCustomizer;
use Configuration\Customizer\Landing as LandingCustomizer;
use Configuration\Customizer\Footer as FooterCustomizer;
use Configuration\Customizer as Customizer;
function experiensa_customize_register( $wp_customize ) {
    $design_panel = [
        'title' => __( 'Design', 'sage' ),
        'description' => __('Theme Design Options'), // Include html tags such as <p>.
        'priority' => 160, // Mixed with top-level-section hierarchy.
    ];

    $wp_customize->add_panel( 'experiensa_design', $design_panel);

    $general = new Customizer\General($wp_customize);
    $general->create_components();
//    $header = new HeaderCustomizer\Header($wp_customize);
//    $header->create_components();
    /*$landing = new LandingCustomizer\Landing($wp_customize);
    $landing->create_components();*/
//    $footer = new FooterCustomizer\Footer($wp_customize);
//    $footer->create_components();
}
add_action( 'customize_register', 'experiensa_customize_register' );
