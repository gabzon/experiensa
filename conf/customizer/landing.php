<?php


    function add_landing_section($wp_customize){
        $landing_section = [
            'title'      => __('Landing Design','sage'),
            'priority'   => 31,
            'panel'     => 'experiensa_design'
        ];
        $wp_customize->add_section( 'experiensa_landing_design' , $landing_section );
    }
    /*
    public function landing_settings(){
        $this->wp_customize->add_setting( 'display_slider' , array(
            'default'     => 'no',
            'transport'   => 'refresh',
        ) );
    }
    public function add_landing_controls(){
        $this->wp_customize->add_control(
            'display_slider',
            array(
                'label'    => __( 'Logo size', 'sage' ),
                'section'  => 'experiensa_landing_design',
                'settings' => 'display_slider',
                'type'     => 'select',
                'choices'  => array(
                    'yes' => __('Yes', 'sage'),
                    'no'  => __('No', 'sage')
                ),
            )
        );
    }*/
