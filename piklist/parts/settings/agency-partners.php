<?php
/*
 Title: Agency Partners
 Setting: agency_settings
 Tab: Partner
 Tab Order: 30
 */

piklist('field', array(
    'type' => 'group',
    'field' => 'partner_partners',
    'label' => __('Partners'),
    'columns' => 12,
    'add_more' => true,
    'fields' => array(
        array(
            'type' => 'text',
            'field' => 'partner_name',
            'scope' => 'post_meta',
            'label' => __('Partner Name'),
            'attributes' => array(
                'class' => 'regular-text',
                'placeholder' => __('Enter the partner name')
            )
        ),
        array(
            'type' => 'text',
            'field' => 'partner_website',
            'scope' => 'post_meta',
            'label' => __('Partner Website'),
            'attributes' => array(
                'class' => 'regular-text',
                'placeholder' => __('Enter the partner website')
            )
        ),
        array(
            'type' => 'file',
            'field' => 'partner_logo',
            'scope' => 'post_meta',
            'label' => __('Partner Logo'),
            'options' => array(
                'modal_title' => __('Add Logo'),
                'button' => __('Add Logo')
            )
        )
    )
));
