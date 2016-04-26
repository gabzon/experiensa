<?php
/*
Title: Brochures
Post Type: brochure
Meta box: true
*/




piklist('field', array(
    'type'      => 'datepicker',
    'field'     => 'expiry_date',
    'label'     => __('Expiry date','sage'),
    'options'   => array( 'dateFormat' => 'dd/mm/yy'),
    'add_more'  => true
));

piklist('field', array(
    'type'          => 'file',
    'field'         => 'brochures',
    'help'          => __( 'Brochures should be PDF files','sage'),
    'label'         => __( 'Brochures','sage' ),
    'options'       => ['button' => __('PDF Brochures','sage')],
));

piklist('field', array(
    'type'          => 'file',
    'field'         => 'image_gallery',
    'label'         => __('Image Gallery','sage'),
    'description'   => __('Images should be jpeg/png/gif files, please visit: <a href="https://smallpdf.com/pdf-to-jpg" target="_blank">https://smallpdf.com</a> for a single file convertion or <a href="https://pdfjpg.pro" target="_blank">https://pdfjpg.pro</a> for multiple files convertions','sage'),
    'options'       => [ 'button' => __('Add Images','sage') ],
));
