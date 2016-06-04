<?php
function add_sections($wp_customize){
    $wp_customize->add_section( 'experiensa_header_design' , array(
        'title'      => __('Header Design','sage'),
        'priority'   => 30,
        'panel'     => 'experiensa_design'
    ) );
}
function add_header_settings($wp_customize){
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
function add_header_controls($wp_customize){
  $wp_customize->add_control(
      'header_style_options',
      array(
          'label'    => __( 'Header Style', 'sage' ),
          'section'  => 'experiensa_header_design',
          'settings' => 'header_style',
          'type'     => 'select',
          'choices'  => array(
              'logo_above_menu_below'       => __('Logo Above and Menu Below', 'sage'),
              'all_vertical'                 => __('All Vertical', 'sage'),
              'right_logo_menu_icon'         => __('Right Logo and Menu Icon', 'sage'),
              'left_logo_menu_icon'          => __('Left Logo and Menu Icon', 'sage'),
              'logo_above_right_menu_below' => __('Logo Above and to the Right and Below Menu', 'sage'),
              'logo_above_left_menu_below'  => __('Logo Above and to the Left and Below Menu', 'sage'),
              'right_logo_menu_left'         => __('Right Logo and Left Menu', 'sage'),
              'left_logo_menu_right'         => __('Left Logo and Right Menu', 'sage')
          ),
      )
  );

  $wp_customize->add_control(
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
    $wp_customize->add_control(
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
    $wp_customize->add_control(
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
}
function experiensa_customize_register( $wp_customize ) {
    $wp_customize->add_panel( 'experiensa_design', array(
        'title' => __( 'Design', 'sage' ),
        'description' => __('Theme Design Options'), // Include html tags such as <p>.
        'priority' => 160, // Mixed with top-level-section hierarchy.
    ) );

    add_sections($wp_customize);
    add_header_settings($wp_customize);
    add_header_controls($wp_customize);

}
add_action( 'customize_register', 'experiensa_customize_register' );
