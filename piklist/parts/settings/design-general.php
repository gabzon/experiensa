<?php
/*
Title: Website Design
Setting: experiensa_design_settings
Tab: Website Design
Flow: Design
*/

piklist('field',array(
    'type'      => 'select',
    'field'     => 'website_color',
    'label'     => __('Website Color','sage'),
    'columns'   => 3,
    'choices'   => array(
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
));

piklist('field',array(
    'type'      => 'select',
    'field'     => 'agency_catalog_template',
    'label'     => __('Catalog template','sage'),
    'columns'   => 3,
    'value'     => 'simple-grid',
    'choices'   => array(
        'simple-grid'   =>  __('Simple Grid','sage'),
        'isotope-grid'  =>  __('Isotope Grid','sage'),
        'partners-api'  =>  __('Partners API','sage'),
    ),
));

?>
