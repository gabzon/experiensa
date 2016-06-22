<?php
namespace Configuration\Customizer\Landing;

class Landing{
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
        $landing_section = [
            'title'      => __('Landing Design','sage'),
            'priority'   => 31,
            'panel'     => 'experiensa_design'
        ];
        $this->wp_customize->add_section( 'experiensa_landing_design' , $landing_section );
    }
    public function add_settings(){
        $this->wp_customize->add_setting( 'display_slider' , array(
            'default'     => 'no',
            'transport'   => 'refresh',
        ));
    }
    public function add_controls(){
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
    }
}
