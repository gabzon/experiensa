<?php
/*
Title: Footer Design
Setting: experiensa_design_settings
Tab: Footer Pager
Tab Order: 100
*/


$footer_color = array(
    'type'      => 'select',
    'field'     => 'footer_section_color',
    'columns'   => 3,
    'value'     => '',
    'choices'   => array(
        ''              => __('No Color','sage'),
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
        'website'       => __('Default website','sage'),
    ),
);

$footer_inverted = array(
    'type' => 'checkbox',
    'field' => 'footer_section_inverted',
    'columns' => 3,
    'choices' => array(
        'inverted' => __('Inverted color','sage')
    )
);

piklist('field',array(
    'type' => 'group',
    'field' => 'footer_section_group',
    'label' => __('Theme section color','sage'),
    'help'  => __('If inverted color is checked, this section background will be colored instead','sage'),
    'fields' => array(
        $footer_color,
        $footer_inverted
    )
));

?>
