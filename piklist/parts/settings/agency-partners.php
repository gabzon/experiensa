<?php
/*
 Title: Agency Partners
 Setting: agency_settings
 Tab: Partners
 Flow: Options
 */
piklist('field',array(
    'type'          => 'select',
    'field'         => 'setting_partners_display',
    'label'         => __('Display Partners Section','sage'),
    'value'         => 'FALSE',
    'choices'       => array(
        'TRUE'  => __('Yes','sage'),
        'FALSE' => __('No','sage')
    ),
));
$partner_name = array(
            'type' => 'text',
            'field' => 'partner_name',
            'label' => __('Partner Name','sage'),
            'attributes' => array(
                'class' => 'regular-text',
                'placeholder' => __('Enter the partner name','sage')
            )
        );
$partner_website = array(
            'type' => 'text',
            'field' => 'partner_website',
            'label' => __('Partner Website','sage'),
            'attributes' => array(
                'class' => 'regular-text',
                'placeholder' => __('Enter the partner website','sage')
            ),
            'validate' => array(
              array(
                'type' => 'url'
              )
            )
        );
$partner_logo = array(
            'type' => 'file',
            'field' => 'partner_logo',
            'label' => __('Partner Logo','sage'),
            'options' => array(
                'modal_title' => __('Add Logo','sage'),
                'button' => __('Add Logo','sage')
            )
        );
piklist('field', array(
    'type' => 'group',
    'field' => 'agency_partners',
    'label' => __('Partners','sage'),
    'add_more' => true,
    'fields' => array(
        $partner_name,
        $partner_website,
        $partner_logo
    )
));