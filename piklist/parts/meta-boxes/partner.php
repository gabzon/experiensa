<?php
/*
Title: Partner information
Post Type: partner
*/

piklist('field', array(
    'type'      => 'text',
    'label'     => __('Website','sage'),
    'field'     => 'partner_website',
    'columns'   => 12
));

piklist('field', array(
    'type'      => 'email',
    'label'     => __('Email','sage'),
    'field'     => 'partner_email',
    'columns'   => 12
));
