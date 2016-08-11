<?php
/*
Title: Brochures
Post Type: brochure
Meta box: true
*/

$brochure_title = array(
    'type'      => 'text',
    'label'     => __('Title','sage'),
    'field'     => 'title',
    'columns'   => 4,
    'required' => true
);

$brochure_expiry_date = array(
    'type'      => 'datepicker',
    'label'     => __('Expiry date','sage'),
    'field'     => 'expiry_date',
    'columns'   => 2,
    'options'   => array( 'dateFormat' => 'dd/mm/yy'),
);

$brochures_files = array(
    'type'          => 'file',
    'field'         => 'brochure_file',
    'help'          => __( 'Brochures should be PDF files','sage'),
    'label'         => __( 'Brochure File','sage' ),
    'columns'       => 3,
    'options'       => ['button' => __('PDF Brochures','sage')],
    'required' => true,
    'validate' => array(
        array(
            'type' => 'limit',
            'options' => array(
                'min' => 0,
                'max' => 1
            )
        )
    )
);

$brochure_gallery = array(
    'type'          => 'file',
    'field'         => 'image_gallery',
    'label'         => __('Image Gallery','sage'),
    'columns'       => 3,
    'options'       => [ 'button' => __('Add Images','sage')],
    'required' => true,
    'validate' => array(
        array(
            'type' => 'limit',
            'options' => array(
                'min' => 0,
                'max' => 1
            )
        )
    )
);

piklist('field',array(
    'type' => 'group',
    'field' => 'brochures',
    'label' => __('Brochures','sage'),
    'description'          => __('Images should be jpeg/png/gif files, please visit: <a href="https://smallpdf.com/pdf-to-jpg" target="_blank">https://smallpdf.com</a> for a single file convertion or <a href="https://pdfjpg.pro" target="_blank">https://pdfjpg.pro</a> for multiple files convertions','sage'),
    'add_more' => true,
    'fields' => array(
        $brochure_title,
        $brochure_expiry_date,
        $brochures_files,
        $brochure_gallery
    )
));